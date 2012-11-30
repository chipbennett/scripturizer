=== Scripturizer ===
Tags: bible, scripture
Contributors: xaglen, laurenceo, chipbennett
Donate Link: 
Tested up to: 3.5
Requires at least: 3.1
Stable tag: 2.2

Scripturizer will convert Bible references in your posts and comments into hyperlinks to online Bibles.

== Description ==

Scripturizer will convert Bible references in your posts and comments into hyperlinks to online Bibles.

For example, it will change John 3:16 into something like
<a href="http://biblegateway.com/passage/?search=ROM+6:23&version=46;">John 3:16</a>

Online Bibles currently supported are:

* <a href="http://www.biblegateway.com/">Bible Gateway</a>
* <a href="http://www.bible.org/">The NET Bible</a>
* <a href="http://www.gnpcb.org/esv/">The English Standard Version</a>
* <a href="http://bible.oremus.org/" title="the New Revised Standard Version">Oremus Bible Browser</a>
* <a href="http://www.zhubert.com">Septuagint Greek OT / Nestle-Aland 26th ed. Greek NT</a>

You can customize the plugin to use your favorite Bible translation or to include links useful for users
of Logos Bible Software by editing scripturizer.php and adjusting the configuration parameters near the
top of the file.

== Other Notes ==

*********************************************************************************************
CREDITS
*********************************************************************************************

[Glen Davis] (www.glenandpaula.com)

This plugin was derived from [Heal Your Church Website's Scripturizer plugin for Movable Type](http://www.healyourchurchwebsite.com/archives/001176.shtml). Additional information is in credits.txt

*********************************************************************************************
FILES
*********************************************************************************************

* scripturizer.php
* LibronixLink.gif
* scripturizer_test.php
* readme.txt
* credits.txt

*********************************************************************************************
DOCUMENTATION AND REPORTING ERRORS
*********************************************************************************************

[Plugin Documentation](http://dev.wp-plugins.org/wiki/Scripturizer)
[Bug Reports](http://dev.wp-plugins.org/newticket)

== Installation ==

Basic:

1. Download scripturizer.php and put it in your Wordpress plugins directory:
 - Assuming Wordpress is installed in http://yoursite/wordpress
 - http://yoursite/wordpress/wp-content/plugins
2. Activate the plugin using the Wordpress administration interface
 - From the Wordpress Dashboard: Manage / Plugins
3. View the Plugin Options page to change the default translation (initially NIV) and other basic options:
 - Default translation:
     - Translation to which scripturizer defaults if no translation is detected in the Scripture reference
 - Dynamic substitution
     - Controls whether scripturizer adds links:
         - Each time a post is viewed (dynamic)
         - At the time a post is created or edited (static, permanently edits post)
     - Note that Dynamic Substitution allows for changes in default translation as well as changes in linked website interfaces
 - Libronix Support
     - Determines whether or not scripturizer adds Libronix Links
         - http://www.logos.com/support/lbs/weblinking

Libronix Users:

1. download LibronixLink.gif and put it in your wp-content directory.
2. download scripturizer.php and put it in your wp-content/plugins directory.
3. change define('LIBRONIX_LINKS',FALSE) to TRUE
4. change the other defines, if you are so inclined
5. activate the plugin using the Wordpress administration interface

Developer:

1. If you see a feature you want to add (or a bug you want to fix), download scripturizer.php to a web-accessible directory
2. Also download scripturizer_test.php and put it in the same directory
3. Hack away and check your work by viewing scripturizer_test.php in your browser
4. Submit any improvements at http://www.wp-plugins.org/ (also submit improvements to the admittedly rudimentary scripturizer_test.php)

== Frequently Asked Questions ==

= How Scripturizer Recognizes Scripture References =

1. Scripturizer will recognize Scripture references that conform to somewhat loose conventions:
 - [Book] [Chapter]
 - [Book] [Chapter]:[Verse]
 - [Book] [Chapter]:[Verse]-[verse]
2. Where [Book] can be a full name or an abbreviation, with prefix as applicable. Note that prefixes can be in several formats:
 - 1, 2, 3
 - I, II, II
 - First, Second, Third
 - 1st, 2nd, 3rd
3. Scripturizer will recognize most common book abbreviations.
 - NOTE: All abbreviated references to Judges should include the letter 'g' in order to differentiate between Judges and Jude.
4. Scripturizer can also recognize translation acronyms following Scripture references:
 - [Reference] [Translation]
 - [Reference] ([Translation])

= How Scripturizer Determines Scripture Translation =

1. If no translation reference is found, Scripturizer uses the default translation (see Section 5.1 above)
2. If a recognized translation reference is found, Scripturizer uses the referenced translation. Recognized translations/acronyms include the following:
 - NIV (New International Version)
 - NASB (New American Standard Bible)
 - HCSB (Holman Christian Standard Bible)
 - AMP (Amplified Version)
 - NLT (New Living Translation)
 - KJV (King James Version)
 - CEV (Contemporary English Version)
 - NKJV (New King James version)
 - KJ21 (21st Century King James Version)
 - ASV (American Standard Version)
 - WE (Worldwide English New Testament)
 - YLT (Young's Literal Translation)
 - DARBY (Darby Translation)
 - Darby (Darby Translation)
 - WYC (Wycliffe New Testament)
 - NIV-UK (New International Version - United Kingdom)
 - MSG (The Message Bible)
 - NIRV (New International Reader's Version)
 - NRSV (New Revisted Standard Version)
 - NET (NET Bible)
 - ESV (English Standard Version)
 - NA26 (Nestle-Aland 26th edition Greek New Testament)
 - LXX (Septuagint Greek Old Testament)

 == Screenshots ==

N/A

== Changelog ==

= 2.1 [2010.12.29] =
* Completely rewrote settings to use WordPress Settings API
* Added contextual help
* Added CSS class to HTML anchor tag, for formatting reference links
* Added support for all BibleGateway translations, including non-English

= 1.6 [2010.12.16] =
* Updates to readme.txt file.
* No functional changes (yet)

= 1.55 =
* N/A

= 1.2 =
* N/A

= 1.0 =
* Original release.

== Upgrade Notice ==

= 2.1 =
* Major functional rewrite, to bring Plugin current with WordPress

= 1.6 =
* Updates to readme.txt file. No functional changes (yet).