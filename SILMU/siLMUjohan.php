<?php
    $uploaddir = '/home/johanhandelin/public_html/Amm14dat/SILMU/';
    $uploadfile = $uploaddir . basename($_FILES['aani']['name']);
    
    if (move_uploaded_file($_FILES['aani']['tmp_name'], $uploadfile)) {
        $msg = 'OK';
    } else {
        $msg = $_FILES['aani']['error'];
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
    <link rel="stylesheet" href="kek.css">
    </head>
    <body>
        <div class="row">
	      <div class="col-md-3">
	        <div class="lista2">
	        <div class="lista1">
	         <!--  <h1>SIVU</h1> -->
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
				</button> <?=$msg?>			 
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
                     <source src="<?php echo $_FILES['aani']['name'];?>" type="audio/mpeg">
                 </audio>
            </div>
            
	         <div class="col-md-2 col-md-offset-2"> <button class="btn-lg btn btn-primary al">Aloita esitys</button></div>
	        </div>
	        <div class="row">
	          <div class="ruutu">
	          </div>
	        </div>
	           
	      </div>
	    
    
    
    
    
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/~jonashandelin/bs_2015/bower_components/bootstrap/dist/js//bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
    </html>