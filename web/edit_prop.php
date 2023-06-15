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

// Handle the form submission to update the property
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   // Retrieve the form data
   $property_id = $_POST["property_id"];
   $title = $_POST["title"];
   $description = $_POST["description"];
   $price = $_POST["price"];
   $location = $_POST["location"];

   // Update the property in the database
   $sql = "UPDATE properties SET title='$title', description='$description', price='$price', location='$location' WHERE id='$property_id'";
   $conn->query($sql);

   // Redirect to the admin panel or desired page after updating the property
   header("Location: admin_panel.php");
   exit();
}

// Retrieve the property details for editing
if (isset($_GET["id"])) {
   $property_id = $_GET["id"];
   $sql = "SELECT * FROM properties WHERE id='$property_id'";
   $result = $conn->query($sql);

   if ($result->num_rows == 1) {
      $property = $result->fetch_assoc();
   } else {
      // No property found with the given ID, redirect to error page or handle it accordingly
      header("Location: error.php");
      exit();
   }
}
?>

<!-- Edit Property Form -->
<form method="POST">
   <input type="hidden" name="property_id" value="<?php echo $property_id; ?>">
   
   <label for="title">Title</label>
   <input type="text" name="title" id="title" value="<?php echo $property["title"]; ?>" required>
   
   <label for="description">Description</label>
   <textarea name="description" id="description" required><?php echo $property["description"]; ?></textarea>
   
   <label for="price">Price</label>
   <input type="number" name="price" id="price" value="<?php echo $property["price"]; ?>" required>
   
   <label for="location">Location</label>
   <input type="text" name="location" id="location" value="<?php echo $property["location"]; ?>" required>
   
   <button type="submit">Update Property</button>
</form>