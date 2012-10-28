<!DOCTYPE html>
<html>
	<head>

	</head>

	<body>
		
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