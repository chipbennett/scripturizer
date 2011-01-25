<?php
$text = "<h2>" . __( 'Important Notes', 'Scripturizer' ) . "</h2>";
$text .= "<ol>";
<<<<<<< .mine
$text .= "<li>" . __('You must press the UPDATE OPTIONS button at least once to install the default settings.', 'Scripturizer') . "</li>";
$text .= "<li>" . __('If you mess up one of the following inputs, then clear the field (make it blank), hit \"update options,\" and then the default values will reappear. Then, you <b>must hit \"update options\" again</b> in order to save the new value.', 'Scripturizer') . "</li>";
=======
$text .= "<li>" . __('Scripturizer now includes default options settings that will apply automatically. Unlike with previous Plugin versions, you no longer must press the UPDATE OPTIONS button at least once to install the default settings.', 'Scripturizer') . "</li>";
$text .= "<li>" . __('If you mess up one of the following inputs, then clear the field (make it blank), hit "update options," and then the default values will reappear. Then, you <b>must hit "update options" again</b> in order to save the new value.', 'Scripturizer') . "</li>";
>>>>>>> .r329027
$text .= "</ol>";
$text .= "<h2>" . __( 'General Options', 'Scripturizer' ) . "</h2>";
$text .= "<h3>" . __( 'Default Bible Translation', 'Scripturizer' ) . "</h3>";
$text .= "<p>" . sprintf( __( 'The Scripturizer supports any version from the <a href="%s" title="Go to Bible Gateway">Bible Gateway</a> plus ESV, NET, NRSV, and LXX. However, this option must be ESV if you want to use the ESV show/hide verse text option.', 'Scripturizer' ), 'http://www.biblegateway.com/' ) . "</p>";
$text .= "<h3>" . __( 'Scripturizer Mode', 'Scripturizer' ) . "</h3>";
$text .= "<p>" . __('You can use this plugin two ways; it can either scripturize your posts every time someone views them (dynamic), or it can permanently scripturize the posts whenever you create or edit them (static). If (1) you have a medium to high traffic site and (2) you use lots of verse references in your posts, then you probably want to use static mode. Otherwise, most low traffic blog sites should be OK in dynamic mode.', 'Scripturizer') . "</p>";
$text .= "<h4>" . __('Considerations for Static Mode', 'Scripturizer') . "</h4>";
$text .= "<ol>";
$text .= "<li>" . __('If Bible Gateway or any of the other Bible sites change their interface, then your old posts won\'t work right even if you update this plugin (whereas if you use dynamic substitution updating the plugin fixes all old and future posts transparently). This is not a theoretical consideration--the Bible sites have changed their interfaces since this plugin was first developed and they are likely to do so again.', 'Scripturizer') . "</li>";
$text .= "<li>" . __('If you change your default Bible translation then old posts will not be updated to reflect your new preference. Since it only changes posts when you edit them, you need to go back through all your old posts with Bible references and edit them to cause the plugin to take effect', 'Scripturizer') . "</li>";
$text .= "</ol>";
$text .= "<h3>" . __( 'Link CSS Class', 'Scripturizer' ) . "</h3>";
$text .= "<p>" . __('CSS class to apply to scripturized links, for use in optional link styling. Valid class names must begin with a letter or number, and contain only letters, numbers, underscores, and hyphens.', 'Scripturizer') . "</p>";
$text .= "<h3>" . __( 'Open Link in New Tab/Window', 'Scripturizer' ) . "</h3>";
$text .= "<p>" . __('If set to true, adds target="_blank" to scripturized links, causing the links to open in a new window or tab.', 'Scripturizer') . "</p>";
$text .= "<h2>" . __( 'ESV Options', 'Scripturizer' ) . "</h2>";
$text .= "<p>" . __( 'Note: these settings only apply if the Default Translation is set to ESV, or if the inline ad hoc translation is set to ESV.', 'Scripturizer' ) . "</p>";
$text .= "<h3>" . __( 'Show/Hide ESV Text', 'Scripturizer' ) . "</h3>";
$text .= "<p>" . __('Show/hide the text (in addition to the reference) of the ESV in your page?', 'Scripturizer') . "</p>";
$text .= "<p>" . __( 'Note: use of this setting requires an ESV Web Service API Key.', 'Scripturizer' ) . "</p>";
$text .= "<h3>" . __( 'ESV Web Service API Key', 'Scripturizer' ) . "</h3>";
$text .= "<p>" . sprintf( __( 'The ESV Web Service now has a <a href="%1s">keyless option</a>. Therefore, you no longer need your key to use the show/hide ESV text option. Instead, use <b><code>IP</code></b> as your key. However, if you are using shared-IP hosting (i.e. more than one site is hosted on your IP address) you will likely need your own key. To get your free key, follow <a href="%2s">these simple instructions</a>.', 'Scripturizer' ), 'http://www.esv.org/blog/2005/10/web.service.keyless', 'http://www.gnpcb.org/esv/share/services/' ) . "</p>";
$text .= "<h3>" . __( 'ESV Inline Verse Display CSS', 'Scripturizer' ) . "</h3>";
$text .= "<p>" . __( 'This CSS modifies the SPAN tag in which the ESV verse text will be displayed on your page. Do not use any line breaks (that means don\'t push your ENTER key in this box) since the styles are added straight to the span tag.', 'Scripturizer' ) . "</p>";
$text .= "<h3>" . __( 'ESV Web Service Query Options', 'Scripturizer' ) . "</h3>";
$text .= "<p>" . sprintf( __( 'ESV Query options to be appended to the URL query string. Refer to the <a href="%s">ESV Web Service API</a> for more information', 'Scripturizer' ), 'http://www.gnpcb.org/esv/share/services/api/' ) . "</p>";
$text .= "<h2>" . __( 'Credits: "Give honor to whom honor is due"', 'Scripturizer' ) . "</h2>";
$text .= "<h3>" . __( 'Original Scripturizer Perl MovableType Module:', 'Scripturizer' ) . "</h3>";
$text .= "<ul>";
$text .= "<li>" . sprintf( __( '<a href="%s">Dean Peters</a>', 'Scripturizer' ), 'http://www.HealYourChurchWebSite.com/') . "</li>";
$text .= "</ul>";
$text .= "<h3>" . __( 'Additional Credits for Perl Movable Type Module:', 'Scripturizer' ) . "</h3>";
$text .= "<ul>";
$text .= "<li>" . sprintf( __( '<a href="%s">Jonathan Fox</a>', 'Scripturizer' ), 'http://vulpecula.us/~jon/' ) . "</li>";
$text .= "<li>" . sprintf( __( '<a href="%s">Jason Rust</a>', 'Scripturizer' ), 'http://rustyparts.com/blip/' ) . "</li>";
$text .= "<li>" . sprintf( __( '<a href="%s">Joseph Markey</a>', 'Scripturizer' ), 'http://thegreatlands.com/archives/000032.html' ) . "</li>";
$text .= "<li>" . sprintf( __( '<a href="%s">Brian A. Thomas</a>', 'Scripturizer' ), 'http://www.brianathomas.com/archives/2005/01/17/editing-scripturizer/' ) . "</li>";
$text .= "<li>" . sprintf( __( '<a href="%s">Rob Hulson</a>', 'Scripturizer' ), 'http://www.robhulson.com/archives/000073.html' ) . "</li>";
$text .= "</ul>";
$text .= "<h3>" . __( 'Port to PHP WordPress Plugin:', 'Scripturizer' ) . "</h3>";
$text .= "<ul>";
$text .= "<li>" . sprintf( __( '<a href="%s">Glen Davis</a>', 'Scripturizer' ), 'http://www.glenandpaula.com/' ) . "</li>";
$text .= "<li>" . sprintf( __( '<a href="%s">Laurence O\'Donnell</a>', 'Scripturizer' ), 'http://laurenceo.com/' ) . "</li>";
$text .= "</ul>";
$text .= "<h3>" . __( 'WordPress Plugin Documentation and Development', 'Scripturizer' ) . "</h3>";
$text .= "<ul>";
$text .= "<li>" . sprintf( __( '<a href="%s">Chip Bennett</a>', 'Scripturizer' ), 'http://www.chipbennett.net/' ) . "</li>";
$text .= "</ul>";
$text .= "<h3>" . __( 'JavaScript for ESV Show/Hide', 'Scripturizer' ) . "</h3>";
$text .= "<ul>";
$text .= "<li>" . sprintf( __( 'Modified from <a href="%s">this script</a>', 'Scripturizer' ), 'http://lists.evolt.org/archive/Week-of-Mon-20020624/116151.html' ) . "</li>";
$text .= "</ul>";
$text .= "<p>" . sprintf( __ ( 'For more information, refer to the <a href="%s">Scripturizer Development Site</a>.', 'Scripturizer' ), 'http://dev.wp-plugins.org/wiki/Scripturizer' ) . "</p>";
<<<<<<< .mine

if ( $screen_id == $scripturizer_admin_options_hook ) {
		$contextual_help = $text;
	}
	
return $contextual_help;
=======
>>>>>>> .r329027
?>