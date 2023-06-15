<?php
session_start();
// Check if the administrator is logged in
// If not, redirect them to the login page
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "test");
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// Handle the property deletion
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
   $property_id = $_GET["id"];

   // Check if the property exists in the database
   $sql = "SELECT * FROM properties WHERE id='$property_id'";
   $result = $conn->query($sql);

   if ($result->num_rows == 1) {
      // Delete the property from the database
      $delete_sql = "DELETE FROM properties WHERE id='$property_id'";
      $conn->query($delete_sql);
   }
}

// Redirect to the admin panel or desired page after deleting the property
header("Location: admin_panel.php");
exit();
?>