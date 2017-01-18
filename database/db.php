<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbtable = "note";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbtable);

if(!$conn){
    die("connection failed: ".mysqli_connect_error());
}

?>
