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
                  setcookie($abc,$pkttt, time() + 3600); 
              }
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
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
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
 	    body, html {
        height: 100%;
 	    }
    </style>

    <link rel="stylesheet" href="resizeLast.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!<link rel="icon" href="">
    <link href="/~jonashandelin/bs_2015/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SILMU</title>
    
    </head>
    <body>

    <script type="text/javascript" src="resize.js"></script>
    <script type="text/javascript" src="drag22.js"></script>

     <div class="row" style="margin:0px; height:100%;">
          <div class="col-md-3" id="parts">
            <div class="lista2">
            <div  class="lista1" style="height:600px;">
            <div class="table-responsive" style="height:600px;">  
            
            <!--  <h1>SIVU</h1> -->
             <?php
            echo "<form action='backup.php' method='post'>";
            echo "<table class='table'><tbody>";
            $numnum = 1;
        foreach($rows as $i) {
			echo "<tr><td>";
            //echo "<input onclick='nayk(\"$i[1]\",\"$i[2]\",\"$numnum\")' type='image'  src='$i[1]' alt='$numnum' style=' height:150px; width:50%;' name='kuvak' value='k$cko'><input onclick='nayk(\"$i[1]\",\"$i[2]\",\"$numnum\")' type='image' src='$i[2]' alt='$numnum' style=' height:150px; width:50%;' name='kuvak' value='k$cko'>";
            echo "<input type='image'  src='$i[1]' alt='$numnum' style=' height:150px; width:50%;' name='kuvak' value='k$cko'><input  type='image' src='$i[2]' alt='$numnum' style=' height:150px; width:50%;' name='kuvak' value='k$cko'>";
            echo "</td></tr>";
           $cko++;
           $numnum++;
            }
        foreach($rivit as $i) {
            echo "<tr><td>";
            echo "<input type='image' src='$i[1]' alt='$numnum' style=' height:150px; width:100%;'  name='kuvak' value='v$cy'>";
            //echo "<input onclick='nay(\"$i[1]\",\"$numnum\")' type='image' src='$i[1]' alt='$numnum' style=' height:150px; width:100%;'  name='kuvak' value='v$cy'>";
            echo "</td></tr>";
        $cy++;
        $numnum++;
            }
        foreach($rivii as $i) {
            echo "<tr><td>";
            //echo "<input onclick='nay(\"$i[1]\",\"$numnum\") 'type='image' src='$i[1]' alt='$numnum' style=' height:150px; width:100%;'  name='kuvak' value='o$ck'>";
            echo "<input type='image' src='$i[1]' alt='$numnum' style=' height:150px; width:100%;'  name='kuvak' value='o$ck'>";
            echo "</td></tr>";
        $ck++;
        $numnum++;
        }
   $idk = $_POST['kuvak'];
    if ($idk)
    $num = $idk;
    ?>
        </tbody>
        </table>
        </form>
            </div>
            </div>
            </div>
          </div>

<div class="col-md-9" id="row1" style="padding:0px;">
<div class="row paa" id="paa" style="padding: 10px 0px 10px 0px;">
    <div class="col-md-2">
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#kuval">Lisää kuva</button>
	<button onclick="save()" class="btn btn-default">save</button>
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
        <form enctype="multipart/form-data" action="kkkv.php" method="post">
    <input name="kuva" class="aanil btn btn-default" type="file"><br>
    </div>
    <div class="col-xs-6">
    <h2> Kuva 2</h2>
    <div class="form-group">
    <input class="aanil btn btn-default" name="kuva2" type="file"><br>
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
                              <form action="backup.php" method="get">
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
                              </form>

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
                                       echo $_FILES['aani']['name'];}?>" type="audio/mpeg">
                 </audio>
		
	           </div>
        <div class="col-md-2">
            <!--<button id="nappi" style="margin:0px;" class="btn btn-default">Start</button>-->
            <button onclick="launchFullscreen(document.documentElement);" type="button" class="btn btn-default">Nayta</button>
		</div>
             <!--<div class="col-md-2 col-md-offset-2"> <p id="nappi">Aloita esitys</p></div>-->

</div> <!-- row paa-->
<div class="row">
    <div id="hBox">
    <div id="bBox" style="width:1000px; position:absolute; height:400px; margin:0px; left:0px; "> 
        <?php
            
        $muuu = $rows[$num][1];
        $muuuk = $rows[$num][2];
        $substr = substr($num, 0, 1);
        if ($substr == 'v'){
        $telu = substr($num, 1);
        $muu = $rivit[$telu][1];
        echo "<img draggable=\"false\"  id=\"isokuva\" class='kuva'  src='$muu' style='width:100%;height:100%; margin:0px;border:0px;'>";
        }
        else if ($substr == 'o'){
        $telu = substr($num, 1);
        $muu = $rivii[$telu][1];
        echo "<img draggable=\"false\"  id=\"isokuva\" class='kuva' src='$muu' style='width:100%;height:100%; margin:0px;border:0px;'>";
        }
        else if ($substr == 'k') {	
        $telu = substr($num, 1);
        $muu = $rows[$telu][1];
        $muuk = $rows[$telu][2];
        echo "<img draggable=\"false\" id=\"isokuva1\" class='img' alt=\"1\" src='$muu' style='width:50%;height:100%;'><img draggable=\"false\" id=\"isokuva2\" class='img' alt=\"1\" src='$muuk' alt='kuva' style='width:50%;height:100%;'>";
        }
        ?>
    </div>
    </div>
</div>
<div class="row" style="margin:0px; ">
    <div class="box" id="box">
		<?php
		  
          $krows = array();
          $abk = $_FILES['pkuva']['name'];
          for($selaskurialussa=1;$selaskurialussa<100;$selaskurialussa++) {
          $uuu = 'pkuva'.$selaskurialuusa;
            if($_POST[$uuu]) {
                $lol = $selaskurialussa; } }
          $lol++;
          $i = 0;
          
          $dragdivleft = 110;
          $dragdivtop = 451;
          for($j=1; $j<20; $j++)
          for($temp=1; $temp<20; $temp++)
          $num[$temp] = $_POST["num$temp"];
          
          //if($_COOKIE['pkuva1'] || $_COOKIE['pkuva2'] || $_COOKIE['pkuva3'] || $_COOKIE['pkuva4'] || $_COOKIE['pkuva5'] || $_COOKIE['pkuva6'] || $_COOKIE['pkuva7'] || $_COOKIE['pkuva8'] || $_COOKIE['pkuva9'] || $_COOKIE['pkuva10'] ) {
            for($xy = 1; $xy < 20; $xy++) {
              $ok = 'pkuva'.$xy;
              $xx = $xy - 1; 
                                                      
                  
              if($_COOKIE[$ok]) {
                    $okok = $_COOKIE[$ok];
                for($temp=0; $temp<$num[$temp];$temp++)   {
                	echo "test";  
                    echo "<div alt=\"$ok\"  ondblclick=\"borderdisplay(this.id)\" onmousedown=\"changeZIndex(this.id)\" id=\"dragDiv$i\" style=\"width:160px; height:120px;position:absolute; left:".$dragdivleft."px; top:".$dragdivtop."px; z-index:1;\">";
                    echo "<div class='rRightDown' id=\"rRightDown$i\"></div>";
                    echo "<div class='rLeftDown' id=\"rLeftDown$i\"></div>";
                    echo "<div class='rRightUp'id=\"rRightUp$i\"></div>";
                    echo "<div class='rLeftUp' id=\"rLeftUp$i\"></div>";
                    echo "<div class='rRight' id=\"rRight$i\"></div>";
                    echo "<div class='rLeft' id=\"rLeft$i\"></div>";
                    echo "<div class='rUp' id=\"rUp$i\"></div>";
                    echo "<div class='rDown' id=\"rDown$i\"></div>";
                    echo "<div id=\"rDel$i\" onclick=\"removeDragDiv(this.id, '$ok')\"></div>";
                    echo "<div id=\"rCopy$i\" onclick=\"copyDragDiv(this.id)\"></div>";
                    echo "<img id=\"rKuva$i\" alt=\"$ok\"   src='$okok' style='width:100%;height:100%;'>";
                    echo "</div>";
					                    
                    $i++;  
                    $dragdivleft += 170;
                    if($i % 5 == 0) {
                         $dragdivtop += 130;
                         $dragdivleft = 110;
                }}	
                
                }
            }
            //}
            echo "<div id=\"test\" value=\"100\" class=\"test\" style=\"width:".$i."px; height:0px; display:none\" ></div><br>";
           ?>
           <script>
               dragDivMaara = parseInt(document.getElementById("test").style.width);
           </script>
               <?php
                   for($numnum=1; $numnum<11; $numnum++) {
                       echo "<button onclick=\"pagechange($numnum)\">$numnum</button>";
                   }
               ?>
               <script>
                   pagenro = 1;
                   function pagechange(page) {
                       pagenro = page;
                   }
               </script>

         <?php
     /*               $num = 0;
                    for($i=0; $i<20; $i++) {
                    $pkuva[$i] = $_GET["pkuva$i"];    
   */                 
		  /*$krows = array();
          $abk = $_FILES['pkuva']['name'];
          for($selaskurialussa=1;$selaskurialussa<100;$selaskurialussa++) {
          $uuu = 'pkuva'.$selaskurialuusa;
            if($_POST[$uuu]) {
                $lol = $selaskurialussa; } }
          $lol++;
          $i = 0;*/

	        	/*  $dragdivleft = 110;
    		      $dragdivtop = 451;
*//*
					echo $_COOKIE[$ok];
                    
                    if($pkuva[$i]){
                    for($j=0; $j<$pkuva[$i]; $j++){                                    
                    echo "<div alt=\"$ok\"  ondblclick=\"borderdisplay(this.id)\" onmousedown=\"changeZIndex(this.id)\" id=\"dragDiv$num\" style=\"width:160px; height:120px;position:absolute; left: ".$dragdivleft."px; top: ".$dragdivtop."px; z-index:1;\">";
                    echo "<div id=\"rRightDown$num\"></div>";
                    echo "<div id=\"rLeftDown$num\"></div>";
                    echo "<div id=\"rRightUp$num\"></div>";
                    echo "<div id=\"rLeftUp$num\"></div>";
                    echo "<div id=\"rRight$num\"></div>";
                    echo "<div id=\"rLeft$num\"></div>";
                    echo "<div id=\"rUp$num\"></div>";
                    echo "<div id=\"rDown$num\"></div>";
                    echo "<div id=\"rDel$num\" onclick=\"removeDragDiv(this.id, '$ok')\"></div>";
                    echo "<div id=\"rCopy$num\" onclick=\"copyDragDiv(this.id)\"></div>";
                    echo "<img id=\"rKuva$num\" alt=\"$ok\"   src='$okok' style='width:100%;height:100%;'>";
                    echo "</div>";

                    $dragdivleft += 170;
                    if($num % 5 == 0) {
                         $dragdivtop += 130;
                         $dragdivleft = 110;
                    }
                    $num++;
                    }}}*/
         ?>
		<button id="lknappi" type="button" class="btn aaaaa btn-default" data-toggle="modal" data-target="#pkmodal" style="left:0px;position:absolute;top:450px;">Lisää kuvia</button>
            </div>
                <div class="modal fade" id="pkmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="padding: 5px">
                          <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h3>Lisää kuvaobjekteja</h3>
                          </div>
                          <div class="modal-body">
                           <div class="row">
                           <!<form action="backup.php" method="get" >
                           <form action="backup.php" method="post">
                           <?php
                                   $sqlkg = "SELECT DISTINCT pklink, pkid FROM silmuj;";
                                    if($ktulos = $my->query($sqlkg)) {
                                        while($kt = $ktulos->fetch_object()) {
                                            $krows[] = array($kt->pkid, $kt->pklink);
                                            }
                                    }
                                    $num = 1;
                                    $numa = 0;
                               foreach ($krows as $i) {
                                  echo "<div class=\"col-xs-4 col-md-4\">
                                          <label class='klik'>
                                              <input id=\"check$num\" type='checkbox' name='pkuva$i[0]' style='background-image: url($i[1]); width:50px;height: 50px;'> 
                                              <img style='width: 200px; height: 200px;' class='klik' src='$i[1]' alt='kuva'>
                                              
                                          </label>
                                          <input name=\"num$num\" id=\"num$num\" value='0'>
                                          <button onclick=\"plus($num)\" type='button' class='btn btn-default'>+</button>
                                          <button onclick=\"minus($num)\" type='button' class='btn btn-default'>-</button>
                                          
                                        </div>";
                                        $num++;
                              }
                           ?>
                           <script>
                           function plus(num){
                               document.getElementById("num"+num).value = parseInt(document.getElementById("num"+num).value) + 1; 
                               //document.getElementById("check"+num).value = parseInt(document.getElementById("check"+num).value) + 1; 
                               //document.getElementById("check"+num).checked = true;
                           }    
                           function minus(num){
                               if(document.getElementById("num"+num).value > 0 ) {
                                   document.getElementById("num"+num).value = parseInt(document.getElementById("num"+num).value) - 1; 
                                   //ocument.getElementById("check"+num).value = parseInt(document.getElementById("check"+num).value) - 1; 
                               }
                           }   
                           </script>
                               </div>

                               <button class="btn btn-default kek">OK!</button>
                           </form>
                            <form enctype="multipart/form-data" role="form" action="backup.php" method="post">
                                <input name="pkuva" type="file" class="aanil btn btn-default"> <br>
                                <input type="submit" class="btn btn-default kek" value="Send File">
                            </form>
                             </div>
                        </div>
                    </div>
                </div>
		 
    </div>
</div> 
<!-- row bot -->

<script>

function nayk(kuva1, kuva2, numnum) {
    
    document.getElementById("isokuva1").style.width = "50%";
    document.getElementById("isokuva2").style.width = "50%";
    document.getElementById("isokuva1").src = kuva1;
    document.getElementById("isokuva2").src = kuva2;
    document.getElementById("isokuva1").alt = numnum;
    document.getElementById("isokuva2").alt = numnum;    
}
function nay(kuva1, numnum) {    
    document.getElementById("isokuva1").src = kuva1;
    document.getElementById("isokuva1").style.width = "100%";
    document.getElementById("isokuva2").style.width = "0px";
    document.getElementById("isokuva1").alt = numnum;
}  

function save() {
    var pkuvaid = [];
    var pkuvawidth = [];
    var pkuvaheight = [];
    var pkuvax = [];
    var pkuvay = [];
    var ikuvaoneid = null;
    var ikuvatwoid=null;
        
    for(var i=0; i<dragDivMaara; i++) {
        if(document.getElementById("dragDiv"+i)) {
            comm = document.getElementById("dragDiv"+i);
            pkuvaid[i] = document.getElementById("rKuva"+i).alt;
            pkuvawidth[i] = comm.style.width;
            pkuvaheight[i] = comm.style.height;
            pkuvax[i] = comm.style.left;
            pkuvay[i] = comm.style.top;
        }    
    } 
    
    ikuvaoneid = document.getElementById("isokuva1").alt;
    ikuvatwoid = document.getElementById("isokuva2").alt;
    
    var numnum = 0;
    
    $.post( "deletedb.php" , { did: pagenro});

    while(document.getElementById("dragDiv"+numnum)) {
        $.post( "userInfo.php", { did: pagenro, pkid: pkuvaid[numnum], pkx: pkuvax[numnum], pky: pkuvay[numnum], pkw: pkuvawidth[numnum], pkh: pkuvaheight[numnum] } );
        numnum++;
    }
    alert("Tanlentettu");
}

</script>  
    <script>

    
    
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

/*
function removeDragDiv(element, cookiename) {
    var divid = $("#" + element).parents().attr('id');
    //document.cookie = cookiename+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    $("#" + divid).remove();
}
function copyDragDiv(element) {
    var divid = $("#" + element).parents().attr('id');
    var i = 0;
    while (document.getElementById("rKuva" + i)) {
        i++;
    }
    //var divs = document.getElementById('dragDiv0').innerHTML;
    document.write(i);
    
    //document.getElementById('dragDiv5').innerHTML= divs;
}*/

function changeZIndex(element) {
    var i  = 0;
    var dragnimi;
    var maxindex = 0;
    for(i=0; i<dragDivMaara; i++){
        dragnimi = "dragDiv"+i;
        if(document.getElementById(dragnimi))
            if(maxindex <= document.getElementById(dragnimi).style.zIndex) 
                maxindex = parseInt(document.getElementById(dragnimi).style.zIndex)+1;
    }
    document.getElementById(element).style.zIndex = maxindex;
}

function borderdisplay(element) {
	if(document.getElementById(element).style.border == "1px solid black") {
		document.getElementById(element).style.border = "0px";
	}else 
	document.getElementById(element).style.border = "1px solid black";
}

function myF(){
  document.getElementById("parts").style.display="none";
  document.getElementById("paa").style.display="none";
  document.getElementById("lknappi").style.display="none";
  

	windows = (navigator.userAgent.indexOf("Windows",0) != -1)?1:0;
	mac = (navigator.userAgent.indexOf("Mac",0) != -1)?1:0;
	linux = (navigator.userAgent.indexOf("Linux",0) != -1)?1:0;
	unix = (navigator.userAgent.indexOf("X11",0) != -1)?1:0;
 
	if (windows) {
	    var screenheight= screen.height;
		var fullheight= screen.height;
		var screenwidth = screen.width;
		var fullwidth = screen.width;
	}
	else if (mac) {
		
	    var screenheight = 1140;
		var fullheight = 1140;
		var screenwidth = 2048;
		var fullwidth = 2048;
		
		//var wow = document.getElementById(hBox).style.height;
		//$(document).ready(function(){
		//	document.write($(window).width());
		//});
		
	}
	else {
	    var screenheight= screen.height;
		var fullheight= screen.height;
		var screenwidth = screen.width;
		var fullwidth = screen.width;
	
	}

    if(document.getElementById('bBox').style.width == "1000px") {
        var x = [];
        var y = [];
        var divid = [];
        var i = 0;
        var prox = [];
        var proy = [];
        var kuvawidth = [];
        var kuvaheight = [];
        var prowidth = [];
        var proheight = [];
        
      
            
      document.getElementById('row1').style.width= "200%";
      document.getElementById('row1').style.height="100%";
      document.getElementById('bBox').style.width= "100%";
      document.getElementById('bBox').style.height= "100%";
      
      //width: 4096; height: 1140;
      //document.write(screenheight +","+ window.innerHeight +","+ window.outerHeight +","+screen.height);
        for(i = 0; i<dragDivMaara; i++) {
            divid[i] = "dragDiv" + i;
            
            if(document.getElementById(divid[i])){
            x[i] = document.getElementById(divid[i]).style.left;
            y[i] = document.getElementById(divid[i]).style.top;
            prox[i] = parseInt(x[i]) / bBoxx;
            proy[i] = parseInt(y[i]) / bBoxy;
            kuvawidth[i] = document.getElementById(divid[i]).style.width;
            kuvaheight[i] = document.getElementById(divid[i]).style.height;

            prowidth[i] = parseInt(kuvawidth[i]) / bBoxx;
            proheight[i] = parseInt(kuvaheight[i]) / bBoxy;
            
            owidth[i] = kuvawidth[i];
            oheight[i] = kuvaheight[i];
            if(parseInt(x[i])>"-100" && parseInt(x[i])<"1000" && parseInt(y[i])>"-50" && parseInt(y[i])<"450"){
                document.getElementById(divid[i]).style.left=screenwidth* 2 * prox[i] + "px";
                document.getElementById(divid[i]).style.top=screenheight * proy[i] + "px";
                document.getElementById(divid[i]).style.width=screenwidth *prowidth[i] * 2+"px";
                document.getElementById(divid[i]).style.height=screenheight * proheight[i]  + "px";
                
            } else {
                document.getElementById(divid[i]).style.height = "0px";
            }     
            }	
        }
  } else {	
      var i = 0;
      var x = [];
      var y = [];
      var divid = [];
      var prox = [];
      var proy = [];
      var kuvawidth = [];
      var kuvaheight = [];
      var prowidth = [];
      var proheight = [];
      var uusix = [];
      var uusiy = [];
	  document.getElementById("parts").style.display="block";
  	  document.getElementById("paa").style.display="block";
 	  document.getElementById("lknappi").style.display="block";  
	
      document.getElementById('row1').style.width = "1000px";
      document.getElementById('bBox').style.width = "1000px";
      document.getElementById('bBox').style.height = "400px";
      
      for(i=0; i<dragDivMaara; i++) {
          divid[i] = "dragDiv" + i;
          
          if(document.getElementById(divid[i])){          
          y[i] = document.getElementById(divid[i]).style.top;
          x[i] = document.getElementById(divid[i]).style.left;
          prox[i] = parseInt(x[i]) / (window.innerWidth * 2);
          proy[i] = parseInt(y[i]) / (fullheight);
          kuvawidth[i] = document.getElementById(divid[i]).style.width;
          kuvaheight[i] = document.getElementById(divid[i]).style.height; 
          prowidth[i]  = parseInt(kuvawidth[i]) / fullwidth / 2;
          proheight[i] = parseInt(kuvaheight[i]) / (fullheight - 10);
          uusix[i] = bBoxx * prox[i];
          uusiy[i] = bBoxy * proy[i];
          
          
          if(document.getElementById(divid[i]).style.height == "0px"){
              document.getElementById(divid[i]).style.height = oheight[i];
          } else {
              document.getElementById(divid[i]).style.left =  uusix[i] + "px";
              document.getElementById(divid[i]).style.top = uusiy[i] + "px";
              //document.getElementById(divid[i]).style.width="160px";
              //document.getElementById(divid[i]).style.height="120px";
              document.getElementById(divid[i]).style.width = prowidth[i]*bBoxx+"px";
              document.getElementById(divid[i]).style.height = proheight[i]*bBoxy+"px";
          }
          
          
          }
        }
  }
}
document.addEventListener("webkitfullscreenchange", function () {
	myF();
}, false);
    </script>
</div>     


<?php
	$my->close();
?>
<script>
var dragnimi = [];
var rRightDown = [];
var rLeftDown = [];
var rRightUp = [];
var rLeftUp = [];
var rRight = [];
var rLeft = [];
var rUp = [];
var rDown = [];

for(var ia=0; ia<dragDivMaara; ia++) {
dragnimi[ia] = "dragDiv" + ia;
if(document.getElementById(dragnimi[ia])){
rRightDown[ia]= "rRightDown" + ia;
rLeftDown[ia]= "rLeftDown" + ia;
rRightUp[ia]= "rRightUp" + ia;
rLeftUp[ia]= "rLeftUp" + ia;
rRight[ia]= "rRight" + ia;
rLeft[ia]= "rLeft" + ia;
rUp[ia]= "rUp" + ia;
rDown[ia]= "rDown" + ia;
var rs = new Resize(dragnimi[ia], { Max: true, mxContainer: "bgDiv" });

rs.Set(rRightDown[ia], "right-down");
rs.Set(rLeftDown[ia], "left-down");

rs.Set(rRightUp[ia], "right-up");
rs.Set(rLeftUp[ia], "left-up");

rs.Set(rRight[ia], "right");
rs.Set(rLeft[ia], "left");

rs.Set(rUp[ia], "up");
rs.Set(rDown[ia], "down");
new Drag(dragnimi[ia], { Limit: true, mxContainer: "bgDiv" });
}}
</script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="/~jonashandelin/bs_2015/bower_components/bootstrap/dist/js//bootstrap.min.js"></script>
 
</body>
</html>
