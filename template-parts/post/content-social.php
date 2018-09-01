<?php
	$hoo_display_social_share  = get_post_meta( get_the_ID(), 'hoo_display_social_share', true );
	if( $hoo_display_social_share == '1' || $hoo_display_social_share == 'on' ):
	
	$hoo_social_share  = get_post_meta( get_the_ID(), 'hoo_social_share', true );
?>
<div class="share">
  <div class="list-inline center">
  <?php echo apply_filters( 'hoo_social_share', do_shortcode(wp_kses_post($hoo_social_share)) );?>
  </div>
</div>
<div class="line"></div>
<?php endif;?>