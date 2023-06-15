<?php
session_start();

// Check if the admin is logged in, otherwise redirect to the login page
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

// Database connection
$host = 'localhost';
$db = 'test';
$user = 'root';
$password = '';

// Create a connection
$conn = new mysqli($host, $user, $password, $db);

// Check the connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Process form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add new employee
    if (isset($_POST['add_employee'])) {
        $name = $_POST['name'];
        $position = $_POST['position'];
        $quote = $_POST['quote'];

        // Upload employee image
        $image = $_FILES['image']['name'];
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);

        // Insert employee into database
        $sql = "INSERT INTO employees (name, position, quote, image) VALUES ('$name', '$position', '$quote', '$image')";
        $conn->query($sql);
    }

    // Delete an employee
    if (isset($_POST['delete_employee'])) {
        $employeeId = $_POST['employee_id'];

        // Delete employee from the database
        $sql = "DELETE FROM employees WHERE id = $employeeId";
        $conn->query($sql);
    }
}

// Retrieve the list of employees from the database
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
$employees = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>

    <h2>Employees</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Quote</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        <?php foreach ($employees as $employee) : ?>
            <tr>
                <td><?php echo $employee['name']; ?></td>
                <td><?php echo $employee['position']; ?></td>
                <td><?php echo $employee['quote']; ?></td>
                <td><img src="uploads/<?php echo $employee['image']; ?>" width="100"></td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="employee_id" value="<?php echo $employee['id']; ?>">
                        <button type="submit" name="delete_employee">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add Employee</h2>

    <form method="POST" action="" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="position">Position:</label>
        <input type="text" name="position" id="position" required>

        <label for="quote">Quote:</label>
        <textarea name="quote" id="quote" required></textarea>

        <label for="image">Image:</label>
        <input type="file" name="image" id="image" required accept="image/*">

        <button type="submit" name="add_employee">Add Employee</button>
    </form>

    <a href="logout.php">Logout</a>
</body>
</html>
