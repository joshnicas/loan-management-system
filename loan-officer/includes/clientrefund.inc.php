<?php
session_start();
include("dbconfig.php");


    $fullname = $_POST['fullname']; 
    $amount = $_POST['amount'];
    
    

    $stmt = $conn->prepare("UPDATE loan_refund SET loan_refunded = ? WHERE fullname = ?");
    $stmt ->bind_param("ds", $amount, $fullname);

    $stmt2 = $conn->prepare("UPDATE debtor SET refund_status = 'GOOD' WHERE fullname = ?");
    $stmt2 ->bind_param("s" $fullname);


    if ($stmt->execute() ) {
       echo "DONE";

    } else {
        echo " Error updating product: " . $conn->error;
    }


$conn->close();

