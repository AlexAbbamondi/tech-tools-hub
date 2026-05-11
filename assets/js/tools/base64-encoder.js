document.addEventListener('DOMContentLoaded', () => {
	const input = document.getElementById('base64-input');
	const output = document.getElementById('base64-output');

	const encodeButton = document.getElementById('base64-encode-button');
	const decodeButton = document.getElementById('base64-decode-button');
	const copyButton = document.getElementById('base64-copy-button');
	const clearButton = document.getElementById('base64-clear-button');

	const message = document.getElementById('base64-message');

	if (!input || !output || !encodeButton || !decodeButton) {
		return;
	}

	function showMessage(text, isError = false) {
		if (!message) return;
		message.textContent = text;
		message.style.color = isError ? '#b42318' : '#0f8f68';
	}

	function encodeBase64(value) {
		return btoa(unescape(encodeURIComponent(value)));
	}

	function decodeBase64(value) {
		return decodeURIComponent(escape(atob(value)));
	}

	encodeButton.addEventListener('click', () => {
		const value = input.value.trim();

		if (!value) {
			output.value = '';
			showMessage('Please enter text to encode.', true);
			return;
		}

		try {
			output.value = encodeBase64(value);
			showMessage('Text encoded successfully.');
		} catch (error) {
			output.value = '';
			showMessage('Could not encode this text.', true);
		}
	});

	decodeButton.addEventListener('click', () => {
		const value = input.value.trim();

		if (!value) {
			output.value = '';
			showMessage('Please enter Base64 text to decode.', true);
			return;
		}

		try {
			output.value = decodeBase64(value);
			showMessage('Base64 decoded successfully.');
		} catch (error) {
			output.value = '';
			showMessage('Invalid Base64 input.', true);
		}
	});

	copyButton?.addEventListener('click', async () => {
		if (!output.value) {
			showMessage('Nothing to copy yet.', true);
			return;
		}

		try {
			await navigator.clipboard.writeText(output.value);
			showMessage('Output copied to clipboard.');
		} catch (error) {
			output.select();
			document.execCommand('copy');
			showMessage('Output copied to clipboard.');
		}
	});

	clearButton?.addEventListener('click', () => {
		input.value = '';
		output.value = '';
		showMessage('');
		input.focus();
	});
});