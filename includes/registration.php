<?php 
include 'conn.php';

$company = mysqli_real_escape_string ($conn, $_POST['company']);
$firstName = mysqli_real_escape_string ($conn, $_POST['firstName']);
$lastName = mysqli_real_escape_string ($conn, $_POST['lastName']);

// Inserting data values to DB
$sql = "INSERT INTO users (user_company, user_fName, user_lName) VALUES 
(?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)){
    echo "SQL error";
} else {
    mysqli_stmt_bind_param($stmt, "sss", $company, $firstName, $lastName);
    mysqli_stmt_execute($stmt);
}

mysqli_query($conn, $sql);

header("Location: ../index.html?insert=success");
?>