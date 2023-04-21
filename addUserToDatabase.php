<?php

include 'connect.php';

global $userID;
$username = $_POST['username'];
$password = $_POST['password'];
$courseIDIn = $_POST['courseIDIn'];
$typeOfAccount = $_POST['typeOfAccount'];

$sql = "INSERT INTO user (username, userPassword, typeOfAccount) VALUES ".$username.",".$password.",".$typeOfAccount.";";
$con->query($sql);

$sql = "SELECT LAST_INSERT_ID(userID) AS ID FROM user ORDER BY LAST_INSERT_ID(userID) DESC LIMIT 1;";
$userID = $con->query($sql)->fetch_assoc()["userID"];

if($typeOfAccount = "teacher")
{
    include 'addNewCourseToDatabase.php';

    $courseIDIn = $courseID;
}
else 
{
    $sql = "INSERT INTO joinRequestTable (userID, classID) VALUES ".$userID.",".$courseIDIn.";";
    $con->query($sql);
}

$sql = "UPDATE user SET courseID = ".$courseIDIn." WHERE userID = ".$userID.";";
$con->query($sql);

$con->close();

?>