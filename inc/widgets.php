<?php
/**
 * Register widget area.
 *
 */
function govideo_widgets_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'govideo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="heading"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Section: Header Slider', 'govideo' ),
		'id'            => 'hoo-header-slider',
		'description'   => esc_html__( 'Add widgets here to appear in your header slider unader mian menu.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Section: Featured Main Slider', 'govideo' ),
		'id'            => 'hoo-featured-slider',
		'description'   => esc_html__( 'Add widgets here to appear in your featured main slider unader header slider.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Section: Area Beside Featured Slider', 'govideo' ),
		'id'            => 'hoo-beside-featured-slider',
		'description'   => esc_html__( 'Add widgets here to appear beside featured main slider.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	
	register_sidebar( array(
		'name'          => esc_html__( 'Section: Main Content', 'govideo' ),
		'id'            => 'hoo-main-section',
		'description'   => esc_html__( 'Add widgets here to appear main content area.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Section: Home Sidebar', 'govideo' ),
		'id'            => 'hoo-sidebar-home',
		'description'   => esc_html__( 'Add widgets here to appear sidebar area.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="heading"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'govideo' ),
		'id'            => 'hoo-sidebar-page',
		'description'   => __( 'Add widgets here to appear in your pages sidebar.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="heading"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Post Sidebar', 'govideo' ),
		'id'            => 'hoo-sidebar-post',
		'description'   => esc_html__( 'Add widgets here to appear in your single post sidebar.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="heading"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Archives', 'govideo' ),
		'id'            => 'hoo-sidebar-archives',
		'description'   => esc_html__( 'Add widgets here to appear in your posts list sidebar.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="heading"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'govideo' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title footer-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'govideo' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title footer-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'govideo' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title footer-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'govideo' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title footer-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Custom Sidebar 1', 'govideo' ),
		'id'            => 'custom-1',
		'description'   => esc_html__( 'Add widgets here to appear in your custom sidebar.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="heading"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Custom Sidebar 2', 'govideo' ),
		'id'            => 'custom-2',
		'description'   => esc_html__( 'Add widgets here to appear in your custom sidebar.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="heading"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Custom Sidebar 3', 'govideo' ),
		'id'            => 'custom-3',
		'description'   => esc_html__( 'Add widgets here to appear in your custom sidebar.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="heading"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Custom Sidebar 4', 'govideo' ),
		'id'            => 'custom-4',
		'description'   => esc_html__( 'Add widgets here to appear in your custom sidebar.', 'govideo' ),
		'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="heading"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
}
add_action( 'widgets_init', 'govideo_widgets_init' );
