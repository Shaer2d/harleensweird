<?php
session_start();

if (isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] === true) {
    header("Location: admin_panel.php");
    exit();
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate the login credentials
    if ($username === "admin" && $password === "123") {
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin_panel.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="post">
        <label>Username: </label>
        <input type="text" name="username" required><br><br>
        <label>Password: </label>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>