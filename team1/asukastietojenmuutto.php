<!DOCTYPE html>
<html lang="fi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Bootstrap pohjatiedosto</title>
    <link href="/~johanneskallinen/bs2015/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/~johanneskallinen/bs2015/pohja.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
					<?php
						$my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
						if($my->mysql_errno) {
							die("MySQL, virhe yhteyden luonnissa:" . $my->connect_error);
						}
						$my->set_charset('utf8');
						$sql="UPDATE team1_asukkaat SET sotu = '".$_GET['sotu']."', etunimi = '".$_GET['enimi']."', sukunimi = '".$_GET['snimi']."', puhelin = '".$_GET['puh']."', email = '".$_GET['email']."' WHERE hid = '".$_GET['hid']."';";
						if($tulos = $my->query($sql)) {
							echo '<div class="panel panel-success">
											<div class="panel-heading">
												<h3 class="panel-title">Tiedot päivitetty</h3>
											</div>
										</div>';
						} else {
							echo '<div class="panel panel-success">
											<div class="panel-heading">
												<h3 class="panel-title">Tietojen päivitys epäonnistui</h3>
											</div>
										</div>';
						}
					?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Muuta tietoja</h3>
						</div>
						<div class="panel-body">
							<form method="GET" action="../../Amm14dat/team1/tietmuut.php" class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-sm-2 control-label">Henkilö ID</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" name="hid" placeholder="001">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Sosiaaliturvatunnus</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="sotu" placeholder="000000-0000">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Etunimi</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="enimi" placeholder="Matti">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Sukunimi</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="snimi" placeholder="Meikäläinen">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Puhelin</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" name="puh" placeholder="0442954654">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Sähköposti</label>
									<div class="col-sm-10">
										<input type="email" class="form-control" name="email" placeholder="mattim@email.com">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-default">Tallenna</button>
									</div>
								</div>
							</form>
						</div>
						</div>
					    </div><!-- /.container -->
    <script src="/~johanneskallinen/bs2015/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/~johanneskallinen/bs2015/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>