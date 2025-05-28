<?php
session_start();
include '../Model/db.php';  // include the DB connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Escape inputs for security
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    // Query the table with backticks because of the space in table name
    $sql = "SELECT * FROM `user info` WHERE Email='$email' AND Password='$password' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        // User found, set session variables or redirect as needed
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['ID'];
        $_SESSION['user_name'] = $row['First Name'];

        // Redirect to dashboard
        header("Location: ../view/html folder/car_dashboard.html");
        exit();
    } else {
        // Invalid credentials
        echo "Invalid email or password.";
    }
} else {
    echo "Invalid request method.";
}
?>
