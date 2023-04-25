<?php
include 'connect.php';
$sql = "SELECT * FROM category WHERE courseID = ".$courseID.";";
$homePageID = $con->query($sql)->fetch_assoc()["categoryID"];
$con->close();
?>