<html> 
 <head> 
   <meta http-equiv="Content-Type" content="text/html"  charset="utf-8" />
   <title>Aabour</title>
  
 </head>
 <body>
<?php 
  if( !isset($_POST["chaine"]))
  {
   echo '<h1> executer un script python a partir d une page web :</H1>';
   echo '<form  method="post">' ;
   echo '<input type="text" name="chaine"  />';
   echo '<input type="submit" name="executer" value="executer" />';
  }
  else{
  $chaine=$_POST["chaine"];
 
  echo '<h3> ecriture dans le fichier text.txt..</h3>';
  echo '<br> la phrase suivante <br> ' ;
  echo '<br> <h3> '.$chaine.'</h3><br> <br>';
 
   $cmd="sudo python /www/cgi-bin/write_to_file.py  ".$chaine;
  exec($cmd);
   echo'<br> .....done <br>';
   echo 'pour renvoyer une nouvelle chaine';
echo '<a href="test2.php"> cliquez ici</a>'; 


}?>
</body>
</html>

