<?php
    $my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
    if($my->mysql_errno) {
        die("MySQL, virhe yhteyden luonnissa:" . $my->connect_error);
    }
    $my->set_charset("utf8");
    
    $tnro = $_GET['aid'];
    
    $sql = "SELECT osoite,pnro,kaupunki,pintaala,hinta,kerros,asuntonro,esittely,rakennusvuosi FROM asuntotieto WHERE aid='$tnro';";    
    $sql = "SELECT osoite,pnro,kaupunki,pintaala,hinta,kerros,asuntonro,esittely,rakennusvuosi FROM asuntotieto WHERE aid='$tnro';";
    
    $ea = 'Ei asukasta'; 

    
    $sql2 = "SELECT * FROM aasiakastieto, vuokraa WHERE aasiakastieto.hetu=vuokraa.hetu AND ( CURDATE() BETWEEN aloitusaika AND loppumisaika) AND (aid='$tnro');";
    
    if($tuloss = $my->query($sql2)) {
      $tt = $tuloss->fetch_object();
    } else { $ea = 'Ei asukasta'; };
    
    if($tulos = $my->query($sql)) {
      $t = $tulos->fetch_object();
    }
                                                       
    
                                                                   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Isännöitsijäntodistus</title>
        <style>
        .tb {border: 2px solid black; min-width: 600px; max-width: 50%; padding: 5px;}
        </style>
    </head>
    <body>
     <div class="t"> 
      <table class="tb">
        <thead><tr><th>Isännöitsijäntodistus</tr></thead>
        <tbody>
          <tr></tr>
          <tr><th>Yrityksen tiedot:</tr>
          <tr><td>Yrityksen nimi: JS Asunto Oy<td>Yritystunnus: 000000
              <td>Rekisteröintipäivä: 24.2.2020 <td>
          </tr>
          <tr><td>Kiinteistön osoite: Isokatu 3 <td>Osakenumerot: <td>Puheenjohtajan nimi: Matti Meikäläinen  Osoite: Isokatu 3 
          </tr>
          <tr><td colspan="4"><hr></tr>
          <tr><th>Asunnon tiedot:</tr>
          <tr><td>Asunnon omistaja: <?php echo $tt->etunimi.' '.$tt->sukunimi; if($tt->etunimi == FALSE)echo $ea;?> <td>Asunnon pinta-ala: <?=$t->pintaala;?> <td>Huoneet: <?=$t->esittely;?><td>Rakennusvuosi: <?=$t->rakennusvuosi;?>
          </tr>
          <tr><td>Asunnon sijainti: <?=$t->osoite;?><td>Asunnon yhtiövastike:  <td> Hinta: <?=$t->hinta;?> €
          </tr>
          <tr><td colspan="4"><hr></tr>
          <tr><th>Muut tiedot:</tr>
          <tr><td>Asunnossa tehdyt remontit: -<td>Taloyhtiön lainat: 5000 €<td>Taloyhtiön energialuokka: </tr> 
          
        </tbody>
      </table>
      </div>
      <?php
       $my->close();
      ?>    
    </body>
</html>