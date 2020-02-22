<?php 
include_once 'conn.php';

$company = mysqli_real_escape_string ($conn, $_POST['company']);
$firstName = mysqli_real_escape_string ($conn, $_POST['firstName']);
$lastName = mysqli_real_escape_string ($conn, $_POST['lastName']);

// Inserting data values to DB
$sql = "INSERT INTO users (user_company, user_fName, user_lName) VALUES 
('$company', '$firstName', '$lastName')";

mysqli_query($conn, $sql);

header("Location: ../index.html?insert=success");
?>