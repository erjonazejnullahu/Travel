<?php
$host = "localhost";
$user = "root"; 
$pass = "";       
$dbname = "Travel";   

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$reviews = [];
$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
}
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="AboutUs-css.css">
</head>
<body>

<header>
    <a href="#" class="logo">
        <img src="Images/Logo3.png" alt="Travel Logo">
    </a>
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="menu-icon">&#9776;</label>
    <ul class="navbar">
        <li><a href="Home.php">Home</a></li>
        <li><a href="ContactUs.php">Contact Us</a></li>
        <li><a href="Profile.php">Profile</a></li>
    </ul>
</header>

<br><br><br>
<div class="heading">
    <h1>About Us</h1>
    <p>Great Journeys – Fascinating Places</p>
</div>

<div class="container">
    <section class="about">
        <div class="about-image">
            <img src="Images/AboutUs.png" alt="">
        </div>
        <div class="about-content">
            <h2>Travel</h2>
            <p>Our mission is to make travel planning effortless, enjoyable, and accessible to everyone. 
               Stay informed with the latest travel insights, trends, and expert tips from our industry
               professionals. Our platform offers a comprehensive guide to destinations worldwide, providing
               you with valuable insights, trends, and expert tips to make your travel experiences unforgettable.</p>
        </div>
    </section>
</div>

<div class="reviews-container">
    <div class="reviews-heading">
        <h1>What our clients say about us</h1>
    </div>

    <!-- Dynamic Review Cards from DB -->
    <section class="reviews">
        <?php if (!empty($reviews)): ?>
            <?php foreach ($reviews as $review): ?>
                <div class="card">
                    <div class="image">
                        <img src="<?php echo htmlspecialchars($review['image_path']); ?>" alt="Client Image" />
                    </div>
                    <h2><?php echo htmlspecialchars($review['name']) . " - " . htmlspecialchars($review['type']); ?></h2>
                    <p><?php echo htmlspecialchars($review['review']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="color: white;">No reviews available at the moment.</p>
        <?php endif; ?>
    </section>
</div>

<br><br>
<section class="section__container banner__container">
    <div class="banner__card">
        <h4>10+</h4>
        <p>Years Experience</p>
    </div>
    <div class="banner__card">
        <h4>12K</h4>
        <p>Happy Clients</p>
    </div>
    <div class="banner__card">
        <h4>4.8</h4>
        <p>Overall Ratings</p>
    </div>
    <div class="banner__card">
        <h4>25</h4>
        <p>Destinations</p>
    </div>
</section>
<br><br>

<!-- Footer -->
<div class="footer1">
    <div class="container_footer">
        <div class="row">
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="AboutUs.php">About us</a></li>
                    <li><a href="#">Our services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Get help</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Troubleshooting</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <ul>
                    <h4>Explore</h4>
                    <li><a href="#">Destinations</a></li>
                    <li><a href="#">Travel Guides</a></li>
                    <li><a href="#">Tours</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Follow us</h4>
                <div class="social-link">
                    <a href="#"><img src="Images/facebook.logo.webp"></a>
                    <a href="#"><img src="Images/instagram-logo.webp"></a>
                    <a href="#"><img src="Images/twitter-logo.png"></a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
