<!--Navigation-->
<nav id="menu" class="navbar">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
    </div>
    <?php
$menu_wrap_class = 'collapse navbar-collapse navbar-ex1-collapse';
$menu_align = govideo_option('menu_align');

if( $menu_align !='' ){
	$menu_wrap_class .= ' ' .$menu_align;
	}
?>
    <div class="<?php echo esc_attr($menu_wrap_class); ?>">
      <?php

$display_search_icon = govideo_option('display_search_icon');
$icons_by_menu = '';
if ($display_search_icon == '1' ){
		$icons_by_menu .= '<div class="govideo-f-microwidgets">';
        $icons_by_menu .= '<div class="govideo-microwidget govideo-search" style="z-index:9999;">
                        <div class="govideo-search-label"></div>
                        <div class="govideo-search-wrap right-overflow" style="display:none;">
                           '.get_search_form(false).'
                        </div>
                    </div>';
					
      $icons_by_menu .= '</div>';
}

	$custom_menu = get_post_meta( $post->ID, 'hoo_header_custom_menu', true );
	$custom_menu = apply_filters( 'hoo_custom_menu', $custom_menu );
	
	$args = array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
			'menu_class' => 'nav navbar-nav',
			'fallback_cb'    => false,
			'container' =>'',
			'link_before' => '<span>',
   			'link_after' => '</span>',
		);
		
	if( $custom_menu ){
		$args['menu'] = $custom_menu;
		$args['theme_location'] = '';
		}
		
	wp_nav_menu( $args );
	echo $icons_by_menu;
?>
    </div>
  </div>
</nav>
