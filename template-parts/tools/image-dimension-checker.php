<div class="tth-tool tth-image-dimension-checker">
	<div class="tth-calculator">
		<div class="tth-calculator__row">
			<label for="image-dimension-input">Choose an image</label>
			<input id="image-dimension-input" type="file" accept="image/*">
		</div>

		<div class="tth-tool-results" id="image-dimension-results" hidden>
			<p><strong>File Name:</strong> <span id="image-file-name">—</span></p>
			<p><strong>File Type:</strong> <span id="image-file-type">—</span></p>
			<p><strong>File Size:</strong> <span id="image-file-size">—</span></p>
			<p><strong>Width:</strong> <span id="image-width">—</span></p>
			<p><strong>Height:</strong> <span id="image-height">—</span></p>
			<p><strong>Aspect Ratio:</strong> <span id="image-aspect-ratio">—</span></p>
		</div>

		<div class="tth-image-preview-wrap" id="image-preview-wrap" hidden>
			<img id="image-preview" src="" alt="Selected image preview">
		</div>

		<div class="tth-calculator__result" id="image-dimension-message" aria-live="polite"></div>
	</div>
</div>