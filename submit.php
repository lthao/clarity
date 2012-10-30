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
		$tag1 = 0;
		if (isset($_POST["tag1"])) {
			$tag1 = 1;
		}
		$tag2 = 0;
		if (isset($_POST["tag2"])) {
			$tag2 = 1;
		}
		$tag3 = 0;
		if (isset($_POST["tag3"])) {
			$tag3 = 1;
		}
		$tag4 = 0;
		if (isset($_POST["tag4"])) {
			$tag4 = 1;
		}
		$tag5 = 0;
		if (isset($_POST["tag5"])) {
			$tag5 = 1;
		}
		$tag6 = 0;
		if (isset($_POST["tag6"])) {
			$tag6 = 1;
		}
	
		//INSERT INTO `c_cs147_lao793`.`orders` (`name`, `email`, `book`) VALUES ('$name', '$email', '$book');
		
		$query = "INSERT INTO `c_cs147_lao793`.`clarity` (`what`, `how`, `when`, `notes`, `tag1`, `tag2`, `tag3`, `tag4`, `tag5`, `tag6`) VALUES ('$what', '$how', '$when', '$notes', '$tag1', '$tag2', '$tag3', '$tag4', '$tag5', '$tag6')";
		//echo $query;
		$result = mysql_query($query);
		//echo "<p>Submitted</p>";
		
		?>
	</div>
	<script type="text/javascript">
	</script>
</body>
</html>
