<?php

    //inserer la nouvelle seuil dans la base de donnée
    $sql = "insert into SEUIL (valeur)  values (4)";
    // $stmt = $db2->prepare($sql);
     	
       // $stmt->bindValue(':valeur',(float)50,SQLITE3_NUMERIC);
      //$db2->execute($sql)
      $db= new PDO("sqlite:/www/tembase.db");
$sql= "SELECT * FROM SEUIL ORDER BY rowid DESC LIMIT 2 ";
 $commands = 'CREATE TABLE IF NOT EXISTS test (valeur INTEGER)';
/*foreach($db->query($sql) as $row)
{
 
	echo $row[valeur];
	echo "  °C";
	
}
db=null;

 $db= new PDO("sqlite:/www/tembase.db");

   $sql = "insert into SEUIL values (41)";*/
  $db->execute($commands);
    
       ?>
      
