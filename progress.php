<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<!--var commandString;-->
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Clarity</title>
    <link href="css/style.css"rel="stylesheet" type="text/css" />
    
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);
var barsVisualization;
      function drawChart() {
      
        // Data Table for First Chart
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Date');
        data.addColumn('number', 'Happiness');
        // php for First Chart
      <?php
       include("config.php");
       $result = mysql_query("SELECT `how`, `ctime` FROM `clarity` WHERE `how` != 'NULL' AND `ctime` != '00:00:00'");
     $i = 0;
     $datastring = "data.addRows([";
     while($row = mysql_fetch_array($result)) {
$i++;
if ($i > 1) {
$datastring = $datastring.",";}
$howStr = $row['how'];
$timeStr = $row['ctime'][5].$row['ctime'][6].".".$row['ctime'][8].$row['ctime'][9];
$datastring = $datastring."[".$timeStr.",".$howStr."]";
     }
     $datastring = $datastring."]);";
echo "$datastring";
?>

        // Data Table for Second Chart
        var data2 = new google.visualization.DataTable();
        data2.addColumn('number', 'Time');
        data2.addColumn('number', 'Happiness');
        // php for Second Chart
       <?php
       include("config.php");
       $result2 = mysql_query("SELECT `how`, `ctime` FROM `clarity` WHERE `how` != 'NULL' AND `ctime` != '00:00:00'");
     $i2 = 0;
     $datastring2 = "data.addRows([";
     while($row2 = mysql_fetch_array($result2)) {
// echo $row2;
$howStr2 = $row2['how'];
$dateStr2 = $row2['ctime'][5].$row2['ctime'][6].".".$row2['ctime'][8].$row2['ctime'][9];
if ($dateStr2 == '10.30') {
$i2++;
if ($i2 > 1) {
$datastring2 = $datastring2.",";
}	
$timeStr2 = $row2['ctime'][11].$row2['ctime'][12].".".$row2['ctime'][14].$row2['ctime'][15];
// echo $timeStr;
$datastring2 = $datastring2."[".$timeStr2.",".$howStr2."]";
}
     }
     $datastring2 = $datastring2."]);";
echo "$datastring2";
?>
 
        // Set chart options: First Chart
        var options = {'title':'Happiness this week',
                       'width':320,
                       'height':150,
                       vAxis: {minValue: -5},
                       hAxis: {textStyle: {color:'white'}}
                       };

var options2 = {'title':'Happiness on 10.31',
                       'width':320,
                       'height':150,
                       vAxis: {minValue: -5},
                       hAxis: {textStyle: {color:'white'}}
                       };


        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        
        var chart2 = new google.visualization.LineChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options2);
        
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
    <div class="nav2"><p>Progress</p></div>
    <div id="chart_div2"></div>
    </br>
    <div id="chart_div"></div>
  </body>
</html>
</br>
</br>
</br>
</br>
</br>
</br>
</br>	
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