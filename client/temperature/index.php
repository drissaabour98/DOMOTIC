<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>AABOUR idriss</title>
  
  
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <link rel="stylesheet" href="css/demo.css" />
  <link rel="stylesheet" href="css/templatemo-style.css">
  
  <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
		
<style>
ul {
 padding:0;
 margin:0;
 list-style-type:none;
 }
li {
 margin-left:2px;
 float:left; /*pour IE*/
 }
ul li a {
margin-top: 40px;
 display:block;
 float:left;   
 width:300px;
 /*background-color:#FFF;*/
 
 color:white;
 text-decoration:none;
 text-align:center;
 padding:5px;
 border:2px solid;
 /*pour avoir un effet "outset" avec IE :*/
 border-color:#DCDCDC #696969 #696969 #DCDCDC;
 }
ul li a:hover {
 background-color:#D3D3D3;
 border-color:#696969 #DCDCDC #DCDCDC #696969;
 } 
</style>	</head>

	<body>
	

			<div id="particles-js">

			<ul>
			
 <li><a href="http://192.168.43.91/projet/temperature/chart.php">CHART</a></li>
 
 <li><a href="http://192.168.43.91/projet/temperature/first.php">TABLE</a></li>
 <li><a href="http://192.168.43.91/projet/temperature/control.php">Control of the fan</a></li>
</ul>
			
			
			</div>

		
			<ul class="cb-slideshow">
			<!img src="images/me3.jpg" alt="driss" style="width:400px;height:400px;">
			
			<li>
			
	            </li>
	            <li>
	             
	            </li>
	            <li></li>
	            <li></li>
	            <li></li>
	            <li></li>
	            
	        </ul>
	         <br><br><br>

			<div >
				<div >
					<div class= "tm-content col-xl-5 col-sm-7 col-xs-8  section" style="margin-right:40 ">
			<header   ><h1 class="mb-5" style="text-align: center">Welcome</h1></header>
				
				
<?php
//conncexion a la base de donnees

$db= new PDO("sqlite:/www/tembase.db");
$a=2000;
$b=2000;
//requete de selection 

$sql= "SELECT * FROM temps ORDER BY timestamp DESC LIMIT 1 ";

foreach($db->query($sql) as $row)
{
	echo '<P class="mb-5" style="text-align: center"> Last update in :';
	echo $row [timestamp];
	 $ti=$row [timestamp];
	echo "</P>";
  	echo '<P class="mb-5" style="text-align: center"> Temperature :';
	echo $row[temp];
	$a=$row[temp];
	echo "  °C</P>";
 
}

  
//The number of seconds to wait before refreshing the current URL.
$tim=strtotime($ti)+3*60+3601; //
$refreshAfter =$tim-time();


//echo '<P class="mb-5" style="text-align: center"> refreshAfter :</P>';
	//echo $refreshAfter;
	//echo "  Seconds</P>";

 
//Send a Refresh header to the browser.
header('Refresh: ' . $refreshAfter);
$db=null;

?>

	 
<p id="demo" class="mb-5" style="text-align: center"></p>

<script>
// Set the date we're counting down to
var countDownDate = <?php echo json_encode($tim); 
//<?php echo json_encode($ti); ?>;
//var ccountDownDate=  countDownDate.getTime();
// Update the count down every 1 second
var i=1;
var distance = <?php echo json_encode($refreshAfter); ?>;
var x = setInterval(function() {

  // Get today's date and time
  //var now = new Date().getTime();
    
  // Find the distance between now and the count down date
 
  
    
  // Time calculations for days, hours, minutes and seconds
  var minutes =  parseInt(distance/60);
  var seconds =  distance-minutes*60;
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = "refreshAfter : "+ minutes+"min:" +seconds+"seconds";
      distance = distance -1;

}, 1000);
</script>

  <?php
 
  
if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
  			// collect value of input field
  			$seuil = $_POST['seuil'];
   if (empty($seuil)) {
 			   echo " enter a valid value";
  			} 
    else 
 			{
  echo '<P  class="mb-5"  style="text-align: center"> NEW Threshold :';
	echo $seuil;
	echo "  °C</P> ";
	//enregistrer cette valeur 
  $cmd="sudo python /www/projet/write_to_file.py ".$seuil;
  exec($cmd);
      $b=$seuil;

  	}
}
else
{


//requete de selection 
 $db= new PDO("sqlite:/www/tembase.db");
$sql= "SELECT * FROM SEUIL ORDER BY rowid DESC LIMIT 1 ";
foreach($db->query($sql) as $row)
{
 echo '<P  class="mb-5"  style="text-align: center"> LAST Threshold is:';
	echo $row[valeur];
	$b= $row[valeur];
	echo "  °C</P>";
	
}

}
  $db=null;

?>
        
               	    	

							
					
					
					
				
					
					<?php 
					//a = temperature
					 //b=seuil
					 if( $a<$b){
					 exec("./web_led 0 0 > /home/pi/rlt.txt");	
					  echo '<h1  class="mb-5"  style="text-align: center">  LED OFF</h1>';
					 
					              }
					  else {
					   
					 exec("./web_led 0 1 >  /home/pi/rlt.txt");	
				  echo '<h1  class="mb-5"  style="text-align: center">  LED ON</h1>';
				  
					  }
					?>
					<br>
						
                    <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="subscribe-form">
               	    	<div class="row form-section">

							<div class="col-md-7 col-sm-7 col-xs-7">
			                     <label> 
						change the threshold </label>
				  			
							
							
  <input type="number" id="quantity" name="seuil" min="20" max="40" step="1" value="<?php echo $b;?>">
  								
  								
				  			</div>
				  			<div class="col-md-5 col-sm-5 col-xs-5">
				  			 <br>
						<button type="submit" class="tm-btn-subscribe">SUBMIT</button>
							</div>
						
						</div>
                    </form>
                

					</div>
				</div>	
				
			</div>	
	</body>

	<script type="text/javascript" src="js/particles.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
</html>
