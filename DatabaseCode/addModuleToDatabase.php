<?php
include 'connect3.php';

$gotHomepageID = false;
$contentType = $_POST['contentType'];
$content = $_POST['content'];
$pageID = $_GET['pageID'];
// $pageID = 1;
$userID = $_GET['userID'];
$courseID = $_GET['courseID'];
if ($pageID == "homepage"){
  include 'getCourseHomepageID.php';
  $pageID = $homePageID;
  $gotHomepageID = true;
}


$sql = "INSERT INTO module (categoryID) VALUES (".$pageID.");";
$con3->query($sql);

$sql = "SELECT LAST_INSERT_ID(moduleID) AS ID FROM module ORDER BY LAST_INSERT_ID(moduleID) DESC LIMIT 1";
$moduleID = $con3->query($sql)->fetch_assoc()['ID'];

$con3->close();
include 'connect2.php';

if ($contentType == "submission"){
  $sql = "INSERT INTO content (moduleID, contentType) VALUES (".$moduleID.",'$contentType');";
  $con2->query($sql); 
}
else{
  $sql = "INSERT INTO content (moduleID, contentType, textentered) VALUES ( ".$moduleID.", '$contentType', '$content');";
  $con2->query($sql); 
}

$con2->close();
if ($gotHomepageID){
  header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?userID=$userID&courseID=$courseID&pageID=homepage");
}
else{
  header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?userID=$userID&courseID=$courseID&pageID=$pageID");
}
?>
