<?php
// Adds a new course to the database alongside a new teacher user. Gets data through a temp global variable
// Inputs: userID
// Outputs: n/a
// By: Alec Goodrich
// Data Last Modified: 4/28/2023

// Create new connection
include 'connect.php';

$teacherID = $userID;

// Add new course to database
$sql = "INSERT INTO course (teacherID) VALUES (".$teacherID.");";
$con->query($sql);

// Get ID of course just added
$sql = "SELECT LAST_INSERT_ID(courseID) AS ID FROM course ORDER BY LAST_INSERT_ID(courseID) DESC LIMIT 1;";
$courseID = $con->query($sql)->fetch_assoc()['ID'];
$con->close();

// Create new connection
include 'connect2.php';

// Add category hompage to database
$sql = "INSERT INTO category (categoryName, canHaveSubcategories, courseID) VALUES ('Homepage', 1,".$courseID.");";
$con2->query($sql);
?>