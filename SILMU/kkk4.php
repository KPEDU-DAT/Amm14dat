<?php
    $my=new mysqli("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
          if($my->mysql_errno){
          die("MySQL virhe (#".$my->mysql_errno.") yhteyden luonnissa: ". $my->connect_error);
    }
    $my->set_charset('utf8');
    $sql = "SELECT krid, kuva1, kuva2 FROM SILMU";
    if($result = $my->query($sql)){
        while($t=$result->fetch_object()) {
            $rows[] = array($t->krid, $t->kuva1, $t->kuva2);
    }
    }
    else {
    $msg ="VIRHE";
    }
    $my->close();

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
    <link rel="stylesheet" href="kek2.css">
	</head>
    <body>
        <div class="row">
	      <div class="col-md-3">
	        <div class="lista2">
	        <div class="lista1">
			<div class="table-responsive">
	        <table class="table"> 
			<thead>Kuveja</thead>
			<tbody>
			<!--  <h1>SIVU</h1> -->
             <?php
			echo "<form action='kkk4.php' method='post'>";
        foreach($rows as $i) {
            echo #"<div class='col-lg-3 col-md-4 col-xs-6 thumb'>
                           "<tr><td> <a class='thumbnail' href='#'>
               <input type='image'  src='$i[1]' alt='kuva' height='200' width='50%' name='kuva' value='$i[0]'><input type='image' src='$i[2]' alt='kuva' height='200' width='50%' name='kuva' value='$i[0]'> 
                                 </a></td></tr>";
            }
    echo "</form>";
	$kk = $_POST['kuva'];
	$k = $kk-9;
	?>
		</tbody>
		</table>
			</div>
			</div>
            </div>
          </div>
	      <div class="col-md-9">
          
	        <!-- <h1>Pääjuttu</h1> -->
	        <div class="row paa">
	         <div class="col-md-2"><button class="btn btn-default">Lisää kuva</button></div>
	         <div class="col-md-2">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#aaniModal">
  				Lisää ääni
				</button> 			 
				<div class="modal fade" id="aaniModal" tabindex="-1" role="dialog" aria-labelledby="aaniModalLabel">
  					<div class="modal-dialog" role="document">
    					<div class="modal-content">
      						<div class="modal-body">
	             				<form enctype="multipart/form-data" method="POST">
	                 				<div class="form-group">
	                 				    <label>Lisää ääni</label>
	                 				    <input type="file" name="aani" class="btn btn-default aanil" accept="audio/*">
	                 				    <br>
	                 				    <input type="submit" value="Send File" class="btn btn-primary">
                                    </div>
                 				</form>
                 				<div class="alert alert-info"><strong>Huom! </strong> Äänitiedoston maksimikoko on 2 MB.</div>
                            </div>
      						<div class="modal-footer">
        						<button type="button" class="btn btn-default" data-dismiss="modal">Sulje</button>
                            </div>
                        </div>
                    </div>
                </div>

	
             </div>
             <div class="col-md-3">
                 <audio controls autoplay="autoplay" loop="loop">
                     <source src="lelkek.mp3" type="audio/mpeg">
                 </audio>
            </div>
            
	         <div class="col-md-2 col-md-offset-2"> <button class="btn-lg btn btn-primary al">Aloita esitys</button></div>
	        </div>
	        <div class="row">
	          <div class="ruutu">
			<img class="img" src='<?php echo $rows[$k][1];?>' alt="kuva"><img class="img" src='<?php echo $rows[$k][2];?>' alt="kuva2">
	          </div>
	        </div>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/~jonashandelin/bs_2015/bower_components/bootstrap/dist/js//bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	       </body>
		</html>    