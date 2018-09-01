<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="govideo-header">
<?php do_action( 'hoo_before_header' );?>
<?php get_template_part( 'template-parts/header/header', 'topbar' );?>
<?php get_template_part( 'template-parts/header/header', 'masthead' );?>
<?php get_template_part( 'template-parts/header/header', 'image' );?>
<?php get_template_part( 'template-parts/navigation/navigation', 'top' );?>
<?php get_template_part( 'template-parts/header/header', 'slider' );?>
<?php do_action( 'hoo_after_header' );?>
</header>