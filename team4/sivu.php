
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

    <link href="starter-template.css" rel="stylesheet">

    <script src="../../assets/js/ie8-responsive-file-warning.js"></script>
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
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
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Etusivu</a></li>
            <li><a href="#about">Tiedot</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="jumbotron">
      <table border="1">
    </div>
    </div>
        <?php
		     $my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
    if ($my->mysql_errno) {
      die("MySQL, virhe yhteyden luonnisa:". $my->connect_error);
    }

  $my->set_charset('utf8');

  if($result = $my->query('SELECT * FROM asuntotieto')) {
    while($d = $result->fetch_object()) {
      echo "<td>".$d->osoite."</td>"."<td>".$d->pnro."</td>"."<td>".$d->kaupunki."</td>"."<td>".$d->pintaala."</td>"."<td>".$d->hinta."</td>"."<td>".$d->tyyppi."</td>"."<td>".$d->kerros."</td>"."<td>".$d->asuntonro."</td>"."<td>".$d->esittely."</td>"."<td>".$d->rakennusvuosi."</td>";
  }
  } else {
    echo "Virhe SQL-kyselyssä!";
    }
?>


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