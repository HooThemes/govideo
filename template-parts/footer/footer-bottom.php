<?php
	$copyright = govideo_option('copyright');
	$footer_bottom_icons = govideo_option('footer_bottom_icons');
	$footer_layout = govideo_option('footer_layout');
	$footer_bottom_fullwidth = govideo_option('footer_bottom_fullwidth');
	$wrap = 'bottom-footer';
	if( $footer_layout != ''){
		$wrap .= ' style'.$footer_layout;
	}
	$container = 'container';
	if($footer_bottom_fullwidth == '1'){
		$container = 'container-fullwidth';
	}
?>
<div class="<?php echo esc_attr($wrap); ?>">
  <div class="<?php echo esc_attr($container); ?>">
  <?php do_action( 'hoo_before_footer_bottom' );?>
    <div class="row">
      <div class="col-md-6 col-sm-6 copyright"> <span><?php echo do_shortcode(wp_kses_post($copyright));?> </span> <?php printf( __('Designed by <a href="%s" target="_blank">HooThemes</a>. All Rights Reserved.', 'govideo'), esc_url('https://www.hoothemes.com'));?></div>
      <div class="col-md-6 col-sm-6 link">
        <div class="menu-footer-menu-container">
          <ul id="menu-footer-menu" class="menu list-inline">
            <?php 
	  if($footer_bottom_icons){
		  foreach ($footer_bottom_icons as $item ){
		  ?>
		  <li><a href="<?php echo esc_url($item['link']);?>" title="<?php echo esc_attr($item['title']);?>" target="_blank"><i class="fa <?php echo esc_attr($item['icon']);?>"></i> <?php echo esc_attr($item['title']);?></a></li>
		  <?php 
		  }
	  }
	  ?>
          </ul>
        </div>
      </div>
    </div>
    <?php do_action( 'hoo_after_footer_bottom' );?>
  </div>
</div>
