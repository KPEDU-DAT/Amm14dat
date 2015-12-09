<!DOCTYPE html>
<html>
  <head>
  <title>gadgds</title>
  <meta charset="UTF-8">
  </head>
  <body>
	<form action="asuntopoisto.php" method="get">
	Asunnon ID:
	<input type="text" value="" name="id2">
	<input type="submit" value="Poista asunto">
<?php
      $my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
      if($my->mysql_errno) {
        die("MySQL: virhe (#".$my->mysql_errno.") virhe yhteyden luonnissa:" . $my->connect_error);
      }
      $my->set_charset("utf8");
      $sql="DELETE FROM team1_asunnot
			WHERE id=('".$_GET['id2']."');";
			if($tulos = $my->query($sql)) {
			echo "Poisto onnistui";
			}
			$my->close();
	  
?>
</body>
</html>