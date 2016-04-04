<html>
<head>
<title>Event Calendar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lib/mystyle.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../lib/myscript.js">
</script>
<?PHP
$filename = "../lib/event_list.txt";
if(isset($_POST['text'])){
	file_put_contents($filename, $_POST['text']);
}
?>
</head>
<body>
<center>
<h1>Editing All Events</h1>
<form method="POST" action="">
<textarea id="text" name="text" rows="28" cols="100">
<?PHP 
echo file_get_contents($filename);
?>
</textarea><br />
<input type="submit" value="Save" />
</form>
</center>
</body>
</html>