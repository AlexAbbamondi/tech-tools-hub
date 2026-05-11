document.addEventListener('DOMContentLoaded', () => {
	const input = document.getElementById('text-case-input');
	const output = document.getElementById('text-case-output');

	const uppercaseButton = document.getElementById('text-uppercase-button');
	const lowercaseButton = document.getElementById('text-lowercase-button');
	const titlecaseButton = document.getElementById('text-titlecase-button');
	const sentencecaseButton = document.getElementById('text-sentencecase-button');
	const copyButton = document.getElementById('text-copy-button');
	const clearButton = document.getElementById('text-clear-button');

	const results = document.getElementById('text-case-results');
	const characterCount = document.getElementById('text-case-character-count');
	const wordCount = document.getElementById('text-case-word-count');
	const message = document.getElementById('text-case-message');

	if (!input || !output) {
		return;
	}

	function showMessage(text, isError = false) {
		if (!message) return;
		message.textContent = text;
		message.style.color = isError ? '#b42318' : '#0f8f68';
	}

	function countWords(text) {
		const trimmed = text.trim();

		if (!trimmed) {
			return 0;
		}

		return trimmed.split(/\s+/).length;
	}

	function updateStats(text) {
		characterCount.textContent = text.length.toLocaleString();
		wordCount.textContent = countWords(text).toLocaleString();
		results.hidden = !text;
	}

	function convertText(callback, successMessage) {
		const value = input.value;

		if (!value.trim()) {
			output.value = '';
			updateStats('');
			showMessage('Please enter text to convert.', true);
			return;
		}

		const converted = callback(value);
		output.value = converted;
		updateStats(converted);
		showMessage(successMessage);
	}

	function toTitleCase(text) {
		return text.toLowerCase().replace(/\b\w/g, (char) => char.toUpperCase());
	}

	function toSentenceCase(text) {
		return text
			.toLowerCase()
			.replace(/(^\s*\w|[.!?]\s+\w)/g, (match) => match.toUpperCase());
	}

	uppercaseButton?.addEventListener('click', () => {
		convertText((value) => value.toUpperCase(), 'Converted to uppercase.');
	});

	lowercaseButton?.addEventListener('click', () => {
		convertText((value) => value.toLowerCase(), 'Converted to lowercase.');
	});

	titlecaseButton?.addEventListener('click', () => {
		convertText(toTitleCase, 'Converted to title case.');
	});

	sentencecaseButton?.addEventListener('click', () => {
		convertText(toSentenceCase, 'Converted to sentence case.');
	});

	copyButton?.addEventListener('click', async () => {
		if (!output.value) {
			showMessage('Nothing to copy yet.', true);
			return;
		}

		try {
			await navigator.clipboard.writeText(output.value);
			showMessage('Converted text copied to clipboard.');
		} catch (error) {
			output.select();
			document.execCommand('copy');
			showMessage('Converted text copied to clipboard.');
		}
	});

	clearButton?.addEventListener('click', () => {
		input.value = '';
		output.value = '';
		updateStats('');
		showMessage('');
		input.focus();
	});
});