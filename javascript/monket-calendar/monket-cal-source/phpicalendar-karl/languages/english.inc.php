<?php

// English language include
// For version 1.0 PHP iCalendar
//
// Translation by Chad Little (chad@chadsdomain.com)
//
// Submit new translations to chad@chadsdomain.com

$day_lang			= 'Day';
$week_lang			= 'Week';
$month_lang			= 'Month';
$year_lang			= 'Year';
$calendar_lang		= 'Calendar';
$next_day_lang		= 'Next Day';
$next_month_lang	= 'Next Month';
$next_week_lang		= 'Next Week';
$next_year_lang		= 'Next Year';
$last_day_lang		= 'Previous Day';
$last_month_lang	= 'Previous Month';
$last_week_lang		= 'Previous Week';
$last_year_lang		= 'Previous Year';
$subscribe_lang		= 'Subscribe';
$download_lang		= 'Download';
$powered_by_lang 	= 'Powered by';
$event_lang			= 'Event';
$event_start_lang	= 'Start Time';
$event_end_lang		= 'End Time';
$this_months_lang	= 'This Month\'s Events';
$date_lang			= 'Date';
$summary_lang		= 'Summary';
$all_day_lang		= 'All day event';
$notes_lang			= 'Notes';
$this_years_lang	= 'This Year\'s Events';
$today_lang			= 'Today';
$this_week_lang		= 'This Week';
$this_month_lang	= 'This Month';
$jump_lang			= 'Jump to';
$tomorrows_lang		= 'Tomorrow\'s Events';
$goday_lang			= 'Go to Today';
$goweek_lang		= 'Go to This Week';
$gomonth_lang		= 'Go to This Month';
$goyear_lang		= 'Go to This Year';
$search_lang		= 'Search'; // the verb
$results_lang		= 'Search Results';
$query_lang			= 'Query'; // will be followed by the search query
$no_results_lang	= 'No events found';
$goprint_lang		= 'Printer Friendly';
$time_lang			= 'Time';
$summary_lang		= 'Summary';
$description_lang	= 'Description';
$this_site_is_lang		= 'This site is';
$no_events_day_lang		= 'No events today.';
$no_events_week_lang	= 'No events this week.';
$no_events_month_lang	= 'No events this month.';
$rss_day_date			= 'g:i A';  // Lists just the time
$rss_week_date			= '%b %e';  // Lists just the day
$rss_month_date			= '%b %e';  // Lists just the day
$rss_language			= 'en-us';
$search_took_lang		= 'Search took %s seconds';
$recurring_event_lang	= 'Recurring event';
$exception_lang			= 'Exception';
$no_query_lang			= 'No query given';
$preferences_lang		= 'Preferences';
$printer_lang			= 'Printer';
$select_lang_lang		= 'Select your default language:';
$select_cal_lang		= 'Select your default calendar:';
$select_view_lang		= 'Select your default view:';
$select_time_lang		= 'Select your default start time:';
$select_day_lang		= 'Select your default start day of week:';
$select_style_lang		= 'Select your default style:';
$set_prefs_lang			= 'Set preferences';
$completed_date_lang	= 'Completed on';
$completed_lang			= 'Completed';
$created_lang			= 'Created:';
$due_lang				= 'Due:';
$priority_lang			= 'Priority:';
$priority_high_lang		= 'High';
$priority_low_lang		= 'Low';
$priority_medium_lang	= 'Medium';
$priority_none_lang		= 'None';
$status_lang			= 'Status:';
$todo_lang				= 'To do items';
$unfinished_lang		= 'Unfinished';
$prefs_set_lang 		= 'Your preferences have been set.';
$prefs_unset_lang 		= 'Preferences unset. Changes will take place next page load.';
$unset_prefs_lang 		= 'Unset preferences:';
$organizer_lang			= 'Organizer';
$attendee_lang			= 'Attendee';
$status_lang			= 'Status';
$location_lang			= 'Location';
$admin_header_lang		= 'PHP iCalendar Administration';
$username_lang			= 'Username';
$password_lang			= 'Password';
$login_lang				= 'Login';
$invalid_login_lang		= 'Wrong username or password.';
$addupdate_cal_lang		= 'Add or Update a Calendar';
$addupdate_desc_lang	= 'Add a calendar by uploading a new file. Update a calendar by uploading a file of the same name.';
$delete_cal_lang		= 'Delete a Calendar';
$logout_lang			= 'Logout';
$cal_file_lang			= 'Calendar File';
$php_error_lang			= 'PHP Error';
$upload_error_gen_lang	= 'There was a problem with your upload.';
$upload_error_lang[0]	= 'There was a problem with your upload.';
$upload_error_lang[1]	= 'The file you are trying to upload is too big.';
$upload_error_lang[2]	= 'The file you are trying to upload is too big.';
$upload_error_lang[3]	= 'The file you are trying upload was only partially uploaded.';
$upload_error_lang[4]	= 'You must select a file for upload.';
$upload_error_type_lang = 'Only .ics files may be uploaded.';
$copy_error_lang		= 'Failed to copy file';
$delete_error_lang		= 'Failed to delete file';
$delete_success_lang	= 'was deleted successfully.';
$action_success_lang	= 'Your action was successful.';
$submit_lang			= 'Submit';
$delete_lang			= 'Delete';

// ----- New for 1.0
$all_cal_comb_lang		= 'All calendars combined';

// - navigation
$back_lang = 'Back';
$next_lang = 'Next';
$prev_lang = 'Prev';
$day_view_lang = 'Day View';
$week_view_lang = 'Week View';
$month_view_lang = 'Month View';
$year_view_lang = 'Year View';

// ---------------------------------


// $format_recur, items enclosed in % will be substituted with variables
$format_recur_lang['delimiter']	= ', ';								// ie, 'one, two, three'

$format_recur_lang['yearly']		= array('year','years');		// for these, put singular
$format_recur_lang['monthly']		= array('month','months');		// and plural forms
$format_recur_lang['weekly']		= array('week','weeks');		// these will be %freq%
$format_recur_lang['daily']			= array('day','days');			// in the replacement below
$format_recur_lang['hourly']		= array('hour','hours');
$format_recur_lang['minutely']		= array('minute','minutes');
$format_recur_lang['secondly']		= array('second','seconds');

$format_recur_lang['start']			= 'Every %int% %freq% %for%';	// ie, 'Every 1 day until January 4' or 'Every 1 day for a count of 5'
$format_recur_lang['until']			= 'until %date%';				// ie, 'until January 4'
$format_recur_lang['count']			= 'for a count of %int%';		// ie, 'for 5 times'

$format_recur_lang['bymonth']		= 'In months: %list%';			// ie, 'In months: January, February, March'
$format_recur_lang['bymonthday']	= 'On dates: %list%';			// ie, 'On dates: 1, 2, 3, 4'
$format_recur_lang['byday']			= 'On days: %list%';			// ie, 'On days: Mon, Tues, Wed, Thurs'
$daysofweek_lang			= array ('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
$daysofweekshort_lang		= array ('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
$daysofweekreallyshort_lang	= array ('S','M','T','W','T','F','S');
$monthsofyear_lang			= array ('January','February','March','April','May','June','July','August','September','October','November','December');
$monthsofyearshort_lang		= array ('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');

// For time formatting, check out: http://www.php.net/manual/en/function.date.php
$timeFormat = 'g:i A';
$timeFormat_small = 'g:i';

// For date formatting, see note below
$dateFormat_day = '%A, %B %e';
$dateFormat_week = '%B %e';
$dateFormat_week_list = '%a, %b %e';
$dateFormat_week_jump = '%b %e';
$dateFormat_month = '%B %Y';
$dateFormat_month_list = '%A, %B %e';

/*
Notes about dateFormat_*
	The pieces are similar to that of the PHP function strftime(), 
	however only the following is supported at this time:
	
	%A - the full week day name as specified in $daysofweek_lang
	%a - the shortened week day name as specified in $daysofweekshort_lang
	%B - the full month name as specified in $monthsofyear_lang
	%b - the shortened month name as specified in $monthsofyearshort_lang
	%e - the day of the month as a decimal number (1 to 31)
	%Y - the 4-digit year

	If this causes problems with representing your language accurately, let
	us know. We will be happy to modify this if needed.
*/

// Error messages - %s will be replaced with a variable
$error_title_lang = 'Error!';
$error_window_lang = 'There was an error!';
$error_calendar_lang = 'The calendar "%s" was being processed when this error occurred.';
$error_path_lang = 'Unable to open the path: "%s"';
$error_back_lang = 'Please use the "Back" button to return.';
$error_remotecal_lang = 'This server blocks remote calendars which have not been approved.';
$error_restrictedcal_lang = 'You have tried to access a calendar that is restricted on this server.';
$error_invalidcal_lang = 'Invalid calendar file. Please try a different calendar.';

?>
