<?php
session_start();
require_once 'Database.php'; // Include the database connection class

$isLoggedIn = isset($_SESSION['user_id']);
$showDashboardButton = ($isLoggedIn && isset($_SESSION['role']) && $_SESSION['role'] === 'admin');  // Show Dashboard only for admin

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit;
}

// Create a new Database instance
$database = new Database();
$conn = $database->getConnection();

// Fetch the destinations from the database
$query = "SELECT * FROM destinations";
$stmt = $conn->prepare($query);
$stmt->execute();
$destinations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="Home-css.css?v=2">
</head>

<body>
<header>
    <a href="#" class="logo">
        <img src="Images/Logo3.png" alt="Travel Logo">
    </a>

    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="menu-icon">&#9776;</label>

    <ul class="navbar">
        <?php if ($showDashboardButton): ?>
            <li><a href="Dashboard.php" class="dashboard-btn">Dashboard</a></li>
        <?php endif; ?>
        <li><a href="AboutUs.php">About Us</a></li>
        <li><a href="ContactUs.php">Contact Us</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="Profile.php">Profile</a></li>
        <?php else: ?>
            <li><a href="Login.php">Log In</a></li>
        <?php endif; ?>
    </ul>
</header>

<div class="article-container">
    <h1 class="section-title">Destinations</h1>

    <ul class="groups">
        <?php foreach ($destinations as $destination): ?>
            <li>
                <!-- Destination Card -->
                <div class="card">
                    <div class="image-session">
                        <span class="image" style="background-image: url('Images/<?php echo $destination['image']; ?>');"></span>
                    </div>
                    <div class="meta-session">
                        <div class="head">
                            <a href="#" class="category"><?php echo $destination['category']; ?></a>
                            <span class="flexone"></span>
                            <span class="per">
                                <input type="range" name="" value="<?php echo $destination['popularity']; ?>" min="0" max="100">
                                <span>Popularity: <?php echo $destination['popularity']; ?>%</span>
                            </span>
                        </div>
                        <div class="body">
                            <h2 class="title">⚲ <?php echo $destination['name']; ?></h2>
                            <p class="desc"><?php echo $destination['description']; ?></p>
                        </div>
                        <div class="footer">
                            <div class="price">
                                <span><b>Price: </b></span>
                                <span><b>$<?php echo number_format($destination['price'], 2); ?></b></span>
                            </div>
                            <a href="#" class="button">Book Now</a>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Add Destination Button -->
    <?php if ($showDashboardButton): ?>
        <div style="text-align: center; margin-top: 40px;">
        <a href="add_destination.php" class="add-destination-btn">Add a Destination</a>
        </div>
    <?php endif; ?>

</div>
<br>
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

</body>

</html>