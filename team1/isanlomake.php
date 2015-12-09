<!DOCTYPE html>
<html lang="fi">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Bootstrap pohjatiedosto</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <!--[if lt IE 9]>
            <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<form class="form-horizontal" role="form" method="GET" action="isantodis.php">
    		<div class="form-group">
        		<label for="hid" class="col-sm-2 control-label">Asuntotunnus</label>
        		<div class="col-sm-10">
            		<input type="text" class="form-control" id="hid" name="hid" placeholder="" value="">
        		</div>
    		</div>
			<div class="form-group">
        	<div class="col-sm-10 col-sm-offset-2">
            	<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
        	</div>
    	</div>
    </body>
</html>
