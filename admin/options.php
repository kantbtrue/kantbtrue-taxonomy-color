<?php
/**
 * Options
 *
 * Curated item options/settings page functions
 *
 * @package KBTTC_Taxonomy_Color
 * @since   1.0.0
 * @version 1.0.0
 * @author  kantbtrue
 * @license GPL-2.0-or-later
 */

if ( ! function_exists( 'kbttc_save_opts' ) ) {
	/**
	 * Save options in database
	 *
	 * @since   1.0
	 * @version 1.0
	 */
	function kbttc_save_opts() {

		// Globals.
		global $kbttc_opts;

		// Check for permission.
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			update_option( '_kbttc_settings_notice', 'error' );
			wp_safe_redirect( wp_get_referer(), 302, 'KBTTC_Taxonomy_Color' );
			exit;
		}

		// Check for security.
		if ( ! isset( $_POST['kbttc_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['kbttc_nonce'] ), 'kbttc_opts_verify' ) ) {
			update_option( '_kbttc_settings_notice', 'error' );
			wp_safe_redirect( wp_get_referer(), 302, 'KBTTC_Taxonomy_Color' );
			exit;
		}

		$kbttc_opts['default_color'] = isset( $_POST['default_color'] ) ? sanitize_text_field( wp_unslash( $_POST['default_color'] ) ) : '#000000';
		$kbttc_opts['taxonomies']    = array();

		$terms = isset( $_POST['taxonomies'] ) ? wp_unslash( $_POST['taxonomies'] ) : array();// phpcs:ignore
		if ( is_array( $terms ) ) {
			foreach ( $terms as $key => $value ) {
				$kbttc_opts['taxonomies'][ $key ] = sanitize_text_field( $value );
			}
		}
		$kbttc_opts['taxonomies'] = array_merge( $kbttc_opts['taxonomies'], $kbttc_opts['taxonomies'] );

		// Update database.
		update_option( '_kbttc_options', $kbttc_opts );
		update_option( '_kbttc_settings_notice', 'success' );
		wp_safe_redirect( wp_get_referer(), 302, 'KBTTC_Taxonomy_Color' );
		exit;
	}
}
add_action( 'admin_post_kbttc_save_opts', 'kbttc_save_opts' );

if ( ! function_exists( 'kbttc_settings' ) ) {
	/**
	 * Add settings page to custom post type
	 *
	 * @since   1.0
	 * @version 1.0
	 */
	function kbttc_settings() {
		add_menu_page(
			__( 'Taxonomy Color', 'kbttc-term-color' ),
			__( 'Taxonomy Color', 'kbttc-term-color' ),
			'edit_theme_options',
			'kbttc_settings',
			'kbttc_settings_page_template',
			'dashicons-color-picker',
			81
		);
	}
}
add_action( 'admin_menu', 'kbttc_settings' );

if ( ! function_exists( 'kbttc_settings_page_template' ) ) {
	/**
	 * Settings page template
	 *
	 * @since   1.0
	 * @version 1.0
	 */
	function kbttc_settings_page_template() {

		// Globals.
		global $kbttc_opts;

		$excluded_taxonomies = array(
			'nav_menu',
			'link_category',
			'post_format',
		);


		// All taxonomies.
		$temp_terms = array_merge( get_taxonomies( array( '_builtin' => true ) ), get_taxonomies( array( '_builtin' => false ) ) );
		$terms      = array_diff( $temp_terms, $excluded_taxonomies );

		$output = '';
		ob_start();
		?>
		<div class="wrap">
			<h2>
				<?php esc_html_e( 'Kantbtrue taxonomy color settings page', 'kbttc-term-color' ); ?>
			</h2>
			<form method="POST" action="admin-post.php">
				<input type="hidden" name="action" value="kbttc_save_opts">
				<?php wp_nonce_field( 'kbttc_opts_verify', 'kbttc_nonce' ); ?>
				<table class="form-table">
					<tr>
						<th class="row-title">
							<label for="kbttc-term-color">
							<?php esc_html_e( 'Default Color', 'kbttc-term-color' ); ?>
						</th>
						<th>
							<input type="color" name="default_color" id="kbttc-term-color" value="<?php echo isset( $kbttc_opts ) ? esc_attr( $kbttc_opts['default_color'] ) : esc_attr( '#000000' ); ?>">
						</th>
					</tr>
					<tr>
						<th class="row-title">
							<?php esc_html_e( 'Exclude Taxonomies', 'kbttc-term-color' ); ?>
						</th>
						<th>
							<?php
							if ( ! empty( $terms ) && is_array( $terms ) ) :
								foreach ( $terms as $kbttc_taxonomy ) :
									?>
									<fieldset>
										<legend class="screen-reader-text"><span><?php esc_html_e( 'Exclude Taxonomies', 'kbttc-term-color' ); ?></span></legend>
										<label for="taxonomy-<?php echo esc_attr( $kbttc_taxonomy ); ?>">
											<input name="taxonomies[]" type="checkbox" id="taxonomy-<?php echo esc_attr( $kbttc_taxonomy ); ?>" value="<?php echo esc_attr( $kbttc_taxonomy ); ?>" <?php echo ( is_array( $kbttc_opts ) && in_array( $kbttc_taxonomy, $kbttc_opts['taxonomies'], true ) ? 'checked="checked"' : '' ); ?>>
											<?php
											if ( 'category' === $kbttc_taxonomy ) {
												$output = __( 'Post category', 'kbttc-term-color' );
											} elseif ( 'post_tag' === $kbttc_taxonomy ) {
												$output = __( 'Post tag', 'kbttc-term-color' );
											} else {
												$output = $kbttc_taxonomy;
											}
											echo esc_html( $output );
											?>
										</label>
									</fieldset>
									<?php
								endforeach;
							endif;
							?>
						</th>
					</tr>
					<tr>
						<td colspan="2">
							<?php
							submit_button(
								esc_html__( 'Save Changes', 'kbttc-term-color' ),
								$type             = 'primary',
								$name             = 'submit',
								$wrap             = false,
								$other_attributes = null
							);
							?>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<?php
		$output = ob_get_clean();
		echo $output;
	}
}
