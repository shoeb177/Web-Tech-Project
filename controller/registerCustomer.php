<?php
session_start();
include '../Model/db.php';  // Adjust path if needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $conn->real_escape_string(trim($_POST['firstName']));
    $lastName  = $conn->real_escape_string(trim($_POST['lastName']));
    $email     = $conn->real_escape_string(trim($_POST['email']));
    $phone     = $conn->real_escape_string(trim($_POST['phone']));
    $dob       = $conn->real_escape_string(trim($_POST['dob']));
    $gender    = $conn->real_escape_string(trim($_POST['gender']));
    $address   = $conn->real_escape_string(trim($_POST['address']));

    // Check if email already exists
    $checkSql = "SELECT * FROM regcustomer WHERE Email='$email' LIMIT 1";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        die("Customer with this email already registered.");
    }

    $sql = "INSERT INTO regcustomer (`First Name`, `Last Name`, `Email`, `Phone`, `DOB`, `Gender`, `Address`) 
            VALUES ('$firstName', '$lastName', '$email', '$phone', '$dob', '$gender', '$address')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../view/html folder/register_customer.html?success=1");
        exit();
    } else {
        die("Error: " . $conn->error);
    }
} else {
    die("Invalid request method.");
}
