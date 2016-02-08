<?php $l = 0;
    $cy = 0;
    $ck = 0;
    $cko = 0;
    $num="k".$l;
    $my=new mysqli("localhost", "data15", "aJrHfybLxsLU76rV", "data15");
          if($my->mysql_errno){
          die("MySQL virhe (#".$my->mysql_errno.") yhteyden luonnissa: ". $my->connect_error);
    }
    $my->set_charset('utf8');
    $sqll = "SELECT krid FROM SILMU";
    if ($tuulos = $my->query($sqll)) {
        while($p=$tuulos->fetch_object()) {
          $l = $p->krid;
        }
        }else{
        echo "VIRHE";
}
    $sqlt = "SELECT krid, kuva1 FROM SILMU WHERE kuva2=''";
    if ($resultti = $my->query($sqlt)){
        while($c=$resultti->fetch_object()) {
            $rivit[] = array($c->krid, $c->kuva1);

        }
        }
    else {echo "VIRHE";}
    $sqltk = "SELECT krid, kuva2 FROM SILMU WHERE kuva1=''";
        if ( $resulti = $my->query($sqltk)){
        while($r=$resulti->fetch_object()) {
        $rivii[] = array($r->krid, $r->kuva2);

        }
    }else{
        echo "VIRHE";
        }
    $sql = "SELECT krid, kuva1, kuva2 FROM `SILMU` WHERE kuva1 NOT LIKE '' AND kuva2 NOT LIKE ''";
    if($result = $my->query($sql)){
        while($t=$result->fetch_object()) { 
            $rows[] = array($t->krid, $t->kuva1, $t->kuva2);
        $c3 = $c3 + 1;
        }
    }
    else {
    $msg ="VIRHE";
    }
    $sqlkk = "SELECT * FROM SILMU_PART";
    if($tulos = $my->query($sqlkk)){
        while($y=$tulos->fetch_object()) {
            $rivi[] = array($y->kid, $y->kuva, $y->knimi, $y->x, $y->y);
        $e = $y->kid;
        }
    $sqlko = "SELECT * FROM silmuj";
    if($tulo = $my->query($sqlko)){
        while($ui=$tulo->fetch_object()) {
            $rivik[] = array($ui->pkid, $ui->pklink);
        $hj = $ui->pkid;
        }
    }
    else{
    $msg = "VIRHE";
    }
}
		    $auploaddir = '/home/johanhandelin/public_html/Amm14dat/SILMU/';
        $auploadfile = $auploaddir . basename($_FILES['aani']['name']);
	    
	        
        $sqlakg = "SELECT * FROM silmuaani";
		$ak = $_FILES['aani']['name'];
	    $sqlayi = "SELECT aaid FROM silmuaani ORDER BY aaid DESC;";
	    	if($aktulos = $my->query($sqlakg)) {
	   while($akt = $aktulos->fetch_object()) {
	       $akrows[] = array($akt->pkid, $akt->pklink);
	   }
	}
	
	if($aattulos = $my->query($sqlayi)) {
		$aatt = $aattulos->fetch_object();
	    $ayy = $aatt->aaid; $ayi = $ayy+1; 
	} else echo "aa";
	
	if (move_uploaded_file($_FILES['aani']['tmp_name'], $auploadfile)) {
        echo "Kuva tallennettu";
		$aa = 1;
        } else if ($ak){
        echo "Tallennus epäonnistui";
    }
    if($krows[$ayy][1] != "http://cosmo.kpedu.fi/~johanhandelin/Amm14dat/SILMU/$ak")
	 if ($ak && $aa) {
	   if($kopiot = $my->query("SELECT nimi FROM silmuaani WHERE nimi = '$ak'")) {
	       $kopiota = $kopiot->fetch_object();
	       $kopiotaa = $kopiota->nimi;
	       if($kopiotaa == $ak) {
	         echo "Kuva on jo tietokannassa"; echo $ak; 
           } else {
             echo "Kuvaa ei ole tietokannassa"; echo $ak; echo $kopiotaa;
             $sqlaa = "INSERT INTO silmuaani(aaid, alink, nimi) VALUES('$ayi', 'http://cosmo.kpedu.fi/~johanhandelin/Amm14dat/SILMU/$ak','$ak')";
             if($atulos = $my->query($sqlaa)){
             echo '<p> linkki tallennettu</p>';
             }
               else{
             echo '<p> linkin tallennus epäonnistui</p>'; echo $ak; echo $ayi; echo $ayy;
             }  
             }
       }
     } 
    $tee = 123;
    	$abk = $_FILES['pkuva']['name'];
          for($selaskurialussa=1;$selaskurialussa<100;$selaskurialussa++) {
          $uuu = 'pkuva'.$selaskurialussa;
            if($_POST[$uuu]) {
                $lol = $selaskurialussa; } }
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
$k = $_FILES['pkuva']['name'];
	$uploaddir = '/home/johanhandelin/public_html/Amm14dat/SILMU/pkuva/';
	$uploadfileekg = $uploaddir . basename($_FILES['pkuva']['name']);

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
	
	if (move_uploaded_file($_FILES['pkuva']['tmp_name'], $uploadfileekg)) {
        echo "Kuva tallennettu";
		$a = 1;
        } else if ($k){
        echo "Tallennus epäonnistui";
    }
	 if ($k && $a) {
	   if($kopiotk = $my->query("SELECT pklink FROM silmuj WHERE pklink = 'http://cosmo.kpedu.fi/~johanhandelin/Amm14dat/SILMU/pkuva/$k'")) {
			echo "a";
	       $kopiotkk = $kopiotk->fetch_object();
	       $kopiotkkk = $kopiotkk->pklink;
	       if($kopiotkkk == "http://cosmo.kpedu.fi/~johanhandelin/Amm14dat/SILMU/pkuva/$k") {
	         echo "Kuva on jo tietokannassa"; echo $kopiotkkk; echo "lel";
           } else {
             $sqla = "INSERT INTO silmuj(pkid, pklink) VALUES('$yi', 'http://cosmo.kpedu.fi/~johanhandelin/Amm14dat/SILMU/pkuva/$k')";
             if($tulos = $my->query($sqla)){
                echo '<p> linkki tallennettu</p>';
             }
             else {
                echo '<p> linkin tallennus epäonnistui</p>';
             }
           }
      } }
		echo $k; echo $a;  

	?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="kek22.css">
    <link rel="stylesheet"href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
    <script>
    var i = 0;
    $(function() {
      for(i=0;i<100;i++) {
      var ii = "#draggable" + i;
      var iii = "#resizable" + i;
      $( ii ).draggable();
      $( iii ).resizable(); }
      });
    </script>
    <style>
        .paa {
        width: 1100px;
        margin-bottom:10px;
        position: static;
        }    
        .dragme{
        
        
        min-height: 50px;
        min-width: 50px;
        position: relative;
        cursor: move;
        left:;
        top:;          
        z-index: 1;  
	  }
	    .box {
	    padding: 0px;
        position: relative;
	    }
	    .img {
        border: 0px;
        margin: 0px;
	    border-radius: 0px;
	    wdth: 100%;
	    position: static;
	    }
	    tr {
        }
	    table {
        margin-top: 10px;
 	    }
	    /*.ruutu {  
	    border-top: 2px solid #bbbbbb;
	    width:90%;   
	    }*/
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link href="/~jonashandelin/bs_2015/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SILMU</title>
    
    
    </head>
    <body>
     <div class="row">
          <div class="col-md-3" id="parts">
            <div class="lista2">
            <div class="lista1">
            <div class="table-responsive">  
            <table class="table">
            <thead><th><?php echo $e . $k2t[0][0]; ?> Kuveja</th></thead>
            <tbody>
            <!--  <h1>SIVU</h1> -->
             <?php
            echo "<form action='v2.php' method='post'>";
        foreach($rows as $i) {
            echo #"<div class='col-lg-3 col-md-4 col-xs-6 thumb'>
                           "<tr><td> <a class='thumbnail' href='#'>
               <input type='image'  src='$i[1]' alt='kuvak' height='200' width='50%' name='kuvak' value='k$cko'><input type='image' src='$i[2]' alt='kuvak' height='200' width='50%' name='kuvak' value='k$cko'> 
                                 </a></td></tr>";
           $cko = $cko + 1;
            }
        foreach($rivit as $i) {
            echo
            "<tr><td><a class='thumbnail' href='#'>
            <input type='image' src='$i[1]' alt='kuvak' height='200' width='100%' name='kuvak' value='v$cy'>";
        $cy = $cy + 1;
            }
        foreach($rivii as $i) {
            echo "<tr><td><a class='thumbnail' href='#'>
            <input type='image' src='$i[1]' alt='kuvak' height='200' width='100%' name='kuvak' value='o$ck'>";
        $ck = $ck + 1;
        }

    echo "</form>";
    $idk = $_POST['kuvak'];
    if ($idk)
    $num = $idk;
    ?>
        </tbody>
        </table>
            </div>
            </div>
            </div>
          </div>
<div class="col-md-8">
<div class="row paa" id="paa">
    <div class="col-md-4">
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#kuval">Lisää kuva</button>
	
	<!--<span></span>
	<dpan></dpan>
	<kpan></kpan>-->

    </div>
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
        <form enctype="multipart/form-data" role="form" action="v.php" method="post">
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
      $sql="INSERT INTO SILMU(krid, kuva1, kuva2) VALUES('$id', 'http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/$k', '')";
       if($tulos = $my->query($sql)){
      echo '<p> linki tallennettu</p>';
  }
      else{
      echo '<p> linkin tallennus epäonnistui</p>';
  }
  }
    else if ($kk) {
           $sql="INSERT INTO SILMU(krid,kuva2, kuva1) VALUES('$id', 'http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/$kk', '')";
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
      						  <form action="v.php" method="get">
      						  <?php
								$akrows= array();
      						          $sqlag = "SELECT DISTINCT alink, aaid, nimi FROM silmuaani;";
      						          
      						          if($aanitulos = $my->query($sqlag)) {
      						              while($at = $aanitulos->fetch_object()) {
      						                  $akrows[] = array($at->aaid, $at->alink, $at->nimi);
                                            
                                          
                                          }
                                      }    
                                      foreach ($akrows as $aii) {
                                           echo "<div><label class='aanilg'><input class='aanilg' type='radio' name='aanitoisto' value='$aii[0]'> $aii[2]</label></div>";                                
                                           
									  }
									  echo "<input type='submit' class='btn btn-primary' value='Toista'>";
      						  ?>
      						  </form><hr>
      						  
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
                    
                </div></div>

	
             </div>
                  <div class="col-md-4">
                 <audio controls autoplay="autoplay" loop="loop">
                     <source src="<?php
                                       $aanitoisto = $_GET['aanitoisto'] - 1;
                                       if($_GET['aanitoisto']) {
                                         echo $akrows[$aanitoisto][1];
                                       } else { 
                                       echo $_FILES['aani']['name'];}     ?>" type="audio/mpeg">
                 </audio>
            </div>
        <div class="col-md-1">
            <!--<button id="nappi" style="margin:0px;" class="btn btn-default">Start</button>-->
            <button onclick="launchFullscreen(document.documentElement);" type="button" class="btn btn-default">Nayta</button>
		</div>
             <!--<div class="col-md-2 col-md-offset-2"> <p id="nappi">Aloita esitys</p></div>-->

</div> <!-- row paa-->
<div id="bBox">
<div class="row bBox" id="toproflmao">
    <!<div class="ruutu">
             <?php
        $muuu = $rows[$num][1];
        $muuuk = $rows[$num][2];
        $substr = substr($num, 0, 1);
        if ($substr == 'v'){
        $telu = substr($num, 1);
        $muu = $rivit[$telu][1];
        echo "<img class='kuva' src='$muu' alt='kuva'>";
        }
        else if ($substr == 'o'){
        $telu = substr($num, 1);
        $muu = $rivii[$telu][1];
         echo "<img class='kuva' src='$muu' alt='kuva'>";
        }
        else if ($substr == 'k') {
        $telu = substr($num, 1);
        $muu = $rows[$telu][1];
        $muuk = $rows[$telu][2];
        echo "<img class='img' src='$muu' alt='kuva' id='xd'><img class='img' src='$muuk' alt='kuva' id='xdd'>";
        }
        ?>
    </tr>
    </table>
	</div>
    <!</div>
    <!-- row mid -->
<div class="row">
<!--    <div class="box" id="box">
        <img class="dragme" id="kuva" src="http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/IMG_0016.jpg" style="width:160px; height:120px;">    
</div> --!>

<!--</div>  row bot
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
    					   <div class="row"><form action="v.php" method="post">
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
                           ?></div><hr><input type="submit" name="nappi" class="btn btn-default kek" value="Lisää kuvat"></form>
    					   
    					   
							<form enctype="multipart/form-data" role="form" action="v.php" method="post">		
    							<input name="pkuva" type="file" type="button" class="aanil btn btn-default"> <br>
    							<input type="submit" class="btn btn-default kek" value="Send File">
							</form>
                         </div>
						</div>
                    </div>
                </div>	
	
 --!> 	
    <script>
    $(document).ready(function(){
    $(document).click(function(event){
        
        
        
        
        //prox = parseInt(x) / bBoxx;
        //proy = parseInt(y) / bBoxy;

        


        //var kuvawidth = document.getElementById("kuva0").style.width;
        //var kuvaheight = document.getElementById("kuva0").style.height;
        
        //prowidth = parseInt(kuvawidth) / bBoxx;
        //proheight = parseInt(kuvaheight) / bBoxy;
   });
   pre1src = document.getElementById("pre1").style.src;
   pre2src = document.getElementById("pre2").style.src;
   
   
});
/*$(document).ready(function(){
    $(document).mousemove(function(event){
        $("span").text(event.pageX + ", " + event.pageY);
    });
});*/
function exitHandler()
{
    if (document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement == null)
    {
        document.getElementById("bBox").style.width = "1000px";

    }
}

var el = "2";

function launchFullscreen(element) {
el = "1";
var elem = document.getElementById("bBox");
document.getElementById("bBox").style.width="100%";
document.getElementById("bBox").style.height="100%";
document.getElementById("toproflmao").style.width="100%";
document.getElementById("toproflmao").style.height="100%";
document.getElementById("xd").style.width="50%";
document.getElementById("xd").style.height="100%";
document.getElementById("xdd").style.width="50%";
document.getElementById("xdd").style.height="100%";
if (elem.requestFullscreen) {
  elem.requestFullscreen();
} else if (elem.msRequestFullscreen) {
  elem.msRequestFullscreen();
} else if (elem.mozRequestFullScreen) {
  elem.mozRequestFullScreen();
} else if (elem.webkitRequestFullscreen) {
  elem.webkitRequestFullscreen();
}

        var x = [];
        var y = [];
        var kuvaid = [];
        var i = 0;
        var prox = [];
        var proy = [];
        var kuvawidth = [];
        var kuvaheight = [];
        var prowidth = [];
        var proheight = [];
        var bBoxx = 1000;
        var bBoxy = 400;
		el = "1";
for(i = 2; i<10; i++) {
            kuvaid[i] = "kuva" + i;
            x[i] = document.getElementById(kuvaid[i]).style.left;
            y[i] = document.getElementById(kuvaid[i]).style.top;
            prox[i] = parseInt(x[i]);
            proy[i] = parseInt(y[i]);
            kuvawidth[i] = document.getElementById(kuvaid[i]).style.width;
            kuvaheight[i] = document.getElementById(kuvaid[i]).style.height;
            prowidth[i] = parseInt(kuvawidth[i]) / bBoxx;
            proheight[i] = parseInt(kuvaheight[i]) / bBoxy;
            
            var swidth = "screen.width";
            var sheight = "screen.height";
            var a = 50;
            if(a == 50) {
              for(a = 50; a < 2000; a + 100) {
                var b = 1;
                b = a - 100;
                if(prox[i] > b && prox[i] < a) {
                  document.getElementById("okokok").innerHTML = "a";
                  document.getElementById(kuvaid[i]).style.left = prox[i] * (a/50) + "px";
                }
              }
            }
            
            document.getElementById("okokok").innerHTML = "a";
            document.getElementById(kuvaid[i]).style.width=window.innerWidth * prowidth[i] * 3 + "px";
            document.getElementById(kuvaid[i]).style.height=window.innerHeight * proheight[i] + 10 + "px";
            
            if(prox[i]) {
            $("#kpan").text(prox[i] + ", " + proy[i] + ", ");
            }
            $("#span").text(window.innerWidth +", "+ window.outerHeight); 
        }



}

if (document.getElementById("bBox").style.width == "100%")
{
    document.addEventListener('webkitfullscreenchange', exitHandler, false);
    document.addEventListener('mozfullscreenchange', exitHandler, false);
    document.addEventListener('fullscreenchange', exitHandler, false);
    document.addEventListener('MSFullscreenChange', exitHandler, false);
}




/*
  if(element.requestFullscreen) {
    element.requestFullscreen();
  } else if(element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if(element.webkitRequestFullscreen) {
    element.webkitRequestFullscreen();
  } else if(element.msRequestFullscreen) {
    element.msRequestFullscreen();
  } */
     

function myF(){
  $("#arts").toggle();
  $("#pa").toggle();
  $("#napibutton").toggle();
  $("#oko").toggle();
  var ii = 1;
  for(ii = 1;ii < 20; ii++) {
  var id = "#nappinappi" + ii;
  $(id).toggle(); 
  }
  
  var w = window.innerWidth * prox * 2;
  var h = window.innerHeight * proy;
      
  
  
  
  /*if(document.getElementById('box').style.border == "0px"){
      document.getElementById('box').style.border = "2px solid #bbbbbb";
      document.getElementById('bBox').style.border = "2px solid #bbbbbb";
      return;    
  } else {
      document.getElementById('box').style.border="0px";
      document.getElementById('bBox').style.border="0px";
      document.getElementById('kuva').style.left=500 * prox * 2 + "px";
      document.getElementById('kuva').style.top=400 * proy + "px";
      document.getElementById('kuva').style.width=1000 * prowidth + "px";
      document.getElementById('kuva').style.height=400 * proheight + "px";
  }*/
  if(document.getElementById('bBox').style.width == "1000px") {
        var x = [];
        var y = [];
        var kuvaid = [];
        var i = 0;
        var prox = [];
        var proy = [];
        var kuvawidth = [];
        var kuvaheight = [];
        var prowidth = [];
        var proheight = [];
        var bBoxx = 1000;
        var bBoxy = 400;
        /*for(var i = 0;i<10;i++) {
            kuvaid[i] = "kuva" + i;
            x[i] = document.getElementById(kuvaid[i]).style.left;
        }*/
        
        for(i = 0; i<2; i++) {
            kuvaid[i] = "kuva" + i;
            x[i] = document.getElementById(kuvaid[i]).style.left;
            y[i] = document.getElementById(kuvaid[i]).style.top;
            prox[i] = parseInt(x[i]) / bBoxx;
            proy[i] = parseInt(y[i]) / bBoxy;
            kuvawidth[i] = document.getElementById(kuvaid[i]).style.width;
            kuvaheight[i] = document.getElementById(kuvaid[i]).style.height;
            prowidth[i] = parseInt(kuvawidth[i]) / bBoxx;
            proheight[i] = parseInt(kuvaheight[i]) / bBoxy;
            
            
            document.getElementById(kuvaid[i]).style.left=window.innerWidth * prox[i] * 2 + "px";
            document.getElementById(kuvaid[i]).style.top=window.innerHeight * proy[i] + "px";
            document.getElementById(kuvaid[i]).style.width=window.innerWidth *prowidth[i] * 2+"px";
            document.getElementById(kuvaid[i]).style.height=window.innerHeight * proheight[i] + 10 + "px";
            
            $("kpan").text(prox[1] + ", " + proy[1]);
            $("span").text(window.innerWidth +", "+ window.innerHeight); 
        }
      
      document.getElementById('bBox').style.width= window.innerWidth * 2 + "px";
      document.getElementById('bBox').style.height= window.innerHeight + "px";
      
      /*document.getElementById('kuva0').style.left=window.innerWidth * prox * 2 + "px";
      document.getElementById('kuva0').style.top=window.innerHeight * proy + "px";
      document.getElementById('kuva0').style.width=window.innerWidth *prowidth * 2+"px";
      document.getElementById('kuva0').style.height=window.innerHeight * proheight + 10 + "px";*/
      
  } else {
      var i = 0;
      var x = [];
      var y = [];
      var kuvaid = [];
      var prox = [];
      var proy = [];
      var kuvawidth = [];
      var kuvaheight = [];
      var prowidth = [];
      var proheight = [];
      
      for(i=0; i<2; i++) {
          //var test = document.getElementById(bBox).style.width;
      
          kuvaid[i] = "kuva" + i;
          x[i] = document.getElementById(kuvaid[i]).style.left;
          y[i] = document.getElementById(kuvaid[i]).style.top;
          prox[i] = parseInt(x[i]) / window.innerWidth / 2;
          proy[i] = parseInt(x[i]) / window.innerHeight;
          kuvawidth[i] = document.getElementById(kuvaid[i]).style.width;
          kuvaheight[i] = document.getElementById(kuvaid[i]).style.height; 
          //prowidth[i] = parseInt(kuvawidth[i]) / window.innerWidth / 2;
          //proheight[i] = parseInt(kuvaheight[i]) / window.innerHeight;
          prowidth[i] = parseInt(kuvawidth[i]) / 2709.6;
          proheight[i] = parseInt(kuvaheight[i]) / 976.8;
          document.getElementById(kuvaid[i]).style.width = 1000 * prowidth[i]+"px";
          document.getElementById(kuvaid[i]).style.height = 400 * proheight[i]+"px";
          
          document.getElementById(kuvaid[i]).style.left=1000 * prox[i] + "px";
          document.getElementById(kuvaid[i]).style.top=400 * proy[i]+"px";
          //$("kpan").text(test + ", " + test);
          $("span").text(window.innerWidth +", "+ window.innerHeight); 
        }
      //var x = document.getElementById("kuva0").style.left;
      //var y = document.getElementById("kuva0").style.top;
      //var testx = parseInt(x) / window.innerWidth / 2;
      //var testy = parseInt(y) / window.innerHeight;
      //var kuvawidth = document.getElementById("kuva0").style.width;
      //var kuvaheight = document.getElementById("kuva0").style.height;
      //var testprowidth = parseInt(kuvawidth) / window.innerWidth / 2;
      //var testproheight = parseInt(kuvaheight) / window.innerHeight;  
      
      document.getElementById('bBox').style.width = "1000px";
      document.getElementById('bBox').style.height = "400px";
      //document.getElementById('kuva0').style.height = 400 * testproheight+"px";
      //document.getElementById('kuva0').style.width = 1000 * testprowidth+"px";
      
      
      //document.getElementById('kuva0').style.left=1000 * testx + "px";
      //document.getElementById('kuva0').style.top=400 * testy+"px";
  }
}
 
document.addEventListener("webkitfullscreenchange", function () {
    myF(); /*alka kaytan myF() funktio, kun kayta fullscreen mode tai pois fullscreen modesta*/
}, false);
       
    $(document).ready(function(){
        $("#nappi").click(function(){
            
            //var x = document.getElementById('kuva').style.left;
            //var y = document.getElementById('kuva').style.top;
            var osoite = document.getElementById('kuva').src;
            window.open("kassax.php?x="+x+"&y="+y+"&osoite="+osoite );
            
         });
    });
	function nappi() {
	  document.getElementById('divID').style.left
	  x = document.getElementById("kuva0").style.left;
	  y = document.getElementById("kuva0").style.top;
      
      
	}
	/*function md(image) {
	    document.getElementById(image).style.zIndex = "3";    
	}
	function mu(image) {
	    document.getElementById(image).style.zIndex = "2";
	}*/
    function startDrag(e) {
				if (!e) {
					var e = window.event;
				}
				
				var targ = e.target ? e.target : e.srcElement;
				if (targ.className != 'dragme') {return};
				
					offsetX = e.clientX;
					offsetY = e.clientY;
				
				if(!targ.style.left) { targ.style.left= "0px"};
				if (!targ.style.top) { targ.style.top= "0px"};
			 
				
				coordX = parseInt(targ.style.left);
				coordY = parseInt(targ.style.top);
				drag = true;
				
				
					document.onmousemove=dragDiv;
				
			}
    
    function dragDiv(e) {
				if (!drag) {return};
				if (!e) { var e= window.event};
				var targ=e.target?e.target:e.srcElement;
							
				  if (targ.className == 'dragme') {
                targ.style.left=coordX+e.clientX-offsetX+'px';
                targ.style.top=coordY+e.clientY-offsetY+'px';
                }
				return false;
			}
    function stopDrag() {
				drag=false;
			}
    window.onload = function() {
				document.onmousedown = startDrag;
				document.onmouseup = stopDrag;
			}
    </script>
<!--	    <?php 
			$krows = array();
	      $abk = $_FILES['pkuva']['name'];
	      for($selaskurialussa=1;$selaskurialussa<100;$selaskurialussa++) {
	      $uuu = 'pkuva'.$selaskurialuusa;
	      
	        if($_POST[$uuu]) {
	            $lol = $selaskurialussa; } } 
          $lol++;
		  if($_COOKIE['pkuva1'] || $_COOKIE['pkuva2'] || $_COOKIE['pkuva3'] || $_COOKIE['pkuva4'] || $_COOKIE['pkuva5'] || $_COOKIE['pkuva6'] || $_COOKIE['pkuva7'] || $_COOKIE['pkuva8'] || $_COOKIE['pkuva9'] || $_COOKIE['pkuva10'] ) {
	        for($xy = 1; $xy < 20; $xy++) {
	          $ok = 'pkuva'.$xy;
			  $xx = $xy - 1;
	          if($_COOKIE[$ok]) {
	            $okok = $_COOKIE[$ok];
	            echo "<img src='$okok' alt='kuva' class='dragme' id='kuva$xx'>";
	            }}
	        }
	      
	       ?>-->
	
            <button type="button" class="btn aaaaa btn-default" data-toggle="modal" data-target="#pkmodal" id="nappibutton">Lisää kuvia</button>
            </div>
                <div class="modal fade" id="pkmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="padding: 5px"> 
                          <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h3>Lisää kuvaobjekteja</h3>
                          </div>                         
                          <div class="modal-body">
                           <div class="row"><form action="vimgrsz.php" method="post">
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
                           ?></div><hr><input type="submit" name="nappi" class="btn btn-default kek" value="Lisää kuvat"></form>
                           
                           
                            <form enctype="multipart/form-data" role="form" action="v2.php" method="post">       
                                <input name="pkuva" type="file" class="aanil btn btn-default"> <br>
                                <input type="submit" class="btn btn-default kek" value="Send File">
                            </form>
                         </div>

                        </div>
                    </div>
                </div>
<?php
            $krows = array();
          $abk = $_FILES['pkuva']['name'];
          for($selaskurialussa=1;$selaskurialussa<100;$selaskurialussa++) {
          $uuu = 'pkuva'.$selaskurialuusa;

            if($_POST[$uuu]) {
                $lol = $selaskurialussa; } }
          $lol++;
          if($_COOKIE['pkuva1'] || $_COOKIE['pkuva2'] || $_COOKIE['pkuva3'] || $_COOKIE['pkuva4'] || $_COOKIE['pkuva5'] || $_COOKIE['pkuva6'] || $_COOKIE['pkuva7'] || $_COOKIE['pkuva8'] || $_COOKIE['pkuva9'] || $_COOKIE['pkuva10'] ) {
            for($xy = 1; $xy < 20; $xy++) {
              $ok = 'pkuva'.$xy;
              $xx = $xy - 1; 
              if($_COOKIE[$ok]) {
                $okok = $_COOKIE[$ok];
                echo "<div id='draggable$xy'><button type='button' aria-label='Close' onclick='document.cookie=\"$ok=;expires=Sat; 04 Jan 1970\"' id='nappinappi$xy'><span aria-hidden='true'>&times;</span></button><img src='$okok' alt='kuva' class='dragme' id='resizable$xy'></div>";
                }}
            }

           ?> 
</div> 
</div> <!-- md-9 -->
</div> <!-- row -->
<div class="col-md-1" id="okok"><div id="span" oclick='funktio()'></div> a <div id="kpan"></div> <div id="okokok">b</div><div id="kappa">abcd</div>   
<script src="/~jonashandelin/bs_2015/bower_components/bootstrap/dist/js//bootstrap.min.js"></script>
</body>
</html>
<?php
     $my->close();
?>