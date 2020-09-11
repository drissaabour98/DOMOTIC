

		
			
			
			
<?php
 
$dataPoints = array();
$dataPoints1 = array();

    $db= new PDO("sqlite:/www/tembase.db");
    $sql = "SELECT * FROM temps ORDER BY timestamp DESC LIMIT 20  "; 
    $sql2 = "SELECT * FROM SEUIL ORDER BY rowid DESC LIMIT 1 ";
    foreach($db->query($sql2) as $row){
    	$seuil=$row [valeur];
    } 
    $i=1;
   foreach($db->query($sql) as $row){
   	$date = new DateTime($row [timestamp]);
		//strtotime(JSON_NUMERIC_CHECKDD-MMM-YY-hh:mm:ss
       array_push($dataPoints , array("x"=>strtotime($row [timestamp])*1000 ,"y"=>$row[temp]));
       array_push($dataPoints1 , array("x"=>strtotime($row [timestamp])*1000 ,"y"=>$seuil));
    	$i=$i+1;
    }
	$db = null;
 $i=1;

?>
 


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>AABOUR idriss</title>
  
  
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <link rel="stylesheet" href="css/demo.css" >
  <link rel="stylesheet" href="css/templatemo-style.css">
  


  <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>

 		<div id="particles-js">
			<br>
	<button onclick="history.go(-1);" class="tm-btn-subscribe"  style="text-align: center" >Back To index page</button>
			<br><br>
<script>

window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "dark1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "the last 20 valuee of the temperature with °C"
	},
	axisX:{
        title: "timeline" },
        axisY:{
        title: "temperature" },
        axisY2:{
        title: "seuil" },
	data: [{
	 	interval : 1,
	 	        intervalType: "minute",
        
		xValueType: "dateTime",
		xValueFormatString: "MMM-YY-hh:mm:ss",
		type: "spline", //change type to bar, line, area, pie,column etc  
		dataPoints: <?php echo json_encode($dataPoints,JSON_NUMERIC_CHECK); ?>},
		{
	 	interval : 1,
	 	        intervalType: "minute",
        
		xValueType: "dateTime",
		xValueFormatString: "MMM-YY-hh:mm:ss",
		type: "spline", //change type to bar, line, area, pie,column etc  
		dataPoints: <?php echo json_encode($dataPoints1,JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}

</script>

<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</div>
</head>
</body>

			<ul class="cb-slideshow">
			<! img src="images/me2.jpg" alt="driss" style="width:400px;height:400px;">
			
			<li>
			
	            </li>
	            <li>
	             
	            </li>
	            <li></li>
	            <li></li>
	            <li></li>
	            <li></li>
	            
	        </ul>
</html> 
