<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/ico" href="http://www.sprymedia.co.uk/release-datatables/media/images/favicon.ico" />
		
		<title>DataTables example</title>
		<style type="text/css" title="currentStyle">
			@import "css/demo_page.css";
			@import "css/demo_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="js/jquery-1.3.2.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('.dataTable').dataTable();
			} );
		</script>
	</head>
	<body id="dt_example">
		<div id="container">
			<div class="full_width big">
				<i>DataTables</i> multiple tables example
			</div>
			
			<h1>Preamble</h1>
			<p>Using standard jQuery selector syntax with <i>DataTables</i> it is trivial to initialise multiple tables with a single line of Javascript, as shown below. All tables are completely independent, but share the parameters passed thought the initialiser object (for example if you specific the Spanish language file, all tables will be shown in Spanish).</p>
			
			<h1>Live example</h1>
			
			<p style="font-weight: bold;">Trident based browsers</p>
			<div id="demo_trident">
<table cellpadding="0" cellspacing="0" border="0" class="display dataTable" id="allan">
	<thead>
		<tr>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</thead>
	<tbody>
		<tr class="gradeX">
			<td>Internet
				 Explorer 4.0</td>
			<td>Win 95+</td>
			<td class="center">4</td>
			<td class="center">X</td>
		</tr>
		<tr class="gradeC">
			<td>Internet
				 Explorer 5.0</td>
			<td>Win 95+</td>
			<td class="center">5</td>
			<td class="center">C</td>
		</tr>
		<tr class="gradeA">
			<td>Internet
				 Explorer 5.5</td>
			<td>Win 95+</td>
			<td class="center">5.5</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Internet
				 Explorer 6</td>
			<td>Win 98+</td>
			<td class="center">6</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Internet Explorer 7</td>
			<td>Win XP SP2+</td>
			<td class="center">7</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>AOL browser (AOL desktop)</td>
			<td>Win XP</td>
			<td class="center">6</td>
			<td class="center">A</td>
		</tr>
	</table>
			</div>
			<div class="clear"></div>
	
	
			<p style="clear:both; margin-top:4em; font-weight: bold;">Gecko based browsers</p>
			<div id="demo_gecko">
<table cellpadding="0" cellspacing="0" border="0" class="display dataTable">
	<thead>
		<tr>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</thead>
	<tbody>
		<tr class="gradeA">
			<td>Firefox 1.0</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.7</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Firefox 1.5</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.8</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Firefox 2.0</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.8</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Firefox 3.0</td>
			<td>Win 2k+ / OSX.3+</td>
			<td class="center">1.9</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Camino 1.0</td>
			<td>OSX.2+</td>
			<td class="center">1.8</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Camino 1.5</td>
			<td>OSX.3+</td>
			<td class="center">1.8</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Netscape 7.2</td>
			<td>Win 95+ / Mac OS 8.6-9.2</td>
			<td class="center">1.7</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Netscape Browser 8</td>
			<td>Win 98SE+</td>
			<td class="center">1.7</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Netscape Navigator 9</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.8</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Mozilla 1.0</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Mozilla 1.1</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.1</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Mozilla 1.2</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.2</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Mozilla 1.3</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.3</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Mozilla 1.4</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.4</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Mozilla 1.5</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.5</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Mozilla 1.6</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.6</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Mozilla 1.7</td>
			<td>Win 98+ / OSX.1+</td>
			<td class="center">1.7</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Mozilla 1.8</td>
			<td>Win 98+ / OSX.1+</td>
			<td class="center">1.8</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Seamonkey 1.1</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.8</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Epiphany 2.20</td>
			<td>Gnome</td>
			<td class="center">1.8</td>
			<td class="center">A</td>
		</tr>
	</table>
			</div>
			<div class="clear"></div>
	
	
			<p style="clear:both; margin-top:4em; font-weight: bold;">WebKit based browsers (note no platform)</p>
			<div id="demo_webkit">
<table cellpadding="0" cellspacing="0" border="0" class="display dataTable">
	<thead>
		<tr>
			<th>Browser</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</thead>
	<tbody>
		<tr class="gradeA">
			<td>Safari 1.2</td>
			<td class="center">125.5</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Safari 1.3</td>
			<td class="center">312.8</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Safari 2.0</td>
			<td class="center">419.3</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Safari 3.0</td>
			<td class="center">522.1</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>OmniWeb 5.5</td>
			<td class="center">420</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>iPod Touch / iPhone</td>
			<td class="center">420.1</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>S60</td>
			<td class="center">413</td>
			<td class="center">A</td>
		</tr>
	</table>
			</div>
			<div class="spacer"></div>
			
			
			<h1>Initialisation code</h1>
			<pre>$(document).ready(function() {
	$('.dataTable').dataTable();
} );</pre>
			
			
			<h1>Other examples</h1>
			<h2>Basic initialisation</h2>
			<ul>
				<li><a href="../basic_init/zero_config.html">Zero configuration</a></li>
				<li><a href="../basic_init/filter_only.html">Feature enablement</a></li>
				<li><a href="../basic_init/table_sorting.html">Sorting data</a></li>
				<li><a href="../basic_init/multi_col_sort.html">Multi-column sorting</a></li>
				<li><a href="../basic_init/multiple_tables.html">Multiple tables</a></li>
				<li><a href="../basic_init/hidden_columns.html">Hidden columns</a></li>
				<li><a href="../basic_init/dom.html">DOM positioning</a></li>
				<li><a href="../basic_init/state_save.html">State saving</a></li>
				<li><a href="../basic_init/alt_pagination.html">Alternative pagination styles</a></li>
				<li><a href="../basic_init/language.html">Change language information (internationalisation)</a></li>
			</ul>
			
			<h2>Advanced initialisation</h2>
			<ul>
				<li><a href="../advanced_init/events_pre_init.html">Events (pre initialisation)</a></li>
				<li><a href="../advanced_init/events_post_init.html">Events (post initialisation)</a></li>
				<li><a href="../advanced_init/column_render.html">Column rendering</a></li>
				<li><a href="../advanced_init/html_sort.html">Sorting without HTML tags</a></li>
				<li><a href="../advanced_init/complex_header.html">Column grouping through col/row spans</a></li>
				<li><a href="../advanced_init/row_grouping.html">Row grouping</a></li>
				<li><a href="../advanced_init/row_callback.html">Row callback</a></li>
				<li><a href="../advanced_init/footer_callback.html">Footer callback</a></li>
				<li><a href="../advanced_init/language_file.html">Change language information from a file (internationalisation)</a></li>
			</ul>
			
			<h2>Data sources</h2>
			<ul>
				<li><a href="../data_sources/dom.html">DOM</a></li>
				<li><a href="../data_sources/js_array.html">Javascript array</a></li>
				<li><a href="../data_sources/ajax.html">Ajax source</a></li>
				<li><a href="../data_sources/server_side.html">Server side processing</a></li>
			</ul>
			
			<h2>Server-side processing</h2>
			<ul>
				<li><a href="../server_side/server_side.html">Obtain server-side data</a></li>
				<li><a href="../server_side/custom_vars.html">Add extra HTTP variables</a></li>
				<li><a href="../server_side/post.html">Use HTTP POST</a></li>
				<li><a href="../server_side/column_ordering.html">Custom column ordering (in callback data)</a></li>
				<li><a href="../server_side/pipeline.html">Pipelining data (reduce Ajax calls for paging)</a></li>
				<li><a href="../server_side/row_details.html">Show and hide details about a particular record</a></li>
			</ul>
			
			<h2>API</h2>
			<ul>
				<li><a href="../api/add_row.html">Dynamically add a new row</a></li>
				<li><a href="../api/multi_filter.html">Individual column filtering</a></li>
				<li><a href="../api/highlight.html">Highlight rows and columns</a></li>
				<li><a href="../api/row_details.html">Show and hide details about a particular record</a></li>
				<li><a href="../api/select_row.html">User selectable rows (multiple rows)</a></li>
				<li><a href="../api/select_single_row.html">User selectable rows (single row) and delete rows</a></li>
				<li><a href="../api/editable.html">Editable rows (with jEditable)</a></li>
				<li><a href="../api/form.html">Submit form with elements in table</a></li>
				<li><a href="../api/show_hide.html">Show and hide columns dynamically</a></li>
				<li><a href="../api/plugin_api.html">Add custom API functions (plug-ins)</a></li>
					<li><a href="../api/sorting_plugin.html">Sorting and type detection (plug-ins)</a></li>
					<li><a href="../api/paging_plugin.html">Custom pagination controls (plug-ins)</a></li>
				<li><a href="../api/range_filtering.html">Range filtering / custom filtering (plug-ins)</a></li>
				<li><a href="../api/regex.html">Regular expression filtering</a></li>
			</ul>
			
			
			<p>Please refer to the <a href="http://www.datatables.net/"><i>DataTables</i> documentation</a> for full information about its API properties and methods.</p>
			
			
			<div id="footer" style="text-align:center;">
				<span style="font-size:10px;">
					DataTables &copy; Allan Jardine 2008-2009.<br>
					Information in the table &copy; <a href="http://www.u4eatech.com">U4EA Technologies</a> 2007-2009.</span>
			</div>
		</div>
	</body>
</html>
