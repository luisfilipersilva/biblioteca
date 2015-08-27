<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
     "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>jQuery Time Entry</title>
<style type="text/css"> 
@import "css/jquery.tabs.css";
@import "css/jquery.bookmark.css";
@import "css/jquery.timeentry.css";
@import "css/demo.css";
 
#default ul { width: 70%; }
#changelog { float: right; margin-right: 20px; }
* html #default p { zoom: normal; }
</style>
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery.debug.js"></script>
<script type="text/javascript" src="js/jquery.tabs.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.localisation.js"></script>
<script type="text/javascript" src="js/jquery.bookmark.js"></script>
<script type="text/javascript" src="js/jquery.metadata.js"></script>
<script type="text/javascript" src="js/jquery.timeentry.js"></script>
<script type="text/javascript"> 
$.timeEntry.setDefaults({spinnerImage: 'img/spinnerDefault.png'});
</script>
<script type="text/javascript" src="js/jquery.chili-2.0.js"></script>
<script type="text/javascript" src="js/demo.js"></script>
<script type="text/javascript"> 
$(function() {
	$('#download').click(function() {
		pageTracker._trackPageview('/downloads/timeentry-1.4.6');
		window.location = 'zip/jquery.timeentry.package-1.4.6.zip';
	});
	if (!$.browser.msie) {
		$('a[href=#spinner]').parent().addClass('tabSplit');
	}
	localise();
});
 
function localise() {
	var language = $('#language').val();
	$.localise('js/jquery.timeentry', language);
	$('#l10nTime').timeEntry('change', $.timeEntry.regional[language]);
	$.timeEntry.setDefaults($.timeEntry.regional['']);
}
</script>
</head>
<body>
<h1>jQuery Time Entry</h1>
<p>A <a href="http://jquery.com">jQuery</a> <a href="http://jquery.com/plugins/project/timeEntry">plugin</a>
	that sets an input field up to accept a time value using a spinner.
	If you find this plugin useful please
	<a href="http://jquery.com/plugins/project/timeEntry">vote for it</a>
	on the jQuery site<span id="rating"></span>.</p>
<p>Complement this plugin with the <a href="datepick.html">jQuery Datepicker</a>
	plugin, for a popup calendar, or the
	<a href="dateEntry.html">jQuery Date Entry</a> plugin, for spinner entry.</p>
<p>The current version is <span class="version">1.4.6</span> and is available 
	under the <a href="http://dev.jquery.com/browser/trunk/jquery/GPL-LICENSE.txt">GPL</a> and
	<a href="http://dev.jquery.com/browser/trunk/jquery/MIT-LICENSE.txt">MIT</a> licences.
	For more detail see the <a href="timeEntryRef.html">documentation reference</a> page.
	Or see a <a href="timeEntryBasics.html">minimal page</a> that you could
	use as a basis for your own investigations.</p>
<p style="text-align: center;">
	<button type="button" id="download">Download now</button>
	<span id="bookmark"></span>
</p>
<div id="tabs">
	<ul>
		<li><a href="#default"><span>Defaults</span></a></li>
		<li><a href="#keys"><span>Keystrokes</span></a></li>
		<li><a href="#formats"><span>Formats</span></a></li>
		<li><a href="#restrict"><span>Restricting</span></a></li>
		<li><a href="#misc"><span>Miscellaneous</span></a></li>
		<li><a href="#range"><span>Time range</span></a></li>
		<li><a href="#spinner"><span>Spinners</span></a></li>
		<li><a href="#config"><span>Configuration</span></a></li>
		<li><a href="#l10n"><span>Localisation</span></a></li>
		<li><a href="#wild"><span>In the Wild</span></a></li>
		<li><a href="#compat"><span>Compatibility</span></a></li>
		<li><a href="#quick"><span>Quick Ref</span></a></li>
	</ul>
	<div id="default" class="feature">
		<h2>Default Settings</h2>
		<p>The time entry functionality can easily be added to an input field 
			with appropriate default settings. Also shown is the control's 
			appearance when disabled.</p>
		<p><span class="demoLabel">Default time entry:</span> 
			<input type="text" size="10" id="defaultEntry">&nbsp;
			<button type="button" id="enableDefault">Disable</button>&nbsp;
			<button type="button" id="removeDefault">Remove</button></p>
		<pre><code class="jsdemo">$('#defaultEntry').timeEntry().change(function() {
	var log = $('#log');
	log.val(log.val() + ($('#defaultEntry').val() || 'blank') + '\n');
});</code></pre>
		<div id="changelog">
			<p>On change log:<br>
				<textarea id="log" rows="14" cols="15"></textarea></p>
		</div>
		<p>The defaults are:</p>
		<ul>
			<li>Text is in English</li>
			<li>Time format is HH:MMAP - 12 hour time</li>
			<li>Increment/decrement all fields by one</li>
			<li>Subfields selectable by mouse click</li>
			<li>No time restrictions</li>
			<li>Spinner is displayed</li>
			<li>Spinner auto-repeats on increment/decrement</li>
			<li>Mouse wheel increment/decrement (with 
				<a href="http://jquery.com/plugins/project/mousewheel">jquery.mousewheel.js</a>)</li>
			<li>Field's on change event fires (see to the right)</li>
		</ul>
		<p>You can enable or disable time entry fields.</p>
		<pre><code class="jsdemo">$('#enableDefault').toggle(
	function() {
		$(this).text('Enable');
		$('#defaultEntry').timeEntry('disable');
	}, 
	function() {
		$(this).text('Disable');
		$('#defaultEntry').timeEntry('enable');
	});</code></pre>
		<p>Or completely remove the time entry functionality.</p>
		<pre><code class="jsdemo">$('#removeDefault').toggle(
	function() {
		$(this).text('Re-attach');
		$('#defaultEntry').timeEntry('destroy');
	},
	function() {
		$(this).text('Remove');
		$('#defaultEntry').timeEntry();
	});</code></pre>
		<p>You can override the defaults globally as shown below:</p>
		<pre><code class="js">$.timeEntry.setDefaults({show24Hours: true});</code></pre>
		<p>Processed fields are marked with a class of <code>hasTimeEntry</code>
			and are not re-processed if targetted a second time.</p>
	</div>
	<div id="keys" class="feature">
		<h2>Keystrokes</h2>
		<p>The time entry field also responds to keystrokes.</p>
		<p><span class="demoLabel">Keyboard driven:</span> 
			<input type="text" size="10" id="keyedEntry"></p>
		<pre><code class="jsdemo">$('#keyedEntry').timeEntry();</code></pre>
		<p>The relevant keystrokes are:</p>
		<ul>
			<li><span class="demoLabel">0 - 9</span>direct time entry</li>
			<li><span class="demoLabel">: (separator)</span>move to next time portion</li>
			<li><span class="demoLabel">A/P (AM/PM values)</span>set AM/PM<br>&nbsp;</li>
			<li><span class="demoLabel">down/up</span>decrement/increment current time portion</li>
			<li><span class="demoLabel">left/right</span>move to previous/next time portion</li>
			<li><span class="demoLabel">shift+/tab</span>move to previous/next time portion</li>
			<li><span class="demoLabel">home/end</span>move to the first/last time portion</li>
			<li><span class="demoLabel">ctrl+home</span>set to the current time</li>
			<li><span class="demoLabel">ctrl+end or delete</span>clear the time</li>
		</ul>
	</div>
	<div id="formats" class="feature">
		<h2>Time Formats</h2>
		<p>You can control how the time is presented.</p>
		<p><span class="demoLabel">Show seconds:</span> 
			<input type="text" size="10" name="showSeconds" id="showSeconds"></p>
		<pre><code class="jsdemo">$('#showSeconds').timeEntry({showSeconds: true});</code></pre>
		<p><span class="demoLabel">Show 24 hour time:</span> 
			<input type="text" size="10" name="show24" id="show24"></p>
		<pre><code class="jsdemo">$('#show24').timeEntry({show24Hours: true});</code></pre>
		<p><span class="demoLabel">Separate AM/PM:</span> 
			<input type="text" size="10" name="separateAmpm" id="separateAmpm"></p>
		<pre><code class="jsdemo">$('#separateAmpm').timeEntry({ampmPrefix: ' '});</code></pre>
		<p><span class="demoLabel">Change the separator:</span> 
			<input type="text" size="10" name="showSeparator" id="showSeparator"></p>
		<pre><code class="jsdemo">$('#showSeparator').timeEntry({separator: '.'});</code></pre>
		<p><span class="demoLabel">No separator:</span> 
			<input type="text" size="10" name="noSeparator" id="noSeparator"></p>
		<pre><code class="jsdemo">$('#noSeparator').timeEntry({separator: ''});</code></pre>
		<p><span class="demoLabel">Interact with the inputs:</span>
			<select id="pickInput">
				<option value="showSeconds">Show seconds</option>
				<option value="show24">Show 24 hour time</option>
				<option value="separateAmpm">Separate AM/PM</option>
				<option value="showSeparator">Change the separator</option>
				<option value="noSeparator">No separator</option>
			</select>
			<button type="button" id="getTheTime">Get time</button>
			<button type="button" id="setTheTime">Set time</button>
			<input type="radio" name="absRel" id="abs" checked="checked" value="abs"> <label for="abs">Absolute</label>
			<input type="radio" name="absRel" id="rel" value="rel"> <label for="rel">Relative</label></p>
		<p>When setting the time you can provide a <code>Date</code> object, or a number
			for seconds from now, or a string containing the period and units:
			'H' for hours, 'M' for minutes, or 'S' for seconds. Letters may be upper or
			lower case. Multiple offsets may be combined into the one setting.
			Prefix with '!' to prevent a wrap around into another day.</p>
		<pre><code class="jsdemo">function getTheTime() {
	alert('The time is ' +
		$('#' + $('#pickInput').val()).timeEntry('getTime'));
}
 
function setTheTime() {
	var time = ($('#abs').is(':checked') ?
		new Date(0, 0, 0, 16, 7, 11) : '+1h +30m');
	$('#' + $('#pickInput').val()).timeEntry('setTime', time);
}
 
$('#getTheTime').click(getTheTime);
$('#setTheTime').click(setTheTime);</code></pre>
	</div>
	<div id="restrict" class="feature">
		<h2>Time Restrictions</h2>
		<p>You can restrict the functionality of the time entry fields in various ways. 
			The first example only allows selection of times in quarter hour increments
			by setting the steps for each of hours, minutes, and seconds.</p>
		<p><span class="demoLabel">Restricted time increments:</span> 
			<input type="text" size="10" id="restrictSteps"></p>
		<pre><code class="jsdemo">$('#restrictSteps').timeEntry({timeSteps: [1, 15, 0]});</code></pre>
		<p>You can also limit the range of times selectable within the field. 
			Here it's between 8:30AM and 5:30PM.</p>
		<p><span class="demoLabel">Limited times:</span> 
			<input type="text" size="10" id="restrictRange"></p>
		<pre><code class="jsdemo">$('#restrictRange').timeEntry({minTime: new Date(0, 0, 0, 8, 30, 0), 
	maxTime: new Date(0, 0, 0, 17, 30, 0)});</code></pre>
		<p>The range of selectable times can also be set as times relative to the current time.
			Use a number for seconds from now, or a string containing the period and units:
			'H' for hours, 'M' for minutes, or 'S' for seconds. Letters may be upper or
			lower case. Multiple offsets may be combined into the one setting.
			Prefix with '!' to prevent a wrap around into another day.</p>
		<p><span class="demoLabel">Relative limited times:</span> 
			<input type="text" size="10" id="restrictRelative"></p>
		<pre><code class="jsdemo">$('#restrictRelative').timeEntry({minTime: -600, maxTime: '!+2h'});</code></pre>
		<p>Additional restrictions can be applied via a callback function
			that is called just before setting a new time for the field.
			Here only times in the first half of each hour are accepted.</p>
		<p><span class="demoLabel">Additional restriction:</span> 
			<input type="text" size="10" id="restrictTime"></p>
		<pre><code class="jsdemo">$('#restrictTime').timeEntry({beforeSetTime: firstHalfHourOnly});
 
function firstHalfHourOnly(oldTime, newTime, minTime, maxTime) {
	var increment = (newTime - (oldTime || newTime)) > 0;
	if (newTime.getMinutes() > 30) {
		newTime.setMinutes(increment ? 0 : 30);
		newTime.setHours(newTime.getHours() + (increment ? 1 : 0));
	}
	return newTime;
}</code></pre>
	</div>
	<div id="misc" class="feature">
		<h2>Miscellaneous Features</h2>
		<p>To make it easier to use the spinner, you can set it to expand on hover.</p>
		<p><span class="demoLabel">Expanded spinner:</span> 
			<input type="text" size="10" id="expandedSpinner"></p>
		<pre><code class="jsdemo">$('#expandedSpinner').timeEntry(
	{spinnerBigImage: 'img/spinnerDefaultBig.png'});</code></pre>
		<p>You can set which portion of the time should be initially highlighted.
			Use 0 for hours, 1 for minutes, etc.</p>
		<p><span class="demoLabel">Highlight minutes:</span> 
			<input type="text" size="10" id="highlightMins"></p>
		<pre><code class="jsdemo">$('#highlightMins').timeEntry({initialField: 1});</code></pre>
		<p>You can set a default time to show when nothing has been selected.
			If this setting is not specified, it defaults to the current time.</p>
		<p><span class="demoLabel">Absolute default time:</span> 
			<input type="text" size="10" id="absoluteDefault"></p>
		<pre><code class="jsdemo">$('#absoluteDefault').timeEntry(
	{defaultTime: new Date(0, 0, 0, 11, 11, 11)});</code></pre>
		<p>Alternatively, the default time can be set relative to the current time.
			Use a number for seconds from now, or a string containing the period and units:
			'H' for hours, 'M' for minutes, or 'S' for seconds. Letters may be upper or
			lower case. Multiple offsets may be combined into the one setting.
			Prefix with '!' to prevent a wrap around into another day.</p>
		<p><span class="demoLabel">Relative default time:</span> 
			<input type="text" size="10" id="relativeDefault"></p>
		<pre><code class="jsdemo">$('#relativeDefault').timeEntry({defaultTime: '+1h +30m'});</code></pre>
	</div>
	<div id="range" class="feature">
		<h2>Time Range</h2>
		<p>Use a custom field settings function to create a time range control:
			two time fields, each restricting the other. The function takes an
			input field as an argument and returns a settings object.</p>
		<p><span class="demoLabel">Time range:</span> 
			<input type="text" size="10" class="timeRange" id="tFrom"> to 
			<input type="text" size="10" class="timeRange" id="tTo"></p>
		<pre><code class="jsdemo">$('.timeRange').timeEntry({beforeShow: customRange});
 
function customRange(input) {
	return {minTime: (input.id == 'tTo' ?
		$('#tFrom').timeEntry('getTime') : null), 
		maxTime: (input.id == 'tFrom' ?
		$('#tTo').timeEntry('getTime') : null)};
}</code></pre>
	</div>
	<div id="spinner" class="feature">
		<h2>Spinner Settings</h2>
		<p>Change the spinner. The first one has no central "Now" button,
			while the last has only the increment and decrement buttons.</p>
		<p><span class="demoLabel">Alternate spinners:</span>
			<label><input type="checkbox" id="expand"> Expand</label></p>
		<p><span class="demoLabel">&nbsp;</span> 
			<input type="text" size="10" id="spinnerSquare" class="spinners">&nbsp;&nbsp; 
			<input type="text" size="10" id="spinnerOrange" class="spinners">&nbsp;&nbsp; 
			<input type="text" size="10" id="spinnerText" class="spinners"></p>
		<p><span class="demoLabel">&nbsp;</span> 
			<input type="text" size="10" id="spinnerGem" class="spinners">&nbsp;&nbsp; 
			<input type="text" size="10" id="spinnerUpDown" class="spinners"></p>
		<p>Specify the size of the new spinner image (width and height) 
			along with the size of the central button (0 for none)
			so that the location of the individual "buttons" can be determined.
			Suppress the previous/next buttons with <code>spinnerIncDecOnly</code>.</p>
		<pre><code class="jsdemo">$('#spinnerSquare').timeEntry({spinnerImage: 'img/spinnerSquare.png',
	spinnerSize: [20, 20, 0], spinnerBigSize: [40, 40, 0]});
$('#spinnerOrange').timeEntry({spinnerImage: 'img/spinnerOrange.png'});
$('#spinnerText').timeEntry({spinnerImage: 'img/spinnerText.png',
	spinnerSize: [30, 20, 8], spinnerBigSize: [60, 40, 16]});
$('#spinnerGem').timeEntry({spinnerImage: 'img/spinnerGem.png'});
$('#spinnerUpDown').timeEntry({spinnerImage: 'img/spinnerUpDown.png',
	spinnerSize: [15, 16, 0], spinnerBigSize: [30, 32, 0],
	spinnerIncDecOnly: true});
	
$('#expand').change(function() {
	var expanded = $(this).is(':checked');
	$('.spinners').each(function() {
		$(this).timeEntry('change',
			{spinnerBigImage: (expanded ? 'img/' + this.id + 'Big.png' : '')});
	});
});</code></pre>
		<p><span class="demoLabel">Disable auto-repeat:</span> 
			<input type="text" size="10" id="disableRepeat"></p>
		<pre><code class="jsdemo">$('#disableRepeat').timeEntry({spinnerRepeat: [0, 0]});</code></pre>
		<p><span class="demoLabel">No mouse wheel support:</span> 
			<input type="text" size="10" id="noMouseWheel"></p>
		<pre><code class="jsdemo">$('#noMouseWheel').timeEntry({useMouseWheel: false});</code></pre>
		<p><span class="demoLabel">No spinner image:</span> 
			<input type="text" size="10" id="noSpinnerEntry"></p>
		<pre><code class="jsdemo">$('#noSpinnerEntry').timeEntry({spinnerImage: ''});</code></pre>
	</div>
	<div id="config" class="feature">
		<h2>Inline Configuration</h2>
		<p>Instead of configuring time entry fields via parameters to the
			instantiation call, you can specify them inline. You must add the
			<a href="http://plugins.jquery.com/project/metadata">jQuery Metadata</a>
			plugin to your page and then encode the settings in the <code>class</code>
			attribute (by default).</p>
		<p><span class="demoLabel">Inline configuration 1:</span> 
			<input type="text" size="10" class="inlineConfig
				{show24Hours: true, timeSteps: [1, 30, 0], appendText: ' (see below)'}"></p>
		<p><span class="demoLabel">Inline configuration 2:</span> 
			<input type="text" size="10" class="inlineConfig
				{minTime: new Date(0, 0, 0, 0, 0, 0), maxTime: new Date(0, 0, 0, 11, 59, 0)}"></p>
		<pre><code class="html">&lt;input type="text" size="10" class="inlineConfig
	{show24Hours: true, timeSteps: [1, 30, 0], appendText: ' (see below)'}"&gt;
	
&lt;input type="text" size="10" class="inlineConfig
	{minTime: new Date(0, 0, 0, 0, 0, 0), maxTime: new Date(0, 0, 0, 11, 59, 0)}"&gt;</code></pre>
		<pre><code class="jsdemo">$('.inlineConfig').timeEntry();</code></pre>
		<p>Or reconfigure on the fly.</p>
		<p><span class="demoLabel">Reconfiguration:</span> 
			<input type="text" size="10" id="reConfig">
			<button type="button" id="switchButton">Switch formats</button></p>
		<pre><code class="jsdemo">$('#reConfig').timeEntry({showSeconds: true});
$('#switchButton').toggle(
	function() { $('#reConfig').timeEntry('change', 
		{show24Hours: true, showSeconds: false}); },
	function() { $('#reConfig').timeEntry('change',
		{show24Hours: false, showSeconds: true}); }
);</code></pre>
	</div>
	<div id="l10n" class="feature">
		<h2>Localisation</h2>
		<p>You can localise the time entry fields for other languages and regional differences. 
			The time entry defaults to English with a time format of HH:MMAP.
			Select a language to change the time format and spinner tooltips.</p>
		<p><span class="demoLabel"><select id="language">
				<option value="cs">?eština (Czech)</option>
				<option value="de">Deutsch (German)</option>
				<option value="es">Español (Spanish)</option>
				<option value="fr" selected="selected">Français (French)</option>
				<option value="is">Íslenska (Icelandic)</option>
				<option value="it">Italiano (Italian)</option>
				<option value="hu">Magyar (Hungarian)</option>
				<option value="nl">Nederlands (Dutch)</option>
				<option value="ja">??? (Japanese)</option>
				<option value="pl">Polski (Polish)</option>
				<option value="pt">Português (Portugese)</option>
				<option value="ro">Român? (Romanian)</option>
				<option value="ru">??????? (Russian)</option>
				<option value="sk">Sloven?ina (Slovak)</option>
				<option value="sv">Svenska (Swedish)</option>
				<option value="vi">Ti?ng Vi?t (Vietnamese)</option>
				<option value="tr">Türkçe (Turkish)</option>
				<option value="zh-CN">???? (Simplified Chinese)</option>
			</select>:</span>
			<input type="text" size="10" id="l10nTime"></p>
		<p>You need to load the appropriate language package (see <a href="#l10nPkgs">list below</a>), which 
			adds a language set ($.timeEntry.regional[langCode]) and automatically 
			sets this language as the default for all time entry fields.</p>
		<pre><code class="html">&lt;script type="text/javascript" src="jquery.timeentry-fr.js"&gt;&lt;/script&gt;</code></pre>
		<p>Thereafter, if desired, you can restore the original language settings.</p>
		<pre><code class="js">$.timeEntry.setDefaults($.timeEntry.regional['']);</code></pre>
		<p>And then configure the language per time entry field.</p>
		<pre><code class="jsdemo">$('#l10nTime').timeEntry($.timeEntry.regional['fr']);
$('#language').change(localise);</code></pre>
	</div>
	<div id="wild" class="feature">
		<h2>In the Wild</h2>
		<p>This tab highlights examples of this plugin in use "in the wild".</p>
		<div id="wildLinks">
			<div>
				<h3><!--a href=""></a--></h3>
				<p>None as yet.</p>
			</div>
		</div>
		<p style="clear: both;">To add another example, please contact me (kbwood{at}iinet.com.au)
			and provide the plugin name, the URL of your site, its title,
			and a short description of its purpose and where/how the plugin is used.</p>
	</div>
	<div id="compat" class="feature">
		<h2>Backwards Compatibility</h2>
		<p>Several interface changes were made between v1.2.6 and v1.3.0 to bring
			this plugin into line with the new UI interface standards.</p>
		<p>To assist in the upgrade process, a compatibility module is available
			that allows a v1.2.6 page to be run against the latest code.</p>
		<p>Just add the following line to your page after the plugin load to continue running:</p>
		<pre><code class="html">&lt;script type="text/javascript" src="jquery.timeentry.compat-1.2.6.js"&gt;&lt;/script&gt;</code></pre>
		<p>To complete the upgrade perform the following steps:</p>
		<ul>
			<li>Replace <code><b>$.timeEntry.reconfigureFor(&hellip;</b>, &hellip;)</code> with
				<code><b>$(&hellip;).timeEntry('change'</b>, &hellip;)</code></li>
			<li>Replace <code><b>$.timeEntry.enableFor(&hellip;</b>, &hellip;)</code> with
				<code><b>$(&hellip;).timeEntry('enable'</b>, &hellip;)</code></li>
			<li>Replace <code><b>$.timeEntry.disableFor(&hellip;</b>, &hellip;)</code> with
				<code><b>$(&hellip;).timeEntry('disable'</b>, &hellip;)</code></li>
			<li>Replace <code><b>$.timeEntry.isDisabled(&hellip;)</b></code> with
				<code><b>$(&hellip;).timeEntry('isDisabled')</b></code></li>
			<li>Replace <code><b>$.timeEntry.setTimeFor(&hellip;</b>, &hellip;)</code> with
				<code><b>$(&hellip;).timeEntry('setTime'</b>, &hellip;)</code></li>
			<li>Replace <code><b>$.timeEntry.getTimeFor(&hellip;)</b></code> with
				<code><b>$(&hellip;).timeEntry('getTime')</b></code></li>
		</ul>
	</div>
	<div id="quick" class="feature">
		<h2>Quick Reference</h2>
		<p>A full list of all possible settings is shown below. Note that not all would apply in all cases.
			For more detail see the <a href="timeEntryRef.html">documentation reference</a> page.</p>
		<pre><code class="js">$(selector).timeEntry({
	show24Hours: false, // True to use 24 hour time, false for 12 hour (AM/PM)
	separator: ':', // The separator between time fields
	ampmPrefix: '', // The separator before the AM/PM text
	ampmNames: ['AM', 'PM'], // Names of morning/evening markers
	// The popup texts for the spinner image areas
	spinnerTexts: ['Now', 'Previous field', 'Next field', 'Increment', 'Decrement']
	
	appendText: '', // Display text following the input box, e.g. showing the format
	showSeconds: false, // True to show seconds as well, false for hours/minutes only
	timeSteps: [1, 1, 1], // Steps for each of hours/minutes/seconds when incrementing/decrementing
	initialField: 0, // The field to highlight initially, 0 = hours, 1 = minutes, ...
	useMouseWheel: true, // True to use mouse wheel for increment/decrement if possible,
		// false to never use it
	defaultTime: null, // The time to use if none has been set, leave at null for now
	minTime: null, // The earliest selectable time, or null for no limit
	maxTime: null, // The latest selectable time, or null for no limit
	spinnerImage: 'spinnerDefault.png', // The URL of the images to use for the time spinner
		// Seven images packed horizontally for normal, each button pressed, and disabled
	spinnerSize: [20, 20, 8], // The width and height of the spinner image,
		// and size of centre button for current time
	spinnerBigImage: '', // The URL of the images to use for the expanded time spinner
		// Seven images packed horizontally for normal, each button pressed, and disabled
	spinnerBigSize: [40, 40, 16], // The width and height of the expanded spinner image,
		// and size of centre button for current time
	spinnerIncDecOnly: false, // True for increment/decrement buttons only, false for all
	spinnerRepeat: [500, 250], // Initial and subsequent waits in milliseconds
		// for repeats on the spinner buttons
	beforeShow: null, // Function that takes an input field and
		// returns a set of custom settings for the time entry
	beforeSetTime: null // Function that runs before updating the time,
		// takes the old and new times, and minimum and maximum times as parameters,
		// and returns an adjusted time if necessary
});
 
$.timeEntry.setDefaults(settings) // Set default values for all instances
 
$(selector).timeEntry('change', settings) // Change the settings for selected instances
 
$(selector).timeEntry('destroy') // Remove the time entry functionality
 
$(selector).timeEntry('disable') // Disable time entry
 
$(selector).timeEntry('enable') // Enable time entry
 
$(selector).timeEntry('isDisabled') // Determine if field is disabled
 
$(selector).timeEntry('setTime', time) // Set the time for the instance
 
$(selector).timeEntry('getTime') // Retrieve the currently selected time</code></pre>
	</div>
</div>
<h2>Usage</h2>
<ol>
<li>Include the jQuery library in the head section of your page.
	<pre><code class="html">&lt;script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"&gt;&lt;/script&gt;</code></pre></li>
<li>Download and include the jQuery Time Entry CSS and JavaScript in the head section of your page.
	<pre><code class="html">&lt;style type="text/css"&gt;@import "jquery.timeentry.css";&lt;/style&gt;
&lt;script type="text/javascript" src="jquery.timeentry.js"&gt;&lt;/script&gt;</code></pre>
    Alternately, you can use the packed version <code>jquery.timeentry.pack.js</code> (11.3K vs 35.7K)
	or minified version <code>jquery.timeentry.min.js</code> (16.2K, 5.1K after zipping).</li>
<li>Connect the time entry functionality to your input controls.
	<pre><code class="js">$(selector).timeEntry();</code></pre>
	You can include custom settings as part of this process.
	<pre><code class="js">$(selector).timeEntry({show24Hours: true, showSeconds: true});</code></pre></li>
</ol>
<p> For more detail see the
	<a href="timeEntryRef.html">documentation reference</a> page.
	Or see a <a href="timeEntryBasics.html">minimal page</a> that you could
	use as a basis for your own investigations.</p>
<h2>Localisations</h2>
<p><a name="l10nPkgs"></a>Localisation packages are available for download and 
	should be loaded after the main time entry code. These packages 
	automatically apply their settings as global default values.</p>
<ul>
	<li>Chinese - Simplified (????) - <a href="js/jquery.timeentry-zh-CN.js">jquery.timeentry-zh-CN.js</a> (thanks to Cloudream)</li>
	<li>Czech (?eština) - <a href="js/jquery.timeentry-cs.js">jquery.timeentry-cs.js</a> (thanks to Stanislav Kurinec)</li>
	<li>Dutch (Nederlands) - <a href="js/jquery.timeentry-nl.js">jquery.timeentry-nl.js</a> (thanks to Glenn Plas)</li>
	<li>French (Français) - <a href="js/jquery.timeentry-fr.js">jquery.timeentry-fr.js</a></li>
	<li>German (Deutsch) - <a href="js/jquery.timeentry-de.js">jquery.timeentry-de.js</a> (thanks to Eyk Schulz)</li>
	<li>Hungarian (Magyar) - <a href="js/jquery.timeentry-hu.js">jquery.timeentry-hu.js</a> (thanks to Karaszi Istvan)</li>
	<li>Icelandic (Íslenska) - <a href="js/jquery.timeentry-is.js">jquery.timeentry-is.js</a> (thanks to Már Örlygsson)</li>
	<li>Italian (Italiano) - <a href="js/jquery.timeentry-it.js">jquery.timeentry-it.js</a> (thanks to A Paella)</li>
	<li>Japanese (???) - <a href="js/jquery.timeentry-ja.js">jquery.timeentry-ja.js</a> (thanks to Yuuki Takahashi)</li>
	<li>Polish (Polski) - <a href="js/jquery.timeentry-pl.js">jquery.timeentry-pl.js</a> (thanks to Jacek Wysocki)</li>
	<li>Portugese (Português) - <a href="js/jquery.timeentry-pt.js">jquery.timeentry-pt.js</a> (thanks to Dino Sane)</li>
	<li>Romanian (Român?) - <a href="js/jquery.timeentry-ro.js">jquery.timeentry-ro.js</a> (thanks to Edmond L)</li>
	<li>Russian (???????) - <a href="js/jquery.timeentry-ru.js">jquery.timeentry-ru.js</a> (thanks to Andrew Stromnov)</li>
	<li>Slovak (Sloven?ina) - <a href="js/jquery.timeentry-sk.js">jquery.timeentry-sk.js</a> (thanks to Vojtech Rinik)</li>
	<li>Spanish (Español) - <a href="js/jquery.timeentry-es.js">jquery.timeentry-es.js</a> (thanks to Diego Kuperman)</li>
	<li>Swedish (Svenska) - <a href="js/jquery.timeentry-sv.js">jquery.timeentry-sv.js</a> (thanks to Anders Ekdahl)</li>
	<li>Turkish (Türkçe) - <a href="js/jquery.timeentry-tr.js">jquery.timeentry-tr.js</a> (thanks to Vural Dinçer)</li>
	<li>Vietnamese (Ti?ng Vi?t) - <a href="js/jquery.timeentry-vi.js">jquery.timeentry-vi.js</a> (thanks to Le Thanh Huy)</li>
</ul>
<p>Other translations are welcomed.</p>
<h2>Comments</h2>
<blockquote><p>This is a very useful little widget, nice job!</p></blockquote>
<div><cite>Karen Stevenson</cite></div>
<blockquote><p>We've all been very happy with it and think it's an excellent intuitive way
	of gathering time input in an easy and concise fashion.</p></blockquote>
<div><cite>Jason Blumenkrantz</cite></div>
<blockquote><p>Thank you very much for your TimeEntry. It is incredibly useful, and I have 
	been putting it in every form for time checking. Well done.</p></blockquote>
<div><cite>Vern Baker</cite></div>
<p style="clear: both;">Contact <a href="index.html">Keith Wood</a> at kbwood{at}iinet.com.au 
	with comments or suggestions.</p>
<h2><a name="changes">Change History</a></h2>
<table border="0" id="history" width="100%">
<tr><th>Version</th><th>Date</th><th>Changes</th></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.4.6.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.4.6');">
	1.4.6</a></td><td>29&nbsp;Aug&nbsp;2009</td><td><ul>
	<li>Updated direct entry to allow more single digit values</li>
	<li>Added localisations: Icelandic</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.4.5.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.4.5');">
	1.4.5</a></td><td>04&nbsp;Jul&nbsp;2009</td><td><ul>
	<li>Changed inline configuration to work from metadata in <code>class</code> attribute</li>
	<li>Ensure focus when mouse wheel is used</li>
	<li>Added localisations: Japanese, Vietnamese</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.4.4.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.4.4');">
	1.4.4</a></td><td>23&nbsp;May&nbsp;2009</td><td><ul>
	<li>Handle expanded spinner in <code>relative</code> container</li>
	<li>Only trigger the field change event if the value actually changed</li>
	<li>Corrected stealing of focus on spinner over/out</li>
	<li>Corrected field highlighting on initial focus and with text alignment</li>
	<li>Tuned sub-field determination in IE</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.4.3.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.4.3');">
	1.4.3</a></td><td>14&nbsp;Mar&nbsp;2009</td><td><ul>
	<li>Added <code>spinnerBigImage</code> and <code>spinnerBigSize</code> settings
		for an on-demand expanded spinner</li>
	<li>Renamed spinner images</li>
	<li>Added localisations: Czech</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.4.2.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.4.2');">
	1.4.2</a></td><td>07&nbsp;Feb&nbsp;2009</td><td><ul>
	<li>Added Google Chrome support</li>
	<li>Corrected error when attaching to a non-visible field</li>
	<li>Only restore focus if already there</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.4.1.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.4.1');">
	1.4.1</a></td><td>29&nbsp;Nov&nbsp;2008</td><td><ul>
	<li>Corrected error in scroll position calculation</li>
	<li>Added localisations: Turkish</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.4.0.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.4.0');">
	1.4.0</a></td><td>12&nbsp;Jul&nbsp;2008</td><td><ul>
	<li>Internal changes for instance values</li>
	<li>Added <code>beforeSetTime</code> setting to allow for further restrictions before updating time</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.3.1.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.3.1');">
	1.3.1</a></td><td>07&nbsp;Jun&nbsp;2008</td><td><ul>
	<li>Added <code>defaultTime</code> setting</li>
	<li>Allow <code>setTime</code> command and <code>defaultTime</code> option to use relative times</li>
	<li>Fix bug in keystroke entry in 12-hour mode for PM hours</li>
	<li>When already in a field, click selects underlying field</li>
	<li>Clone datetime used in set time</li>
	<li>Remove FF CSS patch for v3</li>
	<li>Added localisations: Dutch</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.3.0.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.3.0');">
	1.3.0</a></td><td>23&nbsp;Feb&nbsp;2008</td><td><ul>
	<li>Updated interface to conform to jQuery UI standards</li>
	<li>Added 'destroy' command</li>
	<li>Added <code>initialField</code> setting</li>
	<li>Added backwards compatibility module for v1.2.6</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.2.6.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.2.6');">
	1.2.6</a></td><td>29&nbsp;Dec&nbsp;2007</td><td><ul>
	<li>Corrected handling of time entry controls in fixed areas</li>
	<li>Made button images transparent</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.2.5.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.2.5');">
	1.2.5</a></td><td>13&nbsp;Oct&nbsp;2007</td><td><ul>
	<li>Spinner images now include disabled view</li>
	<li>Renamed <code>timeEntry</code> object to <code>$.timeEntry</code></li>
	<li>Renamed <code>fieldSettings</code> setting to <code>beforeShow</code></li>
	<li>Enhance parameters for <code>getTimeFor</code>, <code>setTimeFor</code> and <code>isDisabled</code></li>
	<li>Added localisations: Portugese</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.2.4.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.2.4');">
	1.2.4</a></td><td>29&nbsp;Sep&nbsp;2007</td><td><ul>
	<li>Upgraded to work with jQuery 1.2</li>
	<li>Corrected spinner clicks when scrolled</li>
	<li>Corrected spinner switching when clicked</li>
	<li>Corrected Chinese localisation</li>
	<li>Added localisations: Swedish</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.2.3.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.2.3');">
	1.2.3</a></td><td>14&nbsp;Sep&nbsp;2007</td><td><ul>
	<li>Dual licenced GPL and CC</li>
	<li>Corrected for new extend "feature" in latest jQuery releases</li>
	<li>Processed fields marked with <code>hasTimeEntry</code> class and won't be re-processed</li>
	<li>Added localisations: Romanian, Slovak, Spanish</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.2.2.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.2.2');">
	1.2.2</a></td><td>01&nbsp;Sep&nbsp;2007</td><td><ul>
	<li>Changed spinner image to contain all pressed images in one</li>
	<li>Spinner images converted to PNG</li>
	<li>Removed <code>spinnerPath</code> and <code>spinnerClickImages</code> attributes</li>
	<li>Added <code>spinnerIncDecOnly</code> attribute</li>
	<li>Added localisations: Simplified Chinese, Italian, Hungarian, Polish, Russian</li>
	<li>Fixed Opera bugs</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.2.1.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.2.1');">
	1.2.1</a></td><td>11&nbsp;Aug&nbsp;2007</td><td><ul>
	<li>Renamed package to <code>jquery.timeentry.*</code> to follow jQuery conventions</li>
	<li>Hid time entry declarations - functionality is only accessible via <code>timeEntry</code></li>
	<li>Added <code>ampmPrefix</code> and <code>useMouseWheel</code> attributes</li>
	<li>Added mouse wheel increment/decrement support (with 
		<a href="http://jquery.com/plugins/project/mousewheel">jquery.mousewheel.js</a>)</li>
	<li>Allow double click to select a time sub-field</li>
	<li>Added handling for paste events to validate entry</li>
	<li>Trigger input field's <code>onchange</code> event when the time is updated</li>
	<li>Added more spinner examples</li>
	<li>Added German localisation</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.2.0.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.2.0');">
	1.2.0</a></td><td>28&nbsp;Jul&nbsp;2007</td><td><ul>
	<li>Rewritten to allow multiple instances on a page each with different settings</li>
	<li>Allow for inline configuration of the time entry instance from attributes on the input</li>
	<li>Added <code>setDefaults()</code>, <code>reconfigureFor()</code>,
		<code>setTimeFor()</code>, <code>getTimeFor()</code>, <code>spinnerPath</code></li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.1.2.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.1.2');">
	1.1.2</a></td><td>13&nbsp;Jul&nbsp;2007</td><td><ul>
	<li>Fixed bug in calculating spinner position</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.1.1.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.1.1');">
	1.1.1</a></td><td>28&nbsp;Jun&nbsp;2007</td><td><ul>
	<li>Fixed bug in time parsing for 12AM/PM</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.1.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.1.0');">
	1.1</a></td><td>27&nbsp;Jun&nbsp;2007</td><td><ul>
	<li>Added enable/disable handling</li>
	<li>Added <code>fieldSettings</code> attribute to allow customisation per field</li>
	<li>Added spinner auto-repeat on the increment and decrement buttons</li>
	<li>Added alternate images when a spinner "button" is clicked</li>
</ul></td></tr>
<tr><td><a href="zip/jquery.timeentry.package-1.0.zip" onclick="pageTracker._trackPageview('/downloads/timeentry-1.0.0');">
	1.0</a></td><td>20&nbsp;Jun&nbsp;2007</td><td><ul>
	<li>Initial release</li>
</ul></td></tr>
</table>
<script type="text/javascript"> 
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript"> 
var pageTracker = _gat._getTracker("UA-4715900-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>
</body>
</html>
7
