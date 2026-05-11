document.addEventListener('DOMContentLoaded', () => {
	const textColor = document.getElementById('contrast-text-color');
	const bgColor = document.getElementById('contrast-bg-color');
	const textHex = document.getElementById('contrast-text-hex');
	const bgHex = document.getElementById('contrast-bg-hex');

	const checkButton = document.getElementById('contrast-check-button');
	const swapButton = document.getElementById('contrast-swap-button');
	const clearButton = document.getElementById('contrast-clear-button');

	const preview = document.getElementById('contrast-preview');
	const results = document.getElementById('contrast-results');
	const ratioOutput = document.getElementById('contrast-ratio');
	const normalOutput = document.getElementById('contrast-normal-result');
	const largeOutput = document.getElementById('contrast-large-result');
	const aaaOutput = document.getElementById('contrast-aaa-result');
	const message = document.getElementById('contrast-message');

	if (!textColor || !bgColor || !checkButton) {
		return;
	}

	function showMessage(text, isError = false) {
		if (!message) return;
		message.textContent = text;
		message.style.color = isError ? '#b42318' : '#0f8f68';
	}

	function normalizeHex(hex) {
		let value = hex.trim().replace('#', '');

		if (value.length === 3) {
			value = value
				.split('')
				.map((char) => char + char)
				.join('');
		}

		if (!/^[0-9a-fA-F]{6}$/.test(value)) {
			return null;
		}

		return `#${value.toLowerCase()}`;
	}

	function hexToRgb(hex) {
		const normalized = normalizeHex(hex);

		if (!normalized) {
			return null;
		}

		const value = normalized.replace('#', '');

		return {
			r: parseInt(value.substring(0, 2), 16),
			g: parseInt(value.substring(2, 4), 16),
			b: parseInt(value.substring(4, 6), 16),
		};
	}

	function getRelativeLuminance({ r, g, b }) {
		const rgb = [r, g, b].map((value) => {
			const channel = value / 255;

			return channel <= 0.03928
				? channel / 12.92
				: Math.pow((channel + 0.055) / 1.055, 2.4);
		});

		return 0.2126 * rgb[0] + 0.7152 * rgb[1] + 0.0722 * rgb[2];
	}

	function getContrastRatio(colorOne, colorTwo) {
		const lumOne = getRelativeLuminance(colorOne);
		const lumTwo = getRelativeLuminance(colorTwo);

		const lighter = Math.max(lumOne, lumTwo);
		const darker = Math.min(lumOne, lumTwo);

		return (lighter + 0.05) / (darker + 0.05);
	}

	function getPassFail(passes) {
		return passes ? 'Pass' : 'Fail';
	}

	function updatePreview(foreground, background) {
		preview.style.color = foreground;
		preview.style.backgroundColor = background;
	}

	function checkContrast() {
		const foreground = normalizeHex(textHex.value);
		const background = normalizeHex(bgHex.value);

		if (!foreground || !background) {
			results.hidden = true;
			showMessage('Please enter valid HEX colors.', true);
			return;
		}

		const foregroundRgb = hexToRgb(foreground);
		const backgroundRgb = hexToRgb(background);

		const ratio = getContrastRatio(foregroundRgb, backgroundRgb);
		const roundedRatio = ratio.toFixed(2);

		textColor.value = foreground;
		bgColor.value = background;
		textHex.value = foreground;
		bgHex.value = background;

		updatePreview(foreground, background);

		ratioOutput.textContent = `${roundedRatio}:1`;
		normalOutput.textContent = getPassFail(ratio >= 4.5);
		largeOutput.textContent = getPassFail(ratio >= 3);
		aaaOutput.textContent = getPassFail(ratio >= 7);

		results.hidden = false;
		showMessage('Contrast checked successfully.');
	}

	function syncColorToHex(colorInput, hexInput) {
		hexInput.value = colorInput.value;
		checkContrast();
	}

	function syncHexToColor(hexInput, colorInput) {
		const normalized = normalizeHex(hexInput.value);

		if (normalized) {
			colorInput.value = normalized;
			checkContrast();
		}
	}

	textColor.addEventListener('input', () => syncColorToHex(textColor, textHex));
	bgColor.addEventListener('input', () => syncColorToHex(bgColor, bgHex));

	textHex.addEventListener('input', () => syncHexToColor(textHex, textColor));
	bgHex.addEventListener('input', () => syncHexToColor(bgHex, bgColor));

	checkButton.addEventListener('click', checkContrast);

	swapButton?.addEventListener('click', () => {
		const oldText = textHex.value;
		textHex.value = bgHex.value;
		bgHex.value = oldText;
		checkContrast();
	});

	clearButton?.addEventListener('click', () => {
		textHex.value = '#142027';
		bgHex.value = '#ffffff';
		textColor.value = '#142027';
		bgColor.value = '#ffffff';
		checkContrast();
	});

	checkContrast();
});