<?php

include 'connect.php';

global $userID;
$username = $_POST['username'];
$password = $_POST['password'];
$passwordRepeat = $_POST['confirm_password'];
if ($password != $passwordRepeat){
    header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/registrationPage.php");
}
$courseIDIn = $_POST['courseIDIn'];
$typeOfAccount = $_POST['teacher/student'];
$hashed_password=password_hash($password, PASSWORD_BCRYPT);
$sql = "INSERT INTO user (username, userPassword, typeOfAccount) VALUES ('$username','$hashed_password','$typeOfAccount');";
$con->query($sql);

$sql = "SELECT LAST_INSERT_ID(userID) AS ID FROM user ORDER BY LAST_INSERT_ID(userID) DESC LIMIT 1;";
$userID = $con->query($sql)->fetch_assoc()["ID"];
$con->close();
include 'connect2.php';

if($typeOfAccount == "teacher")
{
    include 'addNewCourseToDatabase.php';

    $courseIDIn = $courseID;
}
else 
{
    $sql = "INSERT INTO joinRequestTable (userID, courseID) VALUES (".$userID.",".$courseIDIn.");";
    $con2->query($sql);
}

$sql = "UPDATE user SET courseID = ".$courseIDIn." WHERE userID = ".$userID.";";
$con2->query($sql);

$con2->close();
header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/loginPage.php");
?>
