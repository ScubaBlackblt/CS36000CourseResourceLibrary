<?php

include 'connect.php';
include 'getJoinRequestData.php';

$userID = $_POST('userID');
$courseID = $_GET('courseID');

$sql = "DELETE userID, courseID FROM joinrequesttable WHERE userID = ".$userID.";";
$con->query($sql);

if($_POST('accept/reject') == "accept")
{
    $sql = "INSERT INTO studentsjoined (userID, courseID) VALUES" .$userID.",".$courseID.";";
    $con->query($sql);
}

$con->close();
?>