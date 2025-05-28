<?php
session_start();
include '../Model/db.php';  // Adjust path if needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Name       = $conn->real_escape_string(trim($_POST['Name']));
    $Model      = $conn->real_escape_string(trim($_POST['Model']));
    $Year       = (int)$_POST['Year'];
    $Num_Plate  = $conn->real_escape_string(trim($_POST['Num_Plate']));
    $Status     = $conn->real_escape_string(trim($_POST['Status']));

    // Check if Num Plate exists
    $checkSql = "SELECT * FROM car WHERE `Num Plate`='$Num_Plate' LIMIT 1";
    $checkResult = $conn->query($checkSql);
    if ($checkResult->num_rows > 0) {
        die("Vehicle with this number plate already exists.");
    }

    $sql = "INSERT INTO car (`Name`, `Model`, `Year`, `Num Plate`, `Status`) 
            VALUES ('$Name', '$Model', $Year, '$Num_Plate', '$Status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../view/html folder/add_vehicle.html?success=1");
        exit();
    } else {
        die("Error: " . $conn->error);
    }
} else {
    die("Invalid request method.");
}
