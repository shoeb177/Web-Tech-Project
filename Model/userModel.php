<?php

require_once 'db.php';

function login($user){
    $conn = getConnection();
    $sql = "SELECT ID FROM user info WHERE Email = '{$user['username']}' AND password = '{$user['Password']}'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        return $row['ID']; 
    } else {
        return false;
    }

}


function getUserById($id){
    $conn = getConnection();
    $sql = "SELECT First Name, Last Name,  FROM user info WHERE ID = '$ID'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1){
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

function getUserByEmail($email){
    $conn = getConnection();
    $sql = "SELECT ID, First name,Last Name,Password,role FROM user info WHERE email = '$Email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1){
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}


function insertUser($user){
    $conn = getConnection();
    $checkEmail = "SELECT ID FROM user info WHERE Email = '{$user['Email']}'";
    $result = mysqli_query($conn, $checkEmail);

    if(mysqli_num_rows($result) > 0){
        return false;
    }

    $sql = "INSERT INTO user info (
        First Name,
        Last Name,
        Email,
        Password,
        Phone,
        DOB,
        Gender,
        Address,
     
      
    ) VALUES (
        '{$user['First Name']}',
        '{$user['Last Name']}',
        '{$user['Email']}',
        '{$user['Password']}',
        '{$user['Phone']}',
        '{$user['DOB']}',
        '{$user['Gender']}',
        '{$user['Address']}',
        
    )";

    if(mysqli_query($conn, $sql)){
        return true;
    } else {
        return false;
    }
}


function updateUser($user){
    $conn = getConnection();
    $sql = "UPDATE user info SET
        First Name = '{$user['First Name']}',
        Last Name = '{$user['Last Name']}',
        Phone = '{$user['Phone']}',
        DOB = '{$user['DOB']}',
        Gender = '{$user['Gender']}',
        Address = '{$user['Address']}'
    WHERE Email = '{$user['Email']}'";

    if(mysqli_query($conn, $sql)){
        return true;
    } else {
        return false;
    }
}




function updatePassword($user){
    $conn = getConnection();
    $sql = "UPDATE user info SET Password = '{$user['Password']}' WHERE Email = '{$user['Email']}'";

    if(mysqli_query($conn, $sql)){
        return true;
    } else {
        return false;
    }
}
?>