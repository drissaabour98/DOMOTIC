<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>AABOUR idriss</title>
  
  <link rel="stylesheet" href="css/bootstrap.min.css">
	

	<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 40%;
}

#customers td, #customers th {
  border: 2px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
 
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
body {
	background-color:white;
  background-image: url("https://cdn.futura-sciences.com/buildsv6/images/wide1280/9/2/8/928940f022_50151852_rechauffement-climatique-xendim-fotolia.jpg");
   
}
</style>



<button onclick="history.go(-1);"  class="btn btn-primary">Back To index page</button>
</head>
<BODY >

<br> <br>
<div class="row"> 
<div class="col-6">  
<table id="customers" style= "width : 100%" >
  <tr>
  	<th>id</th>
    <th>TIME</th>
    <th>Value</th>
  </tr>
  <tr>

<?php
//conncexion a la base de donnees

$db= new PDO("sqlite:/www/tembase.db");

//requete de selection 

$sql= "SELECT * FROM temps ORDER BY timestamp DESC LIMIT 20 ";
$i=0;
$max=-1000;
$min=800;
$somme=0;
foreach($db->query($sql) as $row)
{
  echo"<tr>";
  	echo "<td style='width: 10%;'>".$i."</td>";
	echo "<td>".$row [timestamp]."</td>";
	echo "<td>".$row[temp]."</td>";
	if($min>$row[temp])
	{ $min=$row[temp]; }
	if($max<$row[temp])
	{ $max=$row[temp]; }
	$somme=$somme+$row[temp];
echo"<tr/>";
$moy=$somme/20;
$i=$i+1;
}

$bd=null


?>
</table>
</div>
<div class="col-6"> 
<table id="customers" style= "width : 100%"   >
<tr>
  	<th style="  text-align: center " >MORE INFORMATION</th>
   
  </tr>
  <tr>
  	<th>MAX VALUE</th>
    <th>MIN VALUE</th>
    <th>AVERAGE VALUE </th>
  </tr>
  <tr>
  <?php 
   echo"<tr>";
  	echo "<td>".$max."</td>";
	echo "<td>".$min."</td>";
	echo "<td>".$moy."</td>";
	
echo"<tr/>";
  
  ?>
  </table>
   </div>
</div>


</BODY>
