<?php
session_start();
include '../Model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $conn->real_escape_string(trim($_POST['firstName']));
    $lastName  = $conn->real_escape_string(trim($_POST['lastName']));
    $email     = $conn->real_escape_string(trim($_POST['email']));
    $phone     = $conn->real_escape_string(trim($_POST['phone']));
    $dob       = $conn->real_escape_string(trim($_POST['dob']));
    $gender    = $conn->real_escape_string(trim($_POST['gender']));
    $address   = $conn->real_escape_string(trim($_POST['address']));
    $password  = $conn->real_escape_string(trim($_POST['password']));

    $checkSql = "SELECT * FROM `user info` WHERE Email='$email' LIMIT 1";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        die("Email already registered.");
    }

    $sql = "INSERT INTO `user info` (`First Name`, `Last Name`, `Email`, `Phone`, `DOB`, `Gender`, `Address`, `Password`)
            VALUES ('$firstName', '$lastName', '$email', '$phone', '$dob', '$gender', '$address', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../view/html folder/signupPage.html?success=1");
        exit();
    } else {
        die("Error: " . $conn->error);
    }
} else {
    die("Invalid request method.");
}
?>
