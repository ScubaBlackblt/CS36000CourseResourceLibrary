<?php
include 'connect.php';

$teacherID = $userID;

$sql = "INSERT INTO course (teacherID) VALUES (".$teacherID.");";
$con->query($sql);

$sql = "SELECT LAST_INSERT_ID(courseID) AS ID FROM course ORDER BY LAST_INSERT_ID(courseID) DESC LIMIT 1;";
$courseID = $con->query($sql)->fetch_assoc()['ID'];
$con->close();
include 'connect2.php';
$sql = "INSERT INTO category (categoryName, canHaveSubcategories, parentID) VALUES ('Homepage', 1,".$courseID.");";
$con2->query($sql);
?>
