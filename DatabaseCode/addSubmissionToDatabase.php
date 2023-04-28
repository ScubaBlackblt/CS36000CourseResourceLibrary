<?php
// Add a submission from a submission componet to the database. Data obtained from form submssion of submission componet. (Does not actually store
// files due to file management not being setup)
// Input: contentID, submitterID, submittedFile
// Output: n/a
// By: Alec Goodrich
// Date Last Modified: 4/28/2023

// Create new connection
include 'connect.php';

// Get values from form post
$contentID = $_POST['contentID'];
$submitterID = $_POST['submitterID'];
$submittedFile = $_POST['submittedFile'];

// Add submission to database
$sql = "INSERT INTO submissions (contentID, submitterID, submittedFile) VALUES ".$contentID.",".$submitterID.",".$submittedFile.";";
$con->query($sql);


$con->close();
?>