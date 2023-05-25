<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "zoosurvei";

    $con = new mysqli($host, $user, $pass, $dbname);

    if($con->connect_error){
        die("Connection Failed: " . $con->connect_error);
    }

?>