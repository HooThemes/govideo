<?php

get_header(); ?>

<div id="page-content" <?php post_class('archive-page'); ?>>
		<div class="container">
        <?php do_action( 'hoo_before_page_header' );?>
			<div class="row">
				<div id="main-content" class="col-md-8">
			<?php
			if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/post/content', '' );

			endwhile; // End of the loop.
			
			govideo_get_post_attributes();
			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>

		</div><!-- #main -->
        
        <?php get_sidebar();?>
                
        </div>
         <?php do_action( 'hoo_after_page_header' );?>
	</div><!-- #primary -->
   </div><!-- .wrap -->

<?php
get_footer();
