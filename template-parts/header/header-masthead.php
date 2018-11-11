<div class="masthead-header">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="site-branding">
        <?php
				if ( get_theme_mod( 'custom_logo' ) ) {
					$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
					$logo = '<a href="'.esc_url( home_url( '/' ) ).'"><img src="' . esc_url( $logo[0] ) . '"></a>';
					echo $logo;
				}else{
			?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <span id="heading" class="site-name">
      <?php bloginfo( 'name' ); ?>
      </span> </a>
      <span class="site-description" style="display: inline-block"><?php bloginfo( 'description' ); ?></span>
      <?php } ?>
      
        </div>
      </div>
      <div class="col-md-8">

          <div class="promotion-section">
		  <?php 
		  do_action('govideo_logo_right');
		  ?>
          </div>

      </div>
    </div>
  </div>
</div>
