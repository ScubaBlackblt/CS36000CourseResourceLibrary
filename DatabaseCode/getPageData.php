<?php
// Gets the data for the current page. Gets values from URL. Return a complex array that needs to be broken down into componets.
// Inputs: pageID, courseID
// Output: Array{arrayOfCourseData, arrayOfPageData, Array(arrayOfPageData) [array of subcategories of the current page],
//         Array(arrayOfContentData) [array of content of the current page], Array(arrayOfSubmissionData) [array of submssions])}
// By: Alec Goodrich
// Date Last Modified: 4/28/2023

// Create New Connection
include 'connect.php';
        
// Get values from URL
$pageID = $_GET['pageID'];
$courseID = $_GET['courseID'];

// Get course data based on courseID
$sql = "SELECT * FROM course WHERE courseID = $courseID";
$course = $con->query($sql)->fetch_assoc();

// Get page data based on courseID if current page is a homepage or pageID if the current page is not a homepage
if ($pageID == "homepage"){
  $sql = "SELECT * FROM category WHERE courseID = ".$course['courseID'].";";
  $page = $con->query($sql)->fetch_assoc();
}
else{
    $sql = "SELECT * FROM category WHERE categoryID = ".$pageID.";";
    $page = $con->query($sql)->fetch_assoc();
}

// Gets the subcategories of the current page and puts them in an array
$subcategoriesArray = array();
if ($page['canHaveSubcategories'] == 1){
    $sql = "SELECT * FROM category WHERE parentID = ".$page['categoryID'].";";
    $subcategories = $con->query($sql);
    if ($subcategories->num_rows > 0) {
        while($subcategory = $subcategories->fetch_assoc()) {
            array_push($subcategoriesArray, $subcategory);
        }
    }
}

// Gets the content of the current page andputs them in an array, if the content is a submission category add the relavent submissions to an array
$sql = "SELECT content.* FROM content INNER JOIN module ON module.moduleID = content.moduleID INNER JOIN category ON category.categoryID = module.categoryID WHERE category.categoryID = ".$page['categoryID']." ORDER BY content.contentID";
$contents = $con->query($sql);
$contentArray = array();
$submissions = array();
if ($contents->num_rows > 0) {
    while($content = $contents->fetch_assoc()) {
        array_push($contentArray, $content);
        if ($content['contentType'] == "submssion"){
            // Gets the submssion of a submission content and adds them to an array
            $sql = "SELECT * FROM submissions WHERE contentID = ".$content['contentID'].";";
            $submission = $con->query($sql)->fetch_assoc();
            array_push($submissions, $submission);
        }  
    }
}
$con->close();

// Adds all page data to an array
$output = array($course, $page, $subcategoriesArray, $contentArray, $submissions);

// Encodes data so it can be passed between php and javascript then returns the data
echo json_encode($output);

?>