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
    </head>
    <body>
    
	<div class="container">
	<div class="jumbotron">
	<h1>Kek xd</h1>
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
    <input name="kuva" type="file" type="button"><br>
    <input type="submit" class="btn btn-primary btn-md" value="Send File">
    </div>
	</form>
	</div> 
    <div class="col-xs-6">
    <h2> Kuva 2</h2>
        <form enctype="multipart/form-data" role="form" action="SILMU.php" method="post">
    <div class="form-group">        
    <input name="kuva2" type="file" type="button"><br>                           
    <input type="submit" class="btn btn-primary btn-md" value="Send File">
    </div>
    </form>
    </div>
      </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
	</div>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/~jonashandelin/bs_2015/bower_components/bootstrap/dist/js//bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
    </html>