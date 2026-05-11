document.addEventListener('DOMContentLoaded', () => {
	const input = document.getElementById('html-minifier-input');
	const output = document.getElementById('html-minifier-output');
	const minifyButton = document.getElementById('html-minifier-button');
	const copyButton = document.getElementById('html-copy-button');
	const clearButton = document.getElementById('html-clear-button');
	const message = document.getElementById('html-minifier-message');

	if (!input || !output || !minifyButton) {
		return;
	}

	function showMessage(text, isError = false) {
		if (!message) return;
		message.textContent = text;
		message.style.color = isError ? '#b42318' : '#0f8f68';
	}

	function minifyHTML(html) {
		return html
            .replace(/<!--[\s\S]*?-->/g, '') // remove HTML comments
            .replace(/>\s+</g, '><') // remove whitespace between tags
            .replace(/\s{2,}/g, ' ') // collapse repeated spaces
			.trim();
	}

	minifyButton.addEventListener('click', () => {
		const html = input.value.trim();

		if (!html) {
			output.value = '';
			showMessage('Please paste some HTML to minify.', true);
			return;
		}

		const minified = minifyHTML(html);
		output.value = minified;

		const saved = html.length - minified.length;
		showMessage(`HTML minified successfully. Saved ${saved} characters.`);
	});

	copyButton?.addEventListener('click', async () => {
		if (!output.value) {
			showMessage('Nothing to copy yet.', true);
			return;
		}

		try {
			await navigator.clipboard.writeText(output.value);
			showMessage('Minified HTML copied to clipboard.');
		 } catch (error) {
			output.select();
			document.execCommand('copy');
			showMessage('Minified HTML copied to clipboard.');
		}
	});

	clearButton?.addEventListener('click', () => {
		input.value = '';
		output.value = '';
		showMessage('');
		input.focus();
	});
});