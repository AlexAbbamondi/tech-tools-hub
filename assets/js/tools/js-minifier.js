document.addEventListener('DOMContentLoaded', () => {
	const input = document.getElementById('js-minifier-input');
	const output = document.getElementById('js-minifier-output');
	const minifyButton = document.getElementById('js-minifier-button');
	const copyButton = document.getElementById('js-copy-button');
	const clearButton = document.getElementById('js-clear-button');
	const message = document.getElementById('js-minifier-message');

	if (!input || !output || !minifyButton) {
		return;
	}

	function showMessage(text, isError = false) {
		if (!message) return;
		message.textContent = text;
		message.style.color = isError ? '#b42318' : '#0f8f68';
	}

	function minifyJS(js) {
        return js
            .replace(/\s+/g, ' ')
            .replace(/\s*([{}:;,=+\-*<>])\s*/g, '$1')
            .replace(/;}/g, '}')
            .trim();
    }

	minifyButton.addEventListener('click', () => {
		const js = input.value.trim();

		if (!js) {
			output.value = '';
			showMessage('Please paste some JS to minify.', true);
			return;
		}

		const minified = minifyJS(js);
		output.value = minified;

		const saved = js.length - minified.length;
		showMessage(`JS minified successfully. Saved ${saved} characters.`);
	});

	copyButton?.addEventListener('click', async () => {
		if (!output.value) {
			showMessage('Nothing to copy yet.', true);
			return;
		}

		try {
			await navigator.clipboard.writeText(output.value);
			showMessage('Minified JS copied to clipboard.');
		 } catch (error) {
			output.select();
			document.execCommand('copy');
			showMessage('Minified JS copied to clipboard.');
		}
	});

	clearButton?.addEventListener('click', () => {
		input.value = '';
		output.value = '';
		showMessage('');
		input.focus();
	});
});