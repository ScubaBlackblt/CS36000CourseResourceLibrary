<?php
// Deleted a module to the database. Gets data passed in through the URL. 
// Returns to page the user was on.
// Inputs: moduleID, pageID, userID, courseID
// Outputs: none
// By: Alec Goodrich
// Date Last Modified: 4/28/2023

// Create new connection
include 'connect.php';

// Get values from URL
$moduleID = $_GET['moduleID'];
$pageID = $_GET['pageID'];
$userID = $_GET['userID'];
$courseID = $_GET['courseID'];

// Delete module from database
$sql = "DELETE FROM module WHERE moduleID=$moduleID";
$con->query($sql);
$con->close();

// Go back to page user was on 
header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?userID=$userID&courseID=$courseID&pageID=$pageID");
?>