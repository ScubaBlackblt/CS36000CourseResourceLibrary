<?php

include 'connect.php';

$courseID = $_GET['courseID'];
//$courseID = 1;

$sql = "SELECT joinrequesttable.courseID, user.userID, user.username FROM joinrequesttable INNER JOIN user ON joinrequesttable.userID = user.userID WHERE joinrequesttable.courseID = ".$courseID.";";
$requests = $con->query($sql);

$requestArray = array();
if ($requests->num_rows > 0) {
    while($request = $requests->fetch_assoc()) {
        array_push($requestArray, $request);
    }
}
$con->close();
echo json_encode($requestArray);
?>
