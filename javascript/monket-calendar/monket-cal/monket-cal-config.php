<?php

	// URL of monket-cal
	define('SITE_DIR', '/monket-cal/');

	// Filesystem location of your .ics calendars
	define('CALENDAR_DIR', '/home/karl/hosting/web/www.monket.net/monket-cal/calendars/');

	// URL of monket-cal-source
	define('MONKET_BASE', '/monket-cal-source/');

	// Filesyatem location of monket source
	define('MONKET_SOURCE', '/home/karl/hosting/web/www.monket.net/monket-cal-source/');

	define('DEFAULT_CALENDAR', 'Home');

	// Calendars to Import from the web (won't be editable)
	$MonketWebCals[] = 'http://ical.mac.com/ical/UK32Holidays.ics';
	$MonketWebCals[] = 'http://www.monket.net/cal/Instructions.ics';
	// Add more as needed

?>
