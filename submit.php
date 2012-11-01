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
		<p>Log Activity</p>
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
	<p> Your log was submitted. </p>
	<p>
		<form action="submit.php" id="logform" method="post">
			What did you do today? <input type="text" name="activity"/>
				<br>
			How did it make you feel?
				<select name="rating">
					<option value="5">5</option>
					<option value="3">3</option>
					<option value="0" selected="selected">0</option>
					<option value="-3">-3</option>
					<option value="-5">-5</option>
				</select> 
				<br>
			When did you do it? <input type="datetime" name="time"/>
				<br>
			What tags describe this activity or what you liked most/least about this activity? 
				<br>
					<input type="checkbox" name="tag1" value="outdoors">Outdoors
					<input type="checkbox" name="tag2" value="play">Play
					<input type="checkbox" name="tag3" value="read">Reading
					<input type="checkbox" name="tag4" value="write">Writing
					<input type="checkbox" name="tag5" value="social">Social
					<input type="checkbox" name="tag6" value="lone">Alone time
					<input type="checkbox" name="tag7" value="social">Social
					<input type="checkbox" name="tag8" value="lone">Alone time
				<br>
			Any additional notes?
			<br>
			<textarea rows="3" cols="30" name="notes"></textarea>
			<br>
			<input type="submit" value="Submit">
		</form>
	</p>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<div id="footer">
		<div class="box">
		<img src="images/Ribbon.png" height="64" style ="max-width: 320px" alt="Whole Ribbon" usemap="#ribbonMap" align ="center">
		<map name="ribbonMap">
		<area shape = "rect" coords="0,0,64,64" alt="Progress" href="progress.html"> </area>
		<area shape = "rect" coords="64,0,128,64" alt="Log Activity" href="log.html">	
		<area shape = "rect" coords="128,0,192,64" alt="Log Activity" href="history.html">
		<area shape = "rect" coords="192,0,256,64" alt="Recommendations" href="recommendtest.php">
		<area shape = "rect" coords="256,0,320,64" alt="Log Activity" href="help.html">
	</div>
</body>
</html>
