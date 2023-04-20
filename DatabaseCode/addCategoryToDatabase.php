<?php
include 'connect.php';

$canHaveSubcategories = $_POST['canHaveSubcategories'];
$categoryName = $_POST['name'];
$parentID = $_GET['pageID'];

$sql = "INSERT INTO category (categoryName, canHaveSubcategories, parentID) VALUES ".$categoryName.",".$canHaveSubcategories.",".$parentID.";";
$con->query($sql);


$con->close();
?>