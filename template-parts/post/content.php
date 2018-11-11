<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
  <?php echo govideo_posted_on(); ?>
  <?php
	$first_tag = govideo_get_first_tag( get_the_ID() );
	?>
  <div class="wrap-vid">
    <div class="zoom-container">
      <div class="zoom-caption"> <span><?php echo esc_html($first_tag); ?></span> <a href="<?php the_permalink(); ?>"> <?php echo govideo_get_zoom_icon('', 3);?> </a>
        <p>
          <?php the_title(); ?>
        </p>
      </div>
      <?php the_post_thumbnail( 'full' ); ?>
    </div>
    <div class="description">
      <?php the_excerpt(); ?>
      <a class="read-more" href="<?php the_permalink(); ?>">
      <?php  esc_html_e( 'MORE', 'govideo' )?>
      ...</a> </div>
  </div>
</article>
<div class="line"></div>
