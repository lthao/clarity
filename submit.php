<!DOCTYPE html>
<html>
<head>

</head>

<body>
	<div>
	<?php
		include("config.php");
		$what = $_POST["activity"];
		$how = $_POST["rating"];
		$when = $_POST["time"];
		$notes = $_POST["notes"];
	
		//INSERT INTO `c_cs147_lao793`.`orders` (`name`, `email`, `book`) VALUES ('$name', '$email', '$book');
		
		$query = "INSERT INTO `c_cs147_lao793`.`clarity` (`what`, `how`, `when`, `notes`) VALUES ('$what', '$how', '$when', '$notes')";
		echo $query;
		$result = mysql_query($query);
		echo "<p>Submitted</p>";
		
		?>
	</div>
	<script type="text/javascript">
	</script>
</body>
</html>

<!--
<title>Maya Online Books</title>
<link rel="apple-touch-icon" href="appicon.png" />
<link rel="apple-touch-startup-image" href="startup.png">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="width=device-width, user-scalable=no" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

<link href="style.css" rel="stylesheet" type="text/css">
-->

<!--
<script type="text/javascript">
$("a").click(function (event) {
    event.preventDefault();
    window.location = $(this).attr("href");
});
$("#someform").submit(function() {
	event.preventDefault();
	$event.preventDefault();
	$.post("submit.php", $("someform").serialize(), function(data) {
		$result("result").html(data);
	});
});
</script>
-->
