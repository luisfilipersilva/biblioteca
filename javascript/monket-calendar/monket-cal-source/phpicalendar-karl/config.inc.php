<?php

// Configuration file for PHP iCalendar 1.1
//
// To set values, change the text between the single quotes
// Follow instructions to the right for detailed information

$style_sheet 			= 'silver';			// Themes support - silver, red, green, orange, grey, tan
$default_view 			= 'month';			// Default view for calendars = 'day', 'week', 'month', 'year'
$minical_view 			= 'current';		// Where do the mini-calendars go when clicked? = 'day', 'week', 'month', 'current'
$default_cal 			= $ALL_CALENDARS_COMBINED;		// Exact filename of calendar without .ics. Or set to $ALL_CALENDARS_COMBINED to open all calenders combined into one.
$language 				= 'English';		// Language support - 'English', 'Polish', 'German', 'French', 'Dutch', 'Danish', 'Italian', 'Japanese', 'Norwegian', 'Spanish', 'Swedish', 'Portuguese', 'Catalan', 'Traditional_Chinese', 'Esperanto', 'Korean'
$week_start_day 		= 'Monday';			// Day of the week your week starts on
$day_start 				= '0700';			// Start time for day grid
$day_end				= '2300';			// End time for day grid
$gridLength 			= '15';				// Grid distance in minutes for day view, multiples of 15 preferred
$num_years 				= '3';				// Number of years to display in 'Jump to'
$month_event_lines 		= '0';				// Number of lines to wrap each event title in month view, 0 means display all lines.
$tomorrows_events_lines = '0';				// Number of lines to wrap each event title in the 'Tommorrow's events' box, 0 means display all lines.
$allday_week_lines 		= '0';				// Number of lines to wrap each event title in all-day events in week view, 0 means display all lines.
$week_events_lines 		= '0';				// Number of lines to wrap each event title in the 'Tommorrow's events' box, 0 means display all lines.
$timezone 				= '';				// Set timezone. Read TIMEZONES file for more information
$tmp_dir				= '/tmp';			// The temporary directory on your system (/tmp is fine for UNIXes including Mac OS X)
$calendar_path 			= CALENDAR_DIR;				// Leave this blank on most installs, place your full path to calendars if they are outside the phpicalendar folder.
$second_offset			= '0';				// The time in seconds between your time and your server's time.
$bleed_time				= '';				// This allows events past midnight to just be displayed on the starting date, only good up to 24 hours. Range from '0000' to '2359'. Is automatically set to $day_start if left blank.
$cookie_uri				= ''; 				// The HTTP URL to the PHP iCalendar directory, ie. http://www.example.com/phpicalendar -- AUTO SETTING -- Only set if you are having cookie issues.
$download_uri			= ''; 				// The HTTP URL to your calendars directory, ie. http://www.example.com/phpicalendar/calendars -- AUTO SETTING -- Only set if you are having subscribe issues.
$default_path			= 'http://www.example.com/phpicalendar'; 						// The HTTP URL to the PHP iCalendar directory, ie. http://www.example.com/phpicalendar

// Yes/No questions --- 'yes' means Yes, anything else means no. 'yes' must be lowercase.
$save_parsed_cals 		= 'yes';			// Recommended 'yes'. Saves a copy of the cal in /tmp after it's been parsed. Improves performence.
$display_custom_goto 	= 'no';				// In the 'Jump To' box, display the custom 'go to day' box.
$display_ical_list 		= 'yes';			// In the 'Jump To' box, display the pop-up menu with the list of all calendars in the $calendar_path directory.
$allow_webcals 			= 'no';				// Allow http:// and webcal:// prefixed URLs to be used as the $cal for remote viewing of "subscribe-able" calendars. This does not have to be enabled to allow specific ones below.
$this_months_events 	= 'yes';			// Display "This month's events" at the bottom off the month page.
$use_color_cals 		= 'yes';			// Display each calendar in the pop-up as a different color.
$daysofweek_dayview 	= 'no';				// Display the days of the week in day.php view.
$enable_rss				= 'yes';			// Enable RSS access to your calendars (good thing).
$show_search			= 'yes';			// Show the search box in the sidebar.
$allow_preferences		= 'yes';			// Allow visitors to change various preferences via cookies.
$printview_default		= 'no';				// Set print view as the default view. day, week, and month only supported views for $default_view (listed well above).
$show_todos				= 'yes';			// Show your todo list on the side of day and week view.
$show_completed			= 'no';				// Show completed todos on your todo list.
$allow_login			= 'no';				// Set to yes to prompt for login to unlock calendars.

// Webdav style publishing
$phpicalendar_publishing = 1;				// Set to '1' to enable remote webdav style publish. See 'calendars/publish.php' for complete information;

// Administration settings
$allow_admin			= 'no';				// Set to yes to allow the admin page - remember to change the default password if using 'internal' as the $auth_method			
$auth_method			= 'ftp';			// Valid values are: 'ftp', 'internal', or 'none'. 'ftp' uses the ftp server's username and password as well as ftp commands to delete and copy files. 'internal' uses $auth_internal_username and $auth_internal_password defined below - CHANGE the password. 'none' uses NO authentication - meant to be used with another form of authentication such as http basic.
$auth_internal_username	= 'admin';			// Only used if $auth_method='internal'. The username for the administrator.
$auth_internal_password	= 'default';		// Only used if $auth_method='internal'. The password for the administrator.
$ftp_server				= 'localhost';		// Only used if $auth_method='ftp'. The ftp server name. 'localhost' will work for most servers.
$ftp_calendar_path		= '';				// Only used if $auth_method='ftp'. The full path to the calendar directory on the ftp server. If = '', will attempt to deduce the path based on $calendar_path, but may not be accurate depending on ftp server config.

$blacklisted_cals[] = '';					// Fill in between the quotes the name of the calendars 
$blacklisted_cals[] = '';					// you wish to 'blacklist' or that you don't want to show up in your calendar
$blacklisted_cals[] = '';					// list. This should be the exact calendar filename without .ics
$blacklisted_cals[] = '';					// the parser will *not* parse any cal that is in this list (it will not be Web accessible)
// add more lines as necessary

$list_webcals = $MC['webcals'];

$locked_cals[] = '';						// Fill in-between the quotes the names of the calendars you wish to hide
$locked_cals[] = '';						// unless unlocked by a username/password login. This should be the
$locked_cals[] = '';						// exact calendar filename without the .ics suffix.
$locked_cals[] = '';						//
// add more lines as necessary

$locked_map['user1:pass'] = array('');		// Map username:password accounts to locked calendars that should be
$locked_map['user2:pass'] = array('');		// unlocked if logged in. Calendar names should be the same as what is
$locked_map['user3:pass'] = array('');		// listed in the $locked_cals, again without the .ics suffix.
$locked_map['user4:pass'] = array('');		// Example: $locked_map['username:password'] = array('Locked1', 'Locked2');
// add more lines as necessary

$apache_map['user1'] = array('');			// Map HTTP authenticated users to specific calendars. Users listed here and
$apache_map['user2'] = array('');			// authenticated via HTTP will not see the public calendars, and will not be
$apache_map['user3'] = array('');			// given any login/logout options. Calendar names not include the .ics suffix.
$apache_map['user4'] = array('');			// Example: $apache_map['username'] = array('Calendar1', 'Calendar2');
// add more lines as necessary
?>
