<?php
$host="localhost";
$port=3306;
$socket="";
$user="megan";
$password="pass1";
$dbname="courseresourcelibrary";

$con2 = new mysqli($host, $user, $password, $dbname, $port, $socket)
  or die ('Could not connect to the database server' . mysqli_connect_error());
?>