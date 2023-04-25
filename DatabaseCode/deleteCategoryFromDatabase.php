<?php
include 'connect.php';
$categoryID = $_GET['categoryID'];
$pageID = $_GET['pageID'];
$userID = $_GET['userID'];
$courseID = $_GET['courseID'];
$sql = "DELETE FROM category WHERE categoryID=$categoryID";
$con->query($sql);
$con->close();
header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?userID=$userID&courseID=$courseID&pageID=$pageID");
?>