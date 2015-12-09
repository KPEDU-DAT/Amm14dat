<!DOCTYOE html>
<html>
  <head>
    <title>TEST</title>
    <meta charset="utf-8">
	    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/~jiamingtian/bs2015/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <head>
  <body>
  <form><button name="nappi" value="1">Lisä asunto</button><button name="nappi" value="2">Poista asunto</button></form>
 <?php
   $my=new mysqli("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
   if($my->mysql_errno) {
   die("MySQL virhe (#".$my->mysql_errno.") yhteyden luonnissa: ". $my->connect_error);}
   $my->set_charset('utf8');
        if($result = $my->query('SELECT * FROM asuntotieto')) {
            while($d = $result->fetch_object()) {
                $aid = $d->aid + 1;
            }
        }
	    $nappi = $_GET['nappi'];
	    $laheta == $_GET['laheta'];
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
	    echo $aid.$osoite.$pnro.$kaupunki.$pintaala.$hinta.$tyyppi.$esittely.$rakennusvuosi;
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
	echo "$aid"."$osoite";
	if($nappi == 1) {
	  echo "<form action=\"test.php\" method=\"get\">
	        <label>Asunto ID</label><br><input type=\"number\" name=\"aid\"><br><label>Osoite</label><br><input type=\"text\" name=\"osoite\"><br>
            <label>Posti nro</label><br><input type=\"number\" name=\"pnro\"><br><label>Kaupunki</label><br><input type=\"text\" name=\"kaupunki\"><br>
	        <label>Pinta-ala</label><br><input type=\"number\" name=\"pintaala\"><br><label>Hinta</label><br><input type=\"number\" name=\"hinta\"><br>
	        <label>Tyyppi</label><br><input type=\"text\" name=\"tyyppi\"><br><label>kerros</label><br><input type=\"number\" name=\"kerros\"><br>
	        <label>asuntonro</label><br><input type=\"number\" name=\"asuntonro\"><br><label>Rakennusvuosi</label><br><input type=\"number\" name=\"rakennusvuosi\"><br>
	        <label>Esittely</label><br><input type=\"text\" name=\"esittely\"><br>
	        <button name=\"laheta\" value=\"1\">Lisä</button>
	        </form>";
       echo "$msg";
	}
   $my->close;
 
 ?>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/~jiamingtian/bs2015/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>