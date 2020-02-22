<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "generator";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die('Connection failed: (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
echo 'Connected successfully ' . mysqli_get_host_info($conn) . "\n";
?>