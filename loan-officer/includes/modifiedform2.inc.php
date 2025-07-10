<?php
session_start();


require ('dbconfig.php');
require ('dbh.inc.php');

$Gfirstname = $_POST["G-firstname"];
$Gmidname = $_POST["G-midname"];
$Glastname = $_POST["G-lastname"];
$Gfullname = $Gfirstname . " " . $Gmidname . " " . $Glastname;


$guarantorRegion = $_POST["G-region-address"];
$guarantorWard = $_POST["G-ward-address"];
$guarantorStreet = $_POST["G-street-address"];

$guarantorIDN = $_POST["G-IDN"];
$guarantorContact1 = $_POST["G-contacts1"];
$guarantorContact2 = $_POST["G-contacts2"];

$guarantorAge = $_POST["G-age"];
$guarantorSex = $_POST["G-sex"];

$guarantorOccupation = $_POST["G-occupation"];
$guarantorOccupationArea = $_POST["G-occupation-area"];
$guarantorSalary = $_POST["G-salary"];
$guarantorWorkSpan = $_POST["G-workspan"];






$target_dir = "guarantor/";
$fullname = $Gfullname;
$fileExt = ".jpg";
$image_name = $fullname.$fileExt;
$target_file = $target_dir . $image_name;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$allowed = ['jpg', 'jpeg', 'png', 'gif'];
if (!in_array($imageFileType, $allowed)) {
    echo "Only JPG, JPEG, PNG, GIF files are allowed.";
    exit;
}

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

    $query ="INSERT INTO guarantor (firstname, midname, lastname, debtor_name,region_address, ward_address, street_address, IDN, contacts1, contacts2, age, sex, occupation, occupation_area, salary, workspan, image_path) VALUES (:firstname, :midname, :lastname, :debtor_name, :region_address, :ward_address, :street_address, :IDN, :contacts1, :contacts2, :age, :sex, :occupation, :occupation_area, :salary, :workspan, :image_path); ";
    $stmt = $pdo->prepare($query);
    $stmt ->bindParam(":firstname",$Gfirstname);
    $stmt ->bindParam(":midname",$Gmidname);
    $stmt ->bindParam(":lastname",$Glastname);
    $stmt ->bindParam(":debtor_name", $_SESSION['debtor_name']);
    $stmt ->bindParam(":region_address",$guarantorRegion);
    $stmt ->bindParam(":ward_address",$guarantorWard);
    $stmt ->bindParam(":street_address",$guarantorStreet);    
    $stmt ->bindParam(":IDN",$guarantorIDN);
    $stmt ->bindParam(":contacts1",$guarantorContact1);
    $stmt ->bindParam(":contacts2",$guarantorContact2);
    $stmt ->bindParam(":age",$guarantorAge);
    $stmt ->bindParam(":sex",$guarantorSex);
    $stmt ->bindParam(":occupation",$guarantorOccupation);
    $stmt ->bindParam(":occupation_area",$guarantorOccupationArea);
    $stmt ->bindParam(":salary",$guarantorSalary);
    $stmt ->bindParam(":workspan",$guarantorWorkSpan);
    $stmt ->bindParam(":image_path", $target_file);
    

    $stmt ->execute();
    

   $_SESSION['guarantor_name'] = $Gfullname;
   $_SESSION['guarantor_image'] = $target_file; 

   header("location: ../modifiedform3.php");
    
    
} else {
    echo "Failed to upload image.";
}

$conn->close();
?>

