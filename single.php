<?php 
	get_header();
?>
<div id="page-content" class="<?php post_class('single-page'); ?>">
		<div class="container">
        <?php do_action( 'hoo_before_page_header' );?>
			<div class="row">
				<div id="main-content" class="col-md-8">
                <?php while ( have_posts() ) : the_post();?>
                
					<?php
                    
                    $format = get_post_format() ? get_post_format(): 'standard';
                    get_template_part( 'template-parts/formats/format', $format );
                    get_template_part( 'template-parts/post/content', 'social' );
                    ?>

                    <?php
						$display_page_header = govideo_option('display_page_header');
						$display_page_header = apply_filters ( 'hoo_display_page_header',$display_page_header);
					?>
                    <?php if( $display_page_header == 'enable' || $display_page_header == '1' ):?>
					<h1 class="vid-name entry-title"><?php the_title();?></h1>
					<?php echo govideo_posted_on(); ?>
                    <?php endif;?>
					
                    <div class="post-content">
					<?php
                      do_action('hoo_before_post');
                      the_content();
          
                      the_posts_pagination( array(
                      'prev_text' => '<i class="fa fa-arrow-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'govideo' ) . '</span>',
                      'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'govideo' ) . '</span><i class="fa fa-arrow-right"></i>' ,
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'govideo' ) . ' </span>',
                  ) );
                      do_action('hoo_after_post');
                      ?>
            
                    </div>
                    <?php
					
					$display_tags = govideo_option('display_tags');
					if( $display_tags == 1 && get_the_tag_list() ) {
					?>
					<div class="vid-tags">
					<?php
					  echo get_the_tag_list('',' ');
				  ?>
					</div>
                    <?php }?>
					<div class="line"></div>
					<div class="comment">
					<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
			  		?>
					</div>
                     
                     <?php
					 $display_related_posts = govideo_option('display_related_posts');
					 if( $display_related_posts == 1 || $display_related_posts == 'on' ):
					 ?>
					<div class="line"></div>
					<div class="box">
						<div class="box-header">
							<h2><i class="fa fa-globe"></i> <?php _e( 'RELATED VIDEOS', 'govideo' );?></h2>
						</div>
						<div class="box-content">
							<div class="row">
							<?php govideo_related_post(); ?>
							</div>
						</div>
					</div>
                    <?php endif;?>
                    
                     <?php endwhile; ?>
                    
				</div>
				<?php get_sidebar();?>
			</div>
             <?php do_action( 'hoo_after_page_header' );?>
		</div>
	</div>

<?php
get_footer();
