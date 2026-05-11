<?php

add_action( 'generate_before_header', 'tth_top_bar' );

function tth_top_bar() {
	?>
	<div class="tth-top-bar">
		<div class="tth-top-bar__inner">
			<span class="tth-top-bar__text">Free online tools — no signup required.</span>

			<button type="button" class="tth-theme-toggle" id="tth-theme-toggle" aria-label="Toggle dark mode">
				<span class="tth-theme-toggle__icon" aria-hidden="true">☾</span>
				<span class="tth-theme-toggle__text">Dark</span>
			</button>
		</div>
	</div>
	<?php
}