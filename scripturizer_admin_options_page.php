<div>
	<h2><?php _e( 'Scripturizer Plugin Settings', 'scripturizer' ); ?></h2>
	<p><?php _e( 'Manage settings for the Scripturizer Plugin', 'scripturizer' ); ?></p>
	<form action="options.php" method="post">
		<?php 
		settings_fields('plugin_scripturizer_options');
		do_settings_sections('scripturizer');
		?>
		<?php submit_button( __( 'Save Settings', 'scripturizer' ), 'primary', 'plugin_scripturizer_options[submit]', false ); ?>
		<?php submit_button( __( 'Reset Defaults', 'scripturizer' ), 'secondary', 'plugin_scripturizer_options[reset]', false ); ?>
	</form>
</div>