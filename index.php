<?php

get_header(); ?>

<div id="page-content" <?php post_class('archive-page'); ?>>
		<div class="container">
			<div class="row">
				<div id="main-content" class="col-md-8">
				<?php if ( have_posts() ) :

				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/content', '' );
				endwhile;

				govideo_get_post_attributes();
				
			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>
            </div>
            
            <?php get_sidebar();?>
                
        </div>
     </div>
  </div>

<?php
get_footer();
