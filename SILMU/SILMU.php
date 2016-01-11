 <?php
  $my= new mysqli ('localhost','data15','aJrHfybLxsLU76rV','data15');
  if($my->mysql_errno){
      die("MySQL, virhe yhteyden luonnissa". $my->connect_error);
  
	}
	$l = 12;
	 $my->set_charset('utf8');
	$tulos = mysqli_query($my, "SELECT krid FROM SILMU");
	while($rivi = mysqli_fetch_object($tulos)) {
		$l = $rivi->krid;
	}
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link href="/~jonashandelin/bs_2015/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SILMU</title>
    <link href="jumbotron.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="kka.css">
    <link rel="stylesheet" type="text/css" href="kek2.css">
    </head>
    <body>
    
	<div class="container">
	<div class="jumbotron">
	<h1>Kek xd<?php echo $l; ?></h1>
	</div>
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#kuval">
  Lisää kuva
</button>
	<div class="modal fade" id="kuval" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	    <h4 class="modal-title" id="myModalLabel">Otsikko</h4>
      </div>
      <div class="modal-body">
	<div class="row">
	<div class="col-xs-6">
	<h2> Kuva 1</h2>
        <form enctype="multipart/form-data" role="form" action="SILMU.php" method="post">
    <div class="form-group">        
    <input name="kuva" class="aanil btn btn-default" type="file" type="button"><br>
    </div>
	</div> 
    <div class="col-xs-6">
    <h2> Kuva 2</h2>
    <div class="form-group">        
    <input class="aanil btn btn-default" name="kuva2" type="file" type="button"><br>                           
    <input type="submit" class="btn btn-primary btn-md" value="Send Files">
    </div>
    </form>
    </div>
      </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
	</div>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>
	<?php
	$id = $l + 1;
	$k = $_FILES['kuva']['name'];
	$kk = $_FILES['kuva2']['name'];
	$uploaddir = '/home/jonashandelin/public_html/Amm14dat/SILMU/';
	$uploadfile = $uploaddir . basename($_FILES['kuva']['name']);
	if (move_uploaded_file($_FILES['kuva']['tmp_name'], $uploadfile)) {
		echo "Kuva tallennettu";
		} else if ($k){
		echo "Tallennus epäonnistui";
	}
	
	$uploadfile2 = $uploaddir . basename($_FILES['kuva2']['name']);
	if (move_uploaded_file($_FILES['kuva2']['tmp_name'], $uploadfile2)) {
		echo "Kuva tallennettu";
		} else if ($kk) {
		echo "Tallennus epäonnistui";
	}
	if ($k && $kk) {
		$sql = "INSERT INTO SILMU(krid, kuva1, kuva2) VALUES('$id','http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/$k', 'http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/$kk' )";
		    if($tulos = $my->query($sql)){
      echo '<p> linkit tallennettu</p>';
  }  
      else{
      echo '<p> linkien tallennus epäonnistui</p>';
  }
  }
	else if ($k) {
	  $sql="INSERT INTO SILMU(krid, kuva1) VALUES('$id', 'http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/'$k'')";
       if($tulos = $my->query($sql)){  
      echo '<p> linki tallennettu</p>';  
  }  
      else{  
      echo '<p> linkin tallennus epäonnistui</p>';  
  }  
  } 
	else if ($kk) {
		   $sql="INSERT INTO SILMU(krid,kuva2) VALUES('$id', 'http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/$kk')";
       if($tulos = $my->query($sql)){
      echo '<p> linki tallennettu</p>';           
  }  
      else{
      echo '<p> linkin tallennus epäonnistui</p>';
  }
  }
	  $my->close();  
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/~jonashandelin/bs_2015/bower_components/bootstrap/dist/js//bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
    </html>