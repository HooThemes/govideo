<?php
	$hoo_gallery_id  = get_post_meta( get_the_ID(), 'hoo_gallery_id', true );
?>
<div class="single-page-gallery owl-carousel owl-theme">
	<?php 
	if( !empty($hoo_gallery_id) ){
		
		foreach( $hoo_gallery_id as $image_id ){
			
			echo '<div class="item">';
			echo wp_get_attachment_image( $image_id, 'full' );
			echo '</div>';
			
			}
		
		}
	
	?>
</div>