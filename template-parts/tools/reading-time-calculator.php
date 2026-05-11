<div class="tth-tool">
	<div class="tth-calculator">
		<div class="tth-calculator__row">
			<label for="reading-time-input">Paste your text</label>
			<textarea id="reading-time-input" rows="10" placeholder="Paste your article, blog post, or text here..."></textarea>
		</div>

		<div class="tth-calculator__row">
			<label for="reading-speed">Reading speed</label>
			<select id="reading-speed">
				<option value="200">Slow — 200 words per minute</option>
				<option value="238" selected>Average — 238 words per minute</option>
				<option value="300">Fast — 300 words per minute</option>
			</select>
		</div>

		<div class="tth-tool-actions">
			<button type="button" id="reading-time-button">Calculate Reading Time</button>
			<button type="button" id="reading-time-clear-button">Clear</button>
		</div>

		<div class="tth-tool-results" id="reading-time-results" hidden>
			<p><strong>Estimated Reading Time:</strong> <span id="reading-time-output">—</span></p>
			<p><strong>Word Count:</strong> <span id="reading-word-count">0</span></p>
			<p><strong>Character Count:</strong> <span id="reading-character-count">0</span></p>
		</div>

		<div class="tth-calculator__result" id="reading-time-message" aria-live="polite"></div>
	</div>
</div>