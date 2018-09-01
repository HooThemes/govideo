<?php
	$display_footer_widgets = govideo_option('display_footer_widgets');
	$footer_fullwidth = govideo_option('footer_widgets_fullwidth');
	$footer_columns = absint(govideo_option('footer_columns'));
	
	if( $footer_columns == 0 )
		$footer_columns = 4;

	if( $display_footer_widgets == '1'  ):
	
	$container = 'container';
	if($footer_fullwidth == '1'){
		$container = 'container-fullwidth';
		
	}
?>

<div class="wrap-footer">
  <div class="<?php echo $container; ?>">
  <?php do_action( 'hoo_before_footer_widgets' );?>
    <div class="row">
      <?php for ($i = 1; $i <= 4; $i++) : ?>
      <?php if (is_active_sidebar("footer-".$i)) : ?>
      <aside class="col-footer col-md-<?php echo 12/$footer_columns; ?>">
        <?php dynamic_sidebar("footer-".$i); ?>
      </aside>
      <?php endif; ?>
      <?php endfor; ?>
    </div>
    <?php do_action( 'hoo_after_footer_widgets' );?>
  </div>
</div>
<?php endif; ?>
