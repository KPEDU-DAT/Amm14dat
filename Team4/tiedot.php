<br><br><br>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Isännän talomaja</title>
    <link href="/~ronipohjonen/BS2015/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="starter-template.css" rel="stylesheet">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  </head>

  <body>
  <br><br><br>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Etusivu</a></li>
            <li><a href="toinent.php">Tiedot</a></li>
          </ul>
        </div>
      </div>
    </nav>
      <div class="container">

      <div class="starter-template">
        <h1></h1>
        <p class="lead"></p>
      </div>

    </div>
    <div class="container">
      <?php   
     $my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
    if ($my->mysql_errno) {
      die("MySQL, virhe yhteyden luonnisa:". $my->connect_error);
    }

  $my->set_charset('utf8');

  if($result = $my->query('SELECT * FROM asuntotieto')) {
    while($d = $result->fetch_object()) {
      echo "".$d->osoite."".$d->pnro."".$d->kaupunki."".$d->pintaala."".$d->hinta."".$d->tyyppi."".$d->kerros."".$d->.""..""..""..""
  }        
  } else {
    echo "Virhe SQL-kyselyssä!";
    }
?>   
    </div>

    <script src="https://aj"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/~ronipohjonen/BS2015/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>