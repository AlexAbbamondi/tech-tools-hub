<div class="tth-tool tth-minifier-tool">
	<div class="tth-tool__row">
		<label for="js-minifier-input">Paste JS</label>
		<textarea id="js-minifier-input" rows="12"></textarea>
	</div>

	<div class="tth-tool-actions">
		<button type="button" id="js-minifier-button">Minify JS</button>
		<button type="button" id="js-copy-button">Copy</button>
		<button type="button" id="js-clear-button">Clear</button>
	</div>

	<div class="tth-tool__row">
		<label for="js-minifier-output">Minified JS</label>
		<textarea id="js-minifier-output" rows="12" readonly></textarea>
	</div>

	<div class="tth-calculator__result" id="js-minifier-message" aria-live="polite"></div>
</div>