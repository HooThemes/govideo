<?php
	get_header();
?>
<div id="page-content" class="<?php post_class('single-page'); ?>">
		<div class="container">
        <?php do_action( 'hoo_before_page_header' );?>
			<div class="row">
				<div id="main-content" class="col-md-8">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</div><!-- #main -->
        </div>
         <?php do_action( 'hoo_after_page_header' );?>
	</div><!-- #primary -->
   </div><!-- .wrap -->

<?php
get_footer();
