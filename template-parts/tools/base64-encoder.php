<div class="tth-tool tth-base64-tool">
	<div class="tth-calculator">
		<div class="tth-calculator__row">
			<label for="base64-input">Input Text</label>
			<textarea id="base64-input" rows="8" placeholder="Enter text or Base64 here..."></textarea>
		</div>

		<div class="tth-tool-actions">
			<button type="button" id="base64-encode-button">Encode</button>
			<button type="button" id="base64-decode-button">Decode</button>
			<button type="button" id="base64-copy-button">Copy</button>
			<button type="button" id="base64-clear-button">Clear</button>
		</div>

		<div class="tth-calculator__row">
			<label for="base64-output">Output</label>
			<textarea id="base64-output" rows="8" readonly></textarea>
		</div>

		<div class="tth-calculator__result" id="base64-message" aria-live="polite"></div>
	</div>
</div>