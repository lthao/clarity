<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">
	<title>Clarity</title>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link href="css/style.css"rel="stylesheet" type="text/css" />
    <link rel="stylesheet"  href="http://jquerymobile.com/test/css/themes/default/jquery.mobile.css" />  
	<link rel="stylesheet" href="http://jquerymobile.com/test/docs/_assets/css/jqm-docs.css"/>
    <script src="http://jquerymobile.com/test/js/jquery.js"></script>
	<script src="http://jquerymobile.com/test/docs/_assets/js/jqm-docs.js"></script>
	<script src="http://jquerymobile.com/test/js/jquery.mobile.js"></script>
    
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

// Load the Visualization API and the piechart package.
google.load('visualization', '1.0', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(drawChart);
var barsVisualization;
function drawChart() {
      
// Data Table for First Chart: THIS WEEK
var data = new google.visualization.DataTable();

    // php for First Chart
<?php
$dateToday = date('m.d', strtotime(date('Y/m/d')));
$monthNum = date('m', strtotime(date('Y/m/d')));
$dayNum = date('d', strtotime(date('Y/m/d')));
$monthNum = $monthNum + 1 - 1;
$dayNum = $dayNum + 1 - 1;
$dateToday = $monthNum.".".$dayNum;

$date1ago; $date2ago; $date3ago; $date4ago; $date5ago; $date6ago;
$day1ago; $day2ago; $day3ago; $day4ago; $day5ago; $day6ago;
$month1ago; $month2ago; $month3ago; $month4ago; $month5ago; $month6ago;

// for 1 day ago
if ($dayNum != 1) {
$day1ago = $dayNum - 1;
} else {
if ($monthNum != 1)
$monthNum = $monthNum - 1;
else
$monthNum = 12;
if ($monthNum == 1 || $monthNum == 3 || $monthNum == 5 || $monthNum == 7 || $monthNum == 8 || $monthNum == 10 || $monthNum == 12)
$day1ago = 31;
else
$day1ago = 30;	
}
$date1ago = $monthNum.".".$day1ago;

// for 2 days ago
if ($day1ago != 1) {
$day2ago = $day1ago - 1;
} else {
if ($monthNum != 1)
$monthNum = $monthNum - 1;
else
$monthNum = 12;
if ($monthNum == 1 || $monthNum == 3 || $monthNum == 5 || $monthNum == 7 || $monthNum == 8 || $monthNum == 10 || $monthNum == 12)
$day2ago = 31;
else
$day2ago = 30;	
}
$date2ago = $monthNum.".".$day2ago;

// for 3 days ago
if ($day2ago != 1) {
$day3ago = $day2ago - 1;
} else {
if ($monthNum != 1)
$monthNum = $monthNum - 1;
else
$monthNum = 12;
if ($monthNum == 1 || $monthNum == 3 || $monthNum == 5 || $monthNum == 7 || $monthNum == 8 || $monthNum == 10 || $monthNum == 12)
$day3ago = 31;
else
$day3ago = 30;	
}
$date3ago = $monthNum.".".$day3ago;

// for 4 days ago
if ($day3ago != 1) {
$day4ago = $day3ago - 1;
} else {
if ($monthNum != 1)
$monthNum = $monthNum - 1;
else
$monthNum = 12;
if ($monthNum == 1 || $monthNum == 3 || $monthNum == 5 || $monthNum == 7 || $monthNum == 8 || $monthNum == 10 || $monthNum == 12)
$day4ago = 31;
else
$day4ago = 30;	
}
$date4ago = $monthNum.".".$day4ago;

// for 5 days ago
if ($day4ago != 1) {
$day5ago = $day4ago - 1;
} else {
if ($monthNum != 1)
$monthNum = $monthNum - 1;
else
$monthNum = 12;
if ($monthNum == 1 || $monthNum == 3 || $monthNum == 5 || $monthNum == 7 || $monthNum == 8 || $monthNum == 10 || $monthNum == 12)
$day5ago = 31;
else
$day5ago = 30;	
}
$date5ago = $monthNum.".".$day5ago;

// for 6 days ago
if ($day5ago != 1) {
$day6ago = $day5ago - 1;
} else {
if ($monthNum != 1)
$monthNum = $monthNum - 1;
else
$monthNum = 12;
if ($monthNum == 1 || $monthNum == 3 || $monthNum == 5 || $monthNum == 7 || $monthNum == 8 || $monthNum == 10 || $monthNum == 12)
$day6ago = 31;
else
$day6ago = 30;	
}
$date6ago = $monthNum.".".$day6ago;

include("config.php");
$username = $_COOKIE['username'];
$progResult = mysql_query("SELECT `progNum`,`progKind` FROM `clarity` WHERE `username` = '$username'");
$progRow = mysql_fetch_array($progResult);
$progNum = $progRow['progNum'];
$progKind = $progRow['progKind'];
$result = mysql_query("SELECT `how`, `ctime` FROM `clarity` WHERE `how` != 'NULL' AND `ctime` != '00:00:00' AND username='$username' ORDER BY `ctime` ASC");
$i = 0;
if ($progKind ==1) {
	echo "data.addColumn('number', 'Date');";
	echo "data.addColumn('number', 'Happiness');";
	$datastring = "data.addRows([";
	while($row = mysql_fetch_array($result)) {
	// catch for 0x.xx
		if ($row['ctime'][5]!=0)
			$dateStr2 = $row['ctime'][5].$row['ctime'][6].".";
		else
			$dateStr2 = $row['ctime'][6].".";
	// catch for xx.0x
		if ($row['ctime'][8]!=0)
			$dateStr2 = $dateStr2.$row['ctime'][8].$row['ctime'][9];
		else
			$dateStr2 = $dateStr2.$row['ctime'][9];	
		if ($dateStr2 == $dateToday || $dateStr2 == $date1ago || $dateStr2 == $date2ago || $dateStr2 == $date3ago || $dateStr2 == $date4ago || $dateStr2 == $date5ago || $dateStr2 == $date6ago) {
			$i++;
			if ($i > 1) {
				$datastring = $datastring.",";
			}
		$howStr = $row['how'];
		$timeStr = $row['ctime'][5].$row['ctime'][6].".".$row['ctime'][8].$row['ctime'][9];
		$datastring = $datastring."[".$timeStr.",".$howStr."]";
		}
    }
    $datastring = $datastring."]);";
    
    if (($i > 0) && ($progNum != 1)) {
    	echo "$datastring";
	    echo " var options = {'title':'Happiness this week (";
    	$weekStr = $date6ago."-".$dateToday;
		echo $weekStr;
		echo ")', titleTextStyle: {fontSize:13}, 'width':320, 'height':150, vAxis: {minValue: -5}, vAxis: {textStyle: {fontSize: 14}}, hAxis: {textStyle: {color:'white'}, title: 'Date', titleTextStyle: {fontSize:14} },legend: {position: 'none'}, pointSize: 2};";
		echo " var chart = new google.visualization.LineChart(document.getElementById('chart_div')); chart.draw(data, options);";
	} else if ($progNum != 1){
    	$progressThisWeek=1;
    }
} else if ($progKind == 2) {
	//all the column chart code
	echo "data.addColumn('string', 'Date');";
	echo "data.addColumn('number', 'Happiness');";
	$datastring = "data.addRows([";
	while($row = mysql_fetch_array($result)) {
		if ($row['ctime'][5]!=0)
			$dateStr2 = $row['ctime'][5].$row['ctime'][6].".".$row['ctime'][8].$row['ctime'][9];
		else
			$dateStr2 = $row['ctime'][6].".".$row['ctime'][8].$row['ctime'][9];
		if ($dateStr2 == $dateToday || $dateStr2 == $date1ago || $dateStr2 == $date2ago || $dateStr2 == $date3ago || $dateStr2 == $date4ago || $dateStr2 == $date5ago || $dateStr2 == $date6ago) {
			$i++;
			if ($i > 1) {
				$datastring = $datastring.",";
			}
			$howStr = $row['how'];
			$timeStr = $row['ctime'][5].$row['ctime'][6].".".$row['ctime'][8].$row['ctime'][9];
			$datastring = $datastring."[\"".$timeStr."\",".$howStr."]";
		}
    }
    $datastring = $datastring."]);";
    if (($i > 0) && ($progNum != 1)) {
	    echo "$datastring";
	    echo " var options = {'title':'Happiness this week (";
    	$weekStr = $date6ago."-".$dateToday;
		echo $weekStr;
		echo ")', titleTextStyle: {fontSize:13}, 'width':320, 'height':150, 'isStacked' : true, vAxis: {minValue: -5}, vAxis: {textStyle: {fontSize: 14}}, hAxis: {textStyle: {color:'white'}, title: 'Date', titleTextStyle: {fontSize:14} },legend: {position: 'none'}, pointSize: 2};";
echo " var chart = new google.visualization.ColumnChart(document.getElementById('chart_div')); chart.draw(data, options);";
    } else if ($progNum != 1){
     	$progressThisWeek = 1;
    }
}
?>

// Data Table for Second Chart: TODAY
var data2 = new google.visualization.DataTable();

// php for Second Chart
<?php
$dateToday = date('m.d', strtotime(date('Y/m/d')));
include("config.php");
$username = $_COOKIE['username'];
$progResult = mysql_query("SELECT `progNum`,`progKind` FROM `clarity` WHERE `username` = '$username'");
$progRow = mysql_fetch_array($progResult);
$progNum = $progRow['progNum'];
$progKind = $progRow['progKind'];
$result2 = mysql_query("SELECT `what`, `how`, `ctime` FROM `clarity` WHERE `how` != 'NULL' AND `ctime` != '00:00:00' AND `username`='$username' ORDER BY `ctime` ASC");
$i2 = 0;
if ($progKind == 1) {
	echo "data2.addColumn('number', 'Time');";
	echo "data2.addColumn('number', 'Happiness');";
	echo "data2.addColumn({type:'string', role:'annotation'});";
    $datastring2 = "data2.addRows([";
    while($row2 = mysql_fetch_array($result2)) {
		$howStr2 = $row2['how'];
		$dateStr2 = $row2['ctime'][5].$row2['ctime'][6].".".$row2['ctime'][8].$row2['ctime'][9];
		if ($dateStr2 == $dateToday) {
			$i2++;
			if ($i2 > 1) {
				$datastring2 = $datastring2.",";
			}
		if ($row2['ctime'][11]== '0')
			$timeStr2 = $row2['ctime'][12].".".$row2['ctime'][14].$row2['ctime'][15];
		else
			$timeStr2 = $row2['ctime'][11].$row2['ctime'][12].".".$row2['ctime'][14].$row2['ctime'][15];
		$holderStr2 = "'";
		$whatStr2 = $holderStr2.$row2['what'].$holderStr2;
		$datastring2 = $datastring2."[".$timeStr2.",".$howStr2.",".$whatStr2."]";
		}
	}
    $datastring2 = $datastring2."]);";
 
    if (($i2 > 0) && ($progNum != 2)) {
	    echo "$datastring2";
	    echo " var options2 = {'title':'Happiness today (";
		echo $dateToday;
		echo ")', titleTextStyle: {fontSize:13}, 'width':320, 'height':150, vAxis: {minValue: -5}, vAxis: {textStyle: {fontSize: 14}}, hAxis: {textStyle: {color:'white'}, title: 'Time', titleTextStyle: {fontSize:14}},legend: {position: 'none'}, pointSize: 2};";
		echo " var chart2 = new google.visualization.LineChart(document.getElementById('chart_div2')); chart2.draw(data2, options2);";
    } else if ($progNum != 2){
		$progressToday = 1;
    }
} else if ($progKind ==2) {
	// all the column chart code
	echo "data2.addColumn('string', 'Time');";
	echo "data2.addColumn('number', 'Happiness');";
	echo "data2.addColumn({type:'string', role:'annotation'});";
	$datastring2 = "data2.addRows([";
    while($row2 = mysql_fetch_array($result2)) {
		$howStr2 = $row2['how'];
		$dateStr2 = $row2['ctime'][5].$row2['ctime'][6].".".$row2['ctime'][8].$row2['ctime'][9];
		if ($dateStr2 == $dateToday) {
			$i2++;
			if ($i2 > 1) {
				$datastring2 = $datastring2.",";
			}
			if ($row2['ctime'][11]== '0')
				$timeStr2 = $row2['ctime'][12].".".$row2['ctime'][14].$row2['ctime'][15];
			else
				$timeStr2 = $row2['ctime'][11].$row2['ctime'][12].".".$row2['ctime'][14].$row2['ctime'][15];
			$holderStr2 = "'";
			$whatStr2 = $holderStr2.$row2['what'].$holderStr2;
			$datastring2 = $datastring2."[\"".$timeStr2."\",".$howStr2.",".$whatStr2."]";
		}
	}
    $datastring2 = $datastring2."]);";
    if (($i2 > 0) && ($progNum != 2)) {
	    echo "$datastring2";
	    echo " var options2 = {'title':'Happiness today (";
		echo $dateToday;
		echo ")', titleTextStyle: {fontSize:13}, 'width':320, 'height':150, vAxis: {minValue: -5}, vAxis: {textStyle: {fontSize: 14}}, hAxis: {textStyle: {color:'white'}, title: 'Time', titleTextStyle: {fontSize:14} },legend: {position: 'none'}, pointSize: 2};";
		echo " var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2')); chart2.draw(data2, options2);";
    } else if ($progNum != 2) {
     $progressToday = 1;
    }
}
?>
google.visualization.events.addListener(barsVisualization, 'onmouseover', lineMouseOver);
google.visualization.events.addListener(barsVisualization, 'onmouseout', lineMouseOut);
}

function lineMouseOver(e) {
barsVisualization.setSelection([e]);
}

function lineMouseOut(e) {
barsVisualization.setSelection([{'row': null, 'column': null}]);
}
</script>
</head>

<body>
 <div data-role="header" data-theme="b">
        <!--<a href="index.html" data-icon="delete" >Save</a>-->
        <h1>Progress</h1>
        <a rel="external" href="logout.php" data-role="button" class="ui-btn-right">Log Out</a>
    </div>
<!--<p> Here's how you've done recently. </p>-->
<div id="chart_div2" align = 'center'></div>
<div id="chart_div" align = 'center'></div>
<?php
if ($progressToday==1)
	echo "<div style=\"text-align:center;\">", "<br>","You haven't made any progress today yet.", "<br>", "</div>";
	
if ($progressThisWeek ==1)
	echo "<div style=\"text-align:center;\">", "<br>","You haven't made any progress this week yet.", "<br>", "</div>";
?>
<br>
<p> Select another day to see your progress: </p>
<div align="center">
<form id = "date-form" action = "process.php" method = "get">
<label for="progressDate"> </label><input id="progressDate" type="date" name="dateInput" value="<?php echo date('Y-m-d', strtotime(date('Y/m/d'))); ?>"/>
<input type="submit" value="Submit">
</form>
</div>

<div align = center>
<div data-role="collapsible" data-collapsed="true">
<h3>Other options</h3>
<form action= "customProgress.php" id="customProgForm" method= "post">
<p> Select time period of graphs to show:
<select name = "progNum">
	<option value="1"> Only today </option>
	<option value="2"> Only this week </option>
	<option value="3"> Both </option>
</select>
<input type= "submit" value="Submit">
</form>
<br>
<form action= "customProgress.php" id="customProgForm" method= "post">
<p> Select time period of graphs to show:
<select name = "progKind">
	<option value="1"> Line Graph </option>
	<option value="2"> Bar Graph </option>
</select>
<input type= "submit" value="Submit">
</form>

</div>

</div>

</br>
</br>
</br>
</br>
</br>
</br>
</br>
<div id="footer">
<div class="box">
<img src="images/RibbonProgress.png" height="64" style ="max-width: 320px" alt="Whole Ribbon" usemap="#ribbonMap" align ="center">
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