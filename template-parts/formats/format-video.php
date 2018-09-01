<div class="wrap-vid">
<?php
	$video_url = get_post_meta( get_the_ID(), 'hoo_video_url', true );
	$height    = get_post_meta( get_the_ID(), 'hoo_video_height', true );
	$autoplay  = get_post_meta( get_the_ID(), 'hoo_video_autoplay', true );
	
	if( !is_numeric( $height ) || $height == 0 )
		$height = 400;
	
	if( $video_url !='' ){
		$video = new GovideoVideo( $video_url, absint($autoplay), absint($height) );
		$video->render_embed();
	}
	?>
</div>