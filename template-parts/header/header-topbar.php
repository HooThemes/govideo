<?php
do_action( 'hoo_before_top_bar' );
$html = apply_filters( 'govideo_top_bar', '' );
echo wp_kses_post($html);
do_action( 'hoo_after_top_bar' );

