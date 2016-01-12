 <?php
    $my=new mysqli("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
          if($my->mysql_errno){
          die("MySQL virhe (#".$my->mysql_errno.") yhteyden luonnissa: ". $my->connect_error);
    }
	$my->set_charset('utf8');
$tulos = mysqli_query($my, "SELECT krid FROM SILMU");
    while($rivi = mysqli_fetch_object($tulos)) {
        $l = $rivi->krid;
		$ll = $rivi->pkuva1;
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
    <link rel="stylesheet" href="kek2.css">
    </head>
    <body>
	<style>
        .dragme{
        position:relative;
        width: 270px;
        height: 203px;
        cursor: move;
      }
    </style>
    
    <script>
	
    function startDrag(e) {
				// determine event object
				if (!e) {
					var e = window.event;
				}

				// IE uses srcElement, others use target
				var targ = e.target ? e.target : e.srcElement;

				if (targ.className != 'dragme') {return};
				// calculate event X, Y coordinates
					offsetX = e.clientX;
					offsetY = e.clientY;

				// assign default values for top and left properties
				if(!targ.style.left) { targ.style.left='0px'};
				if (!targ.style.top) { targ.style.top='0px'};

				// calculate integer values for top and left 
				// properties
				coordX = parseInt(targ.style.left);
				coordY = parseInt(targ.style.top);
				drag = true;
				// move div element
					document.onmousemove=dragDiv;
				
			}
          
			function dragDiv(e) {
				if (!drag) {return};
				if (!e) { var e= window.event};
				var targ=e.target?e.target:e.srcElement;
				// move div element
				targ.style.left=coordX+e.clientX-offsetX+'px';
				targ.style.top=coordY+e.clientY-offsetY+'px';
				return false;
			}
			function stopDrag() {
				drag=false;
			}
			window.onload = function() {
				document.onmousedown = startDrag;
				document.onmouseup = stopDrag;
			}
			function mjf() {
			var te = document.getElementById("joku").style.left;
    		var be = document.getElementById("joku").style.top;
    		window.location.assign("http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/testi.php?name=" + te + "&nimi=" + be)
    }
    </script>
    
       <div class="container">
	 <button type="button" onclick="mjf()">123</button>
	 <div class="row">
    <div class="col-xs-6">
    <h2> Kuva 1</h2><p id="demo">     a</p>
        <form enctype="multipart/form-data" role="form" action="kl.php" method="post">
    <div class="form-group">
    <input name="kuva" type="file" type="button"><br>
    <input type="submit" class="btn btn-primary-default" value="Send File">
	</form>
	</div>
    </div>
	<?php
	$w = $_GET['name'];
	echo $w;
	$id = $l + 1;
	$k = $_FILES['kuva']['name'];
	$uploaddir = '/home/jonashandelin/public_html/Amm14dat/SILMU/pk/';
	$uploadfile = $uploaddir . basename($_FILES['kuva']['name']);
	if (move_uploaded_file($_FILES['kuva']['tmp_name'], $uploadfile)) {
        echo "Kuva tallennettu";
        } else if ($k){
        echo "Tallennus epäonnistui";
    }
	  else if ($k) {
      $sql="INSERT INTO SILMU(krid, pkuva1) VALUES('$id', 'http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/pk/'$k'')";
       if($tulos = $my->query($sql)){
      echo '<p> linki tallennettu</p>';
  }
      else{
      echo '<p> linkin tallennus epäonnistui</p>';
  }
	if ($k) {
		echo "<img src='' alt='kuva'>";
		}
	}
	?>
		<img src='http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/pk/<?php echo $k;?>' alt='kuva' class="dragme" id="joku" style="color:red;">
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/~jonashandelin/bs_2015/bower_components/bootstrap/dist/js//bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
           </body>
        </html>