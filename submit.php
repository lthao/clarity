<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Clarity</title>
    <link href="css/style.css"rel="stylesheet" type="text/css" />


	<script type="text/javascript">
            	function doChecks(){
                     if (!checkTags() && !checkDropDown()){
				alert('You are missing two required fields. Please select at least one tag and one emoticon to represent how the activity made you feel.');
                   		return false;
			}
			if (!checkTags()){
				alert('Please select at least one tag');
                   		return false;
			}
			if (!checkDropDown()){
				alert('Please select an emoticon to represent how happy or upset the activity made you feel :) ');
				return false;
			}	
			return true;
		}
		function checkTags() {
                	var tagA = document.getElementById('tagA');
			var tagB = document.getElementById('tagB');
			var tagC = document.getElementById('tagC');
			var tagD = document.getElementById('tagD');
			var tagE = document.getElementById('tagE');
			var tagF = document.getElementById('tagF');
			var tagG = document.getElementById('tagG');
			var tagH = document.getElementById('tagH');
                	if(tagA.checked == false && tagB.checked == false && tagC.checked == false && tagD.checked == false && tagE.checked == false && tagF.checked == false && tagG.checked == false && tagH.checked == false) {
                   		return false;
                	}
              	return true;
            	}

		function checkDropDown(){
			var dd = document.getElementById('dd');
			if(dd.value == -10){
				return false;
			}
			return true;
		}
		
        </script>

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
		$tag7 = 0;
		$tag8 = 0;
		$sum = 0;//to be used as tagMatch
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
		if (isset($_POST["tag6"])) {
			$tag7 = 1;
			$sum += 10;
		}
		if (isset($_POST["tag6"])) {
			$tag8 = 1;
			$sum += 10;
		}
	
		//INSERT INTO `c_cs147_lao793`.`orders` (`name`, `email`, `book`) VALUES ('$name', '$email', '$book');
		if (($how == '-1') || ($how == '-2') || ($how == '-3') || ($how == '-4') || ($how == '-5')) {
			echo "<p> reset sum </p>";
			$sum = 0;
		}
		
		$query = "INSERT INTO `c_cs147_lao793`.`clarity` (`what`, `how`, `ctime`, `notes`, `tag1`, `tag2`, `tag3`, `tag4`, `tag5`, `tag6`, `tag7`, `tag8`, `tagMatch`) VALUES ('$what', '$how', '$ctime', '$notes', '$tag1', '$tag2', '$tag3', '$tag4', '$tag5', '$tag6', '$tag7', '$tag8', '$sum')";
		//echo $query;
		$result = mysql_query($query);
		
		?>
	</div>
	<p> Your log was submitted. </p>
	<p>
		<form action="submit.php" onsubmit="return doChecks();" id="logform" method="post">
			<img src="star2.gif" alt="required" width="10" height="10">What did you do today? <input type="text" name="activity" required="required"/>
				<br>
			<img src="star2.gif" alt="required" width="10" height="10">How did it make you feel?
				<select id = "dd" name="rating">
					<option value="-10" selected="selected">Select one</option>
					<option value="5">5</option>
					<option value="4">4</option>
					<option value="3">3</option>
					<option value="2">2</option>
					<option value="1">1</option>
					<option value="0">0</option>
					<option value="-1">-1</option>
					<option value="-2">-2</option>
					<option value="-3">-3</option>
					<option value="-4">-4</option>
					<option value="-5">-5</option>
				</select>
				<br>
			When did you do it? <input type="datetime" name="time"/>
				<br>
			<img src="star2.gif" alt="required" width="10" height="10">What tags describe this activity best? 
				<br>
					<input type="checkbox" name="tag1" id="tagA" value="g">Games
					<input type="checkbox" name="tag2" id="tagB" value="o">Outdoors
					<input type="checkbox" name="tag3" id="tagC" value="i">Indoors
					<input type="checkbox" name="tag4" id="tagD" value="a">Art&Music
					<input type="checkbox" name="tag5" id="tagE" value="s">Social
					<input type="checkbox" name="tag6" id="tagF" value="l">Alone time
					<input type="checkbox" name="tag7" id="tagG" value="m">Movement
					<input type="checkbox" name="tag8" id="tagH" value="c">Creating
				<br>
			Any additional notes?
			<br>
			<textarea rows="3" cols="30" name="notes"></textarea>
			<br>
			<input type="submit" value="Submit">
		</form>
	</p>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
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
