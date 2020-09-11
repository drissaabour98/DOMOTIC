
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
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 60%;
}

#customers td, #customers th {
  border: 2px solid #ddd;
  padding: 8px;
}



#customers th {
 
  padding-bottom: 12px;
  text-align: center;
  color: white;
}
#customers tr {
 
  padding-bottom: 12px;
  text-align: center;
  color: white;
}

</style>
  
  
  
  </head>
  
  
<BODY  > 
  
  <br> <br>
<a href="http://192.168.43.91/projet/temperature/index.php"  class="tm-btn-subscribe"> GO Back To index page</a>


<br> <br>
 


 <?php
   
if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {  
  $db= new PDO("sqlite:/www/tembase.db");
  $sql= "SELECT * FROM etat ORDER BY rowid DESC LIMIT 1 ";
foreach($db->query($sql) as $row)
{
 
	$etat= $row[valeur];
	
	
}
$db=null;
  
  
  if($etat==1){   $e=0;
      				  echo " <h1>  you turn off the fan </h1> " ;
  						$cmd="sudo python /www/projet/write_to_file2.py ".$e;
  							exec($cmd);}
  else 
  {
  					$e=1;
      				  echo " <h1>  you turn on the fan </h1> " ;
  						$cmd="sudo python /www/projet/write_to_file2.py ".$e;
  							exec($cmd);
  
  
  }
  
  
  
  
  }
  
  ////////////////////////////////////////////////////
   	else {								
 $db= new PDO("sqlite:/www/tembase.db");
 $sql= "SELECT * FROM temps ORDER BY timestamp DESC LIMIT 1 ";

foreach($db->query($sql) as $row)
{
	
	
	$a=$row[temp];
	

}
 
$sql= "SELECT * FROM SEUIL ORDER BY rowid DESC LIMIT 1 ";
foreach($db->query($sql) as $row)
{

	$b= $row[valeur];
	
	
}
$sql= "SELECT * FROM etat ORDER BY rowid DESC LIMIT 1 ";
foreach($db->query($sql) as $row)
{
 
	$etat= $row[valeur];
	
	
}
$db=null;




//creer un tableau 
echo ' <table id="customers" > <tr> ';
 echo '	<th style="  text-align: center " >MORE INFORMATION</th>';
   
 echo '</tr><tr>  	<th>Temperature</th>    <th> LAST Threshold</th>    <th> STATE of the fan </th>  </tr>  <tr> ';
  
   echo"<tr>";
  	echo "<td>".$a."</td>";
	echo "<td>".$b."</td>";
	if($etat==1)
	{  	echo "<td> ON </td>";
				}
	 else {
	 echo "<td> OFF </td>";
	 }
echo"</tr>";
  
  
  echo "</table>";







// faire les différente sénario
  
  //si la température < seuil et fan = 0
  //>>>>on fait rien 
  if($a<$b && $etat ==0 )
  {
	echo " <h1> EVERYTHING IS FINE ....the fan is not started</h1>" ; 
  }
  
 //si la température > seuil et fan = 0
 //> il faut switch  ON 
 elseif($a>$b && $etat ==0)
  {
  	 echo '<form action='.$_SERVER['PHP_SELF'].'  method="post">';
  	 echo '<label> <h1>yo should to switch on the fan :</h1><label> ';
  echo '<input type="submit" class="tm-btn-subscribe" value="switch on" id="OPNED" />';
					 echo '</form>';
  
  }

  
  //si la température < seuil et fan = 1
  //>>il faut switch off
  elseif($a<$b && $etat ==1 )
  {
	echo '<form action='.$_SERVER['PHP_SELF'].'  method="post">';
  	 echo '<label> <h1>yo should to switch off the fan :</h1></label> <br>';
  echo '<input type="submit" class="tm-btn-subscribe" value="switch off" id="closed" />';
					 echo '</form>';
  }
  
  //si la température > seuil et fan = 1
 
 //>on fait rien
 
elseif($a>$b && $etat ==1 )
  {
echo " <h1>  EVERYTHING IS FINE ... the fan is started </h1> " ; 
  }      
	else { echo "erreur";}		
	
	
}		 
/*					 
   function closed(){     				 
      				  //enregistrer cette valeur 
      				  $e=0;
      				  echo " <h1>  you turn off the fan </h1> " ;
  						$cmd="sudo python /www/projet/write_to_file2.py ".$e;
  							exec($cmd);
  							 
           		 }   
      function opned(){
      				 echo " <h1>  you turn on the fan </h1> " ; 
      				  //enregistrer cette valeur 
      				  $e=1;
  							$cmd="sudo python /www/projet/write_to_file2.py ".$e;
  							exec($cmd);
  								
           		 }          
				*/	
					?>
					
</body>

</html>
