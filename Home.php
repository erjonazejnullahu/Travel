<?php
session_start();

$isLoggedIn = isset($_SESSION['user_id']);
$showDashboardButton = ($isLoggedIn && isset($_SESSION['role']) && $_SESSION['role'] === 'admin');  // Show Dashboard only for admin
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
            <li><a href="ContactUs.html">Contact Us</a></li>
            <li><a href="Profile.php">Profile</a></li>
        </ul>
    </header>
    <div class="article-container">
    <h1 class="section-title">Destinations</h1>
        <ul class="groups">
            <li>
                <!-- First Card -->
                <div class="card">
                    <div class="image-session">
                        <span class="image" style="background-image: url('Images/Tokyo.jpg');"></span>
                    </div>
                    <div class="meta-session">
                        <div class="head">
                            <a href="#" class="category">Adventure</a>
                            <span class="flexone"></span>
                            <span class="per">
                                <input type="range" name="" value="70" min="0" max="100">
                                <span>Popularity: 85%</span>
                            </span>
                        </div>
                        <div class="body">
                            <h2 class="title"> ⚲ Tokyo, Japan</h2>
                            <p class="desc">Tokyo, a vibrant blend of culture and innovation!</p>
                        </div>
                        <div class="footer">
                            <div class="price">
                                <span><b>Price: </b></span>
                                <span><b>$1200</b></span>
                            </div>
                            <a href="#" class="button">Book Now</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <!-- Second Card -->
                <div class="card">
                    <div class="image-session">
                        <span class="image" style="background-image: url('Images/Paris.jpg');"></span>
                    </div>
                    <div class="meta-session">
                        <div class="head">
                            <a href="#" class="category">Romantic</a>
                            <span class="flexone"></span>
                            <span class="per">
                                <input type="range" name="" value="90" min="0" max="100">
                                <span>Popularity: 95%</span>
                            </span>
                        </div>
                        <div class="body">
                            <h2 class="title">⚲ Paris, France</h2>
                            <p class="desc">Fall in love with Paris, the city of romance.</p>
                        </div>
                        <div class="footer">
                            <div class="price">
                                <span><b>Price: </b></span>
                                <span><b>$820</b></span>
                            </div>
                            <a href="#" class="button">Book Now</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <!-- Third Card -->
                <div class="card">
                    <div class="image-session">
                        <span class="image" style="background-image: url('Images/Rome.jpg');"></span>
                    </div>
                    <div class="meta-session">
                        <div class="head">
                            <a href="#" class="category">Historical</a>
                            <span class="flexone"></span>
                            <span class="per">
                                <input type="range" name="" value="80" min="0" max="100">
                                <span>Popularity: 80%</span>
                            </span>
                        </div>
                        <div class="body">
                            <h2 class="title">⚲ Rome, Italy</h2>
                            <p class="desc">Step into the timeless beauty of Rome!</p>
                        </div>
                        <div class="footer">
                            <div class="price">
                                <span><b>Price: </b></span>
                                <span><b>$680</b></span>
                            </div>
                            <a href="#" class="button">Book Now</a>
                        </div>
                    </div>
                </div>
            </li>

            <li>
                <!-- Fourth Card -->
                <div class="card">
                    <div class="image-session">
                        <span class="image" style="background-image: url('Images/Madrid.jpg');"></span>
                    </div>
                    <div class="meta-session">
                        <div class="head">
                            <a href="#" class="category">Cultural</a>
                            <span class="flexone"></span>
                            <span class="per">
                                <input type="range" name="" value="78" min="0" max="100">
                                <span>Popularity: 78%</span>
                            </span>
                        </div>
                        <div class="body">
                            <h2 class="title">⚲ Madrid, Spain</h2>
                            <p class="desc">Explore Madrid, where history and art come together.</p>
                        </div>
                        <div class="footer">
                            <div class="price">
                                <span><b>Price: </b></span>
                                <span><b>$750</b></span>
                            </div>
                            <a href="#" class="button">Book Now</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>


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