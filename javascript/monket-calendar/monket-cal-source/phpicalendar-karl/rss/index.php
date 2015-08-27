<?php

define('BASE','../');
include(BASE.'functions/ical_parser.php');
include_once(BASE.'functions/calendar_functions.php');
$default_path = 'http://'.$HTTP_SERVER_VARS['SERVER_NAME'].substr($HTTP_SERVER_VARS['PHP_SELF'],0,strpos($HTTP_SERVER_VARS['PHP_SELF'], '/rss/'));
if (isset($HTTP_SERVER_VARS['HTTP_REFERER']) && $HTTP_SERVER_VARS['HTTP_REFERER'] != '') {
	$back_page = $HTTP_SERVER_VARS['HTTP_REFERER'];
} else {
	$back_page = BASE.$default_view.'.php?cal='.$cal.'&amp;getdate='.$getdate;
}
$current_view = "rssindex";
$display_date = "$calendar_lang - RSS Info";
include (BASE.'includes/header.inc.php'); ?>
<center>
<table border="0" width="700" cellspacing="0" cellpadding="0">
	<tr>
		<td width="520" valign="top" align="center">
			<table width="640" border="0" cellspacing="0" cellpadding="0" class="calborder">
				<tr>
					<td align="center" valign="middle">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="left" width="120" class="navback"><?php echo '<a href="'.$back_page.'"><img src="'.BASE.'styles/'.$style_sheet.'/back.gif" alt=" " border="0" align="left"></a>'; ?></td>
								<td class="navback">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="center" class="navback" nowrap valign="middle"><font class="H20"><?php echo 'RSS Information'; ?></font></td>
										</tr>
									</table>
								</td>
								<td align="right" width="120" class="navback">	
									<table width="120" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td><?php echo '<a class="psf" href="'.BASE.'day.php?cal='.$cal.'&amp;getdate='.$getdate.'"><img src="'.BASE.'styles/'.$style_sheet.'/day_on.gif" alt=" " border="0"></td>'; ?>
											<td><?php echo '<a class="psf" href="'.BASE.'week.php?cal='.$cal.'&amp;getdate='.$getdate.'"><img src="'.BASE.'styles/'.$style_sheet.'/week_on.gif" alt=" " border="0"></td>'; ?>
											<td><?php echo '<a class="psf" href="'.BASE.'month.php?cal='.$cal.'&amp;getdate='.$getdate.'"><img src="'.BASE.'styles/'.$style_sheet.'/month_on.gif" alt=" " border="0"></td>'; ?>
											<td><?php echo '<a class="psf" href="'.BASE.'year.php?cal='.$cal.'&amp;getdate='.$getdate.'"><img src="'.BASE.'styles/'.$style_sheet.'/year_on.gif" alt=" " border="0"></td>'; ?>
										</tr>
									</table>
								</td>
							</tr>
			      		</table>
					</td>
				</tr>
				<tr>
					<td class="dayborder"><img src="../images/spacer.gif" width="1" height="5" alt=" "></td>
				</tr>
				<?php if ($enable_rss == "yes") { ?>
				<tr>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0" class="G10B">	
							<tr>
								<td width="2%"></td>
								<td width="98%" valign="top" align="left">
									<br>
									<?php echo "$this_site_is_lang "; ?><a class="psf" href="http://www.oreillynet.com/rss/">RSS 0.91 enabled</a>.<br>
									<br>
									<?php 
									
									// build the <option> tags
									$filelist = availableCalendarNames($username, $password, $ALL_CALENDARS_COMBINED);
									foreach ($filelist as $file) {
										// $cal_filename is the filename of the calendar without .ics
										// $cal is a urlencoded version of $cal_filename
										// $cal_displayname is $cal_filename with occurrences of "32" replaced with " "
										$cal_filename_tmp = substr($file,0,-4);
										$cal_tmp = urlencode($cal_filename_tmp);
										$cal_displayname_tmp = str_replace("32", " ", $cal_filename_tmp);
										echo '<font class="V12" color="blue"><b>'.$cal_displayname_tmp.' '. $calendar_lang.'</b></font><br>';
										echo $default_path.'/rss/rss.php?cal='.$cal_tmp.'&rssview=day<br>';
										echo $default_path.'/rss/rss.php?cal='.$cal_tmp.'&rssview=week<br>';
										echo $default_path.'/rss/rss.php?cal='.$cal_tmp.'&rssview=month<br>';
										$footer_check = $default_path.'/rss/rss.php?cal='.$default_cal.'&rssview='.$default_view;
										echo '<br><br>';
									}
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<?php } else { ?>
				<tr>
					<td align="center" class="navback" nowrap valign="middle"><font class="H20">RSS is not enabled on this site.</font></td>
				</tr>
				<?php } ?>
			</table>
		</td>
	</tr>
</table>
</center>
<?php include (BASE.'includes/footer.inc.php'); ?>
