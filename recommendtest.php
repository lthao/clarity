<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Clarity</title>
    <link href="css/style.css"rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="nav2">
		<p>Recommendations</p>
    </div>
	<?php
		include("config.php");
		$tagPresent = 0;
		$tag1 = 1;
		$tag2 = 1;
		$tag3 = 0;
		$tag4 = 0;
		$tag5 = 0;
		$tag6 = 1;
		//$targetSum = 20;
		$query = "SELECT * FROM clarity WHERE";
		echo "before: ";
		echo $query;
		if ($tag1) {
			$query .= " tag1='1'";
			$tagPresent = 1;
		}
		if ($tag2) {
			if ($tagPresent) {
				$query .= " OR";
			} else {
				$tagPresent = 1;
			}
			$query .= " tag2='1'";
		}
		if ($tag3) {
			if ($tagPresent) {
				$query .= " OR";
			} else {
				$tagPresent = 1;
			}
			$query .= " tag3='1'";
		}
		if ($tag4) {
			if ($tagPresent) {
				$query .= " OR";
			} else {
				$tagPresent = 1;
			}
			$query .= " tag4='1'";
		}
		if ($tag5) {
			if ($tagPresent) {
				$query .= " OR";
			} else {
				$tagPresent = 1;
			}
			$query .= " tag5='1'";
		}
		if ($tag6) {
			if ($tagPresent) {
				$query .= " OR";
			}
			$query .= " tag6='1'";
		}
		echo "<br />";
		//$exactQuery = $query;
		//$exactQuery .= " AND sum LIKE '{$targetSum}'";
		//echo $exactQuery, "<br />";
		$query .= " ORDER BY sum ASC";
		echo "<br />";
		echo "after: ";
		echo $query;
		echo "<br />";
		
		$result = mysql_query($query);
		echo "results: ";
		echo "<br />";
		while($row = mysql_fetch_array($result)) {
			echo $row['what'], " ", $row['how'], " ", $row['when'], " ", $row['notes'], " ", $row['sum'];
		    echo "<br />";
		}
	?>
	<!--
   	<p>
		Based on your most recent activity log, we suggest you try the following activities:
		<ul>
		  <li>Running</li>
		  <li>Hiking</li>
		  <li>Reading outside</li>
		</ul>
	</p>

	<p>Find recommendations with recent activity: 
		<select style="height: 30px">
	  		<option>Biking</option>
	  		<option>Painting</option>
	  		<option>Chatting</option>
			<option>Swimming</option>
	  		<option>Lacrosse</option>
	  		<option>Dancing</option>
			<option>Photography</option>
	  		<option>Sleeping</option>
	  		<option>Eating</option>
		</select>
		 <input type="button" style="height: 20px; width: 70px" onClick="location.href='construction.html'" value="Submit"/>
	</p>
	<p>Find recommendations with new activity: 
		<input type="text" name="newActivity" style="height: 30px"/>
		<input type="button" style="height: 20px; width: 70px" onClick="location.href='construction.html'" value="Submit"/>
	</p>
	
	<div id="footer">
		<div class="box">
		<img src="images/Ribbon.png" height="64" style ="max-width: 320px" alt="Whole Ribbon" usemap="#ribbonMap" align ="center">
		<map name="ribbonMap">
		<area shape = "rect" coords="0,0,64,64" alt="Progress" href="progress.html"> </area>
		<area shape = "rect" coords="64,0,128,64" alt="Log Activity" href="log.html">	
		<area shape = "rect" coords="128,0,192,64" alt="History" href="history.html">
		<area shape = "rect" coords="192,0,256,64" alt="Recommendations" href="recommendations.html">
		<area shape = "rect" coords="256,0,320,64" alt="Help" href="help.html">
	</div>
	-->
</body>
</html>
