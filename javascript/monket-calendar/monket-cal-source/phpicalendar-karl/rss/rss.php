<?php

define('BASE', '../');
include(BASE.'functions/ical_parser.php');

if ($enable_rss != 'yes') {
	die ("RSS feeds are not enabled on this site.");
}

$default_path = 'http://'.$HTTP_SERVER_VARS['SERVER_NAME'].':'.$HTTP_SERVER_VARS['SERVER_PORT'].substr($HTTP_SERVER_VARS['PHP_SELF'],0,strpos($HTTP_SERVER_VARS['PHP_SELF'],'/rss/'));
$start_week_time = strtotime(dateOfWeek($getdate, $week_start_day));
$end_week_time = $start_week_time + (6 * 25 * 60 * 60);
$start_week = localizeDate($dateFormat_week, $start_week_time);
$end_week =  localizeDate($dateFormat_week, $end_week_time);
$parse_month = date ("Ym", strtotime($getdate));
$rssview = $HTTP_GET_VARS['rssview'];
$cal_displayname = str_replace("32", " ", $cal);
$events_week = 0;

// calculate a value for Last Modified and ETag
$filemod = filemtime("../calendars/$cal.ics");
$filemodtime = date("r", $filemod);

//send relevant headers
header ("Last-Modified: $filemodtime");
header ("ETag:\"$filemodtime\"");

// checks the user agents headers to see if they kept track of our
// stuff, if so be nice and send back a 304 and exit.

if ( ($_SERVER['HTTP_IF_MODIFIED_SINCE'] == $filemodtime) || ($_SERVER['HTTP_IF_NONE_MATCH'] == $filemodtime))
{
	header ("HTTP/1.1 304 Not Modified");
	exit;
}

if ($rssview == "day") {
	$theview = $day_lang;
} elseif ($rssview == "week") {
	$theview = $week_lang;
} elseif ($rssview == "month") {
	$theview = $month_lang;
}


$rss = 	"<?xml version=\"1.0\" encoding=\"UTF-8\"?>"."\n";
$rss .= '<!DOCTYPE rss PUBLIC "-//Netscape Communications//DTD RSS 0.91//EN" "http://my.netscape.com/publish/formats/rss-0.91.dtd">'."\n";
$rss .= '<rss version="0.91">'."\n";
$rss .= '<channel>'."\n";
$rss .= '<title>'.$cal_displayname.' - '.$theview.'</title>'."\n";
$rss .= '<link>'.htmlspecialchars ("$default_path").'</link>'."\n";
$rss .= '<description>'.$cal_displayname.' '.$calendar_lang.' - '.$theview.'</description>'."\n";
$rss .= '<language>'.$rss_language.'</language>'."\n";
$rss .= '<copyright>Copyright 2002, '.htmlspecialchars ("$default_path").'</copyright>'."\n";


if ($rssview == 'day') {
	if (isset($master_array[($getdate)]) && sizeof($master_array[($getdate)]) > 0) {
		foreach ($master_array[("$getdate")] as $event_times) {
			foreach ($event_times as $val) {
				$event_start 	= @$val["event_start"];
				$event_start 	= date ($timeFormat, @strtotime ("$event_start"));
				$event_text 	= stripslashes(urldecode($val["event_text"]));
				$event_text 	= strip_tags($event_text, '<b><i><u>');
				$event_text 	= word_wrap($event_text, 21, $tomorrows_events_lines);
				$description 	= stripslashes(urldecode($val["description"]));
				$description 	= strip_tags($description, '<b><i><u>');
				$rss_title		= htmlspecialchars ("$event_start $event_text");
				$rss_link		= htmlspecialchars ("$default_path/day.php?getdate=$getdate&cal=$cal");
				$rss_description	= htmlspecialchars ("$description");
				$rss .= '<item>'."\n";
				$rss .= '<title>'.$rss_title.'</title>'."\n";
				$rss .= '<link>'.$rss_link.'</link>'."\n";
				$rss .= '<description>'.$rss_description.'</description>'."\n";
				$rss .= '</item>'."\n";
				$events_week++;
			}
		}
	}
	if ($events_week < 1) {
		$rss .= '<item>'."\n";
		$rss .= '<title>'.$no_events_day_lang.'</title>'."\n";
		$rss .= '<link>'.htmlspecialchars ("$default_path").'</link>'."\n";
		$rss .= '</item>'."\n";
	}
}

$thisdate = $start_week_time;
$i = 0;
if ($rssview == "week") {
	do {
		$getdate = date("Ymd", $thisdate);
		$dayofweek = strtotime ($getdate);
		$dayofweek = localizeDate ($rss_week_date, $dayofweek);
		if (isset($master_array[($getdate)]) && sizeof($master_array[($getdate)]) > 0) {
			foreach ($master_array[("$getdate")] as $event_times) {
				foreach ($event_times as $val) {
					$event_start 	= @$val["event_start"];
					$event_start 	= date ($timeFormat, @strtotime ("$event_start"));
					$event_text 	= stripslashes(urldecode($val["event_text"]));
					$event_text 	= strip_tags($event_text, '<b><i><u>');
					$event_text 	= word_wrap($event_text, 21, $tomorrows_events_lines);
					$description 	= stripslashes(urldecode($val["description"]));
					$description 	= strip_tags($description, '<b><i><u>');
					$rss_title		= htmlspecialchars ("$dayofweek: $event_text");
					$rss_link		= htmlspecialchars ("$default_path/day.php?getdate=$getdate&cal=$cal");
					$rss_description	= htmlspecialchars ("$dayofweek $event_start: $description");
					$rss .= '<item>'."\n";
					$rss .= '<title>'.$rss_title.'</title>'."\n";
					$rss .= '<link>'.$rss_link.'</link>'."\n";
					$rss .= '<description>'.$rss_description.'</description>'."\n";
					$rss .= '</item>'."\n";
					$events_week++;
				}
			}
		}
		if (($events_week < 1) && ($i == 6)) {
			$rss .= '<item>'."\n";
			$rss .= '<title>'.$no_events_week_lang.'</title>'."\n";
			$rss .= '<link>'.htmlspecialchars ("$default_path").'</link>'."\n";
			$rss .= '</item>'."\n";
		}
		$thisdate = ($thisdate + (25 * 60 * 60));
		$i++;
	} while ($i < 7);
}

if ($rssview == "month") {
	foreach($master_array as $key => $new_val2) {
										
		// Pull out only this months
		ereg ("([0-9]{6})([0-9]{2})", $key, $regs);
		if ($regs[1] == $parse_month) {
			$getdate = $key;
			$dayofmonth = strtotime ($getdate);
			$dayofmonth = localizeDate ($rss_month_date, $dayofmonth);
			
			// Pull out each day
			foreach ($new_val2 as $new_val) {
				
				// Pull out each time
				foreach ($new_val as $new_key2 => $val) {
					if ($val["event_text"]) {
						$event_start 	= @$val["event_start"];
						$event_start 	= date ($timeFormat, @strtotime ("$event_start"));
						$event_text 	= stripslashes(urldecode($val["event_text"]));
						$event_text 	= strip_tags($event_text, '<b><i><u>');
						$event_text 	= word_wrap($event_text, 21, $tomorrows_events_lines);
						$description 	= stripslashes(urldecode($val["description"]));
						$description 	= strip_tags($description, '<b><i><u>');
						$rss_title		= htmlspecialchars ("$dayofmonth: $event_text");
						$rss_link		= htmlspecialchars ("$default_path/day.php?getdate=$getdate&cal=$cal");
						$rss_description	= htmlspecialchars ("$dayofmonth $event_start: $description");
						$rss .= '<item>'."\n";
						$rss .= '<title>'.$rss_title.'</title>'."\n";
						$rss .= '<link>'.$rss_link.'</link>'."\n";
						$rss .= '<description>'.$rss_description.'</description>'."\n";
						$rss .= '</item>'."\n";
						$events_week++;
					}
							
					if ($events_week < 1) {
						$rss .= '<item>'."\n";
						$rss .= '<title>'.$no_events_month_lang.'</title>'."\n";
						$rss .= '<link>'.htmlspecialchars ("$default_path").'</link>'."\n";
						$rss .= '</item>'."\n";
					}
				}
			}
		}
	}
}


$rss .= '</channel>'."\n";
$rss .= '</rss>'."\n";

header ("Content-Type: text/xml");

echo "$rss";

?>
