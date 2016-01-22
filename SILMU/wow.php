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


<html>
    <head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="kek22.css">
    <style>
        .paa {
        width: 1000px;
        margin-bottom:10px;
        position: static;
        }    
        .dragme{
        position: absolute;
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
	    width: 100%;
	    position: static;
	    }
	    .row {
        margin: 0px;
        padding: 0px;
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
     <div dragable="false"class="row" style="margin:0px; height:100%;">
          <div dragable="false"class="col-md-3" id="parts">
            <div dragable="false"class="lista2">
            <div dragable="false"class="lista1" style="height:600px;">
            <div dragable="false"class="table-responsive" style="height:600px;">  
            <table dragable="false"class="table">
            <tbody dragable="false">
            <!--  <h1>SIVU</h1> -->
             <?php
            echo "<form action='wow.php' method='post'>";
        foreach($rows as $i) {
            echo #"<div class='col-lg-3 col-md-4 col-xs-6 thumb'>
                           "<tr><td> <a class='thumbnail' href='#'>
               <input dragable='false'type='image'  src='$i[1]' alt='kuvak' height='200' width='50%' name='kuvak' value='k$cko'><input dragable='false'type='image' src='$i[2]' alt='kuvak' height='200' width='50%' name='kuvak' value='k$cko'> 
                                 </a></td></tr>";
           $cko = $cko + 1;
            }
        foreach($rivit as $i) {
            echo
            "<tr><td><a class='thumbnail' href='#'>
            <input dragable='false'type='image' src='$i[1]' alt='kuvak' height='200' width='100%' name='kuvak' value='v$cy'>";
        $cy = $cy + 1;
            }
        foreach($rivii as $i) {
            echo "<tr><td><a class='thumbnail' href='#'>
            <input dragable='false'type='image' src='$i[1]' alt='kuvak' height='200' width='100%' name='kuvak' value='o$ck'>";
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
<div class="col-md-9" id="row1"style="padding:0px;">
<div class="row paa" id="paa" style="padding: 10px 0px 10px 0px;">
    <div class="col-md-2">
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#kuval">Lisää kuva</button>
    </div>
    <div class="modal fade" id="kuval" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Otsikko</h4>
      </div>
      <div class="modal-body">
    <div class="row">
    <div class="col-xs-4">
    <h2> Kuva 1</h2>
        <form enctype="multipart/form-data" role="form" action="kkkv.php" method="post">
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
    <div class="col-md-4">
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
                              <form action="testn.php" method="get">
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
        <div class="col-md-2">
            <!--<button id="nappi" style="margin:0px;" class="btn btn-default">Start</button>-->
            <button onclick="launchFullscreen(document.documentElement);" type="button" class="btn btn-default">Nayta</button>
		</div>
             <!--<div class="col-md-2 col-md-offset-2"> <p id="nappi">Aloita esitys</p></div>-->

</div> <!-- row paa-->
<div class="row">
    <!<div class="ruutu">
    <div id="bBox" style="width:1000px; position:absolute; height:400px; margin:0px; left:0px; "> 
        <?php
        $muuu = $rows[$num][1];
        $muuuk = $rows[$num][2];
        $substr = substr($num, 0, 1);
        if ($substr == 'v'){
        $telu = substr($num, 1);
        $muu = $rivit[$telu][1];
        echo "<img class='kuva' src='$muu' alt='kuva' style='width:100%;height:100%; margin:0px;'>";
        }
        else if ($substr == 'o'){
        $telu = substr($num, 1);
        $muu = $rivii[$telu][1];
         echo "<img class='kuva' src='$muu' alt='kuva' style='width:100%;height:100%; margin:0px;'>";
        }
        else if ($substr == 'k') {
        $telu = substr($num, 1);
        $muu = $rows[$telu][1];
        $muuk = $rows[$telu][2];
        echo "<img dragable='false' class='img' src='$muu' alt='kuva' style='width:50%;height:100%;'><img dragable='false'class='img' src='$muuk' alt='kuva' style='width:50%;height:100%;'>";
        }
        ?>
    </div>
</div> <!-- row mid -->
<div class="row" style="margin:0px; ">
    <div class="box" id="box">
        <img class="dragme" id="kuva0" src="http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/IMG_0016.jpg" style="width:160px; height:120px; top:410px; left:165px;">    
        <img class="dragme" id="kuva1" src="http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/IMG_0016.jpg" style="width:160px; height:120px; top:410px; left:0px; left:330px;">

		<span style="top:410px; left:100px;"></span>
        <kpan style="top:410px; left:300px;"></kpan>
        <hpan></hpan>
		<button id="lknappi" type="button" class="btn aaaaa btn-default" data-toggle="modal" data-target="#pkmodal" id="nappibutton" style="left:0px;position:absolute;top:410px;">Lisää kuvia</button>
            </div>
                <div class="modal fade" id="pkmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="padding: 5px">
                          <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h3>Lisää kuvaobjekteja</h3>
                          </div>
                          <div class="modal-body">
                           <div class="row"><form action="testn.php" method="post">
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


                            <form enctype="multipart/form-data" role="form" action="testn.php" method="post">
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
                echo "<img src='$okok' alt='kuva' class='dragme' id='kuva$xx'>";
                }}
            }
           ?> 
    </div>
</div> <!-- row bot -->

  
	
	
  	
    <script>
$( document ).ready(function() {
});    

function launchFullscreen(element) {
  if(element.requestFullscreen) {
    element.requestFullscreen();
  } else if(element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if(element.webkitRequestFullscreen) {
    element.webkitRequestFullscreen();
  } else if(element.msRequestFullscreen) {
    element.msRequestFullscreen();
  }
     
}
owidth = [];
oheight = [];
bBoxx=1000;
bBoxy=400;



function myF(){
  $("#parts").toggle();
  $("#paa").toggle();
  $("#lknappi").toggle();
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
        
      document.getElementById('row1').style.width= "100%";
      document.getElementById('row1').style.height="100%";
      document.getElementById('bBox').style.width= window.innerWidth * 2 + "px";
      document.getElementById('bBox').style.height= "100%";
        for(i = 0; i<3; i++) {
            kuvaid[i] = "kuva" + i;
            x[i] = document.getElementById(kuvaid[i]).style.left;
            y[i] = document.getElementById(kuvaid[i]).style.top;
            prox[i] = parseInt(x[i]) / bBoxx;
            proy[i] = parseInt(y[i]) / bBoxy;
            kuvawidth[i] = document.getElementById(kuvaid[i]).style.width;
            kuvaheight[i] = document.getElementById(kuvaid[i]).style.height;
            prowidth[i] = parseInt(kuvawidth[i]) / bBoxx;
            proheight[i] = parseInt(kuvaheight[i]) / bBoxy;
            
            owidth[i] = kuvawidth[i];
            oheight[i] = kuvaheight[i];
            
            if(parseInt(x[i])>"-100" && parseInt(x[i])<"1100" && parseInt(y[i])>"-100" && parseInt(y[i])<"500"){
                document.getElementById(kuvaid[i]).style.left=window.innerWidth * prox[i] * 2 + "px";
                document.getElementById(kuvaid[i]).style.top=window.innerHeight * proy[i] + "px";
                document.getElementById(kuvaid[i]).style.width=window.innerWidth *prowidth[i] * 2+"px";
                document.getElementById(kuvaid[i]).style.height=window.innerHeight * proheight[i]  + "px";
            } else {
                document.getElementById(kuvaid[i]).style.height = "0px";
            }     
                      
             
            
            $("span").text(x[0] +", "+ x[0]);
            $("kpan").text(prox[0] + ", " + proy[0]);
            //$("hpan").text(window.innerWidth * 2 +", "+ get.ElementById(bBox).style.height);	
        }
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
      var uusix = [];
      var uusiy = [];

      document.getElementById('row1').style.width = "1000px";
      document.getElementById('bBox').style.width = "1000px";
      document.getElementById('bBox').style.height = "400px";
      
      for(i=0; i<3; i++) {
          kuvaid[i] = "kuva" + i;
          x[i] = document.getElementById(kuvaid[i]).style.left;
          y[i] = document.getElementById(kuvaid[i]).style.top;
          prox[i] = parseInt(x[i]) / (window.innerWidth * 2);
          proy[i] = parseInt(y[i]) / window.innerHeight;
          kuvawidth[i] = document.getElementById(kuvaid[i]).style.width;
          kuvaheight[i] = document.getElementById(kuvaid[i]).style.height; 
          prowidth[i]  = parseInt(kuvawidth[i]) / window.innerWidth / 2;
          proheight[i] = parseInt(kuvaheight[i]) / window.innerHeight;
          uusix[i] = bBoxx * prox[i];
          uusiy[i] = bBoxy * proy[i];
          
          
          if(document.getElementById(kuvaid[i]).style.height == "0px"){
              document.getElementById(kuvaid[i]).style.height = oheight[i];
          } else {
              document.getElementById(kuvaid[i]).style.left =  uusix[i] + "0px";
              document.getElementById(kuvaid[i]).style.top = uusiy[i] + "px";
              document.getElementById(kuvaid[i]).style.width="160px";
              document.getElementById(kuvaid[i]).style.height="120px";
              //document.getElementById(kuvaid[i]).style.left = uusix[i]+"px";
              //document.getElementById(kuvaid[i]).style.top = uusiy[i]+"px";
          }
          
          
          
          //$("kpan").text(bBoxx + ", " + x[0]);
          //$("span").text(prox[0] + ", pro," + proy[0]); 
          //$("hpan").text(uusix[0] + ",jisuan" + uusiy[0])
        }
      
  }
}
 
document.addEventListener("webkitfullscreenchange", function () {
    myF(); /*alka kaytan myF() funktio, kun kayta fullscreen mode tai pois fullscreen modesta*/
}, false);
       
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
    </script>
</div> <!-- md-9 -->
</div> <!-- row -->    
<script src="/~jonashandelin/bs_2015/bower_components/bootstrap/dist/js//bootstrap.min.js"></script>
<?php
	$my->close();
?>
</body>
</html>
