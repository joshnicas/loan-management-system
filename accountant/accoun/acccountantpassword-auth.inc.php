<?php
session_start();
include("dbconfig.php"); // Include database connection

if (!isset($_SESSION['username'])) {
    header("Location:../accountantlogin.php"); // Redirect back if username is not set
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pwd = $_POST['pwd'];

    // Check username and password in the database
    $stmt = $conn->prepare("SELECT pwd, firstname, midname, lastname,contacts_1,contacts_2,unit,branch,indexnumber, profile_photo_path FROM accountant WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();

    
    $result = $stmt->get_result();
        
    if ($result->num_rows > 0) {
       $row = $result ->fetch_assoc();

        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['midname'] = $row['midname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['contacts_1'] = $row['contacts_1'];
        $_SESSION['contacts_2'] = $row['contacts_2'];
        $_SESSION['unit'] = $row['unit'];
        $_SESSION['branch'] = $row['branch'];
        $_SESSION['indexnumber'] = $row['indexnumber'];
        $_SESSION['image'] = $row['profile_photo_path'];
        
        
       

        if ($pwd === $row['pwd']) {
            $_SESSION['logged_in'] = true;
            
            
             
            header("Location:../accountanthomepage.php"); // Redirect to dashboard
            exit;
        } else {
            echo "Invalid password.";

        }
    } else {
        echo "Username not found.";
    }
    $stmt->close();
}

