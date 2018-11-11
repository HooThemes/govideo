<?php

if ( class_exists( 'WP_Customize_Control' ) && !class_exists('Hoo_Customize_Iconpicker_Control') ) {

	class Hoo_Customize_Iconpicker_Control extends WP_Customize_Control {

		/**
		 * Render the control's content.
		 */
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>
				<div class="input-group icp-container">
					<input data-placement="bottomRight" class="icp icp-auto" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" type="text">
					<span class="input-group-addon"></span>
				</div>
			</label>
			<?php
		}


	}
	
	function govideo_control_types($controls){
		$controls['iconpicker'] = 'Hoo_Customize_Iconpicker_Control';
		return $controls;
	}
	
	function govideo_iconpicker_control( $wp_customize ){
		// Register our custom control with Kirki
		add_filter( 'kirki_control_types', 'govideo_control_types' );

	}

	add_action( 'customize_register', 'govideo_iconpicker_control' );

}