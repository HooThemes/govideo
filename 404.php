<?php
	get_header();
		
?>

<div id="page-content" class="<?php post_class('single-page'); ?>">
  <div class="container">
    <?php do_action( 'hoo_before_page_header' );?>
    <div class="row">
      <div id="main-content" class="col-md-12">
        <?php do_action('hoo_before_page_content');?>
        <?php
			
				$page_404 = govideo_option('page_404');
				if( $page_404 > 0 ){
					
					$post   = get_post( $page_404 );
					
					echo '<div id="page-'.$post->ID.'">
							  <article class="entry-box">
								<div class="entry-main">
								  <div class="entry-summary">
								   <h1>'.$post->post_title.'</h1>
								'.$post->post_content.'
								  </div>
								</div>
							  </article>
							</div>';
					
					}else{
			
			?>
        <h1>
          <?php esc_html_e('404 Nothing Found', 'govideo');?>
        </h1>
        <p>
          <?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'govideo');?>
        </p>
        <?php get_search_form(); ?>
        <?php }?>
      </div>
    </div>
    <?php do_action( 'hoo_after_page_header' );?>
  </div>
</div>
<?php get_footer();
