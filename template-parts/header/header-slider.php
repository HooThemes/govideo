<div class="header-slider">
		<div id="header-slider" class="owl-carousel owl-theme">
        <?php
		if ( is_active_sidebar( 'hoo-header-slider' ) ) {
			if ( ! dynamic_sidebar( 'hoo-header-slider' ) ):
			endif;
		}
		
	 	?>
		</div>
	</div>