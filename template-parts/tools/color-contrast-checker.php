<div class="tth-tool tth-color-contrast-checker">
	<div class="tth-calculator">
		<div class="tth-calculator__row">
			<label for="contrast-text-color">Text Color</label>
			<input id="contrast-text-color" type="color" value="#142027">
			<input id="contrast-text-hex" type="text" value="#142027">
		</div>

		<div class="tth-calculator__row">
			<label for="contrast-bg-color">Background Color</label>
			<input id="contrast-bg-color" type="color" value="#ffffff">
			<input id="contrast-bg-hex" type="text" value="#ffffff">
		</div>

		<div class="tth-tool-actions">
			<button type="button" id="contrast-check-button">Check Contrast</button>
			<button type="button" id="contrast-swap-button">Swap Colors</button>
			<button type="button" id="contrast-clear-button">Reset</button>
		</div>

		<div class="tth-contrast-preview" id="contrast-preview">
			<p>Example preview text</p>
			<strong>Readable heading text</strong>
		</div>

		<div class="tth-tool-results" id="contrast-results" hidden>
			<p><strong>Contrast Ratio:</strong> <span id="contrast-ratio">—</span></p>
			<p><strong>Normal Text:</strong> <span id="contrast-normal-result">—</span></p>
			<p><strong>Large Text:</strong> <span id="contrast-large-result">—</span></p>
			<p><strong>WCAG AAA:</strong> <span id="contrast-aaa-result">—</span></p>
		</div>

		<div class="tth-calculator__result" id="contrast-message" aria-live="polite"></div>
	</div>
</div>