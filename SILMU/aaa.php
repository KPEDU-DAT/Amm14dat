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

    $tee = 123;
    ?>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="kek22.css">
    <style>
        .paa {
        width: 1100px;
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
	    tr {
        }
	    table {
        margin-top: 10px;
 	    }
 	    .bBox {
        border: 0px;
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
     <div class="row" id="row1" style="width:1000px; margin:0px;">
          <div class="col-md-3" id="parts">
            <div class="lista2">
            <div class="lista1" style="margin:5px;">
            <div class="table-responsive" style="height:560px;">  
            <table class="table">
            <tbody>
            <!--  <h1>SIVU</h1> -->
             <?php
            echo "<form action='aaa.php' method='post'>";
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
<div class="col-md-9" id="row2" style="padding:0px;">
<div class="row paa" id="paa" style="width:100%;">
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
    <div class="col-xs-6">
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
    <div class="col-md-2">
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#aaniModal"> Lisa aani </button>
      <div class="modal fade" id="aaniModal" tabindex="-1" role="dialog" aria-labelledby="aaniModalLabel">
       <div class="modal-dialog" role="document">
        <div class="modal-content">
         <div class="modal-body">
          <form enctype="multipart/form-data" method="POST" action="kkkv.php">
           <div class="form-group">
            <label>Lisa aani</label>
            <input type="file" name="aani" class="btn btn-default aanil" accept="audio/*" />
            <br />
            <input type="submit" value="Send File" class="btn btn-primary" />
           </div>
          </form>
          <div class="alert alert-info">
           <strong>Huom! </strong> Aanitiedoston maksimikoko on 2 MB.
          </div>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Sulje</button>
         </div>
        </div>
       </div>
      </div>
     </div>
                  <div class="col-md-6">
                 <audio controls autoplay="autoplay" loop="loop">
                     <source src="lelkek.mp3" type="audio/mpeg">
                 </audio>
            </div>
        <div class="col-md-2">
            <!--<button id="nappi" style="margin:0px;" class="btn btn-default">Start</button>-->
            <button onclick="launchFullscreen(document.documentElement);" type="button" class="btn btn-default">Nayta</button>
		</div>
             <!--<div class="col-md-2 col-md-offset-2"> <p id="nappi">Aloita esitys</p></div>-->

</div> <!-- row paa-->
    <!<div class="ruutu">
    <div id="bBox" style="margin:0px; width: 1000px; height: 400px;"> 
    <div class="row bBox" id="toproflmao" style="width:100%; height:100%; margin:0px;">
    <?php
        $muuu = $rows[$num][1];
        $muuuk = $rows[$num][2];
        $substr = substr($num, 0, 1);
        if ($substr == 'v'){
        $telu = substr($num, 1);
        $muu = $rivit[$telu][1];
        echo "<img class='kuva' src='$muu'  id='pre'alt='kuva' style='width:1000px;height:400px; margin:0px;'>";
        }
        else if ($substr == 'o'){
        $telu = substr($num, 1);
        $muu = $rivii[$telu][1];
         echo "<img class='kuva' src='$muu' id='pre' alt='kuva' style='width:1000px;height:400px; margin:0px;'>";
        }
        else if ($substr == 'k') {
        $telu = substr($num, 1);
        $muu = $rows[$telu][1];
        $muuk = $rows[$telu][2];
        echo "<img class='img' src='$muu' id='pre1' alt='kuva' style='width:50% ;height:100%;'><img class='img' id='pre2' src='$muuk' alt='kuva' style='width:50%;height:100%;'>";
        }
        ?>
    </div>
    <!</div>
</div> <!-- row mid -->
<div class="row" style="">
    <div class="box" id="box">
        <!<img class="dragme" id="kuva0" src="http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/IMG_0016.jpg" style="width:160px; height:120px; top:0px; left:0px;">    
        <!<img class="dragme" id="kuva1" src="http://cosmo.kpedu.fi/~jonashandelin/Amm14dat/SILMU/IMG_0016.jpg" style="width:160px; height:120px; top:0px; left:0px; left:165px;">
        
        <!--<div class="col-md-2" style="top:410px;">
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
    					   <div class="row"><form action="kassann.php" method="post">
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
    					   
    					   
							<form enctype="multipart/form-data" role="form" action="silmuproto.php" method="post">		
    							<input name="pkuva" type="file" type="button" class="aanil btn btn-default"> <br>
    							<input type="submit" class="btn btn-default kek" value="Send File">
							</form>
                         </div>
						</div>
                    </div>
                </div>-->
	
    </div>
</div> <!-- row bot -->
	
	
  	
    <script>
/*$(document).ready(function(){
    $(document).mousemove(function(event){
        $("span").text(event.pageX + ", " + event.pageY);
    });
});*/
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
function myF(){
  $("#parts").toggle();
  $("#paa").toggle();
  
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
        
        /*for(i = 0; i<2; i++) {
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
            //document.getElementById(kuvaid[i]).style.width=window.innerWidth *prowidth[i] * 2+"px";
            //document.getElementById(kuvaid[i]).style.height=window.innerHeight * proheight[i] + 10 + "px";
            
        }*/
      
        document.getElementById("bBox").style.width="100%";
        document.getElementById("bBox").style.height="100%";
        document.getElementById("row1").style.width="100%";
        document.getElementById("row2").style.width="100%";
      //document.getElementById('bBox').style.width= screen.availWidth *2 + "px";
      //document.getElementById('bBox').style.height= screen.availHeight + "px";
      
      //document.getElementById('pre1').style.width= "";
      //document.getElementById('pre1').style.height= "100%";
      //document.getElementById('pre2').style.width= "100%";
      //document.getElementById('pre2').style.height= "100%";
      //document.getElementById('bBox').style.width= screen.availWidth *2 + "px";
      //document.getElementById('bBox').style.height= screen.availHeight + "px";
      /*document.getElementById('kuva0').style.left=window.innerWidth * prox * 2 + "px";
      document.getElementById('kuva0').style.top=window.innerHeight * proy + "px";
      document.getElementById('kuva0').style.width=window.innerWidth *prowidth * 2+"px";
      document.getElementById('kuva0').style.height=window.innerHeight * proheight + 10 + "px";*/
      
  } else {
     /* var i = 0;
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
          prox[i] = parseInt(x[i]) / window.innerWidth / 2                                                                                      
          proy[i] = parseInt(x[i]) / window.innerHeight;
          kuvawidth[i] = document.getElementById(kuvaid[i]).style.width;
          kuvaheight[i] = document.getElementById(kuvaid[i]).style.height; 
          //prowidth[i] = parseInt(kuvawidth[i]) / window.innerWidth / 2;
          //proheight[i] = parseInt(kuvaheight[i]) / window.innerHeight;
          prowidth[i] = parseInt(kuvawidth[i]) / window.outerWidth;
          proheight[i] = parseInt(kuvaheight[i]) / window.outerHeight;
          //
          document.getElementById(kuvaid[i]).style.width = "160px";
          document.getElementById(kuvaid[i]).style.height = "120px";
          document.getElementById(kuvaid[i]).style.left=1000 * prox[i] + "px";
          document.getElementById(kuvaid[i]).style.top=400 * proy[i]+"px";
          //$("kpan").text(test + ", " + test);
          $("span").text(screen.height +", "+ window.innerHeight); 
        }*/
      //var x = document.getElementById("kuva0").style.left;
      //var y = document.getElementById("kuva0").style.top;
      //var testx = parseInt(x) / window.innerWidth / 2;
      //var testy = parseInt(y) / window.innerHeight;
      //var kuvawidth = document.getElementById("kuva0").style.width;
      //var kuvaheight = document.getElementById("kuva0").style.height;
      //var testprowidth = parseInt(kuvawidth) / window.innerWidth / 2;
      //var testproheight = parseInt(kuvaheight) / window.innerHeight;  
      
      document.getElementById('bBox').style.width = "1000px";
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
</body>
</html>