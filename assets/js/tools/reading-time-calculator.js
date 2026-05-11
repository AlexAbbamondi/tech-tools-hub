document.addEventListener('DOMContentLoaded', () => {
	const input = document.getElementById('reading-time-input');
	const speed = document.getElementById('reading-speed');
	const calculateButton = document.getElementById('reading-time-button');
	const clearButton = document.getElementById('reading-time-clear-button');

	const results = document.getElementById('reading-time-results');
	const timeOutput = document.getElementById('reading-time-output');
	const wordCountOutput = document.getElementById('reading-word-count');
	const characterCountOutput = document.getElementById('reading-character-count');
	const message = document.getElementById('reading-time-message');

	if (!input || !speed || !calculateButton) {
		return;
	}

	function countWords(text) {
		const words = text
			.trim()
			.split(/\s+/)
			.filter(Boolean);

		return text.trim() ? words.length : 0;
	}

	function formatReadingTime(minutes) {
		if (minutes < 1) {
			return 'Less than 1 minute';
		}

		const wholeMinutes = Math.floor(minutes);
		const seconds = Math.round((minutes - wholeMinutes) * 60);

		if (wholeMinutes === 0) {
			return `${seconds} seconds`;
		}

		if (seconds === 0) {
			return `${wholeMinutes} minute${wholeMinutes === 1 ? '' : 's'}`;
		}

		return `${wholeMinutes} minute${wholeMinutes === 1 ? '' : 's'} ${seconds} seconds`;
	}

	function showMessage(text, isError = false) {
		if (!message) return;
		message.textContent = text;
		message.style.color = isError ? '#b42318' : '#0f8f68';
	}

	function calculateReadingTime() {
		const text = input.value.trim();
		const words = countWords(text);
		const characters = text.length;
		const wordsPerMinute = parseInt(speed.value, 10) || 238;

		if (!text || words === 0) {
			results.hidden = true;
			showMessage('Please paste some text to calculate reading time.', true);
			return;
		}

		const minutes = words / wordsPerMinute;

		timeOutput.textContent = formatReadingTime(minutes);
		wordCountOutput.textContent = words.toLocaleString();
		characterCountOutput.textContent = characters.toLocaleString();

		results.hidden = false;
		showMessage('Reading time calculated successfully.');
	}

	calculateButton.addEventListener('click', calculateReadingTime);

	speed.addEventListener('change', () => {
		if (input.value.trim()) {
			calculateReadingTime();
		}
	});

	clearButton?.addEventListener('click', () => {
		input.value = '';
		results.hidden = true;
		showMessage('');
		input.focus();
	});
});