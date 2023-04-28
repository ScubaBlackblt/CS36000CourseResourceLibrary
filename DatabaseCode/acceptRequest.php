<?php

//Checks to see if a user's request to join a class is either accepted or declined and
//puts the user into the students joined table if accepted
//Returns to page user is on
//Inputs: userID and courseID
//Outputs: none
//Made by: Alex Kitani

//Open new connection
include 'connect.php';

//Get values from form post
$userID = $_POST['userID'];
$courseID = $_GET['courseID'];

//Delete the user's request from the table
$sql = "DELETE FROM joinrequesttable WHERE userID = ".$userID.";";
$con->query($sql);
$con->close();

//Open another connection
include 'connect2.php';

//If statement checking if Teacher accepted or declined
if($_POST['accept/decline'] == "accept")
{
    //Insert info into students joined table
    $sql = "INSERT INTO studentsjoined (userID, courseID) VALUES(" .$userID.",".$courseID.");";
    $con2->query($sql);
}

$con2->close();
//Go back to page user was on
header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/userRequestsPage.php?courseID=$courseID&userID=$userID");
?>
