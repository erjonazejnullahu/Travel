<?php
ob_start();
include_once 'Database.php';
include_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    // Get form data
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 0; // Default role for new users

    // Register the user
    if ($user->register($name, $lastname, $email, $username, $password, $role)) {
        header("Location: Login.php"); // Redirect to login page
        exit;
    } else {
        echo "Error registering user!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="Register-css.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="form-box" id="login-form">
            <form action="Register.php" method="POST">
                <h2>Register</h2>
                <input type="text" id="name" name="name" placeholder="Name" required>
                <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
                <input type="text" id="email" name="email" placeholder="E-mail" required>
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="password" id="repassword" name="repassword" placeholder="Re-enter Password" required>
                <button type="submit" id="submit-btn">Create Account</button>
                </form>
        </div>
    </div>

    <!-- Validimi -->

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const BtnSubmit = document.getElementById('submit-btn');
        const form = document.querySelector('form');

        BtnSubmit.addEventListener('click', function(event) {
            if (!validate()) {
                event.preventDefault(); // Prevent form submission only if validation fails
            }
        });

        function validate() {
            const e = document.getElementById('name');
            const m = document.getElementById('lastname');
            const em = document.getElementById('email');
            const u = document.getElementById('username');
            const p = document.getElementById('password');
            const rp = document.getElementById('repassword');

            if (e.value === "") {
                alert("Ju lutem shtypni emrin."); e.focus();
                return false;
            }
            if (m.value === "") {
                alert("Ju lutem shtypni mbiemrin."); m.focus();
                return false;
            }
            if (em.value === "") {
                alert("Ju lutem shtypni email-in."); em.focus();
                return false;
            }
            if (u.value === "") {
                alert("Ju lutem shtypni një username."); u.focus();
                return false;
            }
            if (p.value === "") {
                alert("Ju lutem shtypni një password."); p.focus();
                return false;
            }
            if (rp.value === "") {
                alert("Ju lutem shtypni prap password-in."); rp.focus();
                return false;
            }
            if (!emailValid(em.value)) {
                alert("Ju lutem shtypni një email valid.");
                em.focus();
                return false;
            }
            if (p.value.length < 8) {
                alert("Password-i duhet të jetë të paktën 8 karaktere.");
                p.focus();
                return false;
            }
            if (p.value !== rp.value) {
                alert("Password-at nuk janë të njejtë.");
                rp.focus();
                return false;
            }
            
            
            return true;
        }

        function emailValid(email) {
            const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;
            return emailRegex.test(email.toLowerCase());
        }
    });
</script>

</body>
</html>