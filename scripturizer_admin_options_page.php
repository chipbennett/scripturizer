<div>
	<h2>Scripturizer Plugin Settings</h2>
	<p>Manage settings for the Scripturizer Plugin</p>
	<form action="options.php" method="post">
		<?php 
		settings_fields('plugin_scripturizer_options');
		do_settings_sections('scripturizer');
		?>
		<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
	</form>
</div>