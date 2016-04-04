<?php
	session_start();
	include("../lib/config.php");
	include("../lib/functions.php");
	$obj = new eventcal();
		$obj->include_head();
		$obj->viewevents();
?>
	

<?php
		$obj->footer();
?>
