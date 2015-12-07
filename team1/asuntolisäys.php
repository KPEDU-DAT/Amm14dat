<!DOCTYPE html>
<html>
<head>
 <title>Asunnon lisäys</title>
 <meta charset="UTF-8">
</head>
<body>
 <form action="asuntolisäys.php" method="get">
  Asunnon ID:
  <input type="text" value="" name="id">
  <br>
  Osoite: 
  <input type="text" value="" name="osoite">
  <br>
  Kunta: 
  <input type="text" value="" name="kunta">
  <br>
  Talotyyppi:
  <input type="text" value="" name="talotyyppi">
  <br>
  Valmistusaika: 
  <input type="text" value="" name="valmaika">
  <br>
  Rakennusmateria: 
  <input type="text" value="" name="rakmateria">
  <br>
  Kattokate: 
  <input type="text" value="" name="kattokate">
  <br>
  Lämmitys: 
  <input type="text" value="" name="lammitus">
  <br>
  Ilmastointi: 
  <input type="text" value="" name="ilma">
  <br>
  Antenni: 
  <input type="text" value="" name="antenni">
  <br>
  Hissit: 
  <input type="text" value="" name="hissit">
  <br>
  <input type="submit" value="Lisää asunto">
 </form>
<?php
   $my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
   if($my->mysqli_errno) {
   die("MySQL, virhe yhteyden luonnissa:" . $my->connect_error);
   }
   $my->set_charset('utf8');
   
   $sql="INSERT INTO team1_asunnot
         VALUES('".$_GET['id']."',
                '".$_GET['osoite']."',
                '".$_GET['kunta']."',
                '".$_GET['talotyyppi']."',
                '".$_GET['valmaika']."',
                '".$_GET['rakmteria']."',
                '".$_GET['kattokate']."',
                '".$_GET['lammitus']."',
                '".$_GET['ilma']."',
                '".$_GET['antenni']."',
                '".$_GET['hissit']."');";
    
    if($tulos = $my->query($sql)) {
      echo "Asunnon lisäys onnistui";
    }
    
    $my->close();
?>
</body>
</html>