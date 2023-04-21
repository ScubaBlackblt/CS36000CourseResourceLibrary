<?php

include 'connect.php';

$usernameIN = $_POST['usernameIN'];

$sql = "SELECT password FROM user WHERE username = $usernameIN;";
$hash = $con->query($sql)->fetch_assoc("password");

$usersPassword = $_POST['password'];

 $valid = password_verify ( $usersPassword, $hash );
 if ( $valid ) 
 {
    /*Success, move to homepage */
 }

 else 
 {
    /* tell the user the username/password combo is invalid */
    echo "Username or Password is Incorrect";
 }

 $con->close();
?>