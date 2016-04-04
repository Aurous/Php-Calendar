<html>
<head>
<title>Event Calendar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="lib/mystyle.css" rel="stylesheet" type="text/css"> 
</head>
<body>
<?php
	include("lib/config.php");
	include("lib/functions.php");
	$date = $_GET['date'];
	list($day, $month, $year) = explode(":", $date);
	$test = file_get_contents(ROOT."/".DBFILE);
	$arr = explode("/",$test);
	$key = in_array($date,$arr);
	echo "<table align=\"center\" width=\"450\" border=\"0\">
	<tr><th colspan=\"2\">Events on ".str_replace(":","/",$date)."</th></tr>";
	//print_r($arr);
	$i = 1;
	foreach($arr as $val)
	{
		$str = split("-",$val);
		if($str[0] == $date)
		{
		//echo $str[0];
				echo "<tr><th colspan=\"2\">Event (".$i.")</th></tr>";
				echo "<tr><td>Date</td><td>".str_replace(":","/",$str[0])."</td></tr>";
				echo "<tr><td>Title</td><td>".$str[1]."</td></tr>";
				echo "<tr><th colspan=\"2\">Description of ".$str[1]."</th></tr>";
				echo "<tr><td colspan=\"2\">".$str[2]."</td></tr>";
				$i++;
		}
		
	}
	if($i == 1)
	{
		echo "<tr><td colspan='2'>No events on ".str_replace(":","/",$date)."</td></tr>";
	}
	echo "<tr><td colspan='2' align='center'><INPUT TYPE='button' VALUE='Add Event' onClick=javascript:location.href='/events/index.php?day=$day&month=$month&year=$year'></td></tr>";
	echo "</table>\n";
?>
</body>
</html>