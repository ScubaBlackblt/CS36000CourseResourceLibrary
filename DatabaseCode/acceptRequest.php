<?php

include 'connect.php';

$userID = $_POST['userID'];
$courseID = $_GET['courseID'];
//$userID = 1;
//$courseID = 1;

$sql = "DELETE FROM joinrequesttable WHERE userID = ".$userID.";";
$con->query($sql);
$con->close();

include 'connect2.php';
if($_POST['accept/decline'] == "accept")
{
    $sql = "INSERT INTO studentsjoined (userID, courseID) VALUES(" .$userID.",".$courseID.");";
    $con2->query($sql);
}
//echo $_POST['accept/decline'];
$con2->close();
header("Location: http://localhost:3000/CS36000CourseResourceLibrary-main/userRequestsPage.php?courseID=$courseID&userID=$userID");
?>
