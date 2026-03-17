<div class="frm_grid_container frm_hubspot_action_container">
	<p>
		<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=formidable&frm_action=settings&t=email_settings&clear_cache=hubspot&id=' . $form->id ) ) ); ?>" id="clrcache-hubspot" class="button frm-button-secondary">
			<?php esc_html_e( 'Clear Cache', 'formidable-hubspot' ); ?>
		</a>
		<span style="float:none" class="clrcache-hubspot-spinner spinner"></span>
	</p>
	<?php
	if ( $list_array ) {
		?>
		<p class="frm6 frm_form_field">
			<label>
				<?php esc_html_e( 'List', 'formidable-hubspot' ); ?>
			</label>
			<select name="<?php echo esc_attr( $action_control->get_field_name( 'list_id' ) ); ?>">
				<option value=""><?php esc_html_e( '&mdash; Select &mdash;', 'formidable-hubspot' ); ?></option>
				<?php
				foreach ( $list_array as $list ) {
					if ( ! $list->dynamic && ! empty( $list->listId ) ) { // phpcs:ignore WordPress.NamingConventions
						?>
						<option value="<?php echo esc_attr( $list->listId ); // phpcs:ignore WordPress.NamingConventions ?>"
							<?php selected( $list_id, $list->listId ); // phpcs:ignore WordPress.NamingConventions ?>>
							<?php echo esc_html( FrmAppHelper::truncate( $list->name, 40 ) ); ?>
						</option>
						<?php
					}
				}
				?>
			</select>
		</p>
		<?php
	}

	require dirname( __FILE__ ) . '/_match_fields.php';
	?>
</div>
