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
	    <p>Recommendations</p>
		<a href="logout.php" style="position:absolute; top:0px; right:0px; text-decoration:none; font-size:18px; font-family:Apex New, Helvetica, sans-serif; color:#ffffff; margin:0 5px; padding:4px 0;"> Log Out </a>
    </div>

	<?php
		include("config.php");
		
		//$username = "<script>document.write(localStorage.getItem('username'));</script>";
		//echo $username;
		$username = $_COOKIE['username'];
		//echo "<p> Hello ", $username, "</p>";
		$tagPresent = 0;
		$name = "";
		
		$recentLog = "SELECT * FROM clarity WHERE how != 'NULL' AND tagMatch !='0' AND username='$username' ORDER BY ctime DESC";
		
		$recentLogResult = mysql_query($recentLog);
		$newRow;
		$newRow = mysql_fetch_array($recentLogResult); 
		if (!$newRow) {
			echo "</br>";
			echo "<p> You have not logged any activities </p>";
			echo "<p> Click on the Log icon and log an activity. </p>";
		} else {
			echo "<p>Your log of \"", $newRow['what'], "\" has these tags:", "</p>";
			$name = $newRow['what'];
			$tag1 = $newRow['tag1'];
			$tag2 = $newRow['tag2'];
			$tag3 = $newRow['tag3'];
			$tag4 = $newRow['tag4'];
			$tag5 = $newRow['tag5'];
			$tag6 = $newRow['tag6'];
			$tag7 = $newRow['tag7'];
			$tag8 = $newRow['tag8'];
			$indexSum = 0;

			$exactQuery = "UPDATE clarity SET tagMatch='1' WHERE";
			$exact = "SELECT * FROM clarity WHERE"; //not actually used
			$query = "SELECT * FROM clarity WHERE (username='$username' OR username='all') AND (";
			//echo "before: ";
			//echo $query;
			if ($tag1) {
				$exact .= " tag1='1'";
				$exactQuery .= " tag1='1'";
				$query .= " tag1='1'";
				echo "<p> -Games </p>";
				$tagPresent = 1;
				$indexSum = $indexSum + 1;
				mysql_query("UPDATE clarity SET sum=sum + 1 WHERE tag1='1'");
			}
			if ($tag2) {
				echo "<p> -Outdoors </p>";
				if ($tagPresent) {
					$exact .= " AND";
					$exactQuery .= " AND";
					$query .= " OR";
				} else {
					$tagPresent = 1;
				}
				$indexSum = $indexSum + 1;
				mysql_query("UPDATE clarity SET sum=sum + 1 WHERE tag2='1'");
				$exact .= " tag2='1'";
				$exactQuery .= " tag2='1'";
				$query .= " tag2='1'";
			}
			if ($tag3) {
				echo "<p> -Indoors </p>";
				if ($tagPresent) {
					$exact .= " AND";
					$exactQuery .= " AND";
					$query .= " OR";
				} else {
					$tagPresent = 1;
				}
				$indexSum = $indexSum + 1;
				mysql_query("UPDATE clarity SET sum=sum + 1 WHERE tag3='1'");
				$exact .= " tag3='1'";
				$exactQuery .= " tag3='1'";
				$query .= " tag3='1'";
			}
			if ($tag4) {
				echo "<p> -Art and Music </p>";
				if ($tagPresent) {
					$exact .= " AND";
					$exactQuery .= " AND";
					$query .= " OR";
				} else {
					$tagPresent = 1;
				}
				$indexSum = $indexSum + 1;
				mysql_query("UPDATE clarity SET sum=sum + 1 WHERE tag4='1'");
				$exact .= " tag4='1'";
				$exactQuery .= " tag4='1'";
				$query .= " tag4='1'";
			}
			if ($tag5) {
				echo "<p> -Social </p>";
				if ($tagPresent) {
					$exact .= " AND";
					$exactQuery .= " AND";
					$query .= " OR";
				} else {
					$tagPresent = 1;
				}
				$indexSum = $indexSum + 1;
				mysql_query("UPDATE clarity SET sum=sum + 1 WHERE tag5='1'");
				$exact .= " tag5='1'";
				$exactQuery .= " tag5='1'";
				$query .= " tag5='1'";
			}
			if ($tag6) {
				echo "<p> -Alone Time </p>";
				if ($tagPresent) {
					$exact .= " AND";
					$exactQuery .= " AND";
					$query .= " OR";
				} else {
					$tagPresent = 1;
				}
				$indexSum = $indexSum + 1;
				mysql_query("UPDATE clarity SET sum=sum + 1 WHERE tag6='1'");
				$exact .= " tag6='1'";
				$exactQuery .= " tag6='1'";
				$query .= " tag6='1'";
			}
			if ($tag7) {
				echo "<p> -Movement </p>";
				if ($tagPresent) {
					$exact .= " AND";
					$exactQuery .= " AND";
					$query .= " OR";
				} else {
					$tagPresent = 1;
				}
				$indexSum = $indexSum + 1;
				mysql_query("UPDATE clarity SET sum=sum + 1 WHERE tag7='1'");
				$exact .= " tag7='1'";
				$exactQuery .= " tag7='1'";
				$query .= " tag7='1'";
			}
			if ($tag8) {
				echo "<p> -Creating </p>";
				if ($tagPresent) {
					$exact .= " AND";
					$exactQuery .= " AND";
					$query .= " OR";
				}
				$indexSum = $indexSum + 1;
				mysql_query("UPDATE clarity SET sum=sum + 1 WHERE tag8='1'");
				$exact .= " tag8='1'";
				$exactQuery .= " tag8='1'";
				$query .= " tag8='1'";
			}
			//echo "<p>test ", $indexSum, "</p>";
			$query .= ") ORDER BY sum DESC, how DESC";
			//echo "<br />";
			//echo "query: ";
			//echo "<p>", $query, "</p>";
			//echo "<br />";include 'recommendtest.php';
			//echo "<p>", $exact, "</p>";
			
			//$setResult = mysql_query($exactQuery);
			//$testUsername = 'laos';
			//$testQuery = "SELECT * FROM clarity WHERE username='$username' AND (tag4='1' OR tag8='1') ORDER BY sum DESC, how DESC";
			//echo "<p>", $testQuery, "</p>";
			$result = mysql_query($query);
			//echo "results: ";
			//echo "<br />";
			echo"</br>";
			echo "<p>Using these tags, we recommend <br/> the following activities: <p/>";
			
			/*
			while($row = mysql_fetch_array($result)) {
				if ($row['what'] != $name) {
					echo "<p>-", $row['what'], " # ", $row['sum'], " how ", $row['how'], "</p>";
				}
			}*/
			
			$exactFlag = 0;
			$relativeFlag = 0;
			$relativeHow = 0;
			for ($i = 0; $i < 5; $i++) {
				$row = mysql_fetch_array($result);
				if ($row) {
					if ($row['what'] != $name) {
						if ($row['sum'] == $indexSum) {
							if (!$exactFlag) {
								echo "<p>Activities with the same tags:</p>";
								$exactFlag = 1;
							}
						} else {
							if ($row['sum'] != $relativeHow) {
								echo"</br>";
								if ($row['sum'] == 1) {
									echo "<p>Activities with 1 similar tag:</p>";
								} else {
									echo "<p>Activities with ", $row['sum'], " similar tags:</p>";
								}
								$relativeHow = $row['sum'];
							}
						}
						echo "<p>-", $row['what'], "</p>";
					} else {
						$i--;
					}
				}
			}
			
			mysql_query("UPDATE clarity SET sum='0'");
			echo"</br>";
			echo "<div align=\"center\">";
				echo "<p>Viewing options:";
					echo "<form action=\"newrec.php\" id=\"newRecForm\" method=\"post\">";
						echo "<p>Select Activity: ";
							echo "<select name=\"recentActivity\">";
							$recentQuery = "SELECT * FROM clarity WHERE how!='NULL' AND tagMatch !='0' AND username='$username' ORDER BY ctime DESC";
							$recentRsult = mysql_query($recentQuery);
							while ($recentRow = mysql_fetch_assoc($recentRsult)) {
							    echo "<option value='".$recentRow['what']."'>".$recentRow['what']."</option>";
							}
							echo "</select>";
						echo "</p>";
						echo "<p> Number of suggestions: ";
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
		}
	?>
	
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>	
	<div id="footer">
		<div class="box">
			<img src="images/RibbonRecommend.png" height="64" style ="max-width: 320px" alt="Whole Ribbon" usemap="#ribbonMap" align ="center">
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
