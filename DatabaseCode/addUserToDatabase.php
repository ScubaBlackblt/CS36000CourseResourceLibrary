<?php

//This part adds a user into the database when registering with their info
//Returns to page user is on
//Inputs: username, password, passwordRepeat, courseID, typeOfAccount
//Outputs: None
//Made by: Alex Kitani

//Open new connection
include 'connect.php';

//Get values from form post
global $userID;
$username = $_POST['username'];
$password = $_POST['password'];
$passwordRepeat = $_POST['confirm_password'];
//Check if password matches with passwordRepeat
if ($password != $passwordRepeat){
    header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/registrationPage.php");
}
$courseIDIn = $_POST['courseIDIn'];
$typeOfAccount = $_POST['teacher/student'];

//Hashes the user's password for encryption
$hashed_password=password_hash($password, PASSWORD_BCRYPT);

//Inserts the user's info into the database
$sql = "INSERT INTO user (username, userPassword, typeOfAccount) VALUES ('$username','$hashed_password','$typeOfAccount');";
$con->query($sql);

//Gets the user's ID
$sql = "SELECT LAST_INSERT_ID(userID) AS ID FROM user ORDER BY LAST_INSERT_ID(userID) DESC LIMIT 1;";
$userID = $con->query($sql)->fetch_assoc()["ID"];
$con->close();

//Open new connection
include 'connect2.php';

//If else check for user type of account
if($typeOfAccount == "teacher")
{
    //Adds a course if account is a teacher 
    include 'addNewCourseToDatabase.php';

    $courseIDIn = $courseID;
}
else 
{
    //Inserts the user as a request for that course if they are a student
    $sql = "INSERT INTO joinRequestTable (userID, courseID) VALUES (".$userID.",".$courseIDIn.");";
    $con2->query($sql);
}

//Updates the user's courseID 
$sql = "UPDATE user SET courseID = ".$courseIDIn." WHERE userID = ".$userID.";";
$con2->query($sql);

$con2->close();
//Go back to login page
header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/loginPage.php");
?>
