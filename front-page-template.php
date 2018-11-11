<?php
/**
 * The template for displaying home page.
 * Template Name: Front-page Template
 * @package GoVideo
 */
	get_header(); 
?>
<div id="page-content" class="index-page">
  <div class="container">
    <div class="row">
      <?php get_template_part( 'template-parts/layouts/featured', 'slider' );?>
    </div>
    <div class="row">
      <div id="main-content" class="col-md-8">
        <?php
			//if ( is_active_sidebar( 'hoo-main-section' ) ) {
				if ( ! dynamic_sidebar( 'hoo-main-section' ) ):
						endif;
			//}
		?>
      </div>
      <div id="sidebar" class="col-md-4">
        <?php
			//if ( is_active_sidebar( 'hoo-sidebar-home' ) ) {
				if ( ! dynamic_sidebar( 'hoo-sidebar-home' ) ):
					endif;
			//}
		?>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();

