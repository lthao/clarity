<?php
	$username = $_POST['inputUsername'];
	setcookie('username', $username);
	//echo "<p> Hello ", $username, "</p>";
?>

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
	<div><a href="index.html"><img src="images/ClarityIconWide.png" height = "100" width="320px" alt="Clarity logo"/></a></div>
	<!--
    <div class="nav2">
		<p>clarity</p>
    </div>
	-->
		<!--
        <div class="logo"><a href="index.html"><img src="images/logo.jpg" alt="Company Logo - Mobifreaks.com" /></a></div>
		-->
    <div class="clear"></div>
	<!--
    <h2>Welcome</h2>
    	<p>
			Clarity is an app that keeps track of things that make you happy! It also suggests activities to you too. Try logging
			an activity or finding friends!
		</p>
		-->
		<div class="menu">
			<a href="progress.php" style="text-decoration: none">Progress</a>
		    <a href="log.html" style="text-decoration: none">Log Activity</a>
		    <a href="history.php" style="text-decoration: none">History</a>
		    <a href="recommendtest.php" style="text-decoration: none">Recommendations</a>
			<a href="help.html" style="text-decoration: none">Help</a>
		</div>
		<!--
    <div class="nav">
    	<ul>
          <li><a href="index.html">Progress</a></li>
          <li><a href="index.html">Log Activity</a></li>
          <li><a href="index.html">History</a></li>
          <li><a href="index.html">Recommendations</a></li>
       </ul>
		-->
		
   </div>
</body>
</html>
