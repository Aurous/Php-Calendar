<html>
<head>
<title>Event Calendar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="lib/mystyle.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="/lib/myscript.js">
</script>
<script>
function refreshAt(hours, minutes, seconds) {
    var now = new Date();
    var then = new Date();

    if(now.getHours() > hours ||
       (now.getHours() == hours && now.getMinutes() > minutes) ||
        now.getHours() == hours && now.getMinutes() == minutes && now.getSeconds() >= seconds) {
        then.setDate(now.getDate() + 1);
    }
    then.setHours(hours);
    then.setMinutes(minutes);
    then.setSeconds(seconds);

    var timeout = (then.getTime() - now.getTime());
    setTimeout(function() { window.location.reload(true); }, timeout);
}
refreshAt(0, 1, 0)
</script>
</head>
<body>
<h2 align="center">Event Calendar</h2>
<table width="100%" id="no">
<tr border="0" id="no">
<td width="50%" border="0" id="no">
<?php
	include("lib/functions.php");
	include("lib/config.php");
	$obj = new eventcal();
	$obj->include_head();
	$curmonth = date("n");
	$curyear = date("Y");
	$curday = date("j");
	$date =$curday.":".$curmonth.":".$curyear;
	$obj->showMonth($curmonth,$curyear);
	$obj->todaysevent($date);
?>
</td>
<td width="50%" id="no">
<iframe name="calendar-iframe" frameborder="0" style="height: 100%; width: 100%;" src="/dateevent.php?date=<?PHP echo $curday + 1 . ":" . $curmonth . ":" . $curyear ?>">
</td>
</tr>	
</table>
<br />
</body>
</html>