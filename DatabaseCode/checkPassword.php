<?php

//Checks the password of a user when they are trying to log in
//Returns to current page or goes to homepage
//Inputs: username, password
//Outputs: None
//Made by: Alex Kitani

//Open new connection
include 'connect.php';

//Get values from form post
$usernameIN = $_POST['usernameIn'];

//Get the user's information from their username
$sql = "SELECT userPassword, courseID, typeOfAccount, userID FROM user WHERE username = '$usernameIN';";
$result = $con->query($sql)->fetch_assoc();
if (empty($result)){
    header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/loginPage.php?error=incorrectLogin");
}

//Put the user information into variables
$hash = $result["userPassword"];
$courseID = $result['courseID'];
$typeOfAccount = $result["typeOfAccount"];
$userID = $result["userID"];

//Get values from form post
$usersPassword = $_POST['password'];

//Checks to see if the password the user entered matches with the password in the database
 $valid = password_verify ( $usersPassword, $hash );
 //If statement checking valid boolean
 if ( $valid ) 
 {
    /*Success, move to homepage */
    //If account is student check to see if they were accepted into the course
    if ($typeOfAccount == "student")
    {
        $sql = "SELECT * FROM studentsJoined WHERE userID = '$userID' AND courseID= ".$courseID.";";
        $joined = $con->query($sql)->fetch_assoc();
        //If not accepted display message and return to login
        if (empty($joined)){
            header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/loginPage.php?error=noAccess");
            exit();
        }
    }
    //Goes to homepage
    header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?userID=$userID&courseID=$courseID&pageID=homepage");
 }

 else 
 {
    /* tell the user the username/password combo is invalid */
    header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/loginPage.php?error=incorrectLogin");
 }

 $con->close();
?>
