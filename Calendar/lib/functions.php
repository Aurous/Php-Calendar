<?php
/*

Class Name: eventcal
Clas Title: Event Calendar
Purpose: Event calendar script, can be controlled from the back end.
Version: 1.0
Author: Manu Abraham
URL: http://www.manuabraham.info
email : manu@phppals.net, manu@manuabraham.info
Company : phppals
URL: http://phppals.net

License: GPL
You can freely use, modify, distribute this script. But a credit line is appreciated.

Installation:
see readme.txt for details

*/
class eventcal{
function showMonth($month, $year)
{
	$curday = date("j");
	$curmnth = date("n");
	$curyear =date("Y");
	$date = mktime(12, 0, 0, $month, 1, $year);
    $daysInMonth = date("t", $date);
    // calculate the position of the first day in the calendar (sunday = 1st column, etc)
    $offset = date("w", $date);
    $rows = 1;
    echo "<table border=\"1\" width=\"450\" align=\"center\" cellspacing=\"0\" cellpadding=\"10\">\n";
	echo "<tr><td><a href='listmonth.php?mnth=".($month-1)."' target='calendar-iframe'>".date('M', mktime(0,0,0,$month,0,$year))."</a></td><th colspan=\"5\" align=\"center\">".date("F Y", $date) ."</th><td align=\"right\"><a href='listmonth.php?mnth=".($month+1)."'target='calendar-iframe'>".date('M', mktime(0,0,0,$month+2,0,$year))."</a></td></tr>";
    echo "\t<tr><th>Su</th><th>M</th><th>Tu</th><th>W</th><th>Th</th><th>F</th><th>Sa</th></tr>";
    echo "\n\t<tr>";

    for($i = 1; $i <= $offset; $i++)
    {
        echo "<td></td>";
    }
    for($day = 1; $day <= $daysInMonth; $day++)
    {
        if( ($day + $offset - 1) % 7 == 0 && $day != 1)
        {
            echo "</tr>\n\t<tr>";
            $rows++;
        }

     		if(($curday == $day ) && ($curmnth ==$month ))
       		 echo "<td class='myNewStyle'>" . $day . "</td>";
			else
			 echo "<td><a href=dateevent.php?date=".$day.":".$curmnth.":".$curyear."  target='calendar-iframe' >" . $day . "</a></td>";
    }
    while( ($day + $offset) <= $rows * 7)
    {
        echo "<td></td>";
        $day++;
    }
    echo "</tr>\n";
    echo "</table>\n"; 
}
		function viewevents()
		{
 				echo "<table align=\"center\" width=\"450\" border=\"0\">
				<tr><th colspan=\"4\">View Events</th></tr>";
				$test = file_get_contents(ROOT."/".DBFILE);
				$arr = explode("/",$test);
				$i =1;
				foreach ($arr as $val)
				{
					if($val !='')
					{
						$str = split("-",$val);
						echo "<tr><td>".$i."</td><td>".str_replace(":","/",$str[0])."</td><td>".$str[1]."</td><td><a href='eventdetails.php?id=".$i."'>Details</a></td></tr>";
						$i++;
					}
					
				}
				 echo "</table>\n"; 
		}
		function event($i)
		{
				 echo "<table align=\"center\" width=\"450\" border=\"0\">";
				
				$test = file_get_contents(ROOT."/".DBFILE);
				$arr = explode("/",$test);
				
				$str = split("-",$arr[$i]);
				echo "<tr><th colspan=\"2\">Details of ".$str[0]." </th></tr>";
				echo "<tr><td>Date</td><td>".str_replace(":","/",$str[0])."</td></tr>";
				echo "<tr><td>Title</td><td>".str_replace(":","/",$str[1])."</td></tr>";
				echo "<tr><th colspan=\"2\">Event Description</th></tr>";
				echo "<tr><td colspan=\"2\">".$str[2]."</td></tr>";
				echo "</table>"; 
			
		}
		function todaysevent($date)
		{
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
							echo "<tr><td>Date (M/D/Y)</td><td>".str_replace(":","/",$str[0])."</td></tr>";
							echo "<tr><td>Title</td><td>".stripslashes($str[1])."</td></tr>";
							echo "<tr><th colspan=\"2\">Description of ".stripslashes($str[1])."</th></tr>";
							echo "<tr><td colspan=\"2\">".$str[2]."</td></tr>";
							$i++;
					}
					
				}
				echo "</table>";
		}
		function include_head()
		{
		?>
				<html>
				<head>
				<title>Event Calendar</title>
				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
				<link href="/lib/mystyle.css" rel="stylesheet" type="text/css"> 
				<script language="JavaScript" src="/lib/myscript.js">
				</script>
				</head>
				<body>
				<div align="center"><a href="/events/viewevents.php" target="calendar-iframe">View Events </a>&nbsp;&nbsp; <a href="/events/index.php" target="calendar-iframe">Add Event</a>&nbsp;&nbsp;<a href="events/editevents.php" target="calendar-iframe">Edit All Events</a></div>
				<br />
				<br />
				
		<?php
		}
	function footer()
	{
	?>
		</body>
		</html>

<?php
	
}
}
?>