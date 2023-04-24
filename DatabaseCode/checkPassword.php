<?php

include 'connect.php';

$usernameIN = $_POST['usernameIn'];

$sql = "SELECT userPassword, courseID, typeOfAccount, userID FROM user WHERE username = '$usernameIN';";
$result = $con->query($sql)->fetch_assoc();
if (empty($result)){
    header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/loginPage.php?error=incorrectLogin");
}

$hash = $result["userPassword"];
$courseID = $result['courseID'];
$typeOfAccount = $result["typeOfAccount"];
$userID = $result["userID"];

$usersPassword = $_POST['password'];

 $valid = password_verify ( $usersPassword, $hash );
 if ( $valid ) 
 {
    /*Success, move to homepage */
    if ($typeOfAccount == "student"){
        echo "test";
        $sql = "SELECT * FROM studentsJoined WHERE userID = '$userID' AND courseID= ".$courseID.";";
        $joined = $con->query($sql)->fetch_assoc();
        if (empty($joined)){
            header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/loginPage.php?error=noAccess");
            exit();
        }
    }
    header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?userID=$userID&courseID=$courseID&pageID=homepage");
 }

 else 
 {
    /* tell the user the username/password combo is invalid */
    header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/loginPage.php?error=incorrectLogin");
 }

 $con->close();
?>
