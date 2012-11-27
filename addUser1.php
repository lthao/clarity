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
	<div><a href="index.php"><img src="images/ClarityIconWide.png" height = "100" width="320px" alt="Clarity logo"/></a></div>
	<!--
    <div class="nav2">
		<p>clarity</p>
    </div>
	-->
		<!--
        <div class="logo"><a href="index.html"><img src="images/logo.jpg" alt="Company Logo - Mobifreaks.com" /></a></div>
		-->
    <div class="clear"></div>

		<div class="menu">
			
<?php
include("config.php");
$username = mysql_real_escape_string($_POST['username']);
$password = md5(mysql_real_escape_string($_POST['password']));

$checkExist = mysql_query("select * from login where username ='$username'");
$rowCheck = mysql_num_rows($checkExist);


if (empty($_POST['username'])   || empty($_POST['password'])) {
		echo("<p>Please enter a username and password</p>");
		echo '<form action = "addUser1.php" method= "post" id = "signup">
<div align=center >
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
	echo("<p>Someone already has that username. Please choose a new one</p>");

		echo '<div align=center ><form action = "addUser1.php" method= "post" id = "signup">

<h2>Sign Up</h2>

<p><label>Username</label>
<input type="text" id="username" name="username"/></p>

<p><label>Password</label>
<input type="password" id="password" name="password"/></p>

<input type ="submit" value= "Sign Up" />

</form></div>
';

}
else{
	$result = mysql_query("INSERT INTO `c_cs147_lao793`.`login` (`username`, `password`) VALUES ('$username', '$password')");
	echo("<p>Welcome $username!</p>");
echo   '
		<div class="menu">
			<a href="progress.php" style="text-decoration: none">Progress</a>
		    <a href="log.html" style="text-decoration: none">Log Activity</a>
		    <a href="history.php" style="text-decoration: none">History</a>
		    <a href="recommendtest.php" style="text-decoration: none">Recommendations</a>
			<a href="help.html" style="text-decoration: none">Help</a>
		</div>'
;
}

?>
		</div>

		

	
   </div>
</body>
</html>