<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script src="//cdn.optimizely.com/js/139087747.js"></script>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Clarity</title>
    <link href="css/style.css"rel="stylesheet" type="text/css" />
</head>

<body>
   <div class="nav2" style="position:relative;text-align:center;">	
	    <p>History</p>
		<a href="logout.php" style="position:absolute; top:0px; right:0px; text-decoration:none; font-size:18px; font-family:Apex New, Helvetica, sans-serif; color:#ffffff; margin:0 5px; padding:4px 0;">Log Out</a>
    </div>

<!--	<table border="1" align ="center">
<tr> <td>Time</td> <td> Activity </td> <td> Happiness Level</td> </tr>
<tr> <td>12:40PM</td> <td>Walk </td> <td>+3</td> </tr>
<tr> <td>11:05AM</td> <td>Sing </td> <td>+1</td> </tr>
<tr> <td>10:10PM</td> <td>Shower </td> <td>+6</td> </tr>
<tr> <td>9:10AM</td> <td>Binge </td> <td>-7</td> </tr>	
</table>	
</br>-->

<?php
	include("config.php");
	$num = $_POST["numRecs"];
	$username = $_COOKIE['username'];
	//echo "<p> Hello ", $username, "</p>";
	
	$query = "SELECT * FROM clarity WHERE how !='NULL' AND username='$username' ORDER BY ctime DESC";
	echo "</br>";

	$result = mysql_query($query);
	if ($num==100) {
		echo "<p>";
		while($row = mysql_fetch_array($result)) {
			echo "Activity: ", $row['what'], "</br>", "Rating: ", $row['how'], "</br>", $row['when'], "Notes: ", $row['notes'];
			echo "</br>";
			echo "<br>";
		}
		echo "<p/>";
	} else {
		echo "<p> Here are your latest ", $num, " entries: </p>";
		echo "<p>";
		for ($i = 0; $i < $num; $i++)
		{
			$row = mysql_fetch_array($result);
			if ($row) {
				echo "Activity: ", $row['what'], "</br>", "Rating: ", $row['how'], "</br>", $row['when'], "Notes: ", $row['notes'];
				echo "</br>";
				echo "<br>";
			}
		}
		echo "</p>";
	}
	
	echo "<div align=\"center\">";
		echo "<p>Viewing options:";
			echo "<form action=\"moreHistory.php\" id=\"newRecForm\" method=\"post\">";
				echo "<p> Number of entries: ";
				echo "<select name=\"numRecs\">";
					echo "<option value=\"5\">5</option>";
					echo "<option value=\"10\">10</option>";
					echo "<option value=\"15\">15</option>";
					echo "<option selected=\"selected\" value=\"100\">See All</option>";
				echo "</select>";
				echo "<input type=\"submit\" value=\"Submit\"/>";
			echo "</form>";
		echo "</p>";
	echo "</div>";
?>
</br>
<!--
<p style="text-align:center;">
	<input type="button" style="height: 20px; width: 70px; text-align:center" onClick="location.href='construction.html'" value="Edit"/>
</p>
-->
</br>
</br>
</br>
</br>
</br>
<div id="footer">
	<div class="box">
		<img src="images/RibbonHistory.png" height="64" style ="max-width: 320px" alt="Whole Ribbon" usemap="#ribbonMap" align ="center">
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