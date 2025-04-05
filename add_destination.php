<?php
session_start();
require_once 'Database.php'; // Include the database connection class

// Check if the user is logged in and has admin role, otherwise redirect to login
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: Login.php");
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];
    $popularity = $_POST['popularity'];

    // File upload handling
    $target_dir = "Images/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    // Create a new Database instance
    $database = new Database();
    $conn = $database->getConnection();

    // Insert the new destination into the database
    $query = "INSERT INTO destinations (name, description, price, category, image, popularity) 
              VALUES (:name, :description, :price, :category, :image, :popularity)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':popularity', $popularity);

    if ($stmt->execute()) {
        // Redirect back to home after successful insert
        header("Location: home.php");
        exit;
    } else {
        echo "Error: Could not add the destination.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Destination</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="Home-css.css?v=2">
</head>
<body>
<style>
    /* Form Container */
.form-container {
    width: 50%;
    margin: 50px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Heading */
.form-container h1 {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 20px;
    color: #333;
}

/* Form Label */
form label {
    font-size: 1rem;
    color: #333;
    display: block;
    margin-bottom: 8px;
    margin-top: 15px;
}

/* Form Input */
form input, form textarea {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 15px;
}

/* Textarea Styling */
form textarea {
    height: 150px;
    resize: vertical;
}

/* File Input */
form input[type="file"] {
    padding: 10px;
    font-size: 1rem;
}

/* Submit Button */
form button {
    width: 100%;
    padding: 12px;
    font-size: 1.1rem;
    background-color: #1D84B5;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

form button:hover {
    background-color: #0056b3;
}

</style>

<header>
    <a href="home.php" class="logo">
        <img src="Images/Logo3.png" alt="Travel Logo">
    </a>
</header>

<div class="form-container">
    <h1>Add a New Destination</h1>

    <form action="add_destination.php" method="POST" enctype="multipart/form-data">
        <label for="name">Destination Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <label for="popularity">Popularity (0-100):</label>
        <input type="number" id="popularity" name="popularity" min="0" max="100" required>

        <button type="submit" class="button">Add Destination</button>
    </form>
</div>


</body>
</html>
