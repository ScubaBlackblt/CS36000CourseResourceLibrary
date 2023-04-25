<?php
include 'connect2.php';
global $courseID;
$gotHomepageID = false;
$canHaveSubcategories = $_POST['canHaveSubcategories'];
$categoryName = $_POST['name'];
$pageID = $_GET['pageID'];
$userID = $_GET['userID'];
$courseID = $_GET['courseID'];
if ($parentID == "homepage"){
    include 'getCourseHomepageID.php';
    $parentID = $homePageID;
    $gotHomepageID = true;
}


$sql = "INSERT INTO category (categoryName, canHaveSubcategories, parentID) VALUES ('$categoryName',".$canHaveSubcategories.",".$pageID.");";
$con2->query($sql);


$con2->close();
if ($gotHomepageID){
    header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?userID=$userID&courseID=$courseID&pageID=homepage");
}
else{
    header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?userID=$userID&courseID=$courseID&pageID=$pageID");
}
?>