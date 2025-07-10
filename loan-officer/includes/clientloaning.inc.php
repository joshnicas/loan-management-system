<?php
include("dbconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $loan_taken = $_POST['loan_taken'];
    $loan_return = $_POST['loan_return'];
    $time_ = $_POST['time_'];

    // Step 1: Select from users
    $query = "SELECT * FROM debtors_to_be_approved WHERE fullname = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $fullname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {

    
        // Step 2: Insert into archived_users
       
        $insert = "INSERT INTO loaned_clients (fullname, loan_taken, loan_to_be_returned, time_) VALUES (?,?,?,?)";
        $stmt2 = $conn->prepare($insert);
        $stmt2->bind_param("ssss", $fullname, $loan_taken, $loan_return, $time_);

        if ($stmt2->execute()) {
            // Step 3: Delete from users
            $delete = "DELETE FROM debtors_to_be_approved WHERE fullname = ?";
            $stmt3 = $conn->prepare($delete);
            $stmt3->bind_param("s", $fullname);
            if ($stmt3->execute()) {
                
                header ("location:../employeeclientloaning.php");
            } else {

                echo "Insert done, but delete failed: " . $stmt3->error;
            }
            $stmt3->close();
        } else {
            echo "Insert failed: " . $stmt2->error;
        }
        $stmt2->close();
        
    } else {
        echo "client not found.";
    }

    $stmt->close();
    $conn->close();
}
?>
