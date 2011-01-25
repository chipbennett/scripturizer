<?php
// This file is a test suite for the scripturizer plugin. 
// Just place it in the same directory as scripturizer.php and load it
// to change the number of tests run, append ?n=XXX to the end of the url
// http://www.example.com/scripturize_test.php?n=1000 
// will run 1,000 tests
// this would only be useful when trying to determine the timing effects of regular expressions or other code changes

include('scripturizer.php');
 
// these are dummy functions necessary to prevent errors since we're not actually running as part of Wordpress
function get_settings($string) {
	return 'http://localhost';
	}
function get_option($string) {
	switch ($string) {
		case 'scripturizer_default_translation':
			return 'NIV';
		case 'scripturizer_dynamic_substitution':
		case 'scripturizer_libronix':
			return TRUE;
        case 'scripturizer_esv_key':
			return 'IP';
		case 'scripturizer_xml_css':
			return '';
        case 'scripturizer_esv_query_options':
			return '&action=doPassageQuery&include-passage-references=true&include-short-copyright=true&include-audio-link=false&output-format=plain-text&include-passage-horizontal-lines=false&include-heading-horizontal-lines=false&line-length=60&include-headings=false&include-subheadings=false&include-footnotes=false';
		case 'scripturizer_xml_show_hide':	
			return TRUE;
		default:
			return FALSE;
	}
}
function update_option($string,$string2) {
	return true;
}
function add_filter($x,$y) {} 
function add_action($x,$y) {}

// this helps time the script - useful when evaluating changes to the regular expressions
function microtime_float()
{
   list($usec, $sec) = explode(" ", microtime());
   return ((float)$usec + (float)$sec);
}
?>
<HTML><HEAD><TITLE>Testing Scripturizer Plugin</TITLE></HEAD>
<BODY>
<?php
ob_start();
?>
<table>
<tr>
<td  colspan="3">
<H1>Where To Look When You</H1>
</td>
</tr>
<tr><td valign="top">
<H3>Need Forgiveness</H3>
<ul>
<li>I John 1:9
<li>I John 3:5
<li>Ephesians 2:8-9
<li>Romans 8:1
<li>Isaiah 1:18
</ul>
<H3>Need Assurance of Salvation</H3>
<ul>
<li>I John 5:13
<li>John 3:36
<li>Romans 8:16
</ul>
<H3>Feel Abandoned By God</H3>
<ul>
<li>Deuteronomy 31:6
<li>Deuteronomy 4:31
<li>Psalm 91:14, 15
<li>Psalm 37:25
<li>I Samuel 12:22
</ul>
<H3>Need Healing</H3>
<ul>
<li>Exodus 15:26
<li>Psalm 103:3
<li>Jeremiah 17:14
<li>Hebrews 13:8
<li>III John 2
<li>Jeremiah 30:17
</ul>
<H3>Need Guidance</H3>
<ul>
<li>Psalm 27:11
<li>James 1:5-8
<li>Psalm 32:8
<li>Romans 8:14
<li>II Corinthians 5:7
<li>Proverbs 3:5,6
</ul>
</td><td valign="top" bgcolor="lightyellow">
<H3>Wrestle With Grief</H3>
<ul>
<li>I Thessalonians 4:13, 14
<li>Isaiah 41:10
<li>II Thessalonians 2:16, 17
<li>Matthew 5:4
<li>II Corinthians 1:3, 4
<li>II Corinthians 4:6-9
<li>Psalm 23:4
<li>Revelation 21:4
<li>Psalm 34:18
<li>Psalm 61:2
</ul>
<H3>Struggle With Alcoholism And Drugs</H3>
<ul>
<li>Romans 13:1
<li>Proverbs 20:1
<li>Proverbs 23:29-32
<li>I Corinthians 6:10
<li>I Corinthians 3:16, 17
<li>Titus 3:3-5
<li>Romans 13:14
<li>John 8:36
<li>I Corinthians 6:20
</ul>
<H3>Wrestle With Temptation</H3>
<ul>
<li>I Corinthians 10:12-13
<li>James 4:7
</ul>
</td><td valign="top">
<H3>Need To Repent</H3>
<ul>
<li>Hebrews 10:38
<li>Luke 9:62
<li>II Peter 3:9
<li>Isaiah 55:7
<li>Jeremiah 3:22
</ul>
<H3>Feel Lonely</H3>
<ul>
<li>Psalm 139:7
<li>John 14:23
<li>Deuteronomy 31:6
<li>John 14:16
</ul>
<H3>Need to Control Your Thoughts</H3>
<ul>
<li>Romans 12:1-2
<li>2 Corinthians 10:5
<li>Psalm 139:23
<li>Psalms 94:11; 1:1, 2
<li>Philippians 4:8
</ul>
<H3>Need Encouragement</H3>
<ul>
<li>Proverbs 16:3
<li>Psalm 10:17 
<li>Psalm 119:143
</ul>
<H3>Feel Anxious</H3>
<ul>
<li>Deuteronomy 31:6
<li>Deuteronomy 33:27
<li>Ephesians 6:13
<li>Hebrews 13:5-6
<li>Matthew 12:22-26
</ul>
</td></tr></table>
<p></p>
<hr>
<H3>Test Cases</H3>
<p>Does a single ' really botch things up? I have been told it does, but this test doesn't validate that...</p>
<H4>These Should Not Be Scripturized</H4>
<p>I read once about <a href="">Genesis 1:1</a> (already a link) <img src='' alt='Genesis 1:1' width="20" height="20"> (a reference in an ALT tag).</p>
<pre>All this should be untouched due to preformatting: John 3:16, Mal 2.</pre>
<code>And this is in a code block: Matthew 1:1-18, ESV</code>
<p>[bible]John 3:16[/bible]This is text that should be enclosed by the ESV wordpress plugin and thus not affected.</p>
<p>The 3 of us went downtown, and the 3 of us had a great time.</p>
<H4>These Should Be Scripturized</H4>
 <p>I also read about Genesis 3:13-15 (CEV) ,as well as Genesis 40:3, NET (Gen 3:4) also see Gen. 15:1 and 1st Tim 2 and 2 Kings 4:3, NET.  I should also investigate John 1:1 (NRSV).</p>
<ul>
<li> Matthew 4:5, NA26
<li> Mat 4:5, NA26
<li> Matt 4:5
<li> Isaiah 3:2, LXX
<li> 1st Kings 1:1, LXX
<li> Mark 3, LXX
<li> Zechariah 3, NOTRANS
<li> III Jn 2:1 (GNT)
<li> III Jn 2:1 (NLT)
<li> 2nd Chron. 5 - NLT
<li> Ex 2, MSG '
<li> Ex 2, NRSV
<li> Hosea 5:3,4
<li> Matthew 19:5-7, 9, 20 & 21.
<li> Matthew 19:5-7, 9, 20 & 21 (NET)
<li> Matthew 19:5-7, 9, 20 & 21 (KJV).
<li> Micah 1:8, HCSB
<li> Acts 1:8, Darby
<li> Song of Songs 1:3, NRSV 
<li> Song of Songs 1:3, NET
<li> Song of Songs 1, NRSV 
<li> Song of Songs 1, NET
<li> Phil 1:1
<li> 2 The 1:2
</ul>
<H4>Undefined Behavior</H4>
< I wonder < what Gen 5:3, ESV this > will do < (or for that matter, this: Gen 5:3, ESV)
<?php
$text=ob_get_clean();

if (isset($_GET['n'])) {
	$n=$_GET['n'];
} else {
		$n=100;
}
$time_start = microtime_float();
for ($i=0;$i<$n;$i++) {
	$output=scripturize($text);
}
$time_end = microtime_float();
$time_elapsed=$time_end-$time_start;
$average_time=$time_elapsed/$n;
?>
<H2>Text Scripturized <?php echo $n;?> Times In <?php echo $time_elapsed;?> Seconds</H2>
<H3>Average Time: <?php echo $average_time;?> Seconds</H3>
<?php echo $output;?>
<hr>
<H2>This Test Was Conducted Using The Following Code:</H2>
<?php
// if your edits don't seem to be having any effect, be sure that you're using the version of scripturizer.php that you think you are
highlight_file('scripturizer.php');
?>
</BODY>
</HTML>