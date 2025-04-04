<?php
session_start();

// Include database and user files
include_once 'Database.php';
include_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create a new User object and try to log in
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    // If the user exists and password is correct
    if ($user->login($email, $password)) {
        // If login is successful, start the session and redirect to Home.php
        $_SESSION['email'] = $email;
        header("Location: Home.php");
        exit;
    } else {
        // If login fails, show an error message
        $error_message = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Login-css.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="form-box" id="login-form">
            <form action="Login.php" method="POST">
                <h2>Login</h2>
                <input type="email" id="userid" name="email" placeholder="Email" required>
                <input type="password" id="pass" name="password" placeholder="Password" required>
                <button type="submit" id="submit-btn">Login</button>
                <p>Don't have an account? <a href="Register.php">Register here</a></p>
            </form>
        </div>
    </div>
</body>

<!-- Validimi -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const BtnSubmit = document.getElementById('submit-btn');
        const form = document.querySelector('form');

        BtnSubmit.addEventListener('click', function(event) {
            if (!validate()) {
                event.preventDefault();
            }
        });

        function validate() {
            const perdoruesi = document.getElementById('userid');
            const fjalkalimi = document.getElementById('pass');

            if (perdoruesi.value.trim() === "") {
                alert("Ju lutem shtypni një email.");
                perdoruesi.focus();
                return false;
            }
            if (fjalkalimi.value.trim() === "") {
                alert("Ju lutem shtypni një password.");
                fjalkalimi.focus();
                return false;
            }

            return true;
        }
    });
</script>

</html>
