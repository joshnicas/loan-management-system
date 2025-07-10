<?php
session_start();

include("dbconfig.php");

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['client_id'];

    // Fetch user from the database
    $sql = "DELETE  FROM debtors_to_be_approved WHERE id = '$id'";
    $result = $conn->query($sql);



   
    header("location:../loan-verification.php");
}

$conn->close();
?>