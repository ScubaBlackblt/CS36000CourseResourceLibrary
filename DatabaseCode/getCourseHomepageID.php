<?php
// Gets the pageID of a given course. Values obtained from temp global courseID.
// Inputs: courseID
// Outputs: $homepageID
// By: Alec Goodrich
// Date Last Modified: 4/28/2023

// Create new connection
include 'connect.php';

// Get category from database based on courseID
$sql = "SELECT * FROM category WHERE courseID = ".$courseID.";";
$homePageID = $con->query($sql)->fetch_assoc()["categoryID"];
$con->close();
?>