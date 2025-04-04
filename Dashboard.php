<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: Login.php");
} else {
    if ($_SESSION['role'] == "user") {
        header("Location: Home.php");
    } else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="Dashboard-css.css">
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
            <li><a href="ContactUs.html">Contact Us</a></li>
            <li><a href="Profile.html">Profile</a></li>
        </ul>
</header>
<br><br>
    <h1>User Dashboard</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php 
        include_once 'UserRepository.php';
        $userRepository = new UserRepository();
        $users = $userRepository->getAllUsers(); 
        foreach($users as $index => $user){
            echo 
            "
            <tr>
                <td>{$user['id']}</td>
                <td>{$user['name']}</td>
                <td>{$user['lastname']}</td>
                <td>{$user['email']}</td>
                <td>{$user['username']}</td>
                <td>{$user['password']}</td>
                <td>{$user['role']}</td>
                <td><a href='Edit.php?id={$user["id"]}' class='edit-button'>Edit</a></td>
                <td><a href='Delete.php?id={$user["id"]}' class='delete-button'>Delete</a></td>
            </tr>
            ";
        }
        ?>
    </table>

</body>
</html>

<?php 
}
}
?>
