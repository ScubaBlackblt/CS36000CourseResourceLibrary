<?php
include 'connect.php';

$contentID = $_POST['contentID'];
$submitterID = $_POST['submitterID'];
$submittedFile = $_POST['submittedFile'];

$sql = "INSERT INTO submissions (contentID, submitterID, submittedFile) VALUES ".$contentID.",".$submitterID.",".$submittedFile.";";
$con->query($sql);


$con->close();
?>