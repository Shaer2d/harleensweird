<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_GET["id"])) {
    // Retrieve the comment from the database based on the provided ID
    $conn = new mysqli("localhost", "root", "", "test"); // Update with your database credentials

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET["id"];
    $sql = "SELECT * FROM comments WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $comment = $result->fetch_assoc();

        // Update the comment in the database
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $message = $_POST["message"];

            $updateSql = "UPDATE comments SET name = '$name', email = '$email', message = '$message' WHERE id = $id";
            if ($conn->query($updateSql) === true) {
                header("Location: admin_panel.php");
                exit();
            } else {
                echo "Error updating comment: " . $conn->error;
            }
        }
    } else {
        echo "Comment not found.";
        exit();
    }
} else {
    echo "Invalid comment ID.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Comment</title>
</head>
<body>
    <h2>Edit Comment</h2>
    <form method="post">
        <label>Name: </label>
        <input type="text" name="name" value="<?php echo $comment["name"]; ?>" required><br><br>
        <label>Email: </label>
        <input type="email" name="email" value="<?php echo $comment["email"]; ?>" required><br><br>
        <label>Message: </label>
        <textarea name="message" required><?php echo $comment["message"]; ?></textarea><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>