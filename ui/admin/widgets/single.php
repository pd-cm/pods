<style type="text/css">
	ol.pods_single_widget_form {
		list-style: none;
		padding-left: 0;
		margin-left: 0;
	}

	ol.pods_single_widget_form label {
		display: block;
	}
</style>

<p><em><?php _e( 'You must specify a Pods Template or create a custom template, using <a href="http://pods.io/docs/build/using-magic-tags/" title="Using Magic Tags" target="_blank">magic tags</a>.', 'pods' ); ?></p></em>

<ol class="pods_single_widget_form">
	<li>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"> <?php _e( 'Title', 'pods' ); ?></label>

		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
	</li>

	<li>
		<?php
		$api      = pods_api();
		$all_pods = $api->load_pods( array( 'names' => true ) );
		?>
		<label for="<?php echo $this->get_field_id( 'pod_type' ); ?>">
			<?php _e( 'Pod', 'pods' ); ?>
		</label>

		<?php if ( 0 < count( $all_pods ) ): ?>
			<select id="<?php echo $this->get_field_id( 'pod_type' ); ?>" name="<?php echo $this->get_field_name( 'pod_type' ); ?>">
				<?php foreach ( $all_pods as $pod_name => $pod_label ): ?>
					<?php $selected = ( $pod_name == $pod_type ) ? 'selected' : ''; ?>
					<option value="<?php echo $pod_name; ?>" <?php echo $selected; ?>>
						<?php echo esc_html( $pod_label . ' (' . $pod_name . ')' ); ?>
					</option>
				<?php endforeach; ?>
			</select>
		<?php else: ?>
			<strong class="red"><?php _e( 'None Found', 'pods' ); ?></strong>
		<?php endif; ?>
	</li>

	<li>
		<label for="<?php echo $this->get_field_id( 'slug' ); ?>">
			<?php _e( 'Slug or ID', 'pods' ); ?>
		</label>

		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'slug' ); ?>" name="<?php echo $this->get_field_name( 'slug' ); ?>" value="<?php echo esc_attr( $slug ); ?>" />
	</li>

	<?php
	if ( class_exists( 'Pods_Templates' ) ) {
		?>
		<li>
			<?php
			$all_templates = (array) $api->load_templates( array() );
			?>
			<label for="<?php echo $this->get_field_id( 'template' ); ?>"> <?php _e( 'Template', 'pods' ); ?> </label>

			<select name="<?php echo $this->get_field_name( 'template' ); ?>" id="<?php echo $this->get_field_id( 'template' ); ?>">
				<option value="">- <?php _e( 'Custom Template', 'pods' ); ?> -</option>
				<?php foreach ( $all_templates as $tpl ): ?>
					<?php $selected = ( $tpl['name'] == $template ) ? 'selected' : ''; ?>
					<option value="<?php echo $tpl['name']; ?>" <?php echo $selected; ?>>
						<?php echo esc_html( $tpl['name'] ); ?>
					</option>
				<?php endforeach; ?>
			</select>
		</li>
	<?php
	} else {
		?>
		<li>
			<label for="<?php echo $this->get_field_id( 'template' ); ?>"> <?php _e( 'Template', 'pods' ); ?> </label>

			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'template' ); ?>" name="<?php echo $this->get_field_name( 'template' ); ?>" value="<?php echo esc_attr( $template ); ?>" />
		</li>
	<?php
	}
	?>

	<li>
		<label for="<?php echo $this->get_field_id( 'template_custom' ); ?>"> <?php _e( 'Custom Template', 'pods' ); ?> </label>

		<textarea name="<?php echo $this->get_field_name( 'template_custom' ); ?>" id="<?php echo $this->get_field_id( 'template_custom' ); ?>" cols="10" rows="10" class="widefat"><?php echo esc_html( $template_custom ); ?></textarea>
	</li>

	<li>
		<label for="<?php echo $this->get_field_id( 'before' ); ?>"><?php _e( 'Before Text', 'pods' ); ?></label>

		<input class="widefat" type="text" name="<?php echo $this->get_field_name( 'before' ); ?>" id="<?php echo $this->get_field_id( 'before' ); ?>" value="<?php echo esc_attr( $before ); ?>" />
	</li>

	<li>
		<label for="<?php echo $this->get_field_id( 'after' ); ?>"><?php _e( 'After Text', 'pods' ); ?></label>

		<input class="widefat" type="text" name="<?php echo $this->get_field_name( 'after' ); ?>" id="<?php echo $this->get_field_id( 'after' ); ?>" value="<?php echo esc_attr( $after ); ?>" />
	</li>

	<li>
		<label for="<?php echo $this->get_field_id( 'shortcodes' ); ?>"><?php _e( 'Enable Shortcodes in output', 'pods' ); ?></label>

		<input type="checkbox" name="<?php echo $this->get_field_name( 'shortcodes' ); ?>" id="<?php echo $this->get_field_id( 'shortcodes' ); ?>" value="1" <?php selected( 1, $shortcodes ); ?> />
	</li>
</ol>
