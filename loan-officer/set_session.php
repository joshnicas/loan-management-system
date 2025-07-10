<?php 
session_start()
if (isset($_POST['fullname'])) {
    $_SESSION['fullname'] = $_POST['fullname'];
}