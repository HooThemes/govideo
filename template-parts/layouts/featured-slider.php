<div class="featured">
  <div class="main-vid">
    <div class="col-md-6">
      <?php
		if ( is_active_sidebar( 'hoo-featured-slider' ) ) {
			if ( ! dynamic_sidebar( 'hoo-featured-slider' ) ):
				endif;
		}
		
	 	?>
    </div>
  </div>
  <div class="sub-vid">
   <div class="col-md-6">
  <?php
		if ( is_active_sidebar( 'hoo-beside-featured-slider' ) ) {
			if ( ! dynamic_sidebar( 'hoo-beside-featured-slider' ) ):
				endif;
		}
		
	 	?>
	</div>
  </div>
  <div class="clear"></div>
</div>
