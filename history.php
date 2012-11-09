<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clarity</title>
<link href="css/style.css"rel="stylesheet" type="text/css" />
 </head>
 <body>
 <div class="nav2"><p>History</p> </div>
 <div class="clear"></div>
 <p>Here are your latest 5 entries: </p>
 
 <?php
	include("config.php");
	$query = "SELECT * FROM clarity WHERE how !='NULL' ORDER BY ctime DESC";
	echo "</br>";
	$result = mysql_query($query);
	if($result === FALSE) {
		echo "</br> Sorry, bad call. <br />";
		die(mysql_error());
	}
		echo "<p>";
	for ($i = 0; $i< 5; $i++) {
		$row = mysql_fetch_array($result);
		echo "Activity: ", $row['what'], "</br>", "Rating: ", $row['how'], "</br>", $row['when'], "Notes: ", $row['notes'];
    	echo "</br>";
	    echo "<br>";
	}
	echo "</p>";
?>
</html>
</br>
</br>
</br>
</br>
</br>
</br>
</br>	
<div id="footer">
	<div class="box">
		<img src="images/Ribbon.png" height="64" style ="max-width: 320px" alt="Whole Ribbon" usemap="#ribbonMap" align ="center">
		<map name="ribbonMap">
		<area shape = "rect" coords="0,0,64,64" alt="Progress" href="progress.php"> </area>
		<area shape = "rect" coords="64,0,128,64" alt="Log Activity" href="log.html">
		<area shape = "rect" coords="128,0,192,64" alt="History" href="history.php">
		<area shape = "rect" coords="192,0,256,64" alt="Recommendations" href="recommendtest.php">
		<area shape = "rect" coords="256,0,320,64" alt="Help" href="help.html">
	</div>
</div>
</body>
</html>