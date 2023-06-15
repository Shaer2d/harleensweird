<?php
session_start();

// Check if the administrator is logged in
// If not, redirect them to the login page
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "", "test");
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// Handle the form submission to add a new property
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   // Retrieve the form data
   $title = $_POST["title"];
   $description = $_POST["description"];
   $price = $_POST["price"];
   $location = $_POST["location"];
   $image = $_FILES["image"]["name"];
   $image_tmp = $_FILES["image"]["tmp_name"];

   // Upload the image file to a desired directory
   move_uploaded_file($image_tmp, "uploads/" . $image);

   // Insert the property into the database
   $sql = "INSERT INTO properties (title, description, price, location, image) VALUES ('$title', '$description', '$price', '$location', '$image')";
   $conn->query($sql);

   // Redirect to the admin panel or desired page after adding the property
   header("Location: admin_panel.php");
   exit();
}
?>

<!-- Add Property Form -->
<form method="POST" enctype="multipart/form-data">
   <label for="title">Title</label>
   <input type="text" name="title" id="title" required>
   
   <label for="description">Description</label>
   <textarea name="description" id="description" required></textarea>
   
   <label for="price">Price</label>
   <input type="number" name="price" id="price" required>
   
   <label for="location">Location</label>
   <input type="text" name="location" id="location" required>
   
   <label for="image">Image</label>
   <input type="file" name="image" id="image" required>
   
   <button type="submit">Add Property</button>
</form>
