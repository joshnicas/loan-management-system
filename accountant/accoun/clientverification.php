<?php
session_start();
include("dbconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['approvalStatus'])) {
    $approvalStatus = intval($_POST['approvalStatus']); // Convert to integer

    

    $sql1 = "UPDATE debtors_to_be_approved SET accountant_approval = 'APPROVED' WHERE fullname = $approvalStatus";


    if ($conn->query($sql1) === TRUE) {

        header ("location:../loan-verification.php");
    } else {
        echo " Error updating product: " . $conn->error;
    }
} else {
    echo " Invalid request.";
}

$conn->close();

