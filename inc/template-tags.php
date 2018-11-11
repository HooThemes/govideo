<?php

/**
 *  Custom comments list
 */	
function govideo_comment($comment, $args, $depth) {

?>
   
<li <?php comment_class("comment media-comment"); ?> id="comment-<?php comment_ID() ;?>">
	<div class="media-govideor media-left">
	<?php echo get_avatar($comment,'70','' ); ?>
  </div>
  <div class="media-body">
      <div class="media-inner">
          <h4 class="media-heading clearfix">
             <?php echo get_comment_author_link();?> - <?php comment_date(); ?> <?php edit_comment_link(__('(Edit)','govideo'),'  ','') ;?>
             <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ;?>
          </h4>
          
          <?php if ($comment->comment_approved == '0') : ?>
                   <em><?php esc_html_e('Your comment is awaiting moderation.','govideo') ;?></em>
                   <br />
                <?php endif; ?>
                
          <div class="comment-content"><?php comment_text() ;?></div>
      </div>
  </div>
</li>
                                            
<?php
	}

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function govideo_posted_on() {
									
	$return = '';
		
	$display_date       = govideo_option( 'display_date' );
	$display_author     = govideo_option( 'display_author' );
	$display_visits     = govideo_option( 'display_visits' );

	$visits             = get_post_meta( get_the_ID(), 'hoo_visits', true );
	
	if( $visits != '' )
		$visits = absint($visits );
	else
		$visits = 0;
		
	$return .=  '<div class="info entry-meta">';
	   
	if( $display_author == '1' )
		$return .=  '<h5 class="vcard author post-author"><span class="fn">'.__('By', 'govideo').' '.get_the_author_posts_link().'</span></h5>';
		
	if( $display_date == '1' )
		$return .=  '<span class="entry-date"><i class="fa fa-calendar"></i>'. get_the_date(  ).'</span>';
	
	if( $display_visits == '1' )
		$return .=  '<span class="entry-visits" title="'.esc_html__('Visits', 'govideo').'"><i class="fa fa-eye"></i>'. number_format( $visits ).'</span>';
	$return .= apply_filters( 'govideo_after_entry_meta', '' );

    $return .=  '</div>';

	return $return;
}

add_filter('hoo_entry_meta','govideo_posted_on');

/**
 * Get post attributes
 *
 */
function govideo_get_post_attributes(){
	?>
    
    <center>
                        
	<?php the_posts_pagination( array(
  'type' => 'list',
  'prev_text' => '<span aria-hidden="true">&laquo;</span><span class="screen-reader-text">' . esc_html__( 'Previous page', 'govideo' ) . '</span>',
  'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next page', 'govideo' ) . '</span><span aria-hidden="true">&raquo;</span>' ,
  'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'govideo' ) . ' </span>',
) );?>


  </center>

    <?php
}

/**
 * Get zomm icon
 *
 */
 function govideo_get_zoom_icon( $string='', $size = 5 ){
	 
	$post_zoom_icon = get_post_meta( get_the_ID(), 'hoo_post_zoom_icon', true );
	
	if( $post_zoom_icon == '' ){
		$format = get_post_format() ? get_post_format(): 'standard';
		switch($format){
			case "video":
				$post_zoom_icon = 'play-circle-o';
			break;
			case "gallery":
				$post_zoom_icon = 'clone';
			break;
			case "image":
				$post_zoom_icon = 'picture-o';
			break;
			default:
				$post_zoom_icon = esc_attr(govideo_option( 'post_zoom_icon' ));
			break;
			}
		
	}
		
	$post_zoom_icon = str_replace( 'fa-', '', $post_zoom_icon);
		
	return '<i class="fa fa-'.esc_attr($post_zoom_icon).' fa-'.absint($size).'x" style="color: #fff"></i>';
	 
	 }
	 
 add_filter( 'hoo_zoom_icon', 'govideo_get_zoom_icon',10,2 );
 
 /**
 * Get related posts
 */
function govideo_related_post() {
	
	$post_id = get_the_ID();
    $cat_ids = array();
	$first_tag = '';
	
	$related_post_type = govideo_option( 'related_post_type' );
	
	if ( !$related_post_type )
		$related_post_type = 'category';
		
	if( $related_post_type == 'tag' ){
		
		$tags = wp_get_post_tags($post_id);
		$tag_ids = array();
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
		
		if ($tags) {

		  $query_args = array(
		  'tag__in' => $tag_ids,
		  'post__not_in' => array($post_id),
		  'posts_per_page'=>3,
		  //'caller_get_posts'=>1
		  );
		}
		
	}else{
		
		$categories = get_the_category( $post_id );
	
		if(!empty($categories) && is_wp_error($categories)):
			foreach ($categories as $category):
				array_push($cat_ids, $category->term_id);
			endforeach;
		endif;
	
		$current_post_type = get_post_type($post_id);
		$query_args = array( 
	
			'category__in'   => $cat_ids,
			'post_type'      => $current_post_type,
			'post_not_in'    => array($post_id),
			'posts_per_page'  => '3'
	
	
		 );
	 
	}

    $related_cats_post = new WP_Query( $query_args );

    if($related_cats_post->have_posts()):
         while($related_cats_post->have_posts()): $related_cats_post->the_post();
		 
		 $first_tag = govideo_get_first_tag( get_the_ID() );
		 	
	?>
         
         <div class="col-md-4">
            <div class="wrap-vid">
                <div class="zoom-container">
                    <div class="zoom-caption">
                        <span><?php echo $first_tag; ?></span>
                        <a href="<?php the_permalink(); ?>">
							<?php echo govideo_get_zoom_icon( '', 3);?>
						</a>
                        <p><?php the_title(); ?></p>
                    </div>
                   <?php
					if( has_post_thumbnail() )
						the_post_thumbnail( 'govideo_thumbnail' );
					else
						echo govideo_get_featured_image();
					?>
                </div>
                <h3 class="vid-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php echo govideo_posted_on(); ?>
            </div>
        </div>

        <?php endwhile;

        // Restore original Post Data
        wp_reset_postdata();
     endif;

}

 /**
 * Get default featured image
 */
function govideo_get_featured_image(){
	
	$default_featured_image =  govideo_option( 'default_featured_image' );
	if( $default_featured_image != '' )
		return '<img  src="'.esc_url($default_featured_image).'" alt="" />';
	
	}
	
add_filter( 'hoo_default_featured_image', 'govideo_get_featured_image' );

 /**
 * Out put logo right text
 */
function govideo_logo_right(){
	
	$logo_area_text =  govideo_option( 'logo_area_text' );
	if( $logo_area_text != '' )
		echo wp_kses_post($logo_area_text);
	
	}
	
add_action( 'govideo_logo_right', 'govideo_logo_right' );

