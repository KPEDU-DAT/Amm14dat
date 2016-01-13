<?php
    $my=new mysqli("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
          if($my->mysql_errno){
          die("MySQL virhe (#".$my->mysql_errno.") yhteyden luonnissa: ". $my->connect_error);
    }
    $my->set_charset('utf8');
    $sql = "SELECT krid, kuva1, kuva2 FROM SILMU ORDER BY krid;";
    if($result = $my->query($sql)){
        while($t=$result->fetch_object()) {
            $rows[] = array($t->krid, $t->kuva1, $t->kuva2);
    }
    }
    else {
    $msg ="VIRHE";
    }
    $tulos = mysqli_query($my, "SELECT krid FROM SILMU");
	while($rivi = mysqli_fetch_object($tulos)) {
	$l = $rivi->krid;
	}
	
	    $uploaddir = '/home/johanhandelin/public_html/Amm14dat/SILMU/';
        $uploadfile = $uploaddir . basename($_FILES['aani']['name']);
	        
        if (move_uploaded_file($_FILES['aani']['tmp_name'], $uploadfile)) {
          $msg = 'OK';
          } else {
          $msg = $_FILES['aani']['error'];
        }
        
	                                    
	
	
	
	$abk = $_FILES['pkuva']['name'];
          for($u=1;$u<100;$u++) {
          $uuu = 'pkuva'.$u;

            if($_POST[$uuu]) {
                $lol = $u; } }
          $lol++;
          while($lol>0) {
            
            $abc = "pkuva".$lol;
            if($_POST[$abc]) {
            $pkt = $_POST[$abc];
            $sqlpkt = "SELECT pklink FROM silmuj WHERE pkid = $pkt ORDER BY pkid;" ;
            if($pkttulos = $my->query($sqlpkt)) {
              while($pktt = $pkttulos->fetch_object()) {
                  $pkttt = $pktt->pklink;
                  setcookie($abc,$pkttt, time() + 3600); }      
                          
               
          }}
          $lol--;
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
	

        <div class="row">
	      <div class="col-md-3">
	        <div class="lista2">
	        <div class="lista1">
			<div class="table-responsive">
	        <table class="table"> 
			
			<tbody>
			<!--  <h1>SIVU</h1> -->
             <?php
			echo "<form action='silmuproto.php' method='post'>";
        foreach($rows as $i) {
            echo #"<div class='col-lg-3 col-md-4 col-xs-6 thumb'>
                           "<tr><td> <a class='thumbnail' href='#'>
               <input type='image'  src='$i[1]' alt='kuva' height='200' width='50%' name='kuva' value='$i[0]'><input type='image' src='$i[2]' alt='kuva' height='200' width='50%' name='kuva' value='$i[0]'> 
                                 </a></td></tr>";
            }
    echo "</form>";
	$kk = $_POST['kuva'];
	$k = $kk;
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
	         <div class="col-md-2">
	           <button type="button" class="btn btn-default" data-toggle="modal" data-target="#kuval">
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
        <form enctype="multipart/form-data" role="form" action="silmuproto.php" method="post">
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
	         </div>

	<?php
	$id = $l + 1;
	$k1 = $_FILES['kuva']['name'];
	$kk1 = $_FILES['kuva2']['name'];
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
		} else if ($kk1) {
		echo "Tallennus epäonnistui";
	}
	if ($k1 && $kk1) {
		$sql = "INSERT INTO SILMU(krid, kuva1, kuva2) VALUES('$id','http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/$k1', 'http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/$kk1' )";
		    if($tulos = $my->query($sql)){
      echo '<p> linkit tallennettu</p>';
  }  
      else{
      echo '<p> linkien tallennus epäonnistui</p>';
  }
  }
	else if ($k1) {
	  $sql="INSERT INTO SILMU(krid, kuva1) VALUES('$id', 'http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/'$k1'')";
       if($tulos = $my->query($sql)){  
      echo '<p> linki tallennettu</p>';  
  }  
      else{  
      echo '<p> linkin tallennus epäonnistui</p>';  
  }  
  } 
	else if ($kk1) {
		   $sql="INSERT INTO SILMU(krid,kuva2) VALUES('$id', 'http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/$kk1')";
       if($tulos = $my->query($sql)){
      echo '<p> linki tallennettu</p>';           
  }  
      else{
      echo '<p> linkin tallennus epäonnistui</p>';
  }
  }
	    
	?>


	         <div class="col-md-2">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#aaniModal">
  				Lisää ääni
				</button> 			 
				<div class="modal fade" id="aaniModal" tabindex="-1" role="dialog" aria-labelledby="aaniModalLabel">
  					<div class="modal-dialog" role="document">
    					<div class="modal-content">
    					    <div class="modal-header">
    					        <h3>Lisää ääniä</h3>
                            </div>
      						<div class="modal-body">
      						  <form action="silmuproto.php" method="post">
      						  <?php
      						          $sqlag = "SELECT DISTINCT alink, aaid FROM silmuaani;";
      						          
      						          if($aanitulos = $my->query($sqlag)) {
      						              while($at = $ktulos->fetch_object()) {
      						                  $krows[] = array($at->aaid, $at->alink, $at->nimi);
                                          }
                                          
                                      foreach ($krows as $aii) {
                                          echo "<label class='klik'><input type='radio' name='taani$aii[0]' value='$aii[0]'>$aii[2]</label>";                                                                                                                                                 
      						  ?>
      						  </form><br>
      						  
	             				<form enctype="multipart/form-data" method="POST">
	                 				<div class="form-group">
	                 				    
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
			<img class="img" src='<?php echo $rows[$k-1][1];?>' alt="kuva"><img class="img" src='<?php echo $rows[$k-1][2];?>' alt="kuva2">
	          </div>
	        </div>
			<div class="col-md-2">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#pkmodal">Lisää kuvia</button>
			</div>
				<div class="modal fade" id="pkmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  					<div class="modal-dialog modal-lg" role="document">
    					<div class="modal-content" style="padding: 5px"> 
    					  <div class="modal-header">
    					   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    					   <h3>Lisää kuvaobjekteja</h3>
    					  </div>    					 
    					  <div class="modal-body">
    					   <div class="row"><form action="silmuproto.php" method="post">
    					   <?php
    					           $sqlkg = "SELECT DISTINCT pklink, pkid FROM silmuj;";

    								if($ktulos = $my->query($sqlkg)) {
       									while($kt = $ktulos->fetch_object()) {
           									$krows[] = array($kt->pkid, $kt->pklink);
       										}
    								}
    					       
    					       
    					       foreach ($krows as $i) {
    					           echo "<div class=\"col-xs-6 col-md-4\"><label class='klik'><input type='checkbox' name='pkuva$i[0]' value='$i[0]'style='background-image: url($i[1]); width: 500px; height: 50px;'> <img style='width: 200px; height: 200px;' class='klik' src='$i[1]' alt='kuva'></label></div>";
                               }
                           ?></div><hr><button name="nappi" class="btn btn-default kek">Lisää kuvat</button></form>
    					   
    					   
							<form enctype="multipart/form-data" role="form" action="silmuproto.php" method="post">		
    							<input name="pkuva" type="file" type="button" class="aanil btn btn-default"> <br>
    							<input type="submit" class="btn btn-default kek" value="Send File">
							</form>
                         </div>
						</div>
                    </div>
                </div>
	
    
	<?php
	$w = $_GET['name'];
	echo $w;
	$id = $l + 1;
	$k = $_FILES['pkuva']['name'];
	$uploaddir = '/home/johanhandelin/public_html/Amm14dat/SILMU/pkuva/';
	$uploadfile = $uploaddir . basename($_FILES['pkuva']['name']);
	$sqlyi = "SELECT pkid FROM silmuj ORDER BY pkid DESC";
	
	$sqlkg = "SELECT * FROM silmuj;";
	
	if($ktulos = $my->query($sqlkg)) {
	   while($kt = $ktulos->fetch_object()) {
	       $krows[] = array($kt->pkid, $kt->pklink);
	   }
	}
	
	if($ttulos = $my->query($sqlyi)) {
		$tt = $ttulos->fetch_object();
	    $yy = $tt->pkid; $yi = $yy+1; 
	} else echo "aa";
	
	if (move_uploaded_file($_FILES['pkuva']['tmp_name'], $uploadfile)) {
        echo "Kuva tallennettu";
		$a = 1;
        } else if ($k){
        echo "Tallennus epäonnistui";
    }
    if($krows[$yy][1] != "http://cosmo.kpedu.fi/~johanhandelin/Amm14dat/SILMU/pkuva/$k")
	 if ($k && $a) {
      $sqla = "INSERT INTO silmuj(pkid, pklink) VALUES('$yi', 'http://cosmo.kpedu.fi/~johanhandelin/Amm14dat/SILMU/pkuva/$k')";
       if($tulos = $my->query($sqla)){
      echo '<p> linkki tallennettu</p>';
  }
      else{
      echo '<p> linkin tallennus epäonnistui</p>';
  }
	}
	
	?>
	    <?php
	      $abk = $_FILES['pkuva']['name'];
	      for($u=1;$u<100;$u++) {
	      $uuu = 'pkuva'.$u;
	      
	        if($_POST[$uuu]) {
	            $lol = $u; } } 
          $lol++;
		  if($_COOKIE['pkuva1'] || $_COOKIE['pkuva2'] || $_COOKIE['pkuva3'] || $_COOKIE['pkuva4'] || $_COOKIE['pkuva5'] || $_COOKIE['pkuva6'] || $_COOKIE['pkuva7'] || $_COOKIE['pkuva8'] || $_COOKIE['pkuva9'] || $_COOKIE['pkuva10'] ) {
	        for($xy = 1; $xy < 11; $xy++) {
	          $ok = 'pkuva'.$xy;
	          if($_COOKIE[$ok]) {
	            $okok = $_COOKIE[$ok];
	            echo "<img src='$okok' alt='kuva' class='dragme' id='joku'>";
	            }
	        }
	      
	      }?><!--
	      while($lol>0) { 
	        
	        $abc = "pkuva".$lol;
	        if($_POST[$abc]) {
	        $pkt = $_POST[$abc];
	        $sqlpkt = "SELECT pklink FROM silmuj WHERE pkid = $pkt ORDER BY pkid;" ;
	        if($pkttulos = $my->query($sqlpkt)) {
              while($pktt = $pkttulos->fetch_object()) {
                  $pkttt = $pktt->pklink; 
	              echo "<img src='$pkttt' alt='kuva' class='dragme' id='joku'>"; 
	               }
      
               
          }}
          $lol--;
          }
        } 
          
           
			     debug  <?php 
			                  
                            echo $_FILES['pkuva']['name']; echo " a ";
                            echo " a "; echo $lol; echo " a "; echo $_COOKIE['pkuva1'];?> --></div>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/~jonashandelin/bs_2015/bower_components/bootstrap/dist/js//bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	       </body>
		</html>  
		
		<?php $my->close();?>  