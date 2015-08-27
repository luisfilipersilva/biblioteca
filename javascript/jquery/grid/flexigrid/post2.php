<?

function runSQL($rsql) {

	$db['default']['hostname'] = "10.121.240.97";
	$db['default']['username'] = 'felipe';
	$db['default']['password'] = "game18";
	$db['default']['database'] = "db_Ordem_Judicial";
	
	$db['live']['hostname'] = 'localhost';
	$db['live']['username'] = '';
	$db['live']['password'] = '';
	$db['live']['database'] = '';
	
	$active_group = 'default';
	
	$base_url = "http://".$_SERVER['HTTP_HOST'];
	$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	if (strpos($base_url,'webplicity.net')) $active_group = "live";

	$connect = mysql_connect($db['default']['hostname'],$db['default']['username'],$db['default']['password']) or die ("Error: could not connect to database");
	$db = mysql_select_db($db['default']['database']);
	
	$result = mysql_query($rsql) or die ($rsql);
	return $result;
	mysql_close($connect);
}

function countRec($fname,$tname) {
	$sql = "SELECT count($fname) FROM $tname ";
	$result = runSQL($sql);
	while ($row = mysql_fetch_array($result)) {
		return $row[0];
	}	
}
$page = $_POST['page'];
$rp = $_POST['rp'];
$sortname = $_POST['sortname'];
$sortorder = $_POST['sortorder'];

if (!$sortname) $sortname = 'id_ordem';
if (!$sortorder) $sortorder = 'desc';

$sort = "ORDER BY $sortname $sortorder";

if (!$page) $page = 1;
if (!$rp) $rp = 10;

$start = (($page-1) * $rp);

$limit = "LIMIT $start, $rp";

$query = $_POST['query'];
$qtype = $_POST['qtype'];

$where = "";
if ($query) $where = " WHERE $qtype LIKE '%$query%' ";

$sql = "SELECT id_ordem, ordem_judicial, tipo, responsavel, data_prazo, data_entrada, priorizar FROM tbl_ordem_judicial $where $sort $limit";
$result = runSQL($sql);

$total = countRec("id_ordem","tbl_ordem_judicial $where");
/*
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-type: text/x-json");
*/
$json = "";
$json .= "{\n";
$json .= "page: $page,\n";
$json .= "total: $total,\n";
$json .= "rows: [";
$rc = false;
while ($row = mysql_fetch_array($result)) {
	if ($rc) $json .= ",";
	$json .= "\n{";
	$json .= "cell:['".$row['id_ordem']."'";
	$json .= ",'".addslashes($row['ordem_judicial'])."'";
	$json .= ",'".addslashes($row['tipo'])."'";
	$json .= ",'".addslashes($row['responsavel'])."'";
	$json .= ",'".$row['data_prazo']."'";
	$json .= ",'".$row['data_entrada']."'";
	$json .= ",'".$row['priorizar']."']";
	$json .= "}";
	$rc = true;		
}
$json .= "]\n";
$json .= "}";
echo $json;
?>