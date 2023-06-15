<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_GET["id"])) {
    // Delete the comment from the database based on the provided ID
    $conn = new mysqli("localhost", "root", "", "test"); // Update with your database credentials

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET["id"];
    $sql = "DELETE FROM comments WHERE id = $id";

    if ($conn->query($sql) === true) {
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Error deleting comment: " . $conn->error;
    }
} else {
    echo "Invalid comment ID.";
    exit();
}
?>

