<?php
// Adds a category to the database. Gets data passed in through the URL and from post data from add category form. 
// Returns to page the user was on.
// Inputs: canHaveSubcategories, name, pageID, userID, courseID
// Outputs: none
// By: Alec Goodrich
// Date Last Modified: 4/28/2023

// Open new connection
include 'connect2.php';

global $courseID;
$gotHomepageID = false;

// Get values from form post
$canHaveSubcategories = $_POST['canHaveSubcategories'];
$categoryName = $_POST['name'];

// Get values from URL
$pageID = $_GET['pageID'];
$userID = $_GET['userID'];
$courseID = $_GET['courseID'];

// If the pageID is the homepage get the homepage's actual pageID since homepage is not a pageID
if ($pageID == "homepage"){
    include 'getCourseHomepageID.php';
    $pageID = $homePageID;
    $gotHomepageID = true;
}


// Add category to database
$sql = "INSERT INTO category (categoryName, canHaveSubcategories, parentID) VALUES ('$categoryName',".$canHaveSubcategories.",".$pageID.");";
$con2->query($sql);


$con2->close();

// Go back to page user was on
if ($gotHomepageID){
    header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?userID=$userID&courseID=$courseID&pageID=homepage");
}
else{
    header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?userID=$userID&courseID=$courseID&pageID=$pageID");
}
?>