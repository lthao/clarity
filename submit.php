<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Clarity</title>
    <link href="css/style.css"rel="stylesheet" type="text/css" />
<script src="jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="msdropdown/js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="msdropdown/js/jquery.dd.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="msdropdown/dd.css" />

	<script type="text/javascript">
            	function doChecks(){
                     if (!checkName() && !checkDropDown()){
				alert('You are missing two required fields. Please name your activity and select at least one emoticon to represent how the activity made you feel.');
                   		return false;
			}
			if (!checkName()){
				alert('You are missing a required field. Pleade name your activity');
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
		function hideTags() {
 			document.getElementById('div1').style.display='none';
 		}
		function checkFeeling(){
			var dd = document.getElementById('dd');
			if (dd.value > 0 ){
				showTags();
			} else {
				hideTags();
			} 

		}
		function showTags(){
			document.getElementById('div1').style.display="block";
		}
		function checkTags() {
                	if(document.getElementById('dd').value <= 0) return true;
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
		function checkName(){
			var nm = document.getElementById('nm');
			if(nm.value == ""){
				return false;
			}
			return true;
		}
		function checkDropDown(){
			var dd = document.getElementById('dd');
			if(dd.value == -20){
				return false;
			}
			return true;
		}
		
        </script>

</head>

<body>
    
 
  	<script language="javascript">
	$(document).ready(function(e) {
	try {
		$("body select").msDropDown();
	} catch(e) {
		alert(e.message);
	}
	});
</script>

	<div class="nav2" style="position:relative;text-align:center;">	
		<p>Log Activity</p>
		<a href="logout.php" style="position:absolute; top:0px; right:0px; text-decoration:none; font-size:18px; font-family:Apex New, Helvetica, sans-serif; color:#ffffff; margin:0 5px;
		padding:5px 0;"> Log Out </a>
	 </div>

	<?php
		include("config.php");
		//echo $_POST['rating'];
		$username = $_COOKIE['username'];
		//echo "<p> Hello ", $username, "</p>";
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
		if (isset($_POST["tag7"])) {
			$tag7 = 1;
			$sum += 10;
		}
		if (isset($_POST["tag8"])) {
			$tag8 = 1;
			$sum += 10;
		}

		//INSERT INTO `c_cs147_lao793`.`orders` (`name`, `email`, `book`) VALUES ('$name', '$email', '$book');
		if (($how == '-1') || ($how == '-2') || ($how == '-3') || ($how == '-4') || ($how == '-5')) {
			$sum = 0;
		}

		$query = "INSERT INTO `c_cs147_lao793`.`clarity` (`what`, `how`, `ctime`, `notes`, `tag1`, `tag2`, `tag3`, `tag4`, `tag5`, `tag6`, `tag7`, `tag8`, `tagMatch`, `username`) VALUES ('$what', '$how', '$ctime', '$notes', '$tag1', '$tag2', '$tag3', '$tag4', '$tag5', '$tag6', '$tag7', '$tag8', '$sum', '$username')";
		//echo $query;
		$result = mysql_query($query);

	?>
	<p> Your log was submitted. </p>

	<div>
	   	<p>
			<form action="submit.php" onsubmit="return doChecks();" id="logform" method="post">
				<body onload= "hideTags()">
				What did you do today?<FONT COLOR = "#CD0000">*</FONT> <br>
				<input type="text" name="activity" id="nm"/>
					<br>
				How did it make you feel?<FONT COLOR = "#CD0000">*</FONT> <br>
					<select id = "dd" name="rating" onchange="checkFeeling()">
						<option value="-20" selected="selected">Select one</option>
						<option value="5" title="emote/+5.gif">5</option>
						<option value="4" title="emote/+4.gif">4</option>
						<option value="3" title="emote/+3.gif">3</option>
						<option value="2" title="emote/+2.gif">2</option>
						<option value="1" title="emote/+1.gif">1</option>
						<option value="0" title="emote/0.gif">0</option>
						<option value="-1" title="emote/-1.gif">-1</option>
						<option value="-2" title="emote/-2.gif">-2</option>
						<option value="-3" title="emote/-3.gif">-3</option>
						<option value="-4" title="emote/-4.gif">-4</option>
						<option value="-5" title="emote/-5(andagain).gif">-5</option>
					</select> 
					<br>
				When did you do it?<br> <input type="datetime" name="time"/>
					<br>
				<div id="div1"> What tags describe this activity best?<FONT COLOR = "#CD0000">*</FONT>
 
					<br>
						<input type="checkbox" name="tag1" id="tagA" value="g">Games
						<input type="checkbox" name="tag2" id="tagB" value="o">Outdoors
						<input type="checkbox" name="tag3" id="tagC" value="i">Indoors
					<br>	<input type="checkbox" name="tag4" id="tagD" value="a">Art&Music
						<input type="checkbox" name="tag5" id="tagE" value="s">Social
						<input type="checkbox" name="tag6" id="tagF" value="l">Alone time
					<br>	<input type="checkbox" name="tag7" id="tagG" value="m">Movement
						<input type="checkbox" name="tag8" id="tagH" value="c">Creating
					</div><br>
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
