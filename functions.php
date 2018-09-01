<?php
define( 'GOVIDEO_VERSION', '1.0.0' );
define( 'GOVIDEO_TEXTDOMAIN', 'govideo' );
define( 'GOVIDEO_THEME_DIR', get_template_directory() . '/' );
define( 'GOVIDEO_THEME_URI', get_template_directory_uri() . '/' );

// Helper library for the theme customizer.
require_once GOVIDEO_THEME_DIR . '/inc/kirki-framework/kirki.php';
require_once GOVIDEO_THEME_DIR . '/inc/customizer-options.php';

// Theme setup.
require_once GOVIDEO_THEME_DIR . '/inc/theme-setup.php';

// Common-functions
require_once GOVIDEO_THEME_DIR . 'inc/template-functions.php';

// Enqueue scripts and styles.
require_once GOVIDEO_THEME_DIR . '/inc/enqueue-scripts.php';

// Custom template tags for this theme.
require_once GOVIDEO_THEME_DIR . 'inc/template-tags.php';

// Customizer.
require_once GOVIDEO_THEME_DIR . 'inc/customizer.php';

// Register sidebar.
require_once GOVIDEO_THEME_DIR . 'inc/widgets.php';

// Video iframe.
require_once GOVIDEO_THEME_DIR . 'inc/video-helper.php';

// Admin page.
require_once GOVIDEO_THEME_DIR . 'inc/theme-admin-page.php';

