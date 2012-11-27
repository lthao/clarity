<?php
	setcookie("username", "", time()-3600);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!--<script src="//cdn.optimizely.com/js/139087747.js"></script>-->
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Clarity</title>
    <link href="css/style.css"rel="stylesheet" type="text/css" />
</head>

<body>
	<p> You have logged out of Clarity. </p>
	<form method = "link" action="index.php">
		<p> <input type="submit" value="Log back in"> </p>
	</form>
</body>
</html>