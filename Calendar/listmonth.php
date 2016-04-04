<html>
<head>
<title>Event Calendar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="lib/mystyle.css" rel="stylesheet" type="text/css"> 
</head>
<body>
<?php
	include("lib/functions.php");
	include("lib/config.php");
	$obj = new eventcal();
	$curmonth = $_GET['mnth'];
	$curyear = date("Y");
	$curday = date("j");
	$date =$curday.":".$curmonth.":".$curyear;
	$obj->showMonth($curmonth,$curyear);

?>
</body>
</html>