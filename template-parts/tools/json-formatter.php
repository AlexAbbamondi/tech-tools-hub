<div class="tth-tool">
	<div class="tth-calculator__row">
		<label for="json-input">Paste JSON</label>
		<textarea id="json-input" rows="12" placeholder='{"name":"John","age":30}'></textarea>
	</div>

	<div class="tth-tool-actions">
		<button type="button" id="json-format-button">Format JSON</button>
		<button type="button" id="json-minify-button">Minify JSON</button>
		<button type="button" id="json-clear-button">Clear</button>
	</div>

	<div class="tth-calculator__row">
		<label for="json-output">Formatted Output</label>
		<textarea id="json-output" rows="12" readonly></textarea>
	</div>

	<div class="tth-calculator__result" id="json-message"></div>
</div>