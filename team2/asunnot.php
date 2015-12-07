   <?php
          $m=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
          $m->set_charset('utf8');
          if($m->mysql_errno){
           die("MySQL, virhe (#".$m->mysql_errno.") yhteyden luonnissa:".$m->connect_error);
          }
          $sql = "SELECT * FROM 581D_KUHA";
          if($tulos = $m->query($sql)){
            while($t = $tulos->fetch_object()){
              $rows[] = array($t->tutkinto,$t->laajuus,$t->paikka,$t->kesto,$t->oppilaitos,$t->tavoite,$t->sisalto,$t->toteutus,$t->lisatieto,$t->linkki);
            }
          } else {
        echo "Virhe SQL-kyselyssä!";
       }
   $m->close();
?>
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

    <title>JS Asunnot</title>

    <!-- Bootstrap core CSS -->
    <link href="/~tomijylha/bs2015/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">JS Asunnot</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Haku</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>
            <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1> Isännöintitodistuksen haku</h1>
      </div>
          <div class="taulu">
              <table>
                  <form>
                      <tr><td><label>Haku</label></td></tr>
                      <tr><td><input style="width:360px;"placeholder="asukkaan sotu"></input></td></tr>
                      <tr><td><label>Tai</label><td></tr>
                      <tr><td><input style="width:360px;" placeholder="kuitin numero"></input></td></tr>
                     
                  </form>
              </table>
          </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="/~tomijylha/bs2015/bower_components/jquery/dist/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/~tomijylha/bs2015/bower_components/jquery/dist/jquery.min.js"><\/script>')</script>
    <script src="~tomijylha/bs2015/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>