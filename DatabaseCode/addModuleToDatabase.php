<?php
include 'connect.php';

$contentType = $_POST['contentType'];
$content = $_POST['content'];
// $pageID = $_GET['pageID'];
$pageID = 1;

$sql = "INSERT INTO module (categoryID) VALUES (".$pageID.");";
$con->query($sql);

$sql = "SELECT LAST_INSERT_ID(moduleID) AS ID FROM module ORDER BY LAST_INSERT_ID(moduleID) DESC LIMIT 1";
$moduleID = $con->query($sql)->fetch_assoc()['ID'];

$con->close();
include 'connect2.php';

if ($contentType == "submission"){
  $sql = "INSERT INTO content (moduleID, contentType) VALUES (" .$moduleID. "," .$contentType.");";
  $con2->query($sql); 
}
else{
  $sql = "INSERT INTO content (moduleID, contentType, textentered) VALUES ( ".$moduleID.", '$contentType', '$content');";
  $con2->query($sql); 
}
$con2->close();
?>
