<?php
/**
 * Get option
 */
function govideo_option($name){
	
	global $govideo_options, $govideo_default_options;
		
	if(function_exists('is_customize_preview') && is_customize_preview()){
		$options = get_option(GOVIDEO_TEXTDOMAIN);

		if( isset($options[$name]) )
			return $options[$name];
	}
	if( isset($govideo_options[$name]) )
		return $govideo_options[$name];
	elseif(isset($govideo_default_options[$name]))
		return $govideo_default_options[$name];
	else
		return '';
	}

/**
 * Get option saved in database
 */
function govideo_option_saved($name){
	
	$govideo_options = get_option(GOVIDEO_TEXTDOMAIN);
	
	if( isset($govideo_options[$name]) )
		return $govideo_options[$name];
	else
		return '';
	}
	

/**
 * Get top bar items
 *
 */
 
function govideo_get_topbar_content( $type = '' ){
	
	$html = '';
	switch( $type ){
		
		case "topbar_widgets":
			$widgets = govideo_option( $type );
			
			if(is_array($widgets) && !empty($widgets)):
			
  				foreach($widgets as $item):
				
					$text = $item['text'];
					
					$html .= '<span class="govideo-microwidget">';
					if( $item['link'] != '' ){
						$html .= '<a href="'.esc_url($item['link']).'" target="'.esc_attr($item['target']).'">'.$text.'</a>';
					}else{
						$html .= $text;
						}
					$html .= '</span>';
				endforeach;
				return $html;
			endif;
			
		break;
		case "topbar_menu":
			$topbar_menu = govideo_option( $type );
			$html = '<ul>';
			if ( $menu_items = wp_get_nav_menu_items( $topbar_menu ) ) {
			   foreach ( $menu_items as $menu_item ) {
				  $current = ( $menu_item->object_id == get_queried_object_id() ) ? 'current' : '';
				  $html .= '<li class="' . $current . '"><a href="' . esc_url($menu_item->url) . '">' . wp_kses_post($menu_item->title) . '</a></li>';
			   }
			}
			$html .= '</ul>';
			
			return $html;
		break;
		case "topbar_text":
			$html = govideo_option( $type );
			return wp_kses_post($html);
		
		break;
		
		}
	
	}

/**
 * Get top bar
 *
 */
function govideo_top_bar(){
	
	$display_topbar = govideo_option( 'display_topbar' );
	
	if( $display_topbar != '1' )
		return '';
	
	$topbar_left_content = govideo_option( 'topbar_left_content' );
	$topbar_right_content = govideo_option( 'topbar_right_content' );
	
	$left_content = govideo_get_topbar_content( $topbar_left_content );
	$right_content = govideo_get_topbar_content( $topbar_right_content );
	
	return '<div class="govideo-top-bar-wrap"><div class="govideo-top-bar container">
	<div class="topbar-left govideo-f-microwidgets">'.wp_kses_post($left_content).'</div>
	<div class="topbar-right govideo-f-microwidgets">'.wp_kses_post($right_content).'</div>
	</div></div>';
	
	}

add_filter( 'govideo_top_bar', 'govideo_top_bar' );

/**
 * Add script to the footer
 *
 */
function govideo_footer_script(){ 
	$display_scroll_to_top = govideo_option('display_scroll_to_top');
	if($display_scroll_to_top=='1' ){
		$css_class = 'back-to-top';
		echo '<div class="'.$css_class.'"></div>';
		}

 } 
add_action('wp_footer','govideo_footer_script');

/**
 * Convert Hex Code to RGB
 */
 
function govideo_hex2rgb( $hex ) {
	if ( strpos( $hex,'rgb' ) !== FALSE ) {

		$rgb_part = strstr( $hex, '(' );
		$rgb_part = trim($rgb_part, '(' );
		$rgb_part = rtrim($rgb_part, ')' );
		$rgb_part = explode( ',', $rgb_part );

		$rgb = array($rgb_part[0], $rgb_part[1], $rgb_part[2], $rgb_part[3]);

	} elseif( $hex == 'transparent' ) {
		$rgb = array( '255', '255', '255', '0' );
	} else {

		$hex = str_replace( '#', '', $hex );
		
		
		if( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = array( $r, $g, $b );
	}

	return $rgb;
}


/**
 * Get first tag
 */
function govideo_get_first_tag( $postid ){
	
	 $first_tag = '';
		 $post_tags = wp_get_post_tags( $postid );
		 
		 if ($post_tags)
		 	$first_tag = esc_attr($post_tags[0]->name);
		return $first_tag;
	}
