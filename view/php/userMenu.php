<?php
    session_start();
    if(isset($_SESSION['status'])){
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Menu | TM</title>
    <link rel="stylesheet" href="../../asset/css folder/userMenuStyle.css" />
    <link rel="icon" type="image/png" href="../../asset/image/car.png">
  </head>
  
  <body>
      <button class="logout-btn" onclick="logout()">Logout</button>
    </header>

    <div class="layout">
        
        <nav class="nav-buttons">
          <button onclick="showContent('../html folder/car_dashboard.html')">Dashboard</button>
          <button onclick="showContent('../html folder/profile.html')">Profile</button>
         
          <button onclick="showContent('../html folder/notifications.html')">Notifications</button>
        
        
        </nav>
      </aside>

      <main class="main-content">
        <iframe id="contentFrame" src="../html folder/car_dashboard.html"></iframe>
      </main>
    
    </div>

    <script src="../../asset/js folder/userMenu.js"></script>
  
  </body>

</html>

<?php
   
?>