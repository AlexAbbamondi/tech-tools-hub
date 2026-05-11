document.addEventListener('DOMContentLoaded', () => {
	const display = document.getElementById('pomodoro-display');
	const workInput = document.getElementById('pomodoro-work');
	const breakInput = document.getElementById('pomodoro-break');

	const startButton = document.getElementById('pomodoro-start-button');
	const pauseButton = document.getElementById('pomodoro-pause-button');
	const resetButton = document.getElementById('pomodoro-reset-button');
	const switchButton = document.getElementById('pomodoro-switch-button');

	const modeOutput = document.getElementById('pomodoro-mode');
	const statusOutput = document.getElementById('pomodoro-status');
	const message = document.getElementById('pomodoro-message');

	if (!display || !startButton) return;

	let mode = 'focus';
	let secondsRemaining = 25 * 60;
	let timer = null;

	function showMessage(text) {
		if (!message) return;
		message.textContent = text;
		message.style.color = '#0f8f68';
	}

	function getDurationSeconds() {
		const minutes = mode === 'focus'
			? parseInt(workInput.value, 10)
			: parseInt(breakInput.value, 10);

		return (minutes || 1) * 60;
	}

	function formatTime(seconds) {
		const minutes = Math.floor(seconds / 60);
		const remainingSeconds = seconds % 60;

		return `${String(minutes).padStart(2, '0')}:${String(remainingSeconds).padStart(2, '0')}`;
	}

	function updateDisplay() {
		display.textContent = formatTime(secondsRemaining);
		modeOutput.textContent = mode === 'focus' ? 'Focus' : 'Break';
		switchButton.textContent = mode === 'focus' ? 'Switch to Break' : 'Switch to Focus';
	}

	function resetTimer() {
		clearInterval(timer);
		timer = null;
		secondsRemaining = getDurationSeconds();
		statusOutput.textContent = 'Ready';
		updateDisplay();
	}

	function switchMode() {
		mode = mode === 'focus' ? 'break' : 'focus';
		resetTimer();
		showMessage(mode === 'focus' ? 'Focus mode selected.' : 'Break mode selected.');
	}

	function startTimer() {
		if (timer) return;

		statusOutput.textContent = 'Running';

		timer = setInterval(() => {
			secondsRemaining -= 1;
			updateDisplay();

			if (secondsRemaining <= 0) {
				clearInterval(timer);
				timer = null;
				statusOutput.textContent = 'Complete';
				showMessage(mode === 'focus' ? 'Focus session complete.' : 'Break complete.');
			}
		}, 1000);
	}

	function pauseTimer() {
		clearInterval(timer);
		timer = null;
		statusOutput.textContent = 'Paused';
		updateDisplay();
	}

	startButton.addEventListener('click', startTimer);
	pauseButton?.addEventListener('click', pauseTimer);
	resetButton?.addEventListener('click', resetTimer);
	switchButton?.addEventListener('click', switchMode);

	workInput?.addEventListener('change', resetTimer);
	breakInput?.addEventListener('change', resetTimer);

	resetTimer();
});