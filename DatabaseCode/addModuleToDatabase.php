<?php

// Adds a module to the database. Gets data passed in through the URL and from post data from add module form. 
// Returns to page the user was on.
// Inputs: contentType, content, pageID, userID, courseID
// Outputs: none

// Open new connection
include 'connect3.php';

$gotHomepageID = false;

// Get values from form post
$contentType = $_POST['contentType'];
$content = $_POST['content'];

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

// Add module to database
$sql = "INSERT INTO module (categoryID) VALUES (".$pageID.");";
$con3->query($sql);

// Get ID of the module just added to database
$sql = "SELECT LAST_INSERT_ID(moduleID) AS ID FROM module ORDER BY LAST_INSERT_ID(moduleID) DESC LIMIT 1";
$moduleID = $con3->query($sql)->fetch_assoc()['ID'];

$con3->close();

// Open new connection
include 'connect2.php';

// Insert content into database based on type of content
if ($contentType == "submission"){
  $sql = "INSERT INTO content (moduleID, contentType) VALUES (".$moduleID.",'$contentType');";
  $con2->query($sql); 
}
else{
  $sql = "INSERT INTO content (moduleID, contentType, textentered) VALUES ( ".$moduleID.", '$contentType', '$content');";
  $con2->query($sql); 
}

$con2->close();

// Go back to page user was on
if ($gotHomepageID){
  header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?userID=$userID&courseID=$courseID&pageID=homepage");
}
else{
  header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?userID=$userID&courseID=$courseID&pageID=$pageID");
}
?>
