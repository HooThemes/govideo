<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/**
 * Defines customizer options
 */

function govideo_customizer_library_options() {
	
	global $govideo_default_options, $govideo_customizer_options, $wp_version;

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;
	
	$imagepath = get_template_directory_uri().'/assets/images/';
	
	$target = array(
		'_blank' => __( 'Blank', 'govideo' ),
		'_self'  => __( 'Self', 'govideo' )
	);
	
	$options_categories = array();
	$options_categories_obj = get_categories();
	$options_categories[''] = __( '==Select Category==', 'govideo' );
	
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	$transport = 'refresh';
	
	// General Options
	$panel = 'govideo-general-options';
	
	$panels[] = array(
		'settings' => $panel,
		'title' => __( 'GoVideo: General Options', 'govideo' ),
		'priority' => '1'
	);
	
	$section = 'section-sidebar-options';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Slider Options', 'govideo' ),
		'priority' => '11',
		'panel' => $panel
	);
	// Slider
	$options['header_slider_autoplay'] = array(
			'settings' => 'header_slider_autoplay',
			'label'   => __( 'Header Slider Autoplay', 'govideo' ),
			'section' => $section,
			'priority' => '10',
			'type'    => 'checkbox',
			'transport' => $transport, 
			'default' => '',
		);
		
	$options['header_slider_timeout'] = array(
			'settings' => 'header_slider_timeout',
			'label'   => __( 'Header Slider Autoplay Timeout', 'govideo' ),
			'section' => $section,
			'priority' => '10',
			'type'    => 'checkbox',
			'transport' => $transport, 
			'default' => '4000',
		);
		
	$options['main_slider_autoplay'] = array(
			'settings' => 'main_slider_autoplay',
			'label'   => __( 'Main Slider Autoplay', 'govideo' ),
			'description'   => __( 'Home page featured section slider.', 'govideo' ),
			'section' => $section,
			'priority' => '10',
			'type'    => 'checkbox',
			'transport' => $transport, 
			'default' => '1',
		);
		
	$options['main_slider_timeout'] = array(
			'settings' => 'main_slider_timeout',
			'label'   => __( 'Main Slider Autoplay Timeout', 'govideo' ),
			'section' => $section,
			'priority' => '10',
			'type'    => 'checkbox',
			'transport' => $transport, 
			'default' => '4000',
		);
		
	$options['post_slider_autoplay'] = array(
			'settings' => 'post_slider_autoplay',
			'label'   => __( 'Single Post Slider Autoplay', 'govideo' ),
			'description'   => '',
			'section' => $section,
			'priority' => '10',
			'type'    => 'checkbox',
			'transport' => $transport, 
			'default' => '1',
		);
		
	$options['main_slider_timeout'] = array(
			'settings' => 'main_slider_timeout',
			'label'   => __( 'Single Post Slider Autoplay Timeout', 'govideo' ),
			'section' => $section,
			'priority' => '10',
			'type'    => 'checkbox',
			'transport' => $transport, 
			'default' => '4000',
		);
	
		
		$section = 'section-back-to-top-options';
		$sections[] = array(
			'settings' => $section,
			'title' => __( 'Back to Top', 'govideo' ),
			'priority' => '11',
			'panel' => $panel
		);
	
		$options['display_scroll_to_top'] = array(
			'settings' => 'display_scroll_to_top',
			'label'   => __( 'Enable Scroll to Top Button', 'govideo' ),
			'section' => $section,
			'priority' => '10',
			'type'    => 'checkbox',
			'transport' => $transport, 
			'default' => '1',
		);
	
	$section = 'section-forms-options';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Forms', 'govideo' ),
		'priority' => '11',
		'panel' => $panel
	);
	
	$options['form_border_style'] = array(
		'settings' => 'form_border_style',
		'label'   => __( 'Form Border Style', 'govideo' ),
		'section' => $section,
		'priority' => '2',
		'type'    => 'select',
		'transport' => $transport,
		'default' => 'solid',
		'choices' => array(
			'none'    => __( 'None', 'govideo' ),
			'hidden'    => __( 'Hidden', 'govideo' ),
			'dotted'    => __( 'Dotted', 'govideo' ),
			'dashed'    => __( 'Dashed', 'govideo' ),
			'solid'    => __( 'Solid', 'govideo' ),
			'double'    => __( 'Double', 'govideo' ),
			'groove'    => __( 'Groove', 'govideo' ),
			'ridge'    => __( 'Ridge', 'govideo' ),
			'inset'    => __( 'Inset', 'govideo' ),
			'outset'    => __( 'Outset', 'govideo' ),
		),
	);
		
	$options['form_border_width'] = array(
		  'settings' => 'form_border_width',
		  'label'   => __( 'Form Border Width', 'govideo' ),
		  'priority' => '3',
		  'section' => $section,
		  'type' => 'slider',
		  'transport' => $transport,
		  'default' => '1',
		  'input_attrs' => array(
			  'min'    => 0,
			  'max'    => 10,
			  'step'   => 1,
			  'suffix' => 'px',
		  ),
	  );
		
	$options['form_border_color'] = array(
			'settings' => 'form_border_color',
			'label'   => __( 'Form Border Color', 'govideo' ),
			'priority' => '4',
			'section' => $section,
			'type'    => 'color',
			'transport' => $transport,
			'default' => '#dddddd',
		);
		
	$options['form_background_color'] = array(
			'settings' => 'form_background_color',
			'label'   => __( 'Form Background Color', 'govideo' ),
			'priority' => '4',
			'section' => $section,
			'type'    => 'color',
			'transport' => $transport,
			'default' => '#ffffff',
			'output'      => array(
			array(
				'element' => '.form-control, select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input',
			),
		),
			
		);
		
	$options['form_broder_radius'] = array(
			'settings' => 'form_broder_radius',
			'label'   => __( 'Form Broder Radius', 'govideo' ),
			'priority' => '5',
			'section' => $section,
			'type' => 'slider',
			'transport' => $transport,
			'default' => '0',
			'input_attrs' => array(
				'min'    => 0,
				'max'    => 20,
				'step'   => 1,
				'suffix' => 'px',
  			),
			
		);
		
	$options['form_padding'] = array(
			'type'        => 'dimensions',
			'settings'    => 'form_padding',
			'label'       => esc_attr__( 'Form Padding', 'govideo' ),
			'description' => '',
			'section'     => $section,
			'priority' => '5',
			'default'     => array(
				'padding-top'    => '10px',
				'padding-bottom' => '10px',
				'padding-left'   => '20px',
				'padding-right'  => '20px',
			),
			'output'      => array(
				array(
					'element' => '.form-control, select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input',
				),
			),
	);
	
	$section = 'section-buttons-options';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Buttons', 'govideo' ),
		'priority' => '11',
		'panel' => $panel
	);	
	
	$options['button_font_size'] = array(
			'settings' => 'button_font_size',
			'label'   => __( 'Form Font Size', 'govideo' ),
			'priority' => '5',
			'section' => $section,
			'default' => '12',
			'input_attrs' => array(
				'min'    => 9,
				'max'    => 30,
				'step'   => 1,
				'suffix' => 'px',
  			),
		);
		
	$options['button_color'] = array(
			'settings' => 'button_color',
			'label'   => __( 'Button Color', 'govideo' ),
			'priority' => '5',
			'section' => $section,
			'type'    => 'color',
			'transport' => $transport,
			'default' => '#ffffff',
		);
		
	$options['button_text_transform'] = array(
			'settings' => 'button_text_transform',
			'label'   => __( 'Button Text-transform', 'govideo' ),
			'section' => $section,
			'priority' => '5',
			'type'    => 'select',
			'transport' => $transport,
			'default' => 'uppercase',
			'choices' => array(
				'none'    => __( 'None', 'govideo' ),
				'capitalize'    => __( 'Capitalize', 'govideo' ),
				'uppercase'    => __( 'Uppercase', 'govideo' ),
				'lowercase'    => __( 'lowercase', 'govideo' ),

  			),
		);
		
	$options['button_broder_radius'] = array(
			'settings' => 'button_broder_radius',
			'label'   => __( 'Button Broder Radius', 'govideo' ),
			'priority' => '5',
			'section' => $section,
			'type' => 'slider',
			'transport' => $transport,
			'default' => '0',
			'input_attrs' => array(
				'min'    => 0,
				'max'    => 20,
				'step'   => 1,
				'suffix' => 'px',
  			),
		);
		
	$options['button_border_color'] = array(
			'settings' => 'button_border_color',
			'label'   => __( 'Button Border Color', 'govideo' ),
			'priority' => '5',
			'section' => $section,
			'type'    => 'color',
			'transport' => $transport,
			'default' => '#FD0005',
		);

	$options['button_background_color'] = array(
			'settings' => 'button_background_color',
			'label'   => __( 'Button Background Color', 'govideo' ),
			'priority' => '5',
			'section' => $section,
			'type'    => 'color',
			'transport' => $transport,
			'default' => '#FD0005',
		);
		
	$options['button_border_style'] = array(
			'settings' => 'button_border_style',
			'label'   => __( 'Button Border Style', 'govideo' ),
			'section' => $section,
			'priority' => '5',
			'type'    => 'select',
			'transport' => $transport,
			'default' => 'solid',
			'choices' => array(
				'none'    => __( 'None', 'govideo' ),
				'hidden'    => __( 'Hidden', 'govideo' ),
				'dotted'    => __( 'Dotted', 'govideo' ),
				'dashed'    => __( 'Dashed', 'govideo' ),
				'solid'    => __( 'Solid', 'govideo' ),
				'double'    => __( 'Double', 'govideo' ),
				'groove'    => __( 'Groove', 'govideo' ),
				'ridge'    => __( 'Ridge', 'govideo' ),
				'inset'    => __( 'Inset', 'govideo' ),
				'outset'    => __( 'Outset', 'govideo' ),
  			),
		);
		
	$options['button_border_width'] = array(
			'settings' => 'button_border_width',
			'label'   => __( 'Button Border Width', 'govideo' ),
			'priority' => '5',
			'section' => $section,
			'default' => '0',
			'type' => 'slider',
			'input_attrs' => array(
				'min'    => 0,
				'max'    => 5,
				'step'   => 1,
				'suffix' => 'px',
  			),
		);
		
	$options['button_padding'] = array(
		'type'        => 'dimensions',
		'settings'    => 'button_padding',
		'label'       => esc_attr__( 'Button Padding', 'govideo' ),
		'description' => '',
		'section'     => $section,
		'priority' => '5',
		'default'     => array(
			'padding-top'    => '10px',
			'padding-bottom' => '10px',
			'padding-left'   => '20px',
			'padding-right'  => '20px',
		),
		'output'      => array(
			array(
				'element' => 'button,input[type="submit"],.govideo-btn,btn-normal,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button',
			),
		),
	);
	
	$section = 'section-404-Page-options';
	$sections[] = array(
		'settings' => $section,
		'title' => __( '404 Page', 'govideo' ),
		'priority' => '11',
		'panel' => $panel
	);
	
	$options['page_404'] = array(
		'type'        => 'dropdown-pages',
		'settings'    => 'page_404',
		'label'       => esc_attr__( '404 Page content', 'govideo' ),
		'section'     => $section,
		'default'     => '0',
		'priority'    => 10,
     );
	 
	$section = 'section-default-image';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Default Featured Image', 'govideo' ),
		'priority' => '12',
		'panel' => $panel
	);
	
	$options['default_featured_image'] = array(
		'type'        => 'image',
		'settings'    => 'default_featured_image',
		'label'       => esc_attr__( 'Default Featured Image', 'govideo' ),
		'section'     => $section,
		'default'     => $imagepath.'no-image.png',
		'priority'    => 1,
     );
	 
	 // Panel Header
	
	$panel = 'panel-header';
	
	$panels[] = array(
		'settings' => $panel,
		'title' => __( 'GoVideo: Header Layouts', 'govideo' ),
		'priority' => '2'
	);

	$section = 'section-header-topbar';

	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Top Bar', 'govideo' ),
		'priority' => '2',
		'panel' => $panel
	);
	
	$options['display_topbar'] = array(
		'settings' => 'display_topbar',
		'label'   => __( 'Display Top Bar', 'govideo' ),
		'section' => $section,
		'type'    => 'checkbox',
		'transport' => $transport,
		'default' => '1',
		);
	
	$options['topbar_left_content'] = array(
		'type'        => 'select',
		'settings'    => 'topbar_left_content',
		'label'       => __( 'Tobbar Left Content', 'govideo' ),
		'section'     => $section,
		'default'     => 'topbar_widgets',
		'priority'    => 10,
		'multiple'    => 0,
		'choices'     => array(
			'topbar_widgets' => __( '1, Widgets', 'govideo' ),
			'topbar_menu' => __( '2, Menu', 'govideo' ),
			'topbar_text' => __( '3, Text', 'govideo' ),
			)
	 );
	
	$options['topbar_right_content'] = array(
		'type'        => 'select',
		'settings'    => 'topbar_right_content',
		'label'       => __( 'Tobbar Right Content', 'govideo' ),
		'section'     => $section,
		'default'     => 'topbar_text',
		'priority'    => 10,
		'multiple'    => 0,
		'choices'     => array(
			'topbar_widgets' => __( '1, Widgets', 'govideo' ),
			'topbar_menu' => __( '2, Menu', 'govideo' ),
			'topbar_text' => __( '3, Text', 'govideo' ),
			)
	 );
	
	$options['topbar_widgets'] = array(
		'settings' => 'topbar_widgets',
		'label'   => __( '1, Widgets', 'govideo' ),
		'section' => $section,
		'type' => 'repeater',
		'priority' => 10,
		'choices' => array('limit' => '6'),
		'transport' => $transport,
		'row_label' => array(
					'type' => 'field',
					'value' => esc_attr__('Item', 'govideo' ),
					'field' => 'text',),
		'fields' => array(
			
			'text'=>array('type'=>'textarea','default'=>'','label'=> __( 'Text', 'govideo' )),
			'link'=>array('type'=>'link','default'=>'','label'=> __( 'Link', 'govideo' )),
			'target'=>array('type'=>'select','default'=>'', 'choices'=> $target, 'label'=> __( 'Target', 'govideo' )),
		),
		'default' =>  array(
			array(
				"text" => "<i class='fa fa-user'></i> admin@domain.com",
				"link" => "",
				"target" => "_self",
				),
			array(
				"text" => "<i class='fa fa-phone'></i> 011 322 44 56",
				"link" => "",
				"target" => "_self",
				),
			array(
				"text" => "<i class='fa fa-calendar'></i> Monday - Friday 10 AM - 8 PM",
				"link" => "",
				"target" => "_self",
				),
			)
		);
		
	$locations = wp_get_nav_menus();
	$menus = array('' => __('== Select Menu ==', 'govideo') );
	foreach( $locations as $location ){
		$menus[$location->slug] = $location->name;
		}
	
	$options['topbar_menu'] = array(
		'type'        => 'select',
		'settings'    => 'topbar_menu',
		'label'       => __( '2, Menu', 'govideo' ),
		'section'     => $section,
		'default'     => '',
		'priority'    => 10,
		'multiple'    => 0,
		'choices'     => $menus
	 );
		
	$options['topbar_text'] = array(
		'type'     => 'textarea',
		'settings' => 'topbar_text',
		'label'    => __('3, Text', 'govideo'),
		'section'  => $section,
		'default'  => '',
		'priority' => '10',
		 );
	
	$section = 'section-header-logo';

	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Logo Bar', 'govideo' ),
		'priority' => '2',
		'panel' => $panel
	);
	
	$options['header_ad'] = array(
			'settings' => 'header_ad',
			'label'   => __( 'Header Advertisement', 'govideo' ),
			'description'   => __( '728x90 ad is recommended.', 'govideo' ),
			'section' => $section,
			'type'    => 'textarea',
			'default' => '',
			'transport' => $transport,
			
		);
				
	$section = 'section-navigation-bar';

	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Navigation Bar', 'govideo' ),
		'priority' => '2',
		'panel' => $panel
	);

	$options['display_search_icon'] = array(
			'settings' => 'display_search_icon',
			'label'   => __( 'Display Search Icon', 'govideo' ),
			'section' => $section,
			'type'    => 'checkbox',
			'default' => '1',
			'transport' => $transport,
		);
	
	$options['menu_align'] = array(
		'settings' => 'menu_align',
		'label'   => __( 'Menu Align', 'govideo' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => array(
				'alignleft'=> __( 'Align Left', 'govideo' ),
				'alignright'=> __( 'Align Right', 'govideo' ),
				),
		'default' => 'alignleft'
	);
	
	// Front Page
	$panel = 'panel-front-page-layout';
	
	$panels[] = array(
		'settings' => $panel,
		'title' => __( 'GoVideo: Front Page Layouts', 'govideo' ),
		'priority' => '3'
	);
	
	$section = 'section-front-page-layout';

	$sections[] = array(
		'settings' => $section,
		'title' => __( 'About Front Page Layout', 'govideo' ),
		'priority' => '1',
		'panel' => $panel
	);
	
	$options['about_front_page_layout'] = array(
		'settings' => 'about_front_page_layout',
		'label'   => __( 'About Front Page Layout', 'govideo' ),
		'section' => $section,
		'type'    => 'custom',
		'transport' => $transport,
		'default' =>  __( 'The Front Page Layout options will appear after the customize is loaded, please go back to the previous level and wait.', 'govideo' ),
		);
	// Panel Footer
	
	$panel = 'panel-footer';
	
	$panels[] = array(
		'settings' => $panel,
		'title' => __( 'GoVideo: Footer Options', 'govideo' ),
		'priority' => '4'
	);
	
	$section = 'section-footer-top';

	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Footer Top', 'govideo' ),
		'priority' => '1',
		'panel' => $panel
	);
	
	$options['footer_top_icons'] = array(
		'settings' => 'footer_top_icons',
		'label'   => __( 'Footer Top Icons', 'govideo' ),
		'section' => $section,
		'type'    => 'repeater',
		'choices' => array( 'limit' => '12' ),
		'transport' => $transport,
		'row_label' => array(
					'type' => 'field',
					'value' => esc_attr__('Icon', 'govideo' ),
					'field' => 'title' 
					),
		'fields' => array(
			'icon'=>array( 'type'=>'iconpicker','default'=>'','label'=> __( 'Font-awesome Icon.', 'govideo' )),
			'title'=>array( 'type'=>'text','default'=>'','label'=> __( 'Title', 'govideo' )),
			'link'=>array( 'type'=>'link','default'=> '','label'=> __( 'Link', 'govideo' )),
		
		),
		'default' =>  array(
			
			)
		);
	
	
	$section = 'section-footer-widgets';

	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Footer Widgets Area', 'govideo' ),
		'priority' => '1',
		'panel' => $panel
	);
	
	$options['display_footer_widgets'] = array(
		'settings' => 'display_footer_widgets',
		'label'   => __( 'Display Footer Widgets', 'govideo' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '1',
	);
	
	$options['footer_widgets_fullwidth'] = array(
		'settings' => 'footer_widgets_fullwidth',
		'label'   => __( 'Fullwidth', 'govideo' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	$options['footer_columns'] = array(
		'settings' => 'footer_columns',
		'label'   => __( 'Footer Columns', 'govideo' ),
		'section' => $section,
		'type'    => 'radio',
		'default' => '4',
		'choices' => array( '1' => __( '1 Column', 'govideo' ), '2' => __( '2 Columns', 'govideo' ), '3' => __( '3 Columns', 'govideo' ), '4' => __( '4 Columns', 'govideo' ), )
	);
	
	$options['footer_widgets_padding'] = array(
		'type'        => 'dimensions',
		'settings'    => 'footer_widgets_padding',
		'label'       => esc_attr__( 'Footer Widgets Area Padding', 'govideo' ),
		'description' => '',
		'section'     => $section,
		'default'     => array(
			'padding-top'    => '40px',
			'padding-bottom' => '0',
			'padding-left'   => '0',
			'padding-right'  => '0',
		),
		'output'      => array(
			array(
				'element' => '.wrap-footer',
			),
		),
	);
	
	$section = 'section-footer-info';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Footer Info Area', 'govideo' ),
		'priority' => '1',
		'panel' => $panel
	);
	
	$options['footer_layout'] = array(
		'settings' => 'footer_layout',
		'label'   => __( 'Layout', 'govideo' ),
		'section' => $section,
		'type'    => 'radio',
		'default' => '1',
		'choices' => array( '1' => __( 'Inline', 'govideo' ), '2' => __( 'Center', 'govideo' ) )
	);
	
	$options['footer_info_padding'] = array(
		'type'        => 'dimensions',
		'settings'    => 'footer_info_padding',
		'label'       => esc_attr__( 'Footer Info Area Padding', 'govideo' ),
		'description' => '',
		'section'     => $section,
		'default'     => array(
			'padding-top'    => '0',
			'padding-bottom' => '0',
			'padding-left'   => '0',
			'padding-right'  => '0',
		),
		'output'      => array(
			array(
				'element' => '.bottom-footer',
			),
		),
	);
	
	$options['footer_bottom_fullwidth'] = array(
		'settings' => 'footer_bottom_fullwidth',
		'label'   => __( 'Fullwidth', 'govideo' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);

	$options['display_footer_icons'] = array(
		'settings' => 'display_footer_icons',
		'label'   => __( 'Display Footer Icons', 'govideo' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '1',
	);
	
	$options['footer_bottom_icons'] = array(
		'settings' => 'footer_bottom_icons',
		'label'   => __( 'Footer Bottom Icons', 'govideo' ),
		'section' => $section,
		'type'    => 'repeater',
		'choices' => array('limit' => '6'),
		'transport' => $transport,
		'row_label' => array(
					'type' => 'field',
					'value' => esc_attr__('Icon', 'govideo' ),
					'field' => 'title',),
		'fields' => array(
			'icon'=>array( 'type'=>'iconpicker','default'=>'','label'=> __( 'Font-awesome Icon.', 'govideo' ) ),
			'title'=>array( 'type'=>'text','default'=>'','label'=> __( 'Title', 'govideo' ) ),
			'link'=>array( 'type'=>'link','default'=> '','label'=> __( 'Link', 'govideo' ) ),
		
		),
		'default' =>  array(
			
			)
		);
	
	$options['copyright'] = array(
		'settings' => 'copyright',
		'label'   => __( 'Copyright', 'govideo' ),
		'section' => $section,
		'type'    => 'editor',
		'default' => ''
		);
	
	// Panel Pages & Posts Options
	$panel = 'panel-pages-posts-options';
	
	$panels[] = array(
		'settings' => $panel,
		'title' => __( 'GoVideo: Posts Options', 'govideo' ),
		'priority' => '2'
	);
	
	$section = 'section-posts-single';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Single Post', 'govideo' ),
		'priority' => '10',
		'panel' => $panel
	);
	
	$options['display_author'] = array(
			'settings' => 'display_author',
			'label'   => __( 'Display Author', 'govideo' ),
			'section' => $section,
			'type'    => 'checkbox',
			'transport' => $transport,
			'priority' => '1',
			'default' => '1',
		);
	
	$options['display_date'] = array(
			'settings' => 'display_date',
			'label'   => __( 'Display Date', 'govideo' ),
			'section' => $section,
			'type'    => 'checkbox',
			'transport' => $transport,
			'default' => '1',
			'priority' => '2',
		);
	
	$options['display_visits'] = array(
			'settings' => 'display_visits',
			'label'   => __( 'Display Visits', 'govideo' ),
			'section' => $section,
			'type'    => 'checkbox',
			'transport' => $transport,
			'default' => '1',
			'priority' => '3',
		);

	$options['display_tags'] = array(
			'settings' => 'display_tags',
			'label'   => __( 'Display Tags', 'govideo' ),
			'section' => $section,
			'type'    => 'checkbox',
			'transport' => $transport,
			'priority' => '4',
			'default' => '1',
		);
	
	$options['display_related_posts'] = array(
			'settings' => 'display_related_posts',
			'label'   => __( 'Display Related Posts', 'govideo' ),
			'section' => $section,
			'type'    => 'checkbox',
			'transport' => $transport,
			'priority' => '4',
			'default' => '1',
		);
	
	$options['display_page_header'] = array(
			'settings' => 'display_page_header',
			'label'   => __( 'Display Page Title', 'govideo' ),
			'section' => $section,
			'type'    => 'checkbox',
			'transport' => $transport,
			'priority' => '4',
			'default' => '1',
		);
	
	$options['related_post_type'] = array(
			'settings' => 'related_post_type',
			'label'   => __( 'Related Post Type', 'govideo' ),
			'section' => $section,
			'priority' => '5',
			'type'    => 'radio',
			'transport' => $transport,
			'default' => 'category',
			'choices' => array(
				'category'    => __( 'Category', 'govideo' ),
				'tag'    => __( 'Tag', 'govideo' ),
				
  			),
		);
	
	$options['post_zoom_icon'] = array(
			'settings' => 'post_zoom_icon',
			'label'   => __( 'Default Thumbnail Zoom Icon', 'govideo' ),
			'priority' => '6',
			'section' => $section,
			'type'    => 'fontawesome',
			'transport' => $transport,
			'default' => 'fa-plus',
		);
	
	
	// Colors & Background
	
	$panel = 'panel-colors-background';
	
	$panels[] = array(
		'settings' => $panel,
		'title' => __( 'GoVideo: Colors & Background', 'govideo' ),
		'priority' => '5'
	);
	
	$section = 'section-base-colors';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Base Colors', 'govideo' ),
		'priority' => '1',
		'panel' => $panel
	);
	
	$options['primary_color'] = array(
		'settings' => 'primary_color',
		'label'   => __( 'Primary Color', 'govideo' ),
		'priority' => '1',
		'section' => $section,
		'type'    => 'color',
		'transport' => $transport,
		'default' => '#FD0005',
	);
	
	
	$section = 'section-top-bar-background';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Top Bar', 'govideo' ),
		'priority' => '2',
		'panel' => $panel
	);
	
	$options['topbar_background_color'] = array(
		'settings' => 'topbar_background_color',
		'label'   => __( 'Top Bar Background Color', 'govideo' ),
		'priority' => '1',
		'section' => $section,
		'type'    => 'color',
		'transport' => $transport,
		'default' => '#ffffff',
		'output'      => array(
			array(
				'element' => '.govideo-top-bar-wrap',
				'property' => 'background-color',
			),
		),
		'choices'     => array(
			'alpha' => true,
		),
	);
	
	$section = 'section-navigation-bar-background';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Navigation Bar', 'govideo' ),
		'priority' => '3',
		'panel' => $panel
	);
	
	$options['navigation_background_image'] = array(
		'settings' => 'navigation_background_image',
		'label'   => __( 'Navigation Bar Background Image', 'govideo' ),
		'priority' => '1',
		'section' => $section,
		'type'    => 'image',
		'transport' => $transport,
		'default' => '',
		'output'      => array(
			array(
				'element' => '#menu',
				'function' => 'css',
				'property' => 'background-image'
			),
		),
		
	);
	
	$section = 'section-footer-widget-area-background';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Footer Widget Area', 'govideo' ),
		'priority' => '4',
		'panel' => $panel
	);
	
	$options['footer_widget_area_background'] = array(
		'settings' => 'footer_widget_area_background',
		'label'   => __( 'Footer Widget Area Background', 'govideo' ),
		'priority' => '1',
		'section' => $section,
		'type'    => 'background',
		'transport' => $transport,
		'default' => array('background-color' => '#222'),
		'output'      => array(
			array(
				'element' => 'footer .wrap-footer',
			),
		),
		'choices'     => array(
			'alpha' => true,
		),
	);
	
	$section = 'section-footer-info-area-background';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Footer Info Area', 'govideo' ),
		'priority' => '4',
		'panel' => $panel
	);
	
	$options['footer_info_area_background'] = array(
		'settings' => 'footer_info_area_background',
		'label'   => __( 'Footer Info Area Background', 'govideo' ),
		'priority' => '1',
		'section' => $section,
		'type'    => 'background',
		'transport' => $transport,
		'default' => array('background-color' => '#333'),
		'output'      => array(
			array(
				'element' => 'footer .bottom-footer',
			),
		),
		'choices'     => array(
			'alpha' => true,
		),
	);
	

	// Panel Typography
	$panel = 'panel-typography';
	
	$panels[] = array(
		'settings' => $panel,
		'title' => __( 'GoVideo: Typography', 'govideo' ),
		'priority' => '10'
	);
	
	$section = 'base-typorgraphy';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Base Typorgraphy', 'govideo' ),
		'priority' => '10',
		'panel' => $panel
	);
	
	$options['body_typography'] = array(
		'type'        => 'typography',
		'settings'    => 'body_typography',
		'label'       => esc_attr__( 'Body Typography', 'govideo' ),
		'section'     => $section,
		'default'     => array(
			'font-family'    => 'Mukta',
			'variant'        => 'regular',
			'font-size'      => '16px',
			'line-height'    => '1.6em',
			'letter-spacing' => '0',
			'color'          => '#666',
			'text-transform' => 'none',
		),
		'priority'    => 10,
		'output'      => array(
			array(
				'element' => 'html, body',
			),
	));
	
	$options['h1_typography'] = array(
		'type'        => 'typography',
		'settings'    => 'h1_typography',
		'label'       => esc_attr__( 'H1', 'govideo' ),
		'section'     => $section,
		'transport' => $transport,
		'default'     => array(
			'font-family'    => 'Roboto',
			'variant'        => '600',
			'font-size'      => '38px',
			'line-height'    => '1.1',
			'letter-spacing' => '0',
			'color'          => '#111',
			'text-transform' => 'none',
		),
		'priority'    => 10,
		'output'      => array(
			array(
				'element' => 'h1',
			),
			
	),
	 'js_vars' => array(
        array(
            'element' => 'h1',
        ))
		);
	
	$options['h2_typography'] = array(
		'type'        => 'typography',
		'settings'    => 'h2_typography',
		'label'       => esc_attr__( 'H2', 'govideo' ),
		'section'     => $section,
		'default'     => array(
			'font-family'    => 'Roboto',
			'variant'        => '600',
			'font-size'      => '36px',
			'line-height'    => '1.1',
			'letter-spacing' => '0',
			'color'          => '#111',
			'text-transform' => 'none',
		),
		'priority'    => 10,
		'output'      => array(
			array(
				'element' => 'h2',
			),
	));
	
	
	$options['h3_typography'] = array(
		'type'        => 'typography',
		'settings'    => 'h3_typography',
		'label'       => esc_attr__( 'H3', 'govideo' ),
		'section'     => $section,
		'default'     => array(
			'font-family'    => 'Roboto',
			'variant'        => '600',
			'font-size'      => '32px',
			'line-height'    => '1.1',
			'letter-spacing' => '0',
			'color'          => '#111',
			'text-transform' => 'none',
		),
		'priority'    => 10,
		'output'      => array(
			array(
				'element' => 'h3',
			),
	));

		
	$options['h4_typography'] = array(
			'type'        => 'typography',
			'settings'    => 'h4_typography',
			'label'       => esc_attr__( 'H4', 'govideo' ),
			'section'     => $section,
			'default'     => array(
				'font-family'    => 'Roboto',
				'variant'        => '600',
				'font-size'      => '28px',
				'line-height'    => '1.1',
				'letter-spacing' => '0',
				'color'          => '#111',
				'text-transform' => 'none',
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => 'h4',
				),
		));
	
	$options['h5_typography'] = array(
			'type'        => 'typography',
			'settings'    => 'h5_typography',
			'label'       => esc_attr__( 'H5', 'govideo' ),
			'section'     => $section,
			'default'     => array(
				'font-family'    => 'Roboto',
				'variant'        => '600',
				'font-size'      => '24px',
				'line-height'    => '1.1',
				'letter-spacing' => '0',
				'color'          => '#111',
				'text-transform' => 'none',
			),
			'choices'     => array(
				'alpha' => true,
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => 'h5',
				),
		));
		
	$options['h6_typography'] = array(
			'type'        => 'typography',
			'settings'    => 'h6_typography',
			'label'       => esc_attr__( 'H6', 'govideo' ),
			'section'     => $section,
			'default'     => array(
				'font-family'    => 'Roboto',
				'variant'        => '600',
				'font-size'      => '20px',
				'line-height'    => '1.1',
				'letter-spacing' => '0',
				'color'          => '#111',
				'text-transform' => 'none',
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => 'h6',
				),
		));
	
	$section = 'top-bar-typorgraphy';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Top Bar', 'govideo' ),
		'priority' => '10',
		'panel' => $panel
	);
	
	$options['topbar_typography'] = array(
			'type'        => 'typography',
			'settings'    => 'topbar_typography',
			'label'       => esc_attr__( 'Content', 'govideo' ),
			'section'     => $section,
			'default'     => array(
				'font-family'    => 'Open Sans',
				'variant'        => 'regular',
				'font-size'      => '13px',
				'line-height'    => '18px',
				'letter-spacing' => '0.5px',
				'color'          => '#666',
				'text-transform' => 'none',
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '.govideo-top-bar .govideo-microwidget, .govideo-top-bar .govideo-microwidget a',
				),
		));
		
	$section = 'navigation-typography';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Navigation Bar', 'govideo' ),
		'priority' => '10',
		'panel' => $panel
	);	
		
	$options['site_title_typography'] = array(
			'type'        => 'typography',
			'settings'    => 'site_title_typography',
			'label'       => esc_attr__( 'Site Title', 'govideo' ),
			'section'     => $section,
			'default'     => array(
				'font-family'    => 'Mukta',
				'variant'        => '700',
				'font-size'      => '48px',
				'line-height'    => '1',
				'letter-spacing' => '0',
				'color'          => '#fff',
				'text-transform' => 'none',
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '.site-name',
				),
				array(
					'element' => '.site-description',
					'property' => 'color'
				),
		));
		
	$options['site_tagline_typography'] = array(
			'type'        => 'typography',
			'settings'    => 'site_tagline_typography',
			'label'       => esc_attr__( 'Site Tagline', 'govideo' ),
			'section'     => $section,
			'default'     => array(
				'font-family'    => 'Mukta',
				'variant'        => '400',
				'font-size'      => '16px',
				'line-height'    => '1.6em',
				'letter-spacing' => '0',
				'color'          => '#fff',
				'text-transform' => 'none',
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '.site-description',
				),
		));
	
	$options['main_menu_typography'] = array(
			'type'        => 'typography',
			'settings'    => 'main_menu_typography',
			'label'       => esc_attr__( 'Main Menu', 'govideo' ),
			'section'     => $section,
			'default'     => array(
				'font-family'    => 'Mukta',
				'variant'        => '700',
				'font-size'      => '16px',
				'line-height'    => '20px',
				'letter-spacing' => '',
				'color'          => '#fff',
				'text-transform' => 'none',
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '#menu ul.nav li > a',
				),
		));
	
	$options['sub_menu_typography'] = array(
			'type'        => 'typography',
			'settings'    => 'sub_menu_typography',
			'label'       => esc_attr__( 'Sub Menu', 'govideo' ),
			'section'     => $section,
			'default'     => array(
				'font-family'    => 'Mukta',
				'variant'        => '700',
				'font-size'      => '14px',
				'line-height'    => '20px',
				'letter-spacing' => '',
				'color'          => '#000',
				'text-transform' => 'none',
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '#menu ul.nav .sub-menu li a',
				),
		));
		
	$section = 'widget-typography';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Widget', 'govideo' ),
		'priority' => '10',
		'panel' => $panel
	);
	
	$options['widget_title_typography'] = array(
			'type'        => 'typography',
			'settings'    => 'widget_title_typography',
			'label'       => esc_attr__( 'Widget Title', 'govideo' ),
			'section'     => $section,
			'default'     => array(
				'font-family'    => 'Roboto',
				'variant'        => '700',
				'font-size'      => '14px',
				'line-height'    => '1.1',
				'letter-spacing' => '1px',
				'color'          => '#fff',
				'text-transform' => 'uppercase',
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '.widget-title',
				),
		));
		
	$options['widget_content_typography'] = array(
			'type'        => 'typography',
			'settings'    => 'widget_content_typography',
			'label'       => esc_attr__( 'Widget Content', 'govideo' ),
			'section'     => $section,
			'default'     => array(
				'font-family'    => 'Mukta',
				'variant'        => '400',
				'font-size'      => '14px',
				'line-height'    => '1.6em',
				'letter-spacing' => '0',
				'color'          => '#a0a0a0',
				'text-transform' => 'none',
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '.widget-box, .widget-box .textwidget,.wrap-footer .timeline-Widget',
				),
				
		));
	
	$options['widget_link_typography'] = array(
			'type'        => 'typography',
			'settings'    => 'widget_link_typography',
			'label'       => esc_attr__( 'Widget Content', 'govideo' ),
			'section'     => $section,
			'default'     => array(
				'font-family'    => 'Mukta',
				'variant'        => '700',
				'font-size'      => '11px',
				'line-height'    => '1.6em',
				'letter-spacing' => '1px',
				'color'          => '#a0a0a0',
				'text-transform' => 'uppercase',
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '.widget_recent_entries li a, .widget-box a',
				),

				
		));
		
	$section = 'footer-typography';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Footer Info', 'govideo' ),
		'priority' => '10',
		'panel' => $panel
	);
		
	$options['footer_typography'] = array(
			'type'        => 'typography',
			'settings'    => 'footer_typography',
			'label'       => esc_attr__( 'Footer Content', 'govideo' ),
			'section'     => $section,
			'default'     => array(
				'font-family'    => 'Mukta',
				'variant'        => '400',
				'font-size'      => '16px',
				'line-height'    => '1',
				'letter-spacing' => '0',
				'color'          => '#999',
				'text-transform' => 'none',
			),
			'transport'   => $transport,
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '.bottom-footer',
				),

		));
	
	$section = 'post_typography';
	$sections[] = array(
		'settings' => $section,
		'title' => __( 'Post', 'govideo' ),
		'priority' => '10',
		'panel' => $panel
	);
		
	$options['post_box_title_typography'] = array(
			'type'        => 'typography',
			'settings'    => 'post_box_title_typography',
			'label'       => esc_attr__( 'Post Box Title', 'govideo' ),
			'section'     => $section,
			'default'     => array(
				'font-family'    => 'Roboto',
				'variant'        => '600',
				'font-size'      => '19px',
				'line-height'    => '1',
				'letter-spacing' => '0',
				'color'          => '#333',
				'text-transform' => 'none',
			),
			'transport'   => $transport,
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '.vid-name,.vid-name a',
				),

		));
		
	$options['post_title_typography'] = array(
			'type'        => 'typography',
			'settings'    => 'post_title_typography',
			'label'       => esc_attr__( 'Single Post Title', 'govideo' ),
			'section'     => $section,
			'default'     => array(
				'font-family'    => 'Roboto',
				'variant'        => '600',
				'font-size'      => '28px',
				'line-height'    => '1',
				'letter-spacing' => '0',
				'color'          => '#333',
				'text-transform' => 'none',
			),
			'transport'   => $transport,
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '.single-post h1.entry-title,.single-post h1.entry-title a',
				),

		));
		
	
	return array( 'options' => $options, 'panels' => $panels, 'sections' => $sections );

}

global $govideo_default_options;

$options = govideo_customizer_library_options();

Kirki::add_config(
	GOVIDEO_TEXTDOMAIN, array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'option',
		'option_name' => GOVIDEO_TEXTDOMAIN,
	)
);

// add panels
if( is_array( $options['panels'] ) ){
	
	$p = 1;
	foreach(  $options['panels'] as $panel ){
		
		Kirki::add_panel( $panel['settings'], array(
		  'priority'    => $p,
		  'title'       => $panel['title'],
		  'description' => '',
		  ) );
		
		$p++;
		
		}
	
	}

// add sections
if( is_array( $options['sections'] ) ){
	
	$s = 1;
	foreach(  $options['sections'] as $section ){
		
		Kirki::add_section( $section['settings'], array(
		  'title'          => $section['title'],
		  'description'    => '',
		  'panel'          => $section['panel'], 
		  'priority'       => $s,
		  'capability'     => 'edit_theme_options',
		  'theme_supports' => '',
	  ) );
		
		$s++;
		
		}
	}

// add options
if( is_array( $options['options'] ) ){
	
	foreach(  $options['options'] as $key=>$option ){
		
		$default = array(
			'settings'         => '',
			'choices'         => '',
			'row_label'       => '',
			'fields'          => '',
			'active_callback' => '',
			'transport'       => 'refresh',
			'output'          => '',
			'js_vars'         => '',
			'partial_refresh' => '',
			'description'     => '',
			'priority'    => '',
		
		);
	
	if( isset( $option['default']) )
		$govideo_default_options[$key] = $option['default'];
	//$option = array_merge($default, $option);
		
	if(isset($option['settings']))			
		Kirki::add_field( GOVIDEO_TEXTDOMAIN, $option );
		
		}
	
	}

