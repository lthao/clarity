<?php
    $username = $_POST['username'];
    setcookie('username', $username);
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
			
<?php
include("config.php");
$username = mysql_real_escape_string($_POST['username']);
$password = md5(mysql_real_escape_string($_POST['password']));

$checkExist = mysql_query("select * from login where username ='$username'");
$rowCheck = mysql_num_rows($checkExist);


if (empty($_POST['username'])   || empty($_POST['password'])) {
		echo '	<div><a href="index2.php"><img src="images/ClarityIconWide.png" height = "100" width="320px" alt="Clarity logo"/></a></div>
    <div class="clear"></div> <div align=center >
Please enter a username and password
<form action = "addUser2.php" method= "post" id = "signup">

<h2>Sign Up</h2>

<p><label>Username</label>
<input type="text" id="username" name="username"/></p>

<p><label>Password</label>
<input type="password" id="password" name="password"/></p>

<input type ="submit" value= "Sign Up" />

</form> </div>
';
} 
else if($rowCheck >0){
		echo '<div><a href="index2.php"><img src="images/ClarityIconWide.png" height = "100" width="320px" alt="Clarity logo"/></a></div>
    <div class="clear"></div><div align=center >
Someone already has that username. Please choose a new one
<form action = "addUser2.php" method= "post" id = "signup">

<h2>Sign Up</h2>

<p><label>Username</label>
<input type="text" id="username" name="username"/></p>

<p><label>Password</label>
<input type="password" id="password" name="password"/></p>

<input type ="submit" value= "Sign Up" />

</form> </div>
';

}
else{
	$result = mysql_query("INSERT INTO `c_cs147_lao793`.`login` (`username`, `password`) VALUES ('$username', '$password')");
	echo   '<div class="nav2" style="position:relative;text-align:center;">	
	    <p>Clarity</p>
		<a href="logout.php" style="position:absolute; top:0px; right:0px; text-decoration:none; font-size:18px; font-family:Apex New, Helvetica, sans-serif; color:#ffffff; margin:0 5px;
		padding:4px 0;"> Log Out </a>
    </div>

    <p>
		Clarity is an app that keeps track of things that make you happy! It also suggests activities for you. To view
		how your mood has been, click on the "Progress" icon.
	</p>
	<p>
		To log an activity, click on the "Log" icon. Then input your activity and tag it so that it can be organized. Feel free
		to add any notes to it!
	</p>
	<p>
		View and edit your recent logs on the "History" page and find related activities on the "Recommend" page.
	</p>
	<div id="footer">
		<div class="box">
			<img src="images/RibbonHelp.png" height="64" style ="max-width: 320px" alt="Whole Ribbon" usemap="#ribbonMap" align ="center">
			<map name="ribbonMap">
			<area shape = "rect" coords="0,0,64,64" alt="Progress" href="progress.php"> </area>
			<area shape = "rect" coords="64,0,128,64" alt="Log Activity" href="log.html">
			<area shape = "rect" coords="128,0,192,64" alt="History" href="history.php">
			<area shape = "rect" coords="192,0,256,64" alt="Recommendations" href="recommendtest.php">
			<area shape = "rect" coords="256,0,320,64" alt="Help" href="help.html">
		</div>
	</div>
';

}


?>
	
</body>
</html>