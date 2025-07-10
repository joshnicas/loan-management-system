<?php

session_start();



// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    
    require_once 'dbconfig.php';
    
    // Fetch user from the database
    $sql = "SELECT * FROM accountant WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
       
            $_SESSION['username'] = $user['username'];

         
            header ("location:../accountantpassword-auth.shtml");
      
    } else {
        echo "User not found.";
    }
}


$conn->close();



