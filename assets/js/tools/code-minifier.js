document.addEventListener('DOMContentLoaded', () => {
	const tool = document.querySelector('[data-minifier-tool]');
	const tabs = document.querySelectorAll('[data-minifier-tab]');

	const input = document.getElementById('code-minifier-input');
	const output = document.getElementById('code-minifier-output');
	const inputLabel = document.getElementById('code-minifier-input-label');
	const outputLabel = document.getElementById('code-minifier-output-label');

	const minifyButton = document.getElementById('code-minifier-button');
	const copyButton = document.getElementById('code-copy-button');
	const clearButton = document.getElementById('code-clear-button');
	const message = document.getElementById('code-minifier-message');

	if (!tool || !input || !output || !minifyButton) {
		return;
	}

	let activeType = 'html';

	const labels = {
		html: {
			name: 'HTML',
			paste: 'Paste HTML',
			output: 'Minified HTML',
			button: 'Minify HTML',
		},
		css: {
			name: 'CSS',
			paste: 'Paste CSS',
			output: 'Minified CSS',
			button: 'Minify CSS',
		},
		js: {
			name: 'JavaScript',
			paste: 'Paste JavaScript',
			output: 'Minified JavaScript',
			button: 'Minify JavaScript',
		},
	};

	function showMessage(text, isError = false) {
		if (!message) return;

		message.textContent = text;
		message.style.color = isError ? '#b42318' : '#0f8f68';
	}

	function clearMessage() {
		showMessage('');
	}

	function minifyHTML(html) {
		return html
			.replace(/<!--[\s\S]*?-->/g, '')
			.replace(/>\s+</g, '><')
			.replace(/\s{2,}/g, ' ')
			.trim();
	}

	function minifyCSS(css) {
		return css
			.replace(/\/\*[\s\S]*?\*\//g, '')
			.replace(/\s+/g, ' ')
			.replace(/\s*([{}:;,>+~])\s*/g, '$1')
			.replace(/;}/g, '}')
			.trim();
	}

	function minifyJS(js) {
		return js
			.replace(/\s+/g, ' ')
			.replace(/\s*([{}:;,=+\-*<>])\s*/g, '$1')
			.replace(/;}/g, '}')
			.trim();
	}

	function getMinifiedCode(type, value) {
		switch (type) {
			case 'css':
				return minifyCSS(value);

			case 'js':
				return minifyJS(value);

			case 'html':
			default:
				return minifyHTML(value);
		}
	}

	function updateLabels() {
		const current = labels[activeType];

		inputLabel.textContent = current.paste;
		outputLabel.textContent = current.output;
		minifyButton.textContent = current.button;
	}

	function setActiveTab(type) {
		activeType = type;

		tabs.forEach((tab) => {
			const isActive = tab.dataset.minifierTab === type;
			tab.classList.toggle('is-active', isActive);
			tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
		});

		input.value = '';
		output.value = '';
		clearMessage();
		updateLabels();
		input.focus();
	}

	tabs.forEach((tab) => {
		tab.addEventListener('click', () => {
			setActiveTab(tab.dataset.minifierTab);
		});
	});

	minifyButton.addEventListener('click', () => {
		const code = input.value.trim();
		const current = labels[activeType];

		if (!code) {
			output.value = '';
			showMessage(`Please paste some ${current.name} to minify.`, true);
			return;
		}

		const minified = getMinifiedCode(activeType, code);
		const saved = code.length - minified.length;

		output.value = minified;
		showMessage(`${current.name} minified successfully. Saved ${saved} characters.`);
	});

	copyButton?.addEventListener('click', async () => {
		if (!output.value) {
			showMessage('Nothing to copy yet.', true);
			return;
		}

		try {
			await navigator.clipboard.writeText(output.value);
			showMessage('Minified code copied to clipboard.');
		} catch (error) {
			output.select();
			document.execCommand('copy');
			showMessage('Minified code copied to clipboard.');
		}
	});

	clearButton?.addEventListener('click', () => {
		input.value = '';
		output.value = '';
		clearMessage();
		input.focus();
	});

	updateLabels();
});