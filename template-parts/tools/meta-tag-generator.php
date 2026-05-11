<div class="tth-tool">
	<div class="tth-calculator">
		<div class="tth-calculator__row">
			<label for="meta-title">Page Title</label>
			<input id="meta-title" type="text" placeholder="Example Page Title">
		</div>

		<div class="tth-calculator__row">
			<label for="meta-description">Meta Description</label>
			<textarea id="meta-description" rows="4" placeholder="Write a short description of the page."></textarea>
		</div>

		<div class="tth-calculator__row">
			<label for="meta-url">Canonical URL</label>
			<input id="meta-url" type="url" placeholder="https://example.com/page">
		</div>

		<div class="tth-calculator__row">
			<label for="meta-robots">Robots</label>
			<select id="meta-robots">
				<option value="index, follow">index, follow</option>
				<option value="noindex, follow">noindex, follow</option>
				<option value="index, nofollow">index, nofollow</option>
				<option value="noindex, nofollow">noindex, nofollow</option>
			</select>
		</div>

		<div class="tth-tool-actions">
			<button type="button" id="meta-generate-button">Generate Meta Tags</button>
			<button type="button" id="meta-copy-button">Copy</button>
			<button type="button" id="meta-clear-button">Clear</button>
		</div>

		<div class="tth-calculator__row">
			<label for="meta-output">Generated Meta Tags</label>
			<textarea id="meta-output" rows="8" readonly></textarea>
		</div>

		<div class="tth-calculator__result" id="meta-message" aria-live="polite"></div>
	</div>
</div>