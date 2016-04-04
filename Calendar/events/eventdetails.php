<html>
<head>
<title>Event Calendar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lib/mystyle.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../lib/myscript.js">
</script>
<?php
	session_start();
	include("../lib/config.php");
	include("../lib/functions.php");
	$obj = new eventcal();
		$i = $_GET['id'];
		$obj->event($i);
		$obj->footer();
?>
