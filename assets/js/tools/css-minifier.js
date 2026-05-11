document.addEventListener('DOMContentLoaded', () => {
	const input = document.getElementById('css-minifier-input');
	const output = document.getElementById('css-minifier-output');
	const minifyButton = document.getElementById('css-minifier-button');
	const copyButton = document.getElementById('css-copy-button');
	const clearButton = document.getElementById('css-clear-button');
	const message = document.getElementById('css-minifier-message');

	if (!input || !output || !minifyButton) {
		return;
	}

	function showMessage(text, isError = false) {
		if (!message) return;
		message.textContent = text;
		message.style.color = isError ? '#b42318' : '#0f8f68';
	}

	function minifyCSS(css) {
		return css
			.replace(/\/\*[\s\S]*?\*\//g, '') // remove comments
			.replace(/\s+/g, ' ') // collapse whitespace
			.replace(/\s*([{}:;,>+~])\s*/g, '$1') // remove spaces around CSS symbols
			.replace(/;}/g, '}') // remove final semicolon before }
			.trim();
	}

	minifyButton.addEventListener('click', () => {
		const css = input.value.trim();

		if (!css) {
			output.value = '';
			showMessage('Please paste some CSS to minify.', true);
			return;
		}

		const minified = minifyCSS(css);
		output.value = minified;

		const saved = css.length - minified.length;
		showMessage(`CSS minified successfully. Saved ${saved} characters.`);
	});

	copyButton?.addEventListener('click', async () => {
		if (!output.value) {
			showMessage('Nothing to copy yet.', true);
			return;
		}

		try {
			await navigator.clipboard.writeText(output.value);
			showMessage('Minified CSS copied to clipboard.');
		 } catch (error) {
			output.select();
			document.execCommand('copy');
			showMessage('Minified CSS copied to clipboard.');
		}
	});

	clearButton?.addEventListener('click', () => {
		input.value = '';
		output.value = '';
		showMessage('');
		input.focus();
	});
});