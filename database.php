<!-- Program Name: database.php
Author: Harrison Tadlock
Date Created: February 18, 2025
Date Modified: May 12, 2026
Version Number: 1.1
Description: Server Side Interaction
Changes:
05/12/2026: 1.1 | updated to reflect changes  -->

<?php

// ERROR Testing, commented out unless needed
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

/* DATABASE CONNECTION */
$conn = new mysqli("localhost", "root", "H3@tMIS4372", "mis4372");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "DATABASE CONNECTION SUCCESSFUL";

/* GET FORM DATA */
$firstName = $_POST['firstName'];
$middleInitial = $_POST['middleInitial'];
$lastName = $_POST['lastName'];
$rememberMe = isset($_POST['remember-me']) ? 1 : 0;
$birthday = $_POST['birthday'];

/* HASH SENSITIVE DATA */
$ssnHash = password_hash($_POST['ssn'], PASSWORD_DEFAULT);
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['states'];
$zipcode = $_POST['zipcode'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$symptoms = $_POST['symptoms'];
$health = $_POST['health'];
$sex = $_POST['sex'];
$insuredStatus = $_POST['insStatus'];
$formFiller = $_POST['FormFiller'];
$userID = $_POST['userID'];

/* HASH PASSWORD */
$passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

/* CHECKBOX ARRAY */
$conditions = "";

if (isset($_POST['conditions'])) {
    $conditions = implode(", ", $_POST['conditions']);
}

/* SQL INSERT */
$sql = "INSERT INTO patients (
    first_name,
    middle_initial,
    last_name,
    remember_me,
    birthday,
    ssn_hash,
    address1,
    address2,
    city,
    state,
    zipcode,
    email,
    phone,
    symptoms,
    conditions_list,
    health_rating,
    sex,
    insured_status,
    form_filler,
    user_id,
    password_hash
)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

/* PREPARED STATEMENT */
$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "sssisssssssssssisssss",
    $firstName,
    $middleInitial,
    $lastName,
    $rememberMe,
    $birthday,
    $ssnHash,
    $address1,
    $address2,
    $city,
    $state,
    $zipcode,
    $email,
    $phone,
    $symptoms,
    $conditions,
    $health,
    $sex,
    $insuredStatus,
    $formFiller,
    $userID,
    $passwordHash
);

/* EXECUTE */
if ($stmt->execute()) {
    echo "<h1>Form submitted successfully!</h1>";
} else {
    echo "Error: " . $stmt->error;
}

/* CLOSE */
$stmt->close();
$conn->close();

?>

<!-- end of process.php file -->