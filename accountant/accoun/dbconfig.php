<?php
$host = "localhost";
$user = "cdcluznr_joshnicas";
$password = "J0sh_nica$";
$database = "cdcluznr_cdc_database";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

