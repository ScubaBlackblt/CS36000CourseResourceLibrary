<?php
// Create new SQL connection based on the information provided below. Due to SQL not allowing alternating writing to database after 
// reading or updating to the database (ex: 1. SELECT....; 2. INSERT ....; and 1. UPDATE ....; 2. INSERT ....; do not work) there 
// are 3 copies of this code that return different variable names meaning seperate connections.
// Input: n/a
// Output: $con2 (connection)
// By: Alec Goodrich
// Date Last Modified: 4/28/2023

//Change these values to the values you set for your SQL user and what you named the database
$host="localhost";
$port=3306;
$socket="";
$user="sqluser";
$password="password";
$dbname="courseresourcelibrary";

// Create Connection
$con2 = new mysqli($host, $user, $password, $dbname, $port, $socket)
  or die ('Could not connect to the database server' . mysqli_connect_error());
?>