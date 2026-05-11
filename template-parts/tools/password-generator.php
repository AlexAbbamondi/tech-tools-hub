<div class="tth-tool tth-password-generator">
	<div class="tth-calculator">
		<div class="tth-calculator__row">
			<label for="password-length">Password Length</label>
			<input id="password-length" type="number" min="8" max="64" value="16">
		</div>

		<div class="tth-calculator__row">
			<label>
				<input id="password-uppercase" type="checkbox" checked>
				Include uppercase letters
			</label>
		</div>

		<div class="tth-calculator__row">
			<label>
				<input id="password-lowercase" type="checkbox" checked>
				Include lowercase letters
			</label>
		</div>

		<div class="tth-calculator__row">
			<label>
				<input id="password-numbers" type="checkbox" checked>
				Include numbers
			</label>
		</div>

		<div class="tth-calculator__row">
			<label>
				<input id="password-symbols" type="checkbox" checked>
				Include symbols
			</label>
		</div>

		<div class="tth-tool-actions">
			<button type="button" id="password-generate-button">Generate Password</button>
			<button type="button" id="password-copy-button">Copy</button>
			<button type="button" id="password-clear-button">Clear</button>
		</div>

		<div class="tth-calculator__row">
			<label for="password-output">Generated Password</label>
			<input id="password-output" type="text" readonly>
		</div>

		<div class="tth-tool-results" id="password-results" hidden>
			<p><strong>Strength:</strong> <span id="password-strength">—</span></p>
			<p><strong>Characters Used:</strong> <span id="password-character-types">—</span></p>
		</div>

		<div class="tth-calculator__result" id="password-message" aria-live="polite"></div>
	</div>
</div>