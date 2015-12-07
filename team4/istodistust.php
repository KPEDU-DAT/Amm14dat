<?php
    $my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
    if($my->mysql_errno) {
        die("MySQL, virhe yhteyden luonnissa:" . $my->connect_error);
    }
    $my->set_charset("utf8");
    
    $tnro = $_GET['aid'];
    
    $sql = "SELECT osoite,pnro,kaupunki,pintaala,hinta,kerros,asuntonro,esittely,rakennusvuosi FROM asuntotieto WHERE aid='$tnro';";
    
    if($tulos = $my->query($sql)) {
      $t = $tulos->fetch_object();
      $tt[]=array($t->osoite,$t->pnro,$t->kaupunki,$t->pintaala,$t->hinta,$t->kerros,$t->asuntonro,$t->esittely,$t->rakennusvuosi);
    }
                                                       
    
                                                                   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Isännöitsijätodistus</title>
    </head>
    <body>
      <table>
        <thead></thead>
        <tbody>
          <tr><th>Yrityksen tiedot:</tr>
          <tr><td>Yrityksen nimi: JS Asunto Oy<td>Yritystunnus: 000000
              <td>Rekisteröintipäivä: 24.2.2020 <td>
          </tr>
          <tr><td>Kiinteistön osoite: Isokatu 3 <td>Osakenumerot: <td>Puheenjohtajan nimi: osoite: 
          </tr>
          <tr><td colspan="4"><hr></tr>
          <tr><th>Asunnon tiedot:</tr>
          <tr><td>Asunnon pinta-ala: <?=$t->pintaala;?> <td>Huoneet: <?=$t->esittely;?><td>Rakennusvuosi: <?=$t->rakennusvuosi;?>
          </tr>
          <tr><td>Asunnon sijainti: <?=$t->osoite;?><td>Asunnon yhtiövastike:  <td> Hinta: <?=$t->hinta;?> €
          </tr>
          
        </tbody>
      </table>
      <?php
       $my->close();
      ?>    
    </body>
</html>