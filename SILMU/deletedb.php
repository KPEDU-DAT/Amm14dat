<?php
        include_once("db.php");

        $did = $_POST["did"];
        
		if(mysql_query("DELETE FROM silmudiapk WHERE did = \"$did\" "))
		        echo "test";
?>

