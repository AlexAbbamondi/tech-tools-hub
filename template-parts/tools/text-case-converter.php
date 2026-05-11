<div class="tth-tool tth-text-case-converter">
	<div class="tth-calculator">
		<div class="tth-calculator__row">
			<label for="text-case-input">Enter text</label>
			<textarea id="text-case-input" rows="8" placeholder="Type or paste your text here..."></textarea>
		</div>

		<div class="tth-tool-actions">
			<button type="button" id="text-uppercase-button">UPPERCASE</button>
			<button type="button" id="text-lowercase-button">lowercase</button>
			<button type="button" id="text-titlecase-button">Title Case</button>
			<button type="button" id="text-sentencecase-button">Sentence case</button>
			<button type="button" id="text-copy-button">Copy</button>
			<button type="button" id="text-clear-button">Clear</button>
		</div>

		<div class="tth-calculator__row">
			<label for="text-case-output">Converted text</label>
			<textarea id="text-case-output" rows="8" readonly></textarea>
		</div>

		<div class="tth-tool-results" id="text-case-results" hidden>
			<p><strong>Characters:</strong> <span id="text-case-character-count">0</span></p>
			<p><strong>Words:</strong> <span id="text-case-word-count">0</span></p>
		</div>

		<div class="tth-calculator__result" id="text-case-message" aria-live="polite"></div>
	</div>
</div>