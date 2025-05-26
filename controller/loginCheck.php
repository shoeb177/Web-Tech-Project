<?php
session_start();
error_reporting(E_ALL);


require_once('../Model/userModel.php');

function validateEmail($Email) {
    $email = trim($Email);
    if($Email === "") {
        return "Email is required";
    }
    if(!filter_var($Email,FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    }
    return null;
}

function validatePassword($Password) {
    $password = trim($Password);
    if($Password === "") {
        return "Password is required";
    }
    if(strlen($Password) < 8) {
        return "Password must be at least 8 characters";
    }
    return null;
}
function authUser($Email, $Password) {

    $user = getUserByEmail($Email); 
    if(!$user) {
        header("Location: ../../view/html folder/loginPage.html?message=" . urlencode("User doesn't exist"));
        exit;
    }

    if($user['Password'] !== $Password) {
        header("Location: ../../view/html folder/loginPage.html?message=" . urlencode("Invalid password"));
        exit;
    }

    $_SESSION['status'] = true;
    $_SESSION['user_id'] = $user['ID'];
    $_SESSION['Email'] = $Email;


 
    $_SESSION['name'] = $user['First Name'] .' ' .$user['Last Name'];
   

    setcookie('status', 'true', time() + 3000, '/');

    if($role === 'Admin') {
        header("Location: ../../view/php/adminMenu.php");
    }
     else if ($role === 'User') {
        header("Location: ../../view/php/userMenu.php");
    } 
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['Email'] ?? '');
    $password = trim($_POST['Password'] ?? '');
  
    $emailError = validateEmail($Email);
    $passwordError = validatePassword($Password);

    if ($emailError || $passwordError) {
        $_SESSION['login_error'] = ($emailError ?? '').' ' .($passwordError ?? '');
        header("Location: ../../view/html folder/loginPage.html");
        exit;
    }

    authUser($email,$password);

} else {
    header("Location: ../../view/html folder/loginPage.html?message=" . urlencode("Unauthorized access"));
    exit;
}