<?php
function govideo_setup() {

	load_theme_textdomain( 'govideo' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_image_size( 'govideo_thumbnail', 854, 478, true );

	add_image_size( 'govideo_widget_post', 480, 360, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 1170;

	register_nav_menus( array(
		'top'    => esc_html__( 'Top Menu', 'govideo' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'flex-width'  => true,
		'flex-height' => true,
	) );
	
	add_theme_support(
		'post-formats', array(
			'image',
			'video',
			'gallery',
		)
	);
	
	// Setup the WordPress core custom header feature.
	add_theme_support( 'custom-header', array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => '1920',
		'height'                 => '70',
		'flex-height'            => true,
		'flex-width'             => true,
		'default-text-color'     => '#333333',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	)); 

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background',  array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css' ) );
	
}
add_action( 'after_setup_theme', 'govideo_setup' );

/**
 * Include the TGM_Plugin_Activation class.
 */
if ( !class_exists( 'TGM_Plugin_Activation' ) ) 
	load_template( trailingslashit( get_template_directory() ) . 'inc/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'govideo_theme_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 */
function govideo_theme_register_required_plugins() {

    $plugins = array(
		array(
			'name'     				=> __('Hoo Companion','govideo'), 
			'slug'     				=> 'hoo-companion',
			'source'   				=> '', 
			'required' 				=> false, 
			'version' 				=> '1.0.1', 
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '', 
		),

	);

    /**
     * Array of configuration settings. Amend each line as needed.
     */
    $config = array(
        'id'           => 'hoo-companion',
        'default_path' => '', 
        'menu'         => 'tgmpa-install-plugins', 
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    tgmpa( $plugins, $config );

}
