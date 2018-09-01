<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'GoVideo_Admin' ) ) :

	class GoVideo_Admin {

		/**
		 * Constructor.
		 */
		public function __construct() {
			add_action( 'admin_menu', array( $this, 'admin_menu' ) );
			add_action( 'wp_ajax_hoo-companion-plugin-activate', array( $this, 'required_plugin_activate') );
		}

		/**
		 * Add admin menu.
		 */
		public function admin_menu() {
			$theme = wp_get_theme( get_template() );

			$page = add_theme_page( esc_html__( 'About', 'govideo' ) . ' ' . $theme->display( 'Name' ), esc_html__( 'About', 'govideo' ) . ' ' . $theme->display( 'Name' ), 'activate_plugins', 'govideo-welcome', array(
				$this,
				'welcome_screen',
			) );
		}
		
		/**
		 * Required Plugin Activate
		 */
		static public function required_plugin_activate() {

			if ( ! current_user_can( 'install_plugins' ) || ! isset( $_POST['init'] ) || ! $_POST['init'] ) {
				wp_send_json_error(
					array(
						'success' => false,
						'message' => __( 'No plugin specified', 'govideo' ),
					)
				);
			}

			$plugin_init = ( isset( $_POST['init'] ) ) ? esc_attr( $_POST['init'] ) : '';

			$activate = activate_plugin( $plugin_init, '', false, true );

			if ( is_wp_error( $activate ) ) {
				wp_send_json_error(
					array(
						'success' => false,
						'message' => $activate->get_error_message(),
					)
				);
			}

			wp_send_json_success(
				array(
					'success' => true,
					'message' => __( 'Plugin Successfully Activated', 'govideo' ),
				)
			);

		}

		/**
		 * Intro text/links shown to all about pages.
		 */
		private function intro() {
			global $govideo_version;
			$theme = wp_get_theme( get_template() );

			// Drop minor version if 0
			$major_version = substr( $govideo_version, 0, 3 );
			?>
			<div class="govideo-theme-info">
				<h1>
					<?php esc_html_e( 'About', 'govideo' ); ?>
					<?php echo $theme->display( 'Name' ); ?>
					<?php printf( '%s', $major_version ); ?>
				</h1>


			</div>

			<p class="govideo-actions">
				<a href="<?php echo esc_url( 'https://www.hoothemes.com/themes/govideo.html' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'govideo' ); ?></a>

				<a href="<?php echo esc_url( apply_filters( 'govideo_pro_theme_url', 'http://demo.hoosoft.com/govideo/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Demo', 'govideo' ); ?></a>
				
			</p>

			<h2 class="nav-tab-wrapper">
				<a class="nav-tab <?php if ( empty( $_GET['tab'] ) && $_GET['page'] == 'govideo-welcome' ) {
					echo 'nav-tab-active';
				} ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'govideo-welcome' ), 'themes.php' ) ) ); ?>">
					<?php echo $theme->display( 'Name' ); ?>
				</a>

			</h2>
			<?php
		}

		/**
		 * Welcome screen page.
		 */
		public function welcome_screen() {
			$current_tab = empty( $_GET['tab'] ) ? 'about' : sanitize_title( $_GET['tab'] );

			// Look for a {$current_tab}_screen method.
			if ( is_callable( array( $this, $current_tab . '_screen' ) ) ) {
				return $this->{$current_tab . '_screen'}();
			}

			// Fallback to about screen.
			return $this->about_screen();
		}

		/**
		 * Output the about screen.
		 */
		public function about_screen() {
			$theme = wp_get_theme( get_template() );
			?>
			<div class="wrap about-wrap">

				<?php $this->intro(); ?>

				<div class="changelog point-releases">
					<div class="under-the-hood two-col">
						<div class="col">

							<p>
								<?php

						if ( file_exists( WP_PLUGIN_DIR . '/hoo-companion/hoo-companion.php' ) && is_plugin_inactive( 'hoo-companion/hoo-companion.php' ) ) {
							
							echo '<h3>'.esc_html__( 'Activate Plugin', 'govideo' ).'</h3>
							<p>'.esc_html__( 'It needs to activate the Hoo Companion plugin.', 'govideo' ).'</p>';

							$class       = 'button button-primary hoo-companion-inactive';
							$button_text = esc_html__( 'Activate Required Plugin', 'govideo' );
							$data_slug   = 'hoo-companion';
							$data_init   = '/hoo-companion/hoo-companion.php';

						} elseif ( ! file_exists( WP_PLUGIN_DIR . '/hoo-companion/hoo-companion.php' ) ) {
							echo '<h3>'.esc_html__( 'Install Plugin', 'govideo' ).'</h3>
							<p>'.esc_html__( 'It needs to install the Hoo Companion plugin.', 'govideo' ).'</p>';
							
							$class       = 'button button-primary hoo-companion-notinstalled';
							$button_text = esc_html__( 'Install Required Plugin', 'govideo' );
							$data_slug   = 'hoo-companion';
							$data_init   = '/hoo-companion/hoo-companion.php';

						}  else {
							$class       = 'active';
							$button_text = '';
							$link        = '';
							 do_action( 'hoo_admin_page_button' );
						}

						printf(
							'<a class="%1$s" %2$s %3$s %4$s> %5$s </a>',
							esc_attr( $class ),
							isset( $link ) ? 'href="' . esc_url( $link ) . '"' : '',
							isset( $data_slug ) ? 'data-slug="' . esc_attr( $data_slug ) . '"' : '',
							isset( $data_init ) ? 'data-init="' . esc_attr( $data_init ) . '"' : '',
							esc_html( $button_text )
						);
						?>
							</p>
						</div>
                        

						<div class="col">
							<h3><?php esc_html_e( 'Theme Customizer', 'govideo' ); ?></h3>
							<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'govideo' ) ?></p>
							<p>
								<a href="<?php echo esc_url(admin_url( 'customize.php' )); ?>" class="button button-secondary"><?php esc_html_e( 'Customize', 'govideo' ); ?></a>
							</p>
						</div>

						<div class="col">
							<h3><?php esc_html_e( 'Documentation', 'govideo' ); ?></h3>
							<p><?php esc_html_e( 'Please view our documentation page to setup the theme.', 'govideo' ) ?></p>
							<p>
								<a href="<?php echo esc_url( 'https://www.hoothemes.com/govideo-theme-documentation.html' ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e( 'Documentation', 'govideo' ); ?></a>
							</p>
						</div>

						<div class="col">
							<h3><?php esc_html_e( 'Got theme support question?', 'govideo' ); ?></h3>
							<p><?php esc_html_e( 'Please submit a topic in our dedicated support forum.', 'govideo' ) ?></p>
							<p>
								<a href="<?php echo esc_url( 'https://www.hoothemes.com/forums/govideo-theme/' ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e( 'Support', 'govideo' ); ?></a>
							</p>
						</div>

		
						
					</div>
				</div>

				
			</div>
			<?php
		}


	}

endif;

return new GoVideo_Admin();
