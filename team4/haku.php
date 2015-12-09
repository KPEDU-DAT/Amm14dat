<!DOCTYPE HTML>
<html>
<head>
  <title>Haku</title>
  <meta charset="UTF-8">
<style>
table, th, td {
    border: 1px solid black;
    }
    </style>


</head>
<body>
<form action="" method="POST">
</label>Haku parametri</label>
<input type="text" name="hakua"></input>
<label>Haku indeksi</label>
<input type="text" name="hakub"></input>
<button type="submit" name="nappi">Haku</button>
</form>
<table>
<tbody>
<tr><th>Osoite</th><th>Pnro</th><th>Kaupunki</th><th>Pinta-ala</th><th>Hinta</th><th>Tyyppi</th><th>Kerros</th><th>Asunto numero</th><th>Esittely</th><th>Rakennusvuosi</th></tr>
<?php
$hakua = $_POST['hakua'];
$hakub = $_POST['hakub'];

$my=mysqli_connect("localhost","","","");

if($my->mysql_errno){
  die("MySQL, virhe yhteyden luonnissa:".$my->connect_error);
}
$my->set_charset('utf8');
$sql="
SELECT * FROM asuntotieto
WHERE $hakua LIKE \"$hakub\";";

if($tulos = $my->query($sql)){
    while($d = $tulos->fetch_object()){
    echo "<tr><td>$d->osoite</td><td>$d->pnro</td><td>$d->kaupunki</td><td>$d->pintaala</td><td>$d->hinta</td><td>$d->tyyppi</td><td>$d->kerros</td><td>$d->asuntonro</td><td>$d->esittely</td><td>$d->rakennusvuosi</td></tr>";
    }
}else{}

$my->close();
?>
</tbody>
</table>
</body>
</html>