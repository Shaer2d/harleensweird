<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "test"); // Update with your database credentials

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all comments from the database
$sql = "SELECT * FROM comments";
$result = $conn->query($sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["selected_comments"])) {
        $selectedComments = $_POST["selected_comments"];
        
        // Update the 'display' column of all comments to 0 (not displayed)
        $updateSql = "UPDATE comments SET display = 0";
        $conn->query($updateSql);
        
        // Update the 'display' column of selected comments to 1 (displayed)
        foreach ($selectedComments as $commentId) {
            $updateSql = "UPDATE comments SET display = 1 WHERE id = $commentId";
            $conn->query($updateSql);
        }
        
        header("Location: admin_panel.php");
        exit();
    }

if (isset($_POST["removed_comments"])) {
    $removedComments = $_POST["removed_comments"];
    
    // Remove the selected comments from the database
    foreach ($removedComments as $commentId) {
        $deleteSql = "UPDATE comments SET display = 0 WHERE id = $commentId";
        $conn->query($deleteSql);
    }
    
    header("Location: admin_panel.php");
    exit();
}}

?>



    

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h2>Welcome, Admin!</h2>
    <a href="employee-panel.php">Employee panel</a>
    <h3>Select Comments to Display:</h3>
    <form method="post">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
                <th>Select</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td>
                        <a href="edit_comments.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a href="delete_comments.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                    <td>
                        <input type="checkbox" name="selected_comments[]" value="<?php echo $row['id']; ?>" <?php if ($row['display'] == 1) echo "checked"; ?>>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <input type="submit" value="Update Display">
    </form>
    <br>
    <h3>Select Comments to Remove:</h3>
    <form method="post">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Remove</th>

            </tr>
            <?php 
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                 
                    <td>
                        <input type="checkbox" name="removed_comments[]" value="<?php echo $row['id']; ?>">
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <input type="submit" value="Remove Comments">
    </form>
    <?php
    $sql = "SELECT * FROM properties";
$result = $conn->query($sql);
$properties = $result->fetch_all(MYSQLI_ASSOC);
?>
<h3>Properties</h3>
<!-- Display Properties -->
<table>
   <thead>
      <tr>
         <th>Title</th>
         <th>Description</th>
         <th>Price</th>
         <th>Location</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach ($properties as $property) { ?>
         <tr>
            <td><?php echo $property["title"]; ?></td>
            <td><?php echo $property["description"]; ?></td>
            <td><?php echo $property["price"]; ?></td>
            <td><?php echo $property["location"]; ?></td>
            <td>
               <a href="edit_prop.php?id=<?php echo $property["id"]; ?>">Edit</a>
               <a href="delete_prop.php?id=<?php echo $property["id"]; ?>">Delete</a>
            </td>
         </tr>
      <?php } ?>
   </tbody>
</table>
<!-- Add Property Button -->
<a href="add_properties.php">Add Property</a>

    <a href="logout.php">Logout</a>
</body>
</html>