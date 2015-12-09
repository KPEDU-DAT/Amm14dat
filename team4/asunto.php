
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Tietokonekorjaamo kpedu</title>

    <!-- Bootstrap core CSS -->
    <link href="/~jiamingtian/bs2015/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    <link href="navbar.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	  <nav class="navbar" style="background-color: white;">
        <div class="container">
          <h1>JS Asunto Oy</h1>
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="" alt></a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav nav-tabs">
              <li><a href="#">Home</a></li>
              <li><a href="#">Asuntotiedot</a></li>
              <li><a href="#">Isännöitsijä todistus</a></li>
              <li class="active"><a href="asunto.php">Asunto hallinta</li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    <div class="container">
   <?php
   $my=new mysqli("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
   if($my->mysql_errno) {
   die("MySQL virhe (#".$my->mysql_errno.") yhteyden luonnissa: ". $my->connect_error);
   $my->set_charset('utf8');
    if($result = $my->query('
                SELECT *
                FROM asuntotieto;')){
       echo "<table calss=\"table\">;
       echo "<tr><th>Asunto ID</th><th>Osoite</th><th>Posti nro</th><th>Kaupunki</th><th>Pinta-ala</th><th>Hinta</th><th>Tyyppi</th><th>Kerros</th><th>Asuntonro</th><th>esittely</th><th>Rakennusvuosi</th></tr>";
     while($d = $result->fetch_object()){
     echo "<tr><td>".$d->aid."</td><td>".$d->osoite."</td><td>".$d->pnro."</td><td>".$d->kaupunki."</td><td>".$d->pintaala."</td><td>".$d->hinta."</td><td>".$d->tyyppi."</td><td>".$d->kerros."</td><td>".$d->asuntonro."</td><td>".$d->esittely."</td><td>".$d->rakennusvuosi."</td></tr>";
     }
   echo "</table>";
    }else {
      echo "Virhe SQL-kyselyssä!";
    }
   ?>
    <?php $my->close; ?>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/~jiamingtian/bs2015/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
