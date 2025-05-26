<?php
session_start();
require_once('../model/db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = getConnection();
    if (!$conn) {
        die("Database connection failed!");
    }

    $first = mysqli_real_escape_string($conn, $_POST['First Name']);
    $last = mysqli_real_escape_string($conn, $_POST['Last Name']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);
    $phone = mysqli_real_escape_string($conn, $_POST['Phone']);
    $dob = mysqli_real_escape_string($conn, $_POST['DOB']);
    $gender = mysqli_real_escape_string($conn, $_POST['Gender']);
    $address = mysqli_real_escape_string($conn, $_POST['Address']);

    
        
        if (in_array($imageFileType,$allowed)) {
            
                $sql = "INSERT INTO user info (First Name,Last Name,Email,Password,Phone,DOB,Gender,Address) 
                        VALUES ('$First','$Last','$Email','$Password','$Phone','$DOB','$Gender','$Address')";

                if (mysqli_query($conn, $sql)) {
                    $_SESSION['success'] = "Registration successful. Please log in.";
                    header("Location: ../../view/html folder/loginPage.html");
                    exit;
                } else {
                    echo "Database error: " . mysqli_error($conn);
                }
           
       
     
    mysqli_close($conn);
}
?>