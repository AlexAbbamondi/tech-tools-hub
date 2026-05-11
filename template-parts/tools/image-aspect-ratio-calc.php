<div class="tth-tool">
	<div class="tth-calculator">
		<div class="tth-calculator__row">
			<label for="aspect-width">Width</label>
			<input type="number" id="aspect-width" min="1" step="1" placeholder="1920">
		</div>

		<div class="tth-calculator__row">
			<label for="aspect-height">Height</label>
			<input type="number" id="aspect-height" min="1" step="1" placeholder="1080">
		</div>

		<div class="tth-calculator__row">
			<button type="button" id="aspect-calculate-button">Calculate Ratio</button>
		</div>

		<div class="tth-calculator__result" id="aspect-message" aria-live="polite"></div>

		<div class="tth-tool-results" id="aspect-results" hidden>
			<p><strong>Original Ratio:</strong> <span id="aspect-original-ratio">—</span></p>
			<p><strong>Simplified Ratio:</strong> <span id="aspect-simplified-ratio">—</span></p>
			<p><strong>Decimal Ratio:</strong> <span id="aspect-decimal-ratio">—</span></p>
			<p><strong>Common Format:</strong> <span id="aspect-common-ratio">—</span></p>
		</div>
	</div>
</div>