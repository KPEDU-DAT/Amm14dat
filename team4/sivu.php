
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

    <title>Isännöinti juu</title>

    <link href="/~ronipohjonen/BS2015/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="navbar.css" rel="stylesheet">

    <script src="../../assets/js/ie8-responsive-file-warning.js"></script>
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
table, th, td {
    border: 1px solid black;
    }
    </style>  

</head>

  <body>

    <nav class="navbar navbar-inverse navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        
        <h3>JS Asunto Ou</h3>
        
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Etusivu</a></li>
            <li><a href="toinen.php">Tiedot</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container" style="padding-top:2cm;">
<div class="col-md-12 col-xs-12 col-lg-12 table-responsive" style="padding-top:2cm;">    
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

if($tulos = $my->query($sql)){
    while($d = $tulos->fetch_object()){
    echo "<tr><td>$d->osoite</td><td>$d->pnro</td><td>$d->kaupunki</td><td>$d->pintaala</td><td>$d->hinta</td><td>$d->tyyppi</td><td>$d->kerros</td><td>$d->asuntonro</td><td>$d->esittely</td><td>$d->rakennusvuosi</td></tr>";
    }
}else{}

$my->close();
?>
</tbody>
</table></div>
      <div class="jumbotron">
      <table border="solid">
    </div>
    </div>
    <div class="col-md-12 col-lg-12 col-xs-12 table-responsive" style="padding-top: 1cm;">
        <table>
        <tbody>
        <?php
		     $my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
    if ($my->mysql_errno) {
      die("MySQL, virhe yhteyden luonnisa:". $my->connect_error);
    }

  $my->set_charset('utf8');

  if($result = $my->query('SELECT * FROM asuntotieto')) {
    while($d = $result->fetch_object()) {
      echo "<tr>"."<td>".$d->osoite."</td>"."<td>".$d->pnro."</td>"."<td>".$d->kaupunki."</td>"."<td>".$d->pintaala."</td>"."<td>".$d->hinta."</td>"."<td>".$d->tyyppi."</td>"."<td>".$d->kerros."</td>"."<td>".$d->asuntonro."</td>"."<td>".$d->esittely."</td>"."<td>".$d->rakennusvuosi."</td>"."</tr>";
  }
  } else {
    echo "Virhe SQL-kyselyssä!";
    }

?>
</tbody>
</table>
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/~ronipohjonen/BS2015/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>