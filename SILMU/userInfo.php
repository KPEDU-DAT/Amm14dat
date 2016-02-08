<?php
        include_once("db.php");
 
        $did = $_POST["did"];
        $pkid = $_POST["pkid"];
        $pkx = $_POST["pkx"];
        $pky = $_POST["pky"];
        $pkw = $_POST["pkw"];
        $pkh = $_POST["pkh"];
        
//        $pkid = mb_substr($pkid, 5);
         
        /*mysql_query("DELETE FROM silmudiapk WHERE did = \"$did\" ");*/


        if(mysql_query("INSERT INTO silmudiapk VALUES('$did', '$pkid', '$pkx', '$pky', '$pkw', '$pkh')"))
                echo "Su";
        else 
                echo "No";
?>