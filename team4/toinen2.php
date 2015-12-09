
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Tiedot</title>

    <link href="/~ronipohjonen/BS2015/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="navbar.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <nav class="navbar navbar-inverse navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="sivu.php">Etusivu</a></li>
              <li class="active"><a href="#">Tiedot</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Moro</h1>
        <p>Moro poja</p>
      </div>

    </div>
      <div class="container">
      <div class="jumbotron">
      <h2>Todistuksen tulostus</h2>
       <form action="istodistust.php">
      <label>Asunnon numero</label>
      <input type="number" name="aid">
      <button>Tulosta</button>
    </form>
    </div>
    </div>

        <div class="container" style="padding-top:2cm;">
<div class="col-md-12 col-xs-12 col-lg-12 table-responsive" style="padding-top:2cm;">
<form action="toinen.php" method="POST">
<label>Haku parametri</label>
<input type="text" name="hakua">
<label>Haku indeksi</label>
<input type="text" name="hakub">
<button type="submit" name="nappi">Haku</button>
</form>
<table class="table">
<tr><th></th><th>Osoite</th><th>Pnro</th><th>Kaupunki</th><th>Pinta-ala</th><th>Hinta</th><th>Tyyppi</th><th>Kerros</th><th>Asunto numero</th><th>Esittely</th><th>Rakennusvuosi</th></tr>
<?php
$nappi = $_POST['nappi'];
$hakua = $_POST['hakua'];
$hakub = $_POST['hakub'];
$my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
if($my->mysql_errno){
  die("MySQL, virhe yhteyden luonnissa:".$my->connect_error);
}
$my->set_charset('utf8');
$sql="
SELECT * FROM asuntotieto
WHERE $hakua LIKE \"$hakub\";";
?>
</table></div>
    </div>
    <div class="container">
    <div class="col-md-12 col-lg-12 col-xs-12 table-responsive" style="padding-top: 1cm;">
    <div class="jumbotron">
       <form action="toinen2.php" method="get">
        <table class="table table-bordered">
        <tbody>
        <?php
             $my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
    if ($my->mysql_errno) {
      die("MySQL, virhe yhteyden luonnisa:". $my->connect_error);
    }
  $my->set_charset('utf8');
  if($result = $my->query('SELECT * FROM asuntotieto')) {
    while($d = $result->fetch_object()) {
      echo "<tr><td><button type=\"submit\" name=\"poista\" value=\"$d->aid\">Poista</button></td><td>".$d->osoite."</td>"."<td>".$d->pnro."</td>"."<td>".$d->kaupunki."</td>"."<td>".$d->pintaala."</td>"."<td>".$d->hinta."</td>"."<td>".$d->tyyppi."</td>"."<td>".$d->kerros."</td>"."<td>".$d->asuntonro."</td>"."<td>".$d->esittely."</td>"."<td>".$d->rakennusvuosi."</td>"."</tr>";
  }
  } else {
    echo "Virhe SQL-kyselyssä!";
    }
	
	?>
	
 
	
</tbody>
</table>
</form>
	<form><button name="nappi" value="1">Lisä asunto</button></form>
	<?php  
    $poista = $_GET['poista'];
    $sql = "DELETE FROM asuntotieto WHERE aid=\"$poista\";";
    if($result = $my->query($sql)) {
        echo "Onnistu";
    } else {
        echo "Epäonnistu";
    }		

       $nappi = $_GET['nappi'];
	    $laheta == $_GET['laheta'];
        if($result = $my->query('SELECT * FROM asuntotieto')) {
            while($d = $result->fetch_object()) {
	            $aid = $d->aid + 1;
            }
        }
	    $osoite 	= $_GET['osoite'];
	    $pnro 		= $_GET['pnro'];
	    $kaupunki 	= $_GET['kaupunki'];
	    $pintaala 	= $_GET['pintaala'];
	    $hinta 		= $_GET['hinta'];
	    $tyyppi 	= $_GET['tyyppi'];
	    $kerros 	= $_GET['kerros'];
	    $asuntonro 	= $_GET['asuntonro'];
	    $esittely 	= $_GET['esittely'];
	    $rakennusvuosi = $_GET['rakennusvuosi'];
	    if($aid && $osoite && $pnro && $kaupunki && $pintaala && $hinta && $tyyppi && $esittely && $rakennusvuosi) {
        $sql = "INSERT INTO asuntotieto VALUES('$aid', '$osoite', '$pnro', '$kaupunki', '$pintaala', '$hinta', '$tyyppi', '$kerros', '$asuntonro', '$esittely', '$rakennusvuosi');";
            if($result = $my->query($sql)){
                $msg = "Onnistu";
            } else {
                $msg = "Epäonnistu";
            }
        } else {
            echo "Täytäkä kaikki tietot tarkasti";
        }
	if($nappi == 1) {
	  echo "<form action=\"toinen2.php\" method=\"get\">
	        <label>Osoite</label><br><input type=\"text\" name=\"osoite\"><br>
            <label>Posti nro</label><br><input type=\"number\" name=\"pnro\"><br><label>Kaupunki</label><br><input type=\"text\" name=\"kaupunki\"><br>
	        <label>Pinta-ala</label><br><input type=\"number\" name=\"pintaala\"><br><label>Hinta</label><br><input type=\"number\" name=\"hinta\"><br>
	        <label>Tyyppi</label><br><input type=\"text\" name=\"tyyppi\"><br><label>kerros</label><br><input type=\"number\" name=\"kerros\"><br>
	        <label>asuntonro</label><br><input type=\"number\" name=\"asuntonro\"><br><label>Rakennusvuosi</label><br><input type=\"number\" name=\"rakennusvuosi\"><br>
	        <label>Esittely</label><br><input type=\"text\" name=\"esittely\"><br>
	        <button name=\"laheta\" value=\"1\">Lisä</button>
	        </form>";
       echo "$msg";
	}
    
    $my->close();
?>
	
</div>
</div>
</div>

    <script src="/~ronipohjonen/BS2015/bower_components/jquery/dist/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/~ronipohjonen/BS2015/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
