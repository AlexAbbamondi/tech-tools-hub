<div class="tth-tool tth-minifier-tool" data-minifier-tool>
	<div class="tth-tool-tabs" role="tablist" aria-label="Code minifier options">
		<button type="button" class="tth-tool-tab is-active" data-minifier-tab="html" role="tab" aria-selected="true">
			HTML
		</button>
		<button type="button" class="tth-tool-tab" data-minifier-tab="css" role="tab" aria-selected="false">
			CSS
		</button>
		<button type="button" class="tth-tool-tab" data-minifier-tab="js" role="tab" aria-selected="false">
			JavaScript
		</button>
	</div>

	<div class="tth-tool__row">
		<label for="code-minifier-input" id="code-minifier-input-label">Paste HTML</label>
		<textarea id="code-minifier-input" rows="12"></textarea>
	</div>

	<div class="tth-tool-actions">
		<button type="button" id="code-minifier-button">Minify HTML</button>
		<button type="button" id="code-copy-button">Copy</button>
		<button type="button" id="code-clear-button">Clear</button>
	</div>

	<div class="tth-tool__row">
		<label for="code-minifier-output" id="code-minifier-output-label">Minified HTML</label>
		<textarea id="code-minifier-output" rows="12" readonly></textarea>
	</div>

	<div class="tth-calculator__result" id="code-minifier-message" aria-live="polite"></div>

	<p class="tth-tool-note">
		This tool performs basic minification. Always test minified code before using it in production.
	</p>
</div>