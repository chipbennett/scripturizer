<?php
/*
 * Plugin Name: Scripturizer
 * Version: 2.2
 * Plugin URI: http://dev.wp-plugins.org/wiki/Scripturizer
 * Description: Changes Bible references to hyperlinks.
 * Author: Dean Peters, ported by Glen Davis, updates by LaurenceO.com
 * Author URI: http://www.healyourchurchwebsite.com/
 * License:       GNU General Public License, v2 (or newer)
 * License URI:  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * 
 * Original PERL MovableType Plugin Copyright 2002-2004 Dean Peters
 * Port to PHP WordPress Plugin Copyright Glen Davis
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *  
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
*/

// you can pick any translation supported by the Bible Gateway, as well as the NRSV, the NET, and the ESV
// should we add Blue Letter Bible and http://www.zhubert.com/greek as original language options somehow? ....
// http://www.blueletterbible.org/cgi-bin/tools/printer-friendly.pl?book=Gen&chapter=1&version=heb
// http://www.blueletterbible.org/cgi-bin/tools/printer-friendly.pl?book=Mat&chapter=1&version=grk
// the interface on zhubert.com is weird - the NT books are numbered instead of named
// we should also take a look at the New American Bible - http://www.nccbuscc.com/nab/bible/index.htm

/**
 * Get avaliable translations
 */
function scripturizer_get_translations() {
	$translations = array(
		'KJ21'    => __( '21st Century King James Version', 'scripturizer' ), // BibleGateway
		'ASV'     => __( 'American Standard Version', 'scripturizer' ), // BibleGateway
		'AMP'     => __( 'Amplified Bible', 'scripturizer' ), // BibleGateway
		'CEB'     => __( 'Common English Bible', 'scripturizer' ), // BibleGateway
		'CEV'     => __( 'Contemporary English Version', 'scripturizer' ), // BibleGateway
		'Darby'   => __( 'Darby Translation', 'scripturizer' ), // BibleGateway
		'DRA'     => __( 'Douay-Rheims 1899 American Edition', 'scripturizer' ), // BibleGateway
		'ESV'     => __( 'English Standard Version', 'scripturizer' ), // BibleGateway
		'GW'      => __( 'GOD\'S WORD Bible', 'scripturizer' ), // BibleGateway
		'GNT'     => __( 'Good News Translation', 'scripturizer' ), // BibleGateway
		'HCSB'    => __( 'Holman Christian Standard Bible', 'scripturizer' ), // BibleGateway
		'KJV'     => __( 'King James Version', 'scripturizer' ), // BibleGateway
		'NASB'    => __( 'New American Standard Bible', 'scripturizer' ), // BibleGateway
		'NCV'     => __( 'New Century Version', 'scripturizer' ), // BibleGateway
		'NIRV'    => __( 'New International Readers\' Version', 'scripturizer' ), // BibleGateway
		'NIV'     => __( 'New International Version', 'scripturizer' ), // BibleGateway
		'NIV1984' => __( 'New International Version 1984', 'scripturizer' ), // BibleGateway
		'NIV2010' => __( 'New International Version 2010', 'scripturizer' ), // BibleGateway
		'NIVUK'   => __( 'New International Version (British Edition)', 'scripturizer' ), // BibleGateway
		'NKJV'    => __( 'New King James Version', 'scripturizer' ), // BibleGateway
		'NLV'     => __( 'New Life Version', 'scripturizer' ), // BibleGateway
		'NLT'     => __( 'New Living Translation', 'scripturizer' ), // BibleGateway
		'MSG'     => __( 'The Message', 'scripturizer' ), // BibleGateway
		'TNIV'    => __( 'Today\'s New International Version', 'scripturizer' ), // BibleGateway
		'WE'      => __( 'Worldwide English New Testament', 'scripturizer' ), // BibleGateway
		'WYC'     => __( 'Wycliffe New Testament', 'scripturizer' ), // BibleGateway
		'YLT'     => __( 'Young\'s Literal Translation', 'scripturizer' ), // BibleGateway
		'NET'     => __( 'New English Translation', 'scripturizer' ),
		'NRSV'    => __( 'New Revised Standard Version', 'scripturizer' )
	);
	return apply_filters( 'scripturizer_translations', $translations );
};
global $scripturizer_translations;
$scripturizer_translations = scripturizer_get_translations();

/**
 * Get available original-language translations
 */
function scripturizer_get_original_translations() {
	$original_translations = array(
		'NA26' => __( 'Nestle-Aland Greek Text 26th edition', 'scripturizer' ),
		'LXX'  => __( 'Septaugint', 'scripturizer' )
	);
	return apply_filters( 'scripturizer_original_translations', $original_translations );
};
global $scripturizer_translations_original;
$scripturizer_translations_original = scripturizer_get_original_translations();

/**
 * Get available non-english translations
 */
function scripturizer_get_non_english_translations() {
	$non_english_translations = array(
		'AMU'      => __( '[AMU] Amuzgo de Guerrero', 'scripturizer' ), // BibleGateway, Amuzgo
		'ALAB'     => __( '[AR] Arab Life Application Bible', 'scripturizer' ), // BibleGateway, Arabic
		'BULG'     => __( '[BG] Bulgarian Bible', 'scripturizer' ), // BibleGateway, Bulgarian
		'BG1940'   => __( '[BG] Bulgarian Bible 1940', 'scripturizer' ), // BibleGateway, Bulgarian
		'CCO'      => __( '[CCO] Chinanteco de Comaltepec', 'scripturizer' ), // BibleGateway, Chinanteco
		'CKW'      => __( '[CKW] Cakchiquel Occidental', 'scripturizer' ), // BibleGateway, Cakchiquel
		'HCV'      => __( '[CPF] Haitian Creole Version', 'scripturizer' ), // BibleGateway, Creole
		'SNC'      => __( '[CS] Slovo na cestu', 'scripturizer' ), // BibleGateway
		'DN1933'   => __( '[DA] New Intenational Reader\'s Version, Danish', 'scripturizer' ), // BibleGateway
		'HOF'      => __( '[DE] Hope For All, German', 'scripturizer' ), // BibleGateway, German 
		'LUTH1545' => __( '[DE] Luther Bible 1545', 'scripturizer' ), // BibleGateway, German 
		'NVI'      => __( '[ES] New International Version, Spanish', 'scripturizer' ), // BibleGateway, Spanish
		'RVA'      => __( '[ES] Reina-Valera Antigua', 'scripturizer' ), // BibleGateway, Spanish
		'RVR1960'  => __( '[ES] Reina-Valera 1960', 'scripturizer' ), // BibleGateway, Spanish
		'RVR1995'  => __( '[ES] Reina-Valera 1995', 'scripturizer' ), // BibleGateway, Spanish
		'CST'      => __( '[ES] Castilian', 'scripturizer' ), // BibleGateway, Spanish
		'TLA'      => __( '[ES] Current Language Translation, Spanish', 'scripturizer' ), // BibleGateway, Spanish
		'LBLA'     => __( '[ES] The New America Bible, Spanish', 'scripturizer' ), // BibleGateway, Spanish 
		'LSG'      => __( '[FR] Louis Segond', 'scripturizer' ), // BibleGateway, French
		'BDS'      => __( '[FR] La Bible du Semeur', 'scripturizer' ), // BibleGateway, French
		'WHNU'     => __( '[GRC] Westcott-Hort New Testament 1881', 'scripturizer' ), // BibleGateway, Greek (Ancient)
		'TR1550'   => __( '[GRC] Stephanus New Testament 1550', 'scripturizer' ), // BibleGateway, Greek (Ancient)
		'TR1894'   => __( '[GRC] Scrivener New Testament 1894', 'scripturizer' ), // BibleGateway, Greek (Ancient)
		'WLC'      => __( '[HE]) The Westminster Leningrad Codex', 'scripturizer' ), // BibleGateway
		'HLGN'     => __( '[HIL] Hiligaynon Bible', 'scripturizer' ), // BibleGateway
		'CRO'      => __( '[HR] Croatian Bible', 'scripturizer' ), // BibleGateway
		'KAR'      => __( '[HU] Hungarian Bible', 'scripturizer' ), // BibleGateway 
		'ICELAND'  => __( '[IS] Icelandic Bible', 'scripturizer' ), // BibleGateway
		'LND'      => __( '[IT] La Nuova Diodati', 'scripturizer' ), // BibleGateway
		'LM'       => __( '[IT] The Word Is Life, Italian', 'scripturizer' ), // BibleGateway
		'JAC'      => __( '[JAC] Jacalteco, Oriental', 'scripturizer' ), // BibleGateway
		'KEK'      => __( '[KEK] Kekchi', 'scripturizer' ), // BibleGateway
		'MAORI'    => __( '[MI] Maori Bible', 'scripturizer' ), // BibleGateway
		'MNT'      => __( '[MK] Macedonian New Testament', 'scripturizer' ), // BibleGateway
		'MVC'      => __( '[MVC] Mam, Central', 'scripturizer' ), // BibleGateway
		'MVJ'      => __( '[MVJ] Mam of Todos Santos Chuchumatan, Guatemala', 'scripturizer' ), // BibleGateway
		'REIMER'   => __( '[NDS] Reimer 2001', 'scripturizer' ), // BibleGateway
		'NGU'      => __( '[NGU] Nahuatl de Guerrero, Mexico', 'scripturizer' ), // BibleGateway
		'HTB'      => __( '[NL] Het Boek', 'scripturizer' ), // BibleGateway
		'DNB1930'  => __( '[NO] Det Norsk Bibelselskap 1930', 'scripturizer' ), // BibleGateway
		'LB'       => __( '[NO] Levande Bibeln', 'scripturizer' ), // BibleGateway
		'OL'       => __( '[PT] O Livro', 'scripturizer' ), // BibleGateway, Portuguese
		'AA'       => __( '[PT] King James Version, Portuguese', 'scripturizer' ), // BibleGateway, Portuguese 
		'QUT'      => __( '[QUT] Quiche, West Central Guatemala', 'scripturizer' ), // BibleGateway 
		'RMNN'     => __( '[RO] Romanian', 'scripturizer' ), // BibleGateway, Romanian
		'TLCR'     => __( '[RO] Romanian', 'scripturizer' ), // BibleGateway, Romanian
		'RUSV'     => __( '[RU] Russian Synodal Version', 'scripturizer' ), // BibleGateway, Russian
		'SZ'       => __( '[RU] Slovo Zhizny', 'scripturizer' ), // BibleGateway, Russian
		'NPK'      => __( '[SK] New American Standard Bible, Slovak', 'scripturizer' ), // BibleGateway 
		'ALB'      => __( '[SQ] Albanian Bible', 'scripturizer' ), // BibleGateway, Albanian
		'SVL'      => __( '[SV] Levande Bibeln', 'scripturizer' ), // BibleGateway
		'SV1917'   => __( '[SV] Svenska 1917', 'scripturizer' ), // BibleGateway
		'SNT'      => __( '[SW] Swahili New Testament', 'scripturizer' ), // BibleGateway, Swahili
		'SND'      => __( '[TL] Ang Salita ng Diyos', 'scripturizer' ), // BibleGateway, Tagalog
		'UKR'      => __( '[UK] Ukrainian Bible', 'scripturizer' ), // BibleGateway, Ukranian
		'USP'      => __( '[USP] Uspanteco', 'scripturizer' ), // BibleGateway, Uspanteco
		'VIET'     => __( '[VI] Vietnamese Bible 1934', 'scripturizer' ), // BibleGateway, Vietnamese
		'CUV'      => __( '[ZH] Chinese Union Version (Traditional)', 'scripturizer' ), // BibleGateway, Chinese
		'CUVS'     => __( '[ZH] Chinese Union Version (Simplified)', 'scripturizer' ) // BibleGateway, Chinese
	);
	return apply_filters( 'scripturizer_non_english_translations', $non_english_translations );
};
global $scripturizer_translations_non_english;
$scripturizer_translations_non_english = scripturizer_get_non_english_translations();

/**
 * Get default options
 */
function scripturizer_get_options_default() {
	$default_options = array(
		'default_translation' => 'ESV',
		'dynamic_substitution' => true,
		'xml_show_hide' => false,
		'esv_key' => 'IP',
		'xml_css' => 'white-space: pre; display: none; padding: 10px; border: dotted blue 1px; border-left: solid blue 5px; color: black;',
		'esv_query_options' => 'action=doPassageQuery&include-passage-references=true&include-short-copyright=true&include-audio-link=false&output-format=plain-text&include-passage-horizontal-lines=false&include-heading-horizontal-lines=false&line-length=60&include-headings=false&include-subheadings=false&include-footnotes=false',
		'libronix' => false,
		'link_css_class' => 'scripturizer',
		'link_target_blank' => false
	);
	return apply_filters( 'scripturizer_default_options', $default_options );
};
global $scripturizer_options_default;
$scripturizer_options_default = scripturizer_get_options_default();


/**
 * Add Plugin options to variable array
 * 
 * @Since 2.0
 * 
 */	
function scripturizer_get_options() {
	// Get the option defaults
	$option_defaults = scripturizer_get_options_default();
	// Globalize the variable that holds the Theme options
	global $scripturizer_options;
	// Parse the stored options with the defaults
	$scripturizer_options = wp_parse_args( get_option( 'plugin_scripturizer_options', array() ), $option_defaults );
	// Return the parsed array
	return $scripturizer_options;
}
global $scripturizer_options;
$scripturizer_options = scripturizer_get_options();

/**
 * Load Scripturizer textdomain
 */
function scripturizer_load_textdomain() {
	load_plugin_textdomain( 'scripturizer', false, dirname( plugin_basename( __FILE__ ) ) ); 
}


/**
 * Scripturizer admin options hook
 */
global $scripturizer_admin_options_hook;

/**
 * Plugin initialization function
 * Defines default options as an array
 * If option settings from earlier versions of the Plugin exist,
 * copies the setting into the options array, and deletes the old option
 * 
 * @Since 2.0
 * 
 */	
function scripturizer_init() {

	// set options equal to defaults
	global $scripturizer_options_default;
	global $scripturizer_options;
	$scripturizer_options = get_option( 'plugin_scripturizer_options' );
	
	$scripturizer_options_initial = ( ! $scripturizer_options ? $scripturizer_options_default : $scripturizer_options );
	
	// if options exist from previous Plugin version, update options array with old option settings
	// and delete old database options
	foreach( $scripturizer_options_initial as $key => $value ) {
		if( $existing = get_option( 'scripturizer_' . $key ) ) {
			$scripturizer_options_initial[$key] = $existing;
			delete_option( 'scripturizer_' . $key );
		}
	}
	
	// Add/update the database options array
	update_option( 'plugin_scripturizer_options', $scripturizer_options_initial );
}

/**
 * Plugin admin options page
 * 
 * @Since 1.55
 * 
 */	
// Function to add admin options page
function scripturizer_menu() {
	global $scripturizer_admin_options_hook;
	$scripturizer_admin_options_hook = add_options_page( __( 'Options', 'scripturizer' ), __( 'Scripturizer', 'scripturizer' ), 'manage_options', 'scripturizer', 'scripturizer_admin_options_page' );
}
// Admin options page markup 
// Moved to separate file for ease of management
function scripturizer_admin_options_page() {
	include_once( 'scripturizer_admin_options_page.php' );
}

// Codex Reference: http://codex.wordpress.org/Settings_API
// Codex Reference: http://codex.wordpress.org/Data_Validation
// Reference: http://ottopress.com/2009/wordpress-settings-api-tutorial/
// Reference: http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
function scripturizer_admin_init(){
	include_once( 'scripturizer_admin_options_init.php' );
}

// Admin options page contextual help markup
// Separate file for ease of management
function scripturizer_contextual_help( $contextual_help, $screen_id, $screen ) {		
	global $scripturizer_admin_options_hook;
	include_once( 'scripturizer_admin_options_help.php' );
	if ( $screen_id == $scripturizer_admin_options_hook ) {
		$contextual_help = $text;
	}
	
return $contextual_help;
}

/**
 * Link to admin options page in Plugin Action links on Manage Plugins page
 * 
 * @Since 2.0
 * 
 */	
function scripturizer_actlinks( $links ) {
	$scripturizer_settings_link = '<a href="options-general.php?page=scripturizer">' . __(  'Settings', 'scripturizer' ) . '</a>'; 
	$links[] = $scripturizer_settings_link;
	return $links; 
}



/**
 * function scripturize()
 * 
 * Split the_content accordingly, and only attempt to add scripture references to text that
 * is inside of anchor tags, pre tags, code tags, [bible] shortcodes, or that is part of a tag attribute.
 * 
 * @Since 1.2
 * 
 */	
function scripturize( $text = '', $bible = NULL ) {
	
	global $scripturizer_options;
	
	if ( ! isset( $bible ) ) {
		$bible = $scripturizer_options['default_translation'];
	}
    // skip everything within a hyperlink, a <pre> block, a <code> block, or a tag
    // we skip inside tags because something like <img src="nicodemus.jpg" alt="John 3:16"> should not be messed with
	$anchor_regex = '<a\s+href.*?<\/a>';
	$pre_regex = '<pre>.*<\/pre>';
	$code_regex = '<code>.*<\/code>';
	$other_plugin_regex= '\[bible\].*\[\/bible\]'; // for the ESV Wordpress plugin (out of courtesy)
	$other_plugin_block_regex='\[bibleblock\].*\[\/bibleblock\]'; // ditto
	$tag_regex = '<(?:[^<>\s]*)(?:\s[^<>]*){0,1}>'; // $tag_regex='<[^>]+>';
	$split_regex = "/((?:$anchor_regex)|(?:$pre_regex)|(?:$code_regex)|(?:$other_plugin_regex)|(?:$other_plugin_block_regex)|(?:$tag_regex))/i";
	$parsed_text = preg_split( $split_regex, $text, -1, PREG_SPLIT_DELIM_CAPTURE );
	$linked_text = '';

	while ( list( $key, $value ) = each( $parsed_text ) ) {
      if ( preg_match( $split_regex, $value ) ) {
         $linked_text .= $value; // if it is an HTML element or within a link, just leave it as is
      } else {
        $linked_text .= scripturizeAddLinks( $value, $bible ); // if it's text, parse it for Bible references
      }
  }
  return $linked_text;
}

/**
 * function scripturizeAddLinks()
 * 
 * Search filtered text from the_content for Scripture references, and if found replace with hyperlink
 * 
 * @Since 1.2
 * 
 */	
function scripturizeAddLinks( $text = '', $bible = NULL ) {

	global $scripturizer_translations;
	global $scripturizer_options;

	if ( ! isset( $bible ) ) {
		$bible = $scripturizer_options['default_translation'];
	}
	// Regular Expression for Book Volume strings
    $volume_regex = '1|2|3|I|II|III|1st|2nd|3rd|First|Second|Third';
	// Regular Expression for OT Book full name strings
    $book_ot_regex  = 'Genesis|Exodus|Leviticus|Numbers|Deuteronomy|Joshua|Judges|Ruth|Samuel|Kings|Chronicles|Ezra|Nehemiah|Esther';
    $book_ot_regex .= '|Job|Psalms?|Proverbs?|Ecclesiastes|Songs? of Solomon|Song of Songs|Isaiah|Jeremiah|Lamentations|Ezekiel|Daniel|Hosea|Joel|Amos|Obadiah|Jonah|Micah|Nahum|Habakkuk|Zephaniah|Haggai|Zechariah|Malachi';
	// Regular Expression for NT Book full name strings
    $book_nt_regex = '|Mat+hew|Mark|Luke|John|Acts?|Acts of the Apostles|Romans|Corinthians|Galatians|Ephesians|Phil+ippians|Colossians|Thessalonians|Timothy|Titus|Philemon|Hebrews|James|Peter|Jude|Revelations?';
	// Separate abbreviations from full names in order to find abbreviated book names followed by a period
	// Regular Expression for OT Book abbreviation strings
    $abbrev_ot_regex  = 'Gen|Ex|Exo|Lev|Num|Nmb|Deut?|Josh?|Judg?|Jdg|Rut|Sam|Ki?n|Chr(?:on?)?|Ezr|Neh|Est';
    $abbrev_ot_regex .= '|Jb|Psa?|Pr(?:ov?)?|Eccl?|Song?|Isa|Jer|Lam|Eze|Dan|Hos|Joe|Amo|Oba|Jon|Mic|Nah|Hab|Zeph?|Hag|Zech?|Mal';
	// Regular Expression for NT Book abbreviation strings
    $abbrev_nt_regex = '|Mat+|Mr?k|Lu?k|Jh?n|Jo|Act|Rom|Cor|Gal|Eph|Col|Phil?|The?|Thess?|Tim|Tit|Phile|Heb|Ja?m|Pe?t|Ju?d|Rev';
	
	// Combine Regular Expressions for OT/NT Book full name strings
	$book_regex = $book_ot_regex . $book_nt_regex;	
	// Combine Regular Expressions for OT/NT Book abbreviation strings
	$abbrev_regex = $abbrev_ot_regex . $abbrev_nt_regex;
	// Combine Regular Expressions for OT/NT Book full-name and abbreviation strings
    $book_regex='(?:'.$book_regex.')|(?:'.$abbrev_regex.')\.?';
	// Regular Expression for Chapter/Verse references
    $verse_regex="\d{1,3}(?::\d{1,3})?(?:\s?(?:[-&,]\s?\d+))*";

	// non Bible Gateway translations are all together at the end to make it easier to maintain the list
	$translation_regex = implode('|',array_keys($scripturizer_translations)); // makes it look like 'NIV|KJV|ESV' etc

	// note that this will be executed as PHP code after substitution thanks to the /e at the end!
    /*
     * Comment this out for now. I'll figure it out later.
     * 
    $passage_ot_regex = '/(?:('.$volume_regex.')\s)?('.$book_ot_regex.')\s('.$verse_regex.')(?:\s?[,-]?\s?((?:'.$translation_regex.')|\s?\((?:'.$translation_regex.')\)))?/e';
    $passage_regex = '/(?:('.$volume_regex.')\s)?('.$book_nt_regex.')\s('.$verse_regex.')(?:\s?[,-]?\s?((?:'.$translation_regex.')|\s?\((?:'.$translation_nt_regex.')\)))?/e';
    */
    $passage_regex = '/(?:('.$volume_regex.')\s)?('.$book_regex.')\s('.$verse_regex.')(?:\s?[,-]?\s?((?:'.$translation_regex.')|\s?\((?:'.$translation_regex.')\)))?/';

    //Use a class so we can access $bible in callback
    //@see http://stackoverflow.com/questions/9550769/passing-additional-arguments-to-preg-replace-callback-using-php-5-2-6
    $regex_handler = new ScripturizeRegexCallback( $bible );
    $text = preg_replace_callback( $passage_regex, array( $regex_handler, 'callback' ), $text );

    return $text; // TODO: make this an array, to return text, plus OT/NT (for original languages)
}

class ScripturizeRegexCallback {
    
    private $translation;

    function __construct( $translation ) {
        $this->translation = $translation;
    }

    public function callback( $matches ) {
        return scripturizeLinkReference( $matches[0], $matches[1], $matches[2], $matches[3], $this->translation );
    }
}

function scripturizeLinkReference( $reference='', $volume='', $book='', $verse='', $translation='', $user_translation='' ) {
	global $scripturizer_options;
	
	$link_target = ( $scripturizer_options['link_target_blank'] ? ' target="_blank"' : '' );
	
    if ( $volume ) {
       $volume = str_replace('III','3',$volume);
	   $volume = str_replace('Third','3',$volume);   
       $volume = str_replace('II','2',$volume);
	   $volume = str_replace('Second','2',$volume);      
       $volume = str_replace('I','1',$volume);
	   $volume = str_replace('First','1',$volume);      
       $volume = $volume{0}; // will remove st,nd,and rd (presupposes regex is correct)
    }
	
	//catch an obscure bug where a sentence like "The 3 of us went downtown" triggers a link to 1 Thess 3
	if ( ! strcmp( strtolower( $book ), "the" ) && $volume=='' ) {
		return $reference;
	}

   if( ! $translation ) {
         if ( ! $user_translation ) {
             $translation = $scripturizer_options['default_translation'];
         } else {
             $translation = $user_translation;
         }
   } else {
       $translation = trim( $translation, ' ()' ); // strip out any parentheses that might have made it this far
   }

   // if necessary, just choose part of the verse reference to pass to the web interfaces
   // they wouldn't know what to do with John 5:1-2, 5, 10-13 so I just give them John 5:1-2
   // this doesn't work quite right with something like 1:5,6 - it gets chopped to 1:5 instead of converted to 1:5-6
   if ( $verse ) {
       $verse = strtok( $verse, ',& ' );
   }

	if ( $scripturizer_options['libronix'] ) {
		$libronix=sprintf( '<a class="%s" %s title="View %s in Logos Bible Software Series X" href="libronixdls:keylink|ref=[en]bible:%s"><img border="0" src="%s/wp-content/LibronixLink.gif"></a>', $scripturizer_options['link_css_class'],  $link_target, trim( "$volume $book $verse" ), htmlentities( trim( "$volume $book $verse" ) ), get_settings( 'siteurl' ) );
	}

   switch ($translation) {
        case 'ESV':
        // note: the ESV could actually support a mouseover reference
        // we could pull it directly from their site and include it in the $title text
        // http://www.gnpcb.org/esv/share/services/api/ for more info
             $link = 'http://www.gnpcb.org/esv/search/?go=Go&amp;q=';
             $title = 'English Standard Version Bible';
             $link = sprintf( '<a class="%s" %s href="%s%s" title="%s">%s</a>', $scripturizer_options['link_css_class'],  $link_target, $link, htmlentities( urlencode( trim( "$volume $book $verse" ) ) ), $title, trim($reference ) );
        # Insert Show/Hide link and include ESV verse text
        if ( $scripturizer_options['xml_show_hide'] ) {
            $link .= getEsvText($volume, $book, $verse);
        }
             break;
        case 'NET':
		// example URL http://www.bible.org/netbible2/index.php?book=gen&chapter=1&verse=1&submit=Lookup+Verse
             $link = 'http://www.bible.org/netbible2/index.php';
             $title = 'New English Translation';
             $chapter = trim(strtok($verse,':'));
             $verses = trim(strtok('-,'));
             $book = scripturizeNETBook($volume.' '.$book);
             $link = sprintf( '<a class="%s" %s href="%s?book=%s&amp;chapter=%s&amp;verse=%s&amp;submit=Lookup+Verse" title="%s">%s</a>', $scripturizer_options['link_css_class'], $link_target, $link, htmlentities( urlencode( $book ) ), $chapter, $verses, $title, trim( $reference ) );
             break;
	case 'NRSV':
	// example URL http://bible.oremus.org/?passage=John+1%3A1&vnum=yes&version=nrsv
	// there is a new interface being developed at http://bible.oremus.org/bible.cgi
             $link = 'http://bible.oremus.org/';
             $title = 'New Revised Standard Version';
			 $options ='&amp;vnum=yes&amp;version=nrsv';
             $link = sprintf( '<a class="%s" %s href="%s?passage=%s%s" title="%s">%s</a>', $scripturizer_options['link_css_class'], $link_target, $link, htmlentities( urlencode( trim( "$volume $book $verse" ) ) ), $options, $title, trim( $reference ) );
             break;
	case 'NA26':
	case 'LXX':
	// example URL http://www.zhubert.com/bible?book=Matthew&chapter=2&verse=3
	// there's also an XML interface to this content - could do a trick like I propose with the ESV
             $link = 'http://www.zhubert.com/bible';
             $title = 'original language at zhubert.com';
			$chapter=zhubertize_chapter($verse);
			$verse=zhubertize_verse($verse);
			$book=zhubertize_book($volume.' '.$book); 
             $link = sprintf( '<a class="%s" %s href="%s?book=%s&amp;chapter=%d&amp;verse=%d" title="%s">%s</a>', $scripturizer_options['link_css_class'], $link_target, $link, htmlentities( urlencode( trim( $book ) ) ), $chapter, $verse, $title, trim( $reference ) );
             break;
        default:
		// Bible Gateway has a ton of translations, so just make it the default instead of checking for each one
		// $translation_regex takes care of ensuring that only valid translations make it this far, anyway
		// api at http://biblegateway.com/usage/linking/
             $link = "http://biblegateway.com/bible?version=$translation&amp;passage=";
             $title = 'Bible Gateway';
             $link = sprintf( '<a class="%s" %s href="%s%s" title="%s">%s</a>', $scripturizer_options['link_css_class'],  $link_target, $link, htmlentities( urlencode( trim( "$volume $book $verse" ) ) ), $title, trim( $reference ) );
             break;
    }
	
	if ( $scripturizer_options['libronix'] ) {
		$link .= $libronix;
	}
	
return $link;
}


function getEsvText($volume, $book, $verse) {
    //Get passage text from ESV web site
    $esvPassage = htmlentities(urlencode(trim("$volume $book $verse")));
    $esvUrl = "http://www.gnpcb.org/esv/share/get/?key=". $scripturizer_options['esv_key'] ."&passage=$esvPassage&". $scripturizer_options['esv_query_options'];
    $esvCh = curl_init($esvUrl);
    curl_setopt($esvCh, CURLOPT_RETURNTRANSFER, 1);
    $esvResponse = curl_exec($esvCh);
    curl_close($esvCh);

// Get rid of triple and double line breaks since WP turns them into <p>'s and thereby kills our <span>
//    $esvResponse = str_replace("\n\n\n", "\n", $esvResponse);
    $esvResponse = str_replace("\n\n", "\n", $esvResponse);

    // Build the show/hide link
    $esvSpanId = 'scripturizer' .mt_rand(); //prefix the rand number with "id" to pass XHTML validation
    $output_dynamic = " <a href=\"javascript://\" onclick=\"showhide('"
        . $esvSpanId
        . "');\">[+/-]</a><span id=\""
        . $esvSpanId
        . "\" style=\""
        . $scripturizer_options['xml_css']
        . "\">"
        . $esvResponse
        . "<br /><a href=\"http://www.esv.org/\"><img src=\"http://www.esv.org/assets/buttons/small.7.png\" alt=\"This text is from the ESV Bible. Visit www.esv.org to learn about the ESV.\" title=\"Visit www.esv.org to learn about the ESV Bible\" width=\"80\" height=\"21\" /></a>"
        . "</span>";
        

    // I don't know why, but I ran into bugs when switching between dynamic and static modes based on how WP parsed the '' in the onclick action.
    // So, for now, I decided to have two different outputs. The static mode escapes the ' by using a double ''.
    // The dynamic output does not need to escape the ' -- (go figure!)
    $output_static = " <a href=\"javascript://\" onclick=\"showhide(''"
        . $esvSpanId
        . "'');\">[+/-]</a><span id=\""
        . $esvSpanId
        . "\" style=\""
        . $scripturizer_options['xml_css']
        . "\">"
        . $esvResponse
        . "<br /><a href=\"http://www.esv.org/\"><img src=\"http://www.esv.org/assets/buttons/small.7.png\" alt=\"This text is from the ESV Bible. Visit www.esv.org to learn about the ESV.\" title=\"Visit www.esv.org to learn about the ESV Bible\" width=\"80\" height=\"21\" /></a>"
        . "</span>";

    if ( $scripturizer_options['dynamic_substitution'] ) {
        return $output_dynamic;
    } else {
        return $output_static;
    }
}

function scripturizeNETBook($book='') {
// need this function because NET Bible needs rigid input
// it's not perfect, so someone who intends to link to the NET Bible must be cautious with their syntax
// Jn 5:1 won't work, for example (must be 'joh' or 'john').
    $book = strtolower(trim($book));
    if (!$book) return '';

    $book = preg_replace('/\s+/', '', $book); //strip whitespace

    switch ($book) {
           case 'judges':
                $book = 'jdg';
                break;
           case 'songofsongs':
           case 'songofsolomon':
           case 'song':
                $book = 'sos';
                break;
           case 'philemon':
                 $book = 'phm';
                 break;
           default:
                   $book = substr($book,0,3);
    }
    return $book;
}

function zhubertize_chapter($reference="") {
	$chapter=strtok($reference,':');
	return $chapter;
}

function zhubertize_verse($reference="") {
	$chapter=strtok($reference,':');
	$verse=strtok(' ,-;');
	if (!$verse) {
		$verse=1;
	}
	return $verse;
}

function zhubertize_book($rawbook) {
	// ultimately I need to restore all abbreviations to the full book.
	// perhaps take the first three letters and expand?
	$book = strtolower(trim($rawbook));
    $book = preg_replace('/\s+/', '', $book); //strip whitespace
	$book= substr($book,0,3);
	switch ($book) {
		case 'gen':
			$book='Genesis';
			break;
		case 'exo':
		case 'ex':
			$book='Exodus';
			break;
		case 'lev':
		case 'lv':
			$book='Leviticus';
			break;
		case 'num':
			$book='Numbers';
			break;
		case 'deu':
		case 'dt':
			$book='Deuteronomy';
			break;
		case 'jos':
			$book='Joshua';
			break;
		case 'jud':
		case 'jd': 
			// could be either Judges or Jude
			// abbreviations for Judges should always have a g in them
			$judges=strpos($rawbook,'g');
			if ($judges===FALSE) {
				$book='Jude';
			} else {
				$book='Judges';
			}
			break;
		case 'rut':
		case 'rth':
			$book='Ruth';
			break;
		case '1sa':
			$book='1 Samuel';
			break;
		case '2sa':
			$book='2 Samuel';
			break;
		case '1ki':
			$book='1 Kings';
			break;
		case '2ki':
			$book='2 Kings';
			break;
		case '1ch':
			$book='1 Chronicles';
			break;
		case '2ch':
			$book='2 Chronicles';
			break;
		case 'ezr':
		case 'ez':
			$book='Ezra';
			break;
		case 'neh':
		case 'nh':
			$book='Nehemiah';
			break;
		case 'est':
			$book='Esther';
			break;
		case 'job':
		case 'jb':
			$book='Job';
			break;
		case 'psa':
		case 'ps':
			$book='Psalms';
			break;
		case 'pro':
		case 'pr':
			$book='Proverbs';
			break;
		case 'ecc':
			$book='Qoheleth';
			break;
		case 'son':
		case 'sos':
			$book='Canticle of Canticles';
			break;
		case 'isa':
		case 'is':
			$book='Isaiah';
			break;
		case 'jer':
			$book='Jeremiah';
			break;
		case 'eze':
		case 'ez':
			$book='Ezekiel';
			break;
		case 'dan':
		case 'dn':
			$book='Daniel';
			break;
		case 'hos':
			$book='Hosea';
			break;
		case 'joe':
			$book='Joel';
			break;
		case 'amo':
		case 'am':
			$book='Amos';
			break;
		case 'oba':
		case 'ob':
			$book='Obadiah';
			break;
		case 'jon':
			$book='Jonah';
			break;
		case 'mic':
			$book='Micah';
			break;
		case 'nah':
			$book='Nahum';
			break;
		case 'hab':
			$book='Habakkuk';
			break;
		case 'zep':
			$book='Zephaniah';
			break;
		case 'hag':
			$book='Haggai';
			break;
		case 'zec':
			$book='Zechariah';
			break;
		case 'mal':
			$book='Malachi';
			break;
		case 'mat':
		case 'mt':
			$book='Matthew';
			break;
		case 'mar':
		case 'mk':
			$book='Mark';
			break;
		case 'luk':
		case 'lk':
			$book='Luke';
			break;
		case 'joh':
		case 'jn':
			$book='John';
			break;
		case 'act':
			$book='Acts';
			break;
		case 'rom':
		case 'rm':
			$book='Romans';
			break;
		case '1co':
			$book='1 Corinthians';
			break;
		case '2co':
			$book='2 Corinthians';
			break;
		case 'gal':
			$book='Galatians';
			break;
		case 'eph':
			$book='Ephesians';
			break;
		case 'phi':
			$book='Philippians';
			break;
		case 'col':
			$book='Colossians';
			break;
		case '1th':
			$book='1 Thessalonians';
			break;
		case '2th':
			$book='2 Thessalonians';
			break;
		case '1ti':
			$book='1 Timothy';
			break;
		case '2ti':
			$book='2 Timothy';
			break;
		case 'tit':
		case 'ti':
			$book='Titus';
			break;
		case 'phi':
			$book='Philemon';
			break;
		case 'heb':
			$book='Hebrews';
			break;
		case 'jam':
			$book='James';
			break;
		case '1pe':
			$book='1 Peter';
			break;
		case '2pe':
			$book='2 Peter';
			break;
		case '1jo':
			$book='1 John';
			break;
		case '2jo':
			$book='2 John';
			break;
		case '3jo':
			$book='3 John';
			break;
		// jude is handled up by judges
		case 'rev':
			$book='Revelation';
			break;
		default:
			$book=$rawbook;
	}
	return $book;
}

function scripturizePost($post_ID) {
    global $wpdb;
	
	$tableposts=$wpdb->posts;

    $postdata=$wpdb->get_row("SELECT * FROM $tableposts WHERE ID = '$post_ID'");

    $content = scripturize($postdata->post_content);

    $wpdb->query("UPDATE $tableposts SET post_content = '$content' WHERE ID = '$post_ID'");
    
    return $post_ID;
}

function scripturizeComment($comment_ID) {
    global $wpdb;
    
	$tablecomments=$wpdb->comments;

    $postdata=$wpdb->get_row("SELECT * FROM $tablecomments WHERE ID = '$comment_ID'");

    $content = scripturize($postdata->comment_content);

    $wpdb->query("UPDATE $tablecomments SET comment_content = '$content' WHERE ID = '$comment_ID'");
    
    return $comment_ID;
}

if ( ! function_exists( 'esvShowHideHeader' ) ) {

    function esvShowHideHeader() {

        $content = "
            <script language=\"javascript\" type=\"text/javascript\">
            <!-- I modified this script: http://lists.evolt.org/archive/Week-of-Mon-20020624/116151.html to get the following
            var state = 'none';

            function showhide(layer_ref) {

            if (state == 'block') {
            state = 'none';
            }
            else {
            state = 'block';
            }
            if (document.all) { //IS IE 4 or 5 (or 6 beta)
            eval( \"document.all.\" + layer_ref + \".style.display = state\");
            }
            if (document.layers) { //IS NETSCAPE 4 or below
            document.layers[layer_ref].display = state;
            }
            if (document.getElementById && !document.all) {
            maxwell_smart = document.getElementById(layer_ref);
            maxwell_smart.style.display = state;
            }
            }
            //-->
            </script>";
    echo $content;
    }
}

##### ADD ACTIONS AND FILTERS
// Load Plugin textdomain
add_action( 'plugins_loaded', 'scripturizer_load_textdomain' );
// Initialize Plugin options
add_action('activate_scripturizer/scripturizer.php', 'scripturizer_init' );
// add the admin settings and such
add_action('admin_init', 'scripturizer_admin_init');
// Load the Admin Options page
add_action('admin_menu', 'scripturizer_menu');
// Add contextual help to Admin Options page
add_action('contextual_help', 'scripturizer_contextual_help', 10, 3);
// Add a Settings link to Plugin Action Links on Manage Plugins page
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'scripturizer_actlinks', 10, 1 );
// Load the javascript if the xml show/hide option is turned on
if ( isset( $scripturizer_options['xml_show_hide'] ) && $scripturizer_options['xml_show_hide'] ) { 
    add_action('wp_head', 'esvShowHideHeader', 10);
    add_action('admin_head', 'esvShowHideHeader', 5);
}
// Update content per Dynamic/Static mode setting
if ( isset( $scripturizer_options['dynamic_substitution'] ) && $scripturizer_options['dynamic_substitution'] ) {
	add_filter('the_content','scripturize');
	add_filter('comment_text','scripturize');
} else {
	add_action('publish_post','scripturizePost');
	add_action('comment_post','scripturizeComment');
	add_action('edit_post','scripturizePost');
	add_action('edit_comment','scripturizeComment');
	// note, adding the edit_post action guarantees that if you add or change a scripture reference the link will be inserted
	// HOWEVER, it will prevent you from removing a link you don't want!
}
?>