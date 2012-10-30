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
		
<<<<<<< HEAD
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
=======
		<div>
			<?php
			include("config.php");
			// Take in parameters
			$what = $_POST["activity"];
			$how = $_POST["rating"];
			$ctime = $_POST["time"];
			$notes = $_POST["notes"];
			
			// Insert into orders
			// but oops query is not defined... yet
			//INSERT INTO `c_cs147_lao793`.`orders` (`name`, `email`, `book`) VALUES ('$name', '$email', '$book');
			
			$query = "INSERT INTO `c_cs147_sharonxh`.`clarity_username` (`what`, `how`, `ctime`, 'notes') VALUES ('$what', '$how', '$ctime', '$notes')";
			
			$result = mysql_query($query);			
			?>
		</div>
	</body>
</html>
>>>>>>> e843652e3b108d9e8c143485cc1ad3ba9a3e1032
