<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script src="//cdn.optimizely.com/js/139087747.js"></script>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Clarity</title>
     <link href="css/style.css"rel="stylesheet" type="text/css" />
    <link rel="stylesheet"  href="http://jquerymobile.com/test/css/themes/default/jquery.mobile.css" />  
	<link rel="stylesheet" href="http://jquerymobile.com/test/docs/_assets/css/jqm-docs.css"/>
    <script src="http://jquerymobile.com/test/js/jquery.js"></script>
	<script src="http://jquerymobile.com/test/docs/_assets/js/jqm-docs.js"></script>
	<script src="http://jquerymobile.com/test/js/jquery.mobile.js"></script>
</head>

<body>
    <div data-role="header" data-theme="b">
        <!--<a href="index.html" data-icon="delete" >Save</a>-->
        <h1>History</h1>
        <a rel="external" href="logout.php" data-role="button" class="ui-btn-right">Log Out</a>
    </div>


<?php
	include("config.php");
	$num = $_POST["numRecs"];
	$username = $_COOKIE['username'];
	//echo "<p> Hello ", $username, "</p>";
	
	$query = "SELECT * FROM clarity WHERE how !='NULL' AND username='$username' AND ctime != '0000-00-00 00:00' ORDER BY ctime DESC";
	echo "</br>";

	$result = mysql_query($query);
	if ($num == "Today") {
		echo "<p>";
		$dateToday = date('y-m-d', strtotime(date('Y/m/d')));
		// find today. should get: 2012-11-29
		echo "<b>Today's date: ".$dateToday."</b>";
		echo "<br>"; echo "<br>";
		$temp = TRUE;
		$i = 0;
		while($temp==TRUE){
			$row = mysql_fetch_array($result);
			$ctime = $row['ctime'];	
			$dateEntry = $ctime[2].$ctime[3].$ctime[4].$ctime[5].$ctime[6].$ctime[7].$ctime[8].$ctime[9];
			$time = $row['ctime'];
$time = $time[0].$time[1].$time[2].$time[3].$time[4].$time[5].$time[6].$time[7].$time[8].$time[9].$time[10].$time[11].$time[12].$time[13].$time[14].$time[15];
		//	echo "dateEntry is ".$dateEntry;
		// $dateEntry should be 2012-11-29
			if ($dateEntry == $dateToday) {
//				$timeEntry = $ctime[11].$ctime[12].$ctime[13].$ctime[14].$ctime[15];
				echo "<div data-role=\"collapsible-set\"><div data-role=\"collapsible\">";
				echo "<h3>", $time, ": ", $row['what'], "</h3>";
				echo "<p>", "Happiness: ", $row['how'], ". ", "</p>";
				echo "<div data-role=\"collapsible\">";
				echo "<h3>", "Notes: ", "</h3>";
				echo "<p>",$row['notes'],"</p>";
				echo "</div>";
				echo "</div>";
			} else {
				break;
			}
		}
		if ($i == 0) {
			echo "<br>";
			echo "You have no entries from today yet.";
		}
		// parse out today's date from ctime and row
		// keep going until the date is no longer correct.
	}
	else if ($num==100) {
		echo "<p>";
		while($row = mysql_fetch_array($result)) {
			$time = $row['ctime'];
$time = $time[0].$time[1].$time[2].$time[3].$time[4].$time[5].$time[6].$time[7].$time[8].$time[9].$time[10].$time[11].$time[12].$time[13].$time[14].$time[15];
				echo "<div data-role=\"collapsible-set\"><div data-role=\"collapsible\">";
				echo "<h3>", $time, ": ", $row['what'], "</h3>";
				echo "<p>", "Happiness: ", $row['how'], "</p>";
				echo "<div data-role=\"collapsible\">";
				echo "<h3>", "Notes: ", "</h3>";
				echo "<p>",$row['notes'],"</p>";
				echo "</div>";
				echo "</div>";
		}
		echo "<p/>";
	} else {
		echo "<p> Here are your latest ", $num, " entries: </p>";
		echo "<p>";
		for ($i = 0; $i < $num; $i++)
		{
			$row = mysql_fetch_array($result);
			if ($row) {
					$time = $row['ctime'];
$time = $time[0].$time[1].$time[2].$time[3].$time[4].$time[5].$time[6].$time[7].$time[8].$time[9].$time[10].$time[11].$time[12].$time[13].$time[14].$time[15];
				echo "<div data-role=\"collapsible-set\"><div data-role=\"collapsible\">";
				echo "<h3>", $time, ": ", $row['what'], "</h3>";
				echo "<p>", "Happiness: ", $row['how'], "</p>";
				echo "<div data-role=\"collapsible\">";
				echo "<h3>", "Notes: ", "</h3>";
				echo "<p>",$row['notes'],"</p>";
				echo "</div>";
				echo "</div>";
			}
		}
		echo "</p>";
	}
	echo "<br>";
	echo "<div align=\"center\">";
//		echo "<p>Viewing options:";
			echo "<form action=\"moreHistory.php\" id=\"newRecForm\" method=\"post\">";
				echo "<p> Style of entries: ";
				echo "<select name=\"numRecs\">";
					echo "<option value=\"Today\">Today</option>";
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