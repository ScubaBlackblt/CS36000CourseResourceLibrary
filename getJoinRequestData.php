<?php

include 'connect.php';

$pageID = $_GET['pageID'];

$sql = "SELECT * FROM joinrequesttable WHERE ".$pageID.";";
$con->query($sql);

$con->close();
?>