<?php
/**
 * Enqueue scripts and styles.
 */
function govideo_scripts() {
	
	global $govideo_options;
	
	$govideo_options = get_option( GOVIDEO_TEXTDOMAIN );	
	
	wp_enqueue_style( 'bootstrap',  GOVIDEO_THEME_URI .'assets/vendor/bootstrap/css/bootstrap.css', false, '', false );
	wp_enqueue_style( 'owl-carousel',  GOVIDEO_THEME_URI . 'assets/vendor/owl-carousel/assets/owl.carousel.min.css', false, '', false );
	wp_enqueue_style( 'owl-theme-default', GOVIDEO_THEME_URI .'assets/vendor/owl-carousel/assets/owl.theme.default.css', false, '', false );
	wp_enqueue_style( 'font-awesome',  GOVIDEO_THEME_URI .'assets/vendor/font-awesome/css/font-awesome.min.css', false, '', false );
	
	// Theme stylesheet.

	wp_enqueue_style( 'govideo-style', get_stylesheet_uri() , false, GOVIDEO_VERSION, false );

	wp_enqueue_script( 'bootstrap', GOVIDEO_THEME_URI . 'assets/vendor/bootstrap/js/bootstrap.min.js' , array( 'jquery' ), null, false);
	wp_enqueue_script( 'owl-carousel', GOVIDEO_THEME_URI . 'assets/vendor/owl-carousel/owl.carousel.min.js' , array( 'jquery' ), null, false);
	wp_enqueue_script( 'imagesloaded-pkgd', GOVIDEO_THEME_URI . 'assets/vendor/imagesloaded/imagesloaded.pkgd.js' , array( 'jquery' ), null, false);
	
	wp_enqueue_script( 'imagesloaded-pkgd', GOVIDEO_THEME_URI . 'assets/vendor/imagesloaded/imagesloaded.pkgd.js' , array( 'jquery' ), null, false);
		

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	$header_slider_autoplay = govideo_option('header_slider_autoplay');
	$header_slider_timeout = govideo_option('header_slider_timeout');
	$main_slider_autoplay = govideo_option('main_slider_autoplay');
	$main_slider_timeout = govideo_option('main_slider_timeout');
	$post_slider_autoplay = govideo_option('post_slider_autoplay');
	$main_slider_timeout = govideo_option('main_slider_timeout');
	
	wp_enqueue_script( 'govideo-main', GOVIDEO_THEME_URI . 'assets/js/main.js' , array( 'jquery', 'owl-carousel' ), GOVIDEO_VERSION, false);
	wp_localize_script( 'govideo-main', 'govideo_params', array(
		'ajaxurl'  => admin_url('admin-ajax.php'),
		'themeurl' => get_template_directory_uri(),
		'nonce' => wp_create_nonce('ajax-nonce'),
		'sliderOptions' => array(
				'header_slider_autoplay' => absint($header_slider_autoplay),
				'header_slider_timeout' => $header_slider_timeout==0?4000:absint($header_slider_timeout),
				'main_slider_autoplay' => absint($main_slider_autoplay),
				'main_slider_timeout' => $main_slider_timeout==0?4000:absint($main_slider_timeout),
				'post_slider_autoplay' => absint($post_slider_autoplay),
				'main_slider_timeout' => $main_slider_timeout==0?4000:absint($main_slider_timeout)
				)
	)  );
	
	$custom_css = '';
	$header_text_color = get_header_textcolor();

	if ( 'blank' != $header_text_color ) :
		$custom_css .= ".site-name, .site-tagline { color: ".sanitize_hex_color( $header_text_color )." ; }.site-tagline { display: none; }";
	else:
		$custom_css .= ".site-name,.site-tagline {display: none;}";
	endif;
	
	
	$primary_color = govideo_option('primary_color');
	if( $primary_color != '' ){
	
	 	$primary_color = sanitize_hex_color( $primary_color );
		$rgb = govideo_hex2rgb( $primary_color );
		
		$custom_css .= "a:hover,a:active,header a:hover,.btn-1:hover,.site-nav  > div > ul > li.current > a ,.blog-list-wrap .entry-category a,.entry-meta a:hover,.vid-name a:hover,.btn-1:hover,.link a:hover{color: ".$primary_color.";}.form-control:focus,select:focus,input:focus,textarea:focus,input[type=\"text\"]:focus,input[type=\"password\"]:focus,input[type=\"datetime\"]:focus,input[type=\"datetime-local\"]:focus,input[type=\"date\"]:focus,input[type=\"month\"]:focus,input[type=\"time\"]:focus,input[type=\"week\"]:focus,input[type=\"number\"]:focus,input[type=\"email\"]:focus,input[type=\"url\"]:focus,input[type=\"search\"]:focus,input[type=\"tel\"]:focus,input[type=\"color\"]:focus,.uneditable-input:focus {border-color: ".$primary_color.";}input[type=\"submit\"] {background-color: ".$primary_color.";}.entry-box.grid .img-box-caption .entry-category {background-color: ".$primary_color.";}.widget-title:before {background-color: ".$primary_color.";}.btn-normal,button,.govideo-btn-normal,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt {background-color: ".$primary_color.";}.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover {background-color: ".$primary_color.";}.woocommerce nav.woocommerce-pagination ul li a:focus,.woocommerce nav.woocommerce-pagination ul li a:hover {color: ".$primary_color.";}.govideo-header .govideo-main-nav > li > a:hover,.govideo-header .govideo-main-nav > li.active > a {color: ".$primary_color.";}.govideo-header .govideo-main-nav > li > a:hover, .govideo-header .govideo-main-nav > li.active > a {color:".$primary_color.";}#menu,footer .top-footer,ul.pagination li a:hover,#ff .sendButton,.zoom-container .zoom-caption span,.vid-tags a,ul.pagination li a:hover, .page-numbers .current{background-color: ".$primary_color.";}.btn-1,.read-more{color:rgba(".$rgb[0].", ".$rgb[1].", ".$rgb[2].",.7);}::selection{background-color: ".$primary_color.";}footer .bottom-footer{border-color:".$primary_color.";}.link li:after{background-color:rgba(".$rgb[0].", ".$rgb[1].", ".$rgb[2].",.6);}#menu .search-form div:before,.widget_tag_cloud a:hover{background-color: ".$primary_color.";}#menu .search-form,.widget_tag_cloud a:hover{border-color: ".$primary_color.";}";
	}
	
	// Form styles
	$form_border_style = govideo_option('form_border_style');
	$form_border_width = govideo_option('form_border_width');
	$form_border_color = govideo_option('form_border_color');
	$form_background_color = govideo_option('form_background_color');
	$form_broder_radius = govideo_option('form_broder_radius');
	$custom_css .=  '.form-control, select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input{	border-style:'.esc_attr($form_border_style).';	border-width:'.absint($form_border_width).'px;border-color:'.sanitize_hex_color($form_border_color).';	background-color:'.sanitize_hex_color($form_background_color).';border-radius: '.esc_attr($form_broder_radius).'px;}';
	
	// Button styles
	$button_font_size = govideo_option('button_font_size');
	$button_color = govideo_option('button_color');
	$button_text_transform = govideo_option('button_text_transform');
	$button_broder_radius = govideo_option('button_broder_radius');
	$button_border_color = govideo_option('button_border_color');
	$button_background_color = govideo_option('button_background_color');
	$button_border_style = govideo_option('button_border_style');
	$button_border_width = govideo_option('button_border_width');
	$button_border_style = govideo_option('button_border_style');
	
	$custom_css .=  'button,input[type="submit"],.govideo-btn,btn-normal,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button{'.((is_numeric($button_font_size) && $button_font_size > 0 )?'font-size: '.absint($button_font_size).'px;':'').'color: '.sanitize_hex_color($button_color).';text-transform: '.esc_attr($button_text_transform).';border-radius: '.esc_attr($button_broder_radius).'px;border-color:'.sanitize_hex_color($button_border_color).';background-color:'.sanitize_hex_color($button_background_color).';border-style:'.esc_attr($button_border_style).';border-width:'.absint($button_border_width).'px;}';
	
	$custom_css = apply_filters( 'govideo_additional_css', $custom_css );

	wp_add_inline_style( 'govideo-style', str_replace('&gt;', '>', stripslashes(wp_filter_nohtml_kses( $custom_css ) ) ) );

}
add_action( 'wp_enqueue_scripts', 'govideo_scripts' );

function govideo_admin_scripts(){
	global $pagenow;
	wp_enqueue_script( 'govideo-admin', GOVIDEO_THEME_URI.'assets/js/admin.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'govideo-admin', GOVIDEO_THEME_URI . 'assets/css/admin.css', '', '', false );
	
	wp_enqueue_script( 'govideo-fontawesome-iconpicker', GOVIDEO_THEME_URI . 'inc/customizer-controls/iconpicker/assets/js/fontawesome-iconpicker.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'govideo-iconpicker-control', GOVIDEO_THEME_URI . 'inc/customizer-controls/iconpicker/assets/js/iconpicker-control.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_style( 'govideo-fontawesome-iconpicker', GOVIDEO_THEME_URI . 'inc/customizer-controls/iconpicker/assets/css/fontawesome-iconpicker.min.css' );
	wp_enqueue_style( 'font-awesome', GOVIDEO_THEME_URI . 'assets/vendor/font-awesome/css/font-awesome.min.css' );
	
	
	
	if( isset($_GET['page']) && $_GET['page'] == 'govideo-welcome'){
		wp_enqueue_script( 'govideo-admin-menu-settings', GOVIDEO_THEME_URI.'assets/js/admin-menu-settings.js', array( 'jquery', 'wp-util', 'updates' ), '', true );
		}
	
	wp_localize_script( 'govideo-admin', 'govideo_admin', array(
			'ajaxurl' => admin_url('admin-ajax.php'),
		)  );
		
	wp_localize_script( 'govideo-admin-menu-settings', 'govideo', array(
			'btnActivating' => esc_html__( 'Activating Required Plugin ', 'govideo' ) . '&hellip;',
			'ajaxurl' => admin_url('admin-ajax.php'),
		)  );
		
	}
add_action( 'admin_enqueue_scripts', 'govideo_admin_scripts' );