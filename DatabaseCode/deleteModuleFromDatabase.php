<?php
include 'connect.php';
$moduleID = $_GET['moduleID'];
$pageID = $_GET['pageID'];
$userID = $_GET['userID'];
$courseID = $_GET['courseID'];
$sql = "DELETE FROM module WHERE moduleID=$moduleID";
$con->query($sql);
$con->close();
header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?userID=$userID&courseID=$courseID&pageID=$pageID");
?>
