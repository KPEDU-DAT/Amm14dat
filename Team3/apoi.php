<?php
$my= new mysqli ('localhost','data15','aJrHfybLxsLU76rV','data15');
    if($my->mysql_errno){
        die("MySQL, virhe yhteyden luonnissa". $my->connect_error);
    }
?>
<?php
#Otetaan lomakkeesta se jonka mukaan halutaan poistaa asunto
$ = $_POST[''];
if ($) {
		#Tietokannalle oikea nimi ja joku muutetaan siksi kentäksi, jonka perusteella halutaan poistaa
		$sql="DELETE FROM tietokanta WHERE joku='$';";
		if($tulos = $my->query($sql)){
			echo "<h2>Asunto poistettu</h2>";
			}
		else {
			echo "<h2> Asunnon poisto ei onnistunut</h2>";
		}
		}
	?>