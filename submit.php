<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Clarity</title>
    <link href="css/style.css"rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="nav2">
		<p>Submitted</p>
    </div>
	<div>
	<?php
		include("config.php");
		//echo $_POST['rating'];
		$what = $_POST["activity"];
		$how = $_POST["rating"];
		$ctime = $_POST["time"];
		$notes = $_POST["notes"];
		$tag1 = 0;
		$tag2 = 0;
		$tag3 = 0;
		$tag4 = 0;
		$tag5 = 0;
		$tag6 = 0;
		$sum = 0;
		if (isset($_POST["tag1"])) {
			$tag1 = 1;
			$sum += 10;
		}
		$tag2 = 0;
		if (isset($_POST["tag2"])) {
			$tag2 = 1;
			$sum += 10;
		}
		$tag3 = 0;
		if (isset($_POST["tag3"])) {
			$tag3 = 1;
			$sum += 10;
		}
		$tag4 = 0;
		if (isset($_POST["tag4"])) {
			$tag4 = 1;
			$sum += 10;
		}
		$tag5 = 0;
		if (isset($_POST["tag5"])) {
			$tag5 = 1;
			$sum += 10;
		}
		$tag6 = 0;
		if (isset($_POST["tag6"])) {
			$tag6 = 1;
			$sum += 10;
		}
	
		//INSERT INTO `c_cs147_lao793`.`orders` (`name`, `email`, `book`) VALUES ('$name', '$email', '$book');
		
		$query = "INSERT INTO `c_cs147_lao793`.`clarity` (`what`, `how`, `ctime`, `notes`, `tag1`, `tag2`, `tag3`, `tag4`, `tag5`, `tag6`, `sum`) VALUES ('$what', '$how', '$ctime', '$notes', '$tag1', '$tag2', '$tag3', '$tag4', '$tag5', '$tag6', '$sum')";
		//echo $query;
		$result = mysql_query($query);
		
		?>
	</div>
	<div id="footer">
		<div class="box">
		<img src="images/Ribbon.png" height="64" style ="max-width: 320px" alt="Whole Ribbon" usemap="#ribbonMap" align ="center">
		<map name="ribbonMap">
		<area shape = "rect" coords="0,0,64,64" alt="Progress" href="progress.html"> </area>
		<area shape = "rect" coords="64,0,128,64" alt="Log Activity" href="log.html">	
		<area shape = "rect" coords="128,0,192,64" alt="Log Activity" href="history.html">
		<area shape = "rect" coords="192,0,256,64" alt="Log Activity" href="recommendations.html">
		<area shape = "rect" coords="256,0,320,64" alt="Log Activity" href="help.html">
	</div>
</body>
</html>
