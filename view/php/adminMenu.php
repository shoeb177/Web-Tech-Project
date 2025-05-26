<?php
session_start();
require_once('../../model/db.php');

if(empty($_SESSION['status']) || empty($_SESSION['email'])) {
    header('Location: ../../view/html folder/loginPage.html');
    exit;
}

$conn = getConnection();
if(!$conn) {
    die("Database connection failed!");
}

$email = $_SESSION['email'];

$sql = "SELECT First Name, Last Name FROM user info WHERE Email = ?";
$stmt = $conn->prepare($sql);

if(!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("s", $Email);
$stmt->execute();
$result = $stmt->get_result();

if($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    $_SESSION['name'] = trim($user['Firs Name'] . ' ' . $user['Last Name']);
} else {
    header('Location: ../../view/html foler/loginPage.html');
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
      <title>Menu | TM</title>
      <link rel="stylesheet" href="../../asset/css folder/adminMenuStyle.css" />
      <link rel="icon" type="image/png" href="../../asset/image/car.png" />
  </head>

  <body>
      <header class="topBar">
          <div class="userHeadInfo">
            
              
              <span class="profileName"><?php echo $_SESSION['name']; ?></span>
          </div>
          <button class="logoutBtn" onclick="logout()">Logout</button>
      </header>

      <div class="layout">
          <aside class="sidebar" id="sidebar">
              <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
              <nav class="nav-buttons">
                  <button onclick="showContent('../html folder/car_dashboard.html')">Dashboard</button>
                  <button onclick="showContent('../php/profile.php')">Profile</button>
                 
                  <button onclick="showContent('../html folder/notifications.html')">Notifications</button>
                  <button onclick="showContent('../html folder/roleBasePage.html')">Change User roles</button>
                  <button onclick="showContent('../html folder/dueDatePage.html')">Due Dates</button>
                  <button onclick="showContent('../html folder/calenderView.html')">Calendar View</button>
              </nav>
          </aside>

          <main class="main-content">
              <iframe id="contentFrame" src="../html folder/car_dashboard.html" frameborder="0"></iframe>
          </main>
      </div>

      <script src="../../asset/js folder/adminMenu.js"></script>
  </body>
</html>