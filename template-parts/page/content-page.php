<?php
	$display_page_header = govideo_option('display_page_header');
	$display_page_header = apply_filters ( 'hoo_display_page_header',$display_page_header);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if( $display_page_header == 'enable' || $display_page_header == '1' ):?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
<?php endif;?>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'govideo' ),
					'after'  => '</div>',
				)
			);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
