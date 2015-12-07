<?php
$my= new mysqli ('localhost','data15','aJrHfybLxsLU76rV','data15');
    if($my->mysql_errno){
        die("MySQL, virhe yhteyden luonnissa". $my->connect_error);
    }
?>
<?php
    #Otetaan lomakkeesta tiedot
  $ = $_POST[''];
  $ = $_POST[''];
  $ = $_POST[''];
  $ = $_POST[''];
  $ = $_POST[''];
    #lisätään ne tietokantaan
    if ( $ && $ && $ && $ &&) {
        $sql="INSERT INTO tietokanta VALUES ('$','$','$','$','$','$','$');";
    if($tulos = $my->query($sql)){
        echo "<h2> Asunto lisätty</h2>";
    }
    else {
        echo "<h2>Asunto lisäys epäonnistui</h2>";
    }
    }
    $my->close();
    ?>