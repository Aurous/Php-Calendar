<html>
<head>
<title>Event Calendar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/lib/mystyle.css" rel="stylesheet" type="text/css"> 
<script language="JavaScript" src="/lib/myscript.js">
</script>
</head>
<body>
<?php
	session_start();
	include("../lib/config.php");
	include("../lib/functions.php");
	$obj = new eventcal();
	if(isset($_POST['addevent']))
	{
		$date = $_POST['day'].":".$_POST['mnth'].":".$_POST['year'];
		$eventitle = $_POST['eventtitle'];
		if($eventitle !='')
		{
				$desc = $_POST['desc'];
				if($desc == '')
				{
					$desc = "No description";
				}
				$cont = $date ."-"."\r\n";
				$cont = $cont.$eventitle."-"."\r\n";
				$cont = $cont.$desc."\r\n"."/";
				$dbfile = ROOT."/".DBFILE;
				$handle = fopen($dbfile,"a+");
				fwrite($handle,$cont);
				fclose($handle);
				header("location: ../dateevent.php?date=" . $date);
		}
	}else{
		if(isset($_GET['day']) AND isset($_GET['month']) AND isset($_GET['year'])){
			$day = $_GET['day'];
			$month = $_GET['month'];
			$year = $_GET['year'];	
		}
	}
?>
	<form action="" method="post" name="frm">
		<table align="center" width="450" border="0">
				<tr><th colspan="2">Add Event</th></tr>
				<tr><td>Date (M/D/Y):</td><td>
							<select name="day">
							<?php
								for($i=1; $i < 32 ; $i++)
								{
									if(isset($day) AND $day == $i){
										echo "<option selected='selected' value='".$i."'>".$i."</option>";
									}else{
										echo "<option value='".$i."'>".$i."</option>";
									}
								}
							?>
							</select>
							<select name="mnth">
							<?php
								for($i=1; $i < 13 ; $i++)
								{
									if(isset($month) AND $month == $i){
										echo "<option selected='selected' value='".$i."'>".$i."</option>";
									}else{
										echo "<option value='".$i."'>".$i."</option>";
									}
								}
							?>
							</select>
						<select name="year">
							<?php
								for($i=2016; $i < 2020 ; $i++)
								{
									if(isset($year) AND $year == $i){
										echo "<option selected='selected' value='".$i."'>".$i."</option>";
									}else{
										echo "<option value='".$i."'>".$i."</option>";
									}
								}
							?>
							</select>
				</td></tr>
				<tr><td>Event Title:</td><td><input type="text" name="eventtitle"></td></tr>
				<tr><td>Event Description:</td><td><textarea name="desc" cols="30" rows="10"></textarea></td></tr>
				<tr><th colspan="2"><input type="submit" name="addevent" value="Add Event" onClick="return valform();"><!--&nbsp;&nbsp;<INPUT TYPE="button" VALUE="Go Back" onClick="history.go(-1)">--></th></tr>
		</table>
	</form>
<?php
		$obj->footer();
?>

