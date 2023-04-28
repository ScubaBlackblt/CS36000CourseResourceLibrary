<?php

//Gets the data from the join request table for implementing on webpage
//Returns none
//Inputs: courseID
//Outputs: requestArray

//Open new connection
include 'connect.php';

//Get values from form post
$courseID = $_GET['courseID'];

//Get the information from the database
$sql = "SELECT joinrequesttable.courseID, user.userID, user.username FROM joinrequesttable INNER JOIN user ON joinrequesttable.userID = user.userID WHERE joinrequesttable.courseID = ".$courseID.";";
$requests = $con->query($sql);

//Create a request array
$requestArray = array();
//Loop to enter values into array
if ($requests->num_rows > 0) {
    while($request = $requests->fetch_assoc()) {
        array_push($requestArray, $request);
    }
}
$con->close();
//Echoes the array 
echo json_encode($requestArray);
?>
