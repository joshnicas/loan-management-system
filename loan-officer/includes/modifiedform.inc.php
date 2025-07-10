<?php
session_start();
require ('dbconfig.php');
require ('dbh.inc.php');

$Dfirstname = $_POST["debtor-firstname"];
$Dmidname = $_POST["debtor-midname"];
$Dlastname = $_POST["debtor-lastname"];
$Dfullname = $Dfirstname . " " . $Dmidname ." ". $Dlastname;

$debtorRegion = $_POST["debtor-region-address"];
$debtorWard = $_POST["debtor-ward-address"];
$debtorStreet = $_POST["debtor-street-address"];

$debtorIDN = $_POST["debtor-IDN"];
$debtorContact1 = $_POST["debtor-contacts1"];
$debtorContact2 = $_POST["debtor-contacts2"];

$debtorAge = $_POST["debtor-age"];
$debtorSex = $_POST["debtor-sex"];

$debtorOccupation = $_POST["debtor-occupation"];
$debtorOccupationArea = $_POST["debtor-occupation-area"];
$debtorSalary = $_POST["debtor-salary"];
$debtorWorkSpan = $_POST["debtor-workspan"];



$loan_taken = $_POST["loan_amount"];
$time = $_POST["time"];
$I = "0.2";
$I_int = (float) $I;
$loan_taken_int = (float)$loan_taken;
$time_int = (float)$time;
$IR = $I_int * $loan_taken_int;
$IRL = $IR * $time_int;
$amount_toReturn = $loan_taken_int + $IRL;



$target_dir = "debtor/";
$fullname = $Dfullname;
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

    $query ="INSERT INTO debtors_to_be_approved (fullname, debt_requesting, installment_debt, time_) VALUES (:fullname, :debt_requesting, :installment_debt, :time_); ";
    $stmt = $pdo->prepare($query);
    $stmt ->bindParam(":fullname",$Dfullname);
    $stmt ->bindParam(":debt_requesting",$loan_taken);
    $stmt ->bindParam(":installment_debt",$amount_toReturn);
    $stmt ->bindParam(":time_",$time);
    $stmt ->execute();


    
    $query ="INSERT INTO loan_refund (fullname, loan_taken, loan_to_be_refunded ) VALUES (:fullname, :loan_taken, :loan_to_be_refunded); ";
    $stmt = $pdo->prepare($query);
    $stmt ->bindParam(":fullname",$Dfullname);
    $stmt ->bindParam(":loan_taken",$loan_taken);
    $stmt ->bindParam(":loan_to_be_refunded",$amount_toReturn);
    $stmt ->execute();


    $query ="INSERT INTO debtor (firstname, midname, lastname, fullname, region_address, ward_address, street_address, IDN, contacts1, contacts2, age, sex, occupation, occupation_area, salary, workspan, image_path) VALUES (:firstname, :midname, :lastname, :fullname, :region_address, :ward_address, :street_address, :IDN, :contacts1, :contacts2, :age, :sex, :occupation, :occupation_area, :salary, :workspan, :image_path); ";
    $stmt = $pdo->prepare($query);

    $stmt ->bindParam(":firstname",$Dfirstname);
    $stmt ->bindParam(":midname",$Dmidname);
    $stmt ->bindParam(":lastname",$Dlastname);
    $stmt ->bindParam(":fullname",$Dfullname);
    $stmt ->bindParam(":region_address",$debtorRegion);
    $stmt ->bindParam(":ward_address",$debtorWard);
    $stmt ->bindParam(":street_address",$debtorStreet);    
    $stmt ->bindParam(":IDN",$debtorIDN);
    $stmt ->bindParam(":contacts1",$debtorContact1);
    $stmt ->bindParam(":contacts2",$debtorContact2);
    $stmt ->bindParam(":age",$debtorAge);
    $stmt ->bindParam(":sex",$debtorSex);
    $stmt ->bindParam(":occupation",$debtorOccupation);
    $stmt ->bindParam(":occupation_area",$debtorOccupationArea);
    $stmt ->bindParam(":salary",$debtorSalary);
    $stmt ->bindParam(":workspan",$debtorWorkSpan);
    $stmt ->bindParam(":image_path",$target_file);
    $stmt ->execute();


    $_SESSION['debtor_name'] = $Dfullname;
    $_SESSION['debtor_image'] = $target_file;
    

   
    header("location: ../modifiedform2.html");
    
} else {
    echo "Failed to upload image.";
}

$conn->close();
?>

