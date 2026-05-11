<div class="tth-tool tth-robots-generator">
	<div class="tth-calculator">
		<div class="tth-calculator__row">
			<label for="robots-sitemap">Sitemap URL</label>
			<input id="robots-sitemap" type="url" placeholder="https://example.com/sitemap.xml">
		</div>

		<div class="tth-calculator__row">
			<label for="robots-disallow">Disallow Paths</label>
			<textarea id="robots-disallow" rows="4" placeholder="/wp-admin/&#10;/private/"></textarea>
		</div>

		<div class="tth-calculator__row">
			<label>
				<input id="robots-wordpress-defaults" type="checkbox" checked>
				Include common WordPress rules
			</label>
		</div>

		<div class="tth-tool-actions">
			<button type="button" id="robots-generate-button">Generate Robots.txt</button>
			<button type="button" id="robots-copy-button">Copy</button>
			<button type="button" id="robots-clear-button">Clear</button>
		</div>

		<div class="tth-calculator__row">
			<label for="robots-output">Generated Robots.txt</label>
			<textarea id="robots-output" rows="10" readonly></textarea>
		</div>

		<div class="tth-calculator__result" id="robots-message" aria-live="polite"></div>
	</div>
</div>