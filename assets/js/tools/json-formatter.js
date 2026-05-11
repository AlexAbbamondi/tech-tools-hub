document.addEventListener('DOMContentLoaded', () => {
	const input = document.getElementById('json-input');
	const output = document.getElementById('json-output');
	const message = document.getElementById('json-message');

	const formatButton = document.getElementById('json-format-button');
	const minifyButton = document.getElementById('json-minify-button');
	const clearButton = document.getElementById('json-clear-button');

	if (!input || !output) {
		return;
	}

	function showMessage(text, isError = false) {
		message.textContent = text;
		message.style.color = isError ? '#c0392b' : '#0f8f68';
	}

	function clearMessage() {
		message.textContent = '';
	}

	formatButton?.addEventListener('click', () => {
		clearMessage();

		try {
			const parsed = JSON.parse(input.value);
			output.value = JSON.stringify(parsed, null, 2);
			showMessage('JSON formatted successfully.');
		} catch (error) {
			output.value = '';
			showMessage('Invalid JSON. Please check your syntax.', true);
		}
	});

	minifyButton?.addEventListener('click', () => {
		clearMessage();

		try {
			const parsed = JSON.parse(input.value);
			output.value = JSON.stringify(parsed);
			showMessage('JSON minified successfully.');
		} catch (error) {
			output.value = '';
			showMessage('Invalid JSON. Please check your syntax.', true);
		}
	});

	clearButton?.addEventListener('click', () => {
		input.value = '';
		output.value = '';
		clearMessage();
		input.focus();
	});
});