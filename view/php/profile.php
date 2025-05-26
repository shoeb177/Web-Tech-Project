<?php
session_start();
require_once('../../model/db.php');

if(empty($_SESSION['status']) || empty($_SESSION['email'])) {
    header('Location:../../view/html folder/loginPage.html');
    exit;
}

$editErrors = [];
$passwordErrors = [];

$conn = getConnection();
if(!$conn) {
    die("Database connection failed!");
}
$email = $_SESSION['email'];

$sql = "SELECT First Name, Last Name, Email, Phone, DOB, Address FROM userinfos WHERE Email = ?";
$stmt = $conn->prepare($sql);

if(!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("s", $Email);
$stmt->execute();
$result = $stmt->get_result();

if($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
   
    
    $_SESSION['First Name'] = trim($user['First Name']);
    $_SESSION['Last Name'] = trim($user['Last Name']);
    $_SESSION['Email'] = trim($user['Email']);
    $_SESSION['Phone'] = trim($user['Phone']);
    $_SESSION['DOB'] = trim($user['DOB']);
    $_SESSION['Address'] = trim($user['Address']);
} else {
    header('Location: ../../view/html folder/loginPage.html');
    exit;
}

$stmt->close();
$conn->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit-profile'])) {
        $firstName = trim($_POST['edit-first-name']);
        $lastName = trim($_POST['edit-last-name']);
        $email = trim($_POST['edit-email']);
        $phone = trim($_POST['edit-phone']);
        $dob = trim($_POST['edit-dob']);
        $address = trim($_POST['edit-address']);

        if (empty($firstName) || empty($lastName) || empty($email)) {
            $editErrors[] = "First Name, Last Name, and Email are required.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $editErrors[] = "Invalid email format.";
        }
        if (empty($editErrors)) {
            //updateUser Profile();
        }
    }
    if (isset($_POST['reset-password'])) {
        $currentPassword = trim($_POST['current-password']);
        $newPassword = trim($_POST['new-password']);
        $confirmPassword = trim($_POST['confirm-password']);

        if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
            $passwordErrors[] = "All password fields are required.";
        }
        if ($newPassword !== $confirmPassword) {
            $passwordErrors[] = "New Password and Confirm Password do not match.";
        }
        if (empty($passwordErrors)) {
            //updateUser Password();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | TM</title>
    <link rel="icon" type="image/png" href="../../asset/image/car.png">
    <link rel="stylesheet" href="../../asset/css folder/profileStyle.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
         
            <h2><?php echo $_SESSION['name']; ?></h2>
            <p><?php echo $_SESSION['email']; ?></p>
        </div>

        <div class="tab-container">
            <div class="tab active" data-tab="view">View Profile</div>
            <div class="tab" data-tab="edit">Edit Profile</div>
           
            <div class="tab" data-tab="password">Reset Password</div>
        </div>

        <div class="tab-content active" id="view-tab">
            <div class="profile-section">
                <h3>Personal Information</h3>
                <div class="profile-info">
                    <div class="info-item">
                        <label>First Name</label>
                        <span class="First Name"><?php echo $_SESSION['First Name']; ?></span>
                    </div>
                    <div class="info-item">
                        <label>Last Name</label>
                        <span class="Last Name"><?php echo $_SESSION['Last Name']; ?></span>
                    </div>
                    <div class="info-item">
                        <label>Email</label>
                        <span class="Email"><?php echo $_SESSION['Email']; ?></span>
                    </div>
                    <div class="info-item">
                        <label>Phone</label>
                        <span class="Phone"><?php echo $_SESSION['Phone']; ?></span>
                    </div>
                    <div class="info-item">
                        <label>Date of Birth</label>
                        <span class="DOB"><?php echo $_SESSION['DOB']; ?></span>
                    </div>
                    <div class="info-item">
                        <label>Address</label>
                        <span class="Address"><?php echo $_SESSION['Address']; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="edit-tab">
            <div class="profile-section">
                <h3>Edit Profile</h3>
                <?php if (!empty($editErrors)): ?>
                    <div class="error-messages">
                        <?php foreach ($editErrors as $error): ?>
                            <p><?php echo htmlspecialchars($error); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <form id="edit-profile-form" method="POST">
                    <div class="profile-info">
                        <div class="input-group">
                            <label for="edit-first-name">First Name</label>
                            <input type="text" id="edit-first-name" name="edit-first-name" value="" required>
                        </div>
                        <div class="input-group">
                            <label for="edit-last-name">Last Name</label>
                            <input type="text" id="edit-last-name" name="edit-last-name" value="" required>
                        </div>
                        <div class="input-group">
                            <label for="edit-email">Email</label>
                            <input type="email" id="edit-email" name="edit-email" value="" required>
                        </div>
                        <div class="input-group">
                            <label for="edit-phone">Phone</label>
                            <input type="tel" id="edit-phone" name="edit-phone" value="">
                        </div>
                        <div class="input-group">
                            <label for="edit-dob">Date of Birth</label>
                            <input type="date" id="edit-dob" name="edit-dob" value="">
                        </div>
                        <div class="input-group">
                            <label for="edit-address">Address</label>
                            <textarea id="edit-address" name="edit-address" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="cancel" id="cancel-edit">Cancel</button>
                        <button type="submit" name="edit-profile">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

       
        <div class="tab-content" id="password-tab">
            <div class="profile-section">
                <h3>Reset Password</h3>
                <?php if (!empty($passwordErrors)): ?>
                    <div class="error-messages">
                        <?php foreach ($passwordErrors as $error): ?>
                            <p><?php echo htmlspecialchars($error); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <form id="reset-password-form" method="POST">
                    <div class="input-group">
                        <label for="current-password">Current Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="current-password" name="current-password" required>
                        
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="new-password">New Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="new-password" name="new-password" required>
                            
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="confirm-password">Confirm New Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="confirm-password" name="confirm-password" required>
                            <span toggle="#confirm-password" class="toggle-password">👁️</span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="reset-password">Change Password</button>
                    </div>
                    <div class="message" id="password-message"></div>
                </form>
            </div>
        </div>
    </div>

   

    <script src="../../asset/js folder/profile.js"></script>
</body>
</html>