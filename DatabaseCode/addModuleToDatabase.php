<?php
include 'connect.php';

$contentType = $_POST['contentType'];
$content = $_POST['content'];
$pageID = $_GET['pageID'];

$sql = "INSERT INTO module (categoryID) VALUES ".$pageID.";";
$con->query($sql);

$sql = "SELECT LAST_INSERT_ID(moduleID) AS ID FROM module ORDER BY LAST_INSERT_ID(moduleID) DESC LIMIT 1";
$moduleID = $con->query($sql);

if ($contentType = "submission"){
  $sql = "INSERT INTO content (moduleID, contentType) VALUES" .$moduleID. "," .$contentType.";";
  $con->query($sql); 
}
else{
  $sql = "INSERT INTO content (moduleID, contentType, textentered) VALUES" .$moduleID. "," .$contentType. "," .$content. ";";
  $con->query($sql); 
}
$con->close();
?>