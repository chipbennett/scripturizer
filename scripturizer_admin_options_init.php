<?php 

global $scripturizer_options;
$scripturizer_options = scripturizer_get_options();
global $scripturizer_options_default;
$scripturizer_options_default = scripturizer_get_options_default();

/*
 * Register Plugin Settings
 */
	
// Register plugin_scripturizer_options array to hold all Plugin options
register_setting( 'plugin_scripturizer_options', 'plugin_scripturizer_options', 'scripturizer_options_validate' );

/*
 * Add Plugin Settings Form Sections
 */
	
// Add a form section for the General Plugin settings
add_settings_section('scripturizer_settings_general', __( 'General Options', 'scripturizer' ), 'scripturizer_settings_general_section_text', 'scripturizer');
// Add a form section for the ESV settings
add_settings_section('scripturizer_settings_esv', __( 'ESV Show/Hide Verse Text Options', 'scripturizer' ), 'scripturizer_settings_esv_section_text', 'scripturizer');
	
/*
 * Add Form Fields to General Settings Section
 */
	
// Add Default Translation setting to the General section
add_settings_field('scripturizer_setting_default_translation', __( 'Default Translation', 'scripturizer' ), 'scripturizer_setting_default_translation', 'scripturizer', 'scripturizer_settings_general');
// Add Substitution Mode setting to the General section
add_settings_field('scripturizer_setting_dynamic_substitution', __( 'Substitution Mode', 'scripturizer' ), 'scripturizer_setting_dynamic_substitution', 'scripturizer', 'scripturizer_settings_general');
// Add Link CSS Class setting to the General section
add_settings_field('scripturizer_setting_link_css_class', __( 'Link CSS Class', 'scripturizer' ), 'scripturizer_setting_link_css_class', 'scripturizer', 'scripturizer_settings_general');
// Add Open Link in New Tab/Window setting to the General section
add_settings_field('scripturizer_setting_link_target_blank', __( 'Open Link in New Tab/Window', 'scripturizer' ), 'scripturizer_setting_link_target_blank', 'scripturizer', 'scripturizer_settings_general');
	
/*
 * Add Form Fields to ESV Settings Section
 */
	
// Add ESV Show/Hide setting to the ESV section
add_settings_field('scripturizer_setting_esv_show_hide', __( 'Show/Hide ESV Text', 'scripturizer' ), 'scripturizer_setting_esv_show_hide', 'scripturizer', 'scripturizer_settings_esv');
// Add ESV Key setting to the ESV section
add_settings_field('scripturizer_setting_esv_key', __( 'ESV API Key', 'scripturizer' ), 'scripturizer_setting_esv_key', 'scripturizer', 'scripturizer_settings_esv');
// Add ESV CSS setting to the ESV section
add_settings_field('scripturizer_setting_esv_xml_css', __( 'ESV XML Output CSS', 'scripturizer' ), 'scripturizer_setting_esv_xml_css', 'scripturizer', 'scripturizer_settings_esv');
// Add ESV Query Options setting to the ESV section
add_settings_field('scripturizer_setting_esv_query_options', __( 'ESV Query Options', 'scripturizer' ), 'scripturizer_setting_esv_query_options', 'scripturizer', 'scripturizer_settings_esv');

/*
 * Add Section Text for each Form Section
 */

// General Settings Section
function scripturizer_settings_general_section_text() { 
	?>
	<p><?php _e( 'Refer to the contextual help screen for descriptions and help regarding each Plugin option.', 'scripturizer' ); ?></p>
	<?php 
}

// ESV Settings Section
function scripturizer_settings_esv_section_text() { 
	?>
	<p><?php _e('The following settings are applicable only when using the ESV Translation.', 'scripturizer'); ?></p>
	<?php 
}

// Add form field markup for each Plugin option

// Default Translation Setting
function scripturizer_setting_default_translation() {
	global $scripturizer_options;
	global $scripturizer_options_default;
	$scripturizer_default_translation = $scripturizer_options_default['default_translation'];
	global $scripturizer_translations;
	$scripturizer_translations = scripturizer_get_translations();
	global $scripturizer_translations_original;
	$scripturizer_translations_original = scripturizer_get_original_translations();
	global $scripturizer_translations_non_english;
	$scripturizer_translations_non_english = scripturizer_get_non_english_translations();
	?>
	<p>
		<label for="scripturizer_default_translation">
			<b><?php _e('Default Bible Translation', 'Scripturizer'); ?></b><br />
			<select name="plugin_scripturizer_options[default_translation]">
			<optgroup label="English Translations">
		   <?php 
			ksort( $scripturizer_translations );
			$translations_english = $scripturizer_translations;
			foreach ( $translations_english as $translation_acronym => $translation_name ) { ?>
				<option <?php if ( $translation_acronym == $scripturizer_options['default_translation'] ) echo 'selected="selected"'; ?> value="<?php echo $translation_acronym; ?>"><?php echo $translation_name; ?> (<?php echo $translation_acronym; ?>)</option>
			<?php } ?>
			</optgroup>
			<optgroup label="Original Languages">
		   <?php 
			ksort( $scripturizer_translations_original );
			$translations_original = $scripturizer_translations_original;
			foreach ( $translations_original as $translation_acronym => $translation_name ) { ?>
				<option <?php if ( $translation_acronym == $scripturizer_options['default_translation'] ) echo 'selected="selected"'; ?> value="<?php echo $translation_acronym; ?>"><?php echo $translation_name; ?> (<?php echo $translation_acronym; ?>)</option>
			<?php } ?>
			</optgroup>
			<optgroup label="Other Languages">
		   <?php 
			$translations_non_english = $scripturizer_translations_non_english;
			foreach ( $translations_non_english as $translation_acronym => $translation_name ) { ?>
				<option <?php if ( $translation_acronym == $scripturizer_options['default_translation'] ) echo 'selected="selected"'; ?> value="<?php echo $translation_acronym; ?>"><?php echo $translation_name; ?> (<?php echo $translation_acronym; ?>)</option>
			<?php } ?>
			</optgroup>
			</select>
		</label>
	</p>
	<?php 
}

// Dynamic Substitution Setting
function scripturizer_setting_dynamic_substitution() {
	global $scripturizer_options;
	?>
	<p>
		<label for="scripturizer_dynamic_substitution">
			<b><?php _e('Scripturizer Mode', 'Scripturizer'); ?></b><br />
			<select name="plugin_scripturizer_options[dynamic_substitution]">
				<option <?php if ( true == $scripturizer_options['dynamic_substitution'] ) echo 'selected="selected"'; ?> value="true"><?php _e( 'Dynamic', 'scripturizer' ); ?></option>
				<option <?php if ( false == $scripturizer_options['dynamic_substitution'] ) echo 'selected="selected"'; ?> value="false"><?php _e( 'Static', 'scripturizer' ); ?></option>
			</select>
		</label>
	</p>
	<?php 
}

// Link CSS Class Setting
function scripturizer_setting_link_css_class() {
	global $scripturizer_options; 
	?>
	<p>
		<label for="scripturizer_esv_key">
			<b><?php _e('Link CSS Class', 'Scripturizer'); ?></b><br />
            <input type="text" name="plugin_scripturizer_options[link_css_class]" value="<?php echo $scripturizer_options['link_css_class']; ?>" size="30" />
		</label>
	</p>
	<?php 
}

// Open Link in New Window/Tab Setting
function scripturizer_setting_link_target_blank() {
	global $scripturizer_options; 
	?>
	<p>
		<label for="scripturizer_link_target_blank">
			<b><?php _e('Open Link in New Window/Tab', 'Scripturizer'); ?></b><br />
			<select name="plugin_scripturizer_options[link_target_blank]">
				<option <?php if ( true == $scripturizer_options['link_target_blank'] ) echo 'selected="selected"'; ?> value="true"><?php _e( 'True (Open In New Tab/Window)', 'scripturizer' ); ?></option>
				<option <?php if ( false == $scripturizer_options['link_target_blank'] ) echo 'selected="selected"'; ?> value="false"><?php _e( 'False (Open In Same Tab/Window)', 'scripturizer' ); ?></option>
			</select>
		</label>
	</p>
	<?php 
}

// ESV Show/Hide Text Setting
function scripturizer_setting_esv_show_hide() {
	global $scripturizer_options;
	?>
	<p>
		<label for="scripturizer_xml_show_hide">
			<b><?php _e('Show/Hide ESV Text', 'Scripturizer'); ?></b><br />
			<select name="plugin_scripturizer_options[xml_show_hide]">
				<option <?php if ( true == $scripturizer_options['xml_show_hide'] ) echo 'selected="selected"'; ?> value="true"><?php _e( 'Show', 'scripturizer' ); ?></option>
				<option <?php if ( false == $scripturizer_options['xml_show_hide'] ) echo 'selected="selected"'; ?> value="false"><?php _e( 'Hide', 'scripturizer' ); ?></option>
			</select>
		</label>
	</p>
	<?php 
}

// ESV API Key Setting
function scripturizer_setting_esv_key() {
	global $scripturizer_options;
	?>
	<p>
		<label for="scripturizer_esv_key">
			<b><?php _e('ESV Web Service API Key', 'Scripturizer'); ?></b><br />
            <input type="text" name="plugin_scripturizer_options[esv_key]" value="<?php echo $scripturizer_options['esv_key']; ?>" size="30" />
		</label>
	</p>
	<?php 
}

// ESV XML CSS Setting
function scripturizer_setting_esv_xml_css() {
	global $scripturizer_options;
	?>
	<p>
		<label for="scripturizer_xml_css">
			<b><?php _e('ESV Inline Verse Display CSS', 'Scripturizer'); ?></b><br />
            <textarea name="plugin_scripturizer_options[xml_css]" cols="50" rows="10" wrap="VIRTUAL"><?php echo $scripturizer_options['xml_css']; ?></textarea>
		</label>
	</p>
	<?php 
}

// ESV Query Options Setting
function scripturizer_setting_esv_query_options() {
	global $scripturizer_options;
	?>
	<p>
		<label for="scripturizer_esv_query_options">
			<b><?php _e( 'ESV Web Service Query Options', 'Scripturizer'); ?></b><br />
			<?php $LO_esv_form_qo = $scripturizer_options['esv_query_options']; ?>
            <textarea name="plugin_scripturizer_options[esv_query_options]" cols="50" rows="6" wrap="VIRTUAL"><?php echo $LO_esv_form_qo; ?></textarea>
		</label>
	</p>
	<?php 
}


// Validate data input before updating Plugin options
function scripturizer_options_validate( $input ) {

	$reset_submit = ( isset( $input['reset'] ) ? true : false );
	
	if ( $reset_submit ) {
	  
		global $scripturizer_options_default;

		$valid_input['default_translation'] = $scripturizer_options_default['default_translation'];
		$valid_input['dynamic_substitution'] = $scripturizer_options_default['dynamic_substitution'];
		$valid_input['xml_show_hide'] = $scripturizer_options_default['xml_show_hide'];
		$valid_input['esv_key'] =  $scripturizer_options_default['esv_key'];
		$valid_input['xml_css'] =  $scripturizer_options_default['xml_css'];
		$valid_input['esv_query_options'] = $scripturizer_options_default['esv_query_options'];
		$valid_input['libronix'] = false;
		$valid_input['link_css_class'] = $scripturizer_options_default['link_css_class'];
		$valid_input['link_target_blank'] = $scripturizer_options_default['link_target_blank'];

		return $valid_input;
	  
	} else {
	
		$scripturizer_options = scripturizer_get_options();
		global $scripturizer_translations;
		$scripturizer_translations = scripturizer_get_translations();
		global $scripturizer_translations_original;
		$scripturizer_translations_original = scripturizer_get_original_translations();
		global $scripturizer_translations_non_english;
		$scripturizer_translations_non_english = scripturizer_get_non_english_translations();

		$valid_translations_english = implode( '|', array_keys( $scripturizer_translations ) );
		$valid_translations_default = implode( '|', array_keys( $scripturizer_translations_original ) );
		$valid_translations_non_english = implode( '|', array_keys( $scripturizer_translations_non_english ) );

		$valid_translations_all = $valid_translations_english . $valid_translations_default . $valid_translations_non_english;

		$valid_css_class = '[a-zA-Z]+[_a-zA-Z0-9-]*';
		$invalid_css = array( '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '', '=', '+', ',', '.', '/', '<', '>', '?', ';', ':', '[', ']', '{', '}', '\\', '|', '\'', '\"' );

		$valid_input = $scripturizer_options;	

		$valid_input['default_translation'] = ( strpos( $valid_translations_all, $input['default_translation'] ) !== false ? $input['default_translation'] : $scripturizer_options['default_translation'] );
		$valid_input['dynamic_substitution'] = ( $input['dynamic_substitution'] == 'true' ? true : false );
		$valid_input['xml_show_hide'] = ( $input['xml_show_hide'] == 'true' ? true : false );	
		$valid_input['esv_key'] =  wp_filter_nohtml_kses( $input['esv_key'] );	
		$valid_input['xml_css'] =  wp_filter_nohtml_kses( $input['xml_css'] );
		$valid_input['esv_query_options'] = wp_filter_nohtml_kses( $input['esv_query_options'] );
		$valid_input['libronix'] = false;
		$valid_input['link_css_class'] = wp_filter_nohtml_kses( str_ireplace( $invalid_css, '', ltrim( trim( $input['link_css_class'] ), "_-0..9" ) ) );
		$valid_input['link_target_blank'] = ( $input['link_target_blank'] == 'true' ? true : false );
		$valid_input['reset'] = false;

		return $valid_input;
	
	}
}
?>