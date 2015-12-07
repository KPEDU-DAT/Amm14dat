<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Tehtävä</title>
<style>
table{
  border: 2px solid black;
}
</style>
</head>
<body>
<?php
  $my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
  if($my->mysql_errno){
    die("MySQL, virhe (#".$my->mysql_errno.")yhteyden luonnissa: ".$my->connect_error);
  }
  $my->set_charset("utf8");
  //Suoritetaan SQL-kysely ja tarkistetaan onnistuiko se
   $huoneistonum = $_GET['hid'];
  if($result = $my->query('SELECT * FROM team1_asukkaat, team1_asunnot WHERE team1_asukkaat.hid = team1_asunnot.id AND hid = '.$huoneistonum.';')){
  //Onnistui - tulostetaan kaikki rivit
  while($d = $result->fetch_object()){
    echo "<table>";
    echo "<tr>";
    echo "<td><h1>JS Asunto Oy</h1></td>";
    echo "<td></td>";
    echo "<td></td>";
	echo "<th>Isännöintitodistus</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Pitkänsillankatu 6</td>";
    echo "<td><strong></strong></td>";
    echo "<td></td>";
	echo "<td></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>67100 Kokkola</td>";
    echo "<td><strong></strong></td>";
    echo "<td></td>";
	echo "<td></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
	echo "<td></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><strong>Asunnontiedot</strong></td>";
    echo "<td></td>";
    echo "<td></td>";
	echo "<td></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><strong>osoite</strong></td>";
    echo "<td><strong>kunta</strong></td>";
    echo "<td><strong>talotyyppi</strong></td>";
	echo "<td><strong>valmistusvuosi</strong></td>";
    echo "</tr>";
	echo "<tr>";
	echo "<td>".$d->osoite."</td>";
	echo "<td>".$d->kunta."</td>";
	echo "<td>".$d->talotyyppi."</td>";
	echo "<td>".$d->valmaika."</td>";
	echo "</tr>";
    echo "<tr>";
    echo "<td><strong>rakennusmateriaali</strong></td>";
    echo "<td><strong>Kattomateriaali & kate</strong></td>";
    echo "<td><strong>Lämmitysjärjestelmä ja lämmönjako</strong></td>";
	echo "<td><strong>Ilmanvaihtojärjestelmä</strong></td>";
    echo "</tr>";
	echo "<tr>";
	echo "<td>".$d->rakmateria."</td>";
	echo "<td>".$d->kattokate."</td>";
	echo "<td>".$d->lammitus."</td>";
	echo "<td>".$d->ilma."</td>";
	echo "</tr>";
    echo "<tr>";
    echo "<td><strong>Antennijärjestelmä:</strong></td>";
    echo "<td><strong>Hissit:</strong></td>";
    echo "<td></td>";
	echo "<td></td>";
    echo "</tr>";
	echo "<tr>";
	echo "<td>".$d->antenni."</td>";
	echo "<td>".$d->hissit."</td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "</tr>";
    echo "<tr>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
	echo "<td></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><strong>Vuokralainen</strong></td>";
    echo "<td></td>";
    echo "<td></td>";
	echo "<td></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>".$d->sotu."</td>";
    echo "<td></td>";
    echo "<td></td>";
	echo "<td></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>".$d->etunimi." ";
	echo $d->sukunimi."</td>";
    echo "<td></td>";
    echo "<td></td>";
	echo "<td></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>".$d->puhelin."</td>";
	echo "<td></td>";
    echo "<td></td>";
	echo "<td></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>".$d->email."</td>";
    echo "<td></td>";
    echo "<td></td>";
	echo "<td></td>";
  	echo "</tr>";
  }
  echo "</table>";
  } else {
    //Kyselyssä on virhe!
    echo "Virhe SQL-kyselyssä";
  }
  $my->close();
?>
</body>
</html>
