<?php
session_start();
include_once 'Database.php';
include_once 'UserRepository.php';
include_once 'User.php';

if (!isset($_SESSION['email'])) {
    header("Location: Login.php");
    exit();
}


$db = new Database();
$conn = $db->getConnection();

$email = $_SESSION['email'];
$query = "SELECT name, lastname, email FROM users WHERE email = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password'])) {
    $newPassword = $_POST['password'];
    $userRepo = new UserRepository();
    $userRepo->updateUserPassword($email, $newPassword);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="Profile-css.css?v=2">
</head>
<body>
    <header>
        <div class ="Account">
            <img src="Images/Client1.png" style="width: 20%">
        </div>
        <h1>Profile</h1>
        <nav>
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><?php
            if (isset($_SESSION['email'])) {
                echo '<button id="logoutBtn" type="button">Log Out</button>';
            } else {
                echo '<a href="Login.php"><button type="button">Log In</button></a>';
            }
            ?></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="profile">
            <h2>Profile Information</h2>
            <p><span class="bold-text">Name: </span><?php echo $user['name']; ?></p>
            <p><span class="bold-text">Last Name: </span><?php echo $user['lastname']; ?></p>
            <p><span class="bold-text">Email: </span><?php echo $user['email']; ?></p>
        </section>
        <section id="settings">
            <h2>Account Settings</h2>
            <form method="post">
                <label for="password">Change Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Update Password</button>
            </form>
        </section>
    </main>

    <div class="footer1">
        <div class="container_footer">
            <div class="row">
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li> <a href="#">About us</a></li>
                        <li> <a href="#">Our services</a></li>
                        <li> <a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get help</h4>
                    <ul>
                        <li> <a href="#">FAQ</a></li>
                        <li> <a href="#">Troubleshooting</a></li>
                        <li> <a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <ul>
                    <h4>Explore</h4>
                    <li> <a href="#">Destinations</a></li>
                    <li> <a href="#">Travel Guides</a></li>
                    <li> <a href="#">Tours</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="social-link">
                        <a href="#"> <img src="Images/facebook.logo.webp"></a>
                        <a href="#"> <img src="Images/instagram-logo.webp"></a>
                        <a href="#"> <img src="Images/twitter-logo.png"></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="logoutModal" class="modal" style="display:none;">
    <div class="modal-content">
        <h2>Are you sure you want to log out?</h2>
        <button id="confirmLogout">Log Out</button>
        <button id="cancelLogout">Cancel</button>
    </div>
</div>

<script>
    const logoutBtn = document.getElementById('logoutBtn');
    const logoutModal = document.getElementById('logoutModal');
    const confirmLogout = document.getElementById('confirmLogout');
    const cancelLogout = document.getElementById('cancelLogout');

    logoutModal.style.display = "none";

    logoutBtn.addEventListener('click', function() {
        logoutModal.style.display = "flex";
    });

    confirmLogout.addEventListener('click', function() {
        window.location.href = "Logout.php";
    });

    cancelLogout.addEventListener('click', function() {
        logoutModal.style.display = "none";
    });
</script>
</body>
</html>