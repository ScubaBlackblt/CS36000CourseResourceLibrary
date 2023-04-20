<?php
include 'connect.php';

$teacherID = 1;

$sql = "INSERT INTO course (teacherID) VALUES ".$teacherID.";";
$con->query($sql);

$sql = "SELECT LAST_INSERT_ID(moduleID) AS ID FROM module ORDER BY LAST_INSERT_ID(moduleID) DESC LIMIT 1;";
$courseID = $con->query($sql);

$sql = "INSERT INTO category (categoryName, canHaveSubcategories, parentID) VALUES Homepage, 1,".$courseID.";";
$con->query($sql);


$con->close();
?>