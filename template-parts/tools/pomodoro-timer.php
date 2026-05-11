<div class="tth-tool tth-pomodoro-timer">
	<div class="tth-calculator">
		<div class="tth-pomodoro-display" id="pomodoro-display">25:00</div>

		<div class="tth-calculator__row">
			<label for="pomodoro-work">Focus Minutes</label>
			<input id="pomodoro-work" type="number" min="1" max="120" value="25">
		</div>

		<div class="tth-calculator__row">
			<label for="pomodoro-break">Break Minutes</label>
			<input id="pomodoro-break" type="number" min="1" max="60" value="5">
		</div>

		<div class="tth-tool-actions">
			<button type="button" id="pomodoro-start-button">Start</button>
			<button type="button" id="pomodoro-pause-button">Pause</button>
			<button type="button" id="pomodoro-reset-button">Reset</button>
			<button type="button" id="pomodoro-switch-button">Switch to Break</button>
		</div>

		<div class="tth-tool-results">
			<p><strong>Mode:</strong> <span id="pomodoro-mode">Focus</span></p>
			<p><strong>Status:</strong> <span id="pomodoro-status">Ready</span></p>
		</div>

		<div class="tth-calculator__result" id="pomodoro-message" aria-live="polite"></div>
	</div>
</div>