<?php
// Database connection
$host = 'localhost';
$db = 'test';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $db);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Retrieve the list of employees from the database
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

$employees = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $employees[$row['id']] = $row;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Our agents</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css?2460">
</head>
<body>
<header class="class_1" >
		<div class="class_2" >
			<div class="class_3" >
				<img src="assets/images/letter-v-modern-logo-gradient-color_487879-608.jpg" class="class_4" >
			</div>
            <div class="class_5" >
				<h1  style="" >
					Property
				</h1>
			</div>
			<div onclick="this.parentNode.parentNode.querySelector('section').style.display = 'block'" class="class_6" >
				<i  class="bi bi-list class_7">
				</i>
			</div>
		</div>
		<section onclick="this.style.display = 'none'" class="class_8" >
			<div onclick="event.stopPropagation()" class="class_9" >
				<div class="class_10" >
					<i onclick="this.parentNode.parentNode.parentNode.style.display = 'none'"  class="bi bi-x-lg class_11">
					</i>
				</div>
				<a href="index.php"  class="class_12 item_class_0">
					Home
				</a>
				<a href="properties.php"  class="class_12 item_class_0">
					Properties
				</a>

				<a href="contact.php"  class="class_12 item_class_0">
					Contact us
				</a>
				<a href="ouragents.php"  class="class_12 item_class_0">
					Our Agents
				</a>
				
			</div>
		</section>
	</header>
	<div class="class_70" >
		<h1 class="class_71"  >
			Our Agents
			<br>
		</h1>
		<div class="class_72"  >
			It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
			<br>
		</div>
		<section class="class_73" >
		<?php foreach ($employees as $employee) : ?>
            <div class="class_74">
                <img src="uploads/<?php echo $employee['image']; ?>" class="class_75">
                <h4 class="class_50"><?php echo $employee['name']; ?></h4>
                <div class="class_76"><?php echo $employee['position']; ?></div>
                <div class="class_51"><?php echo $employee['quote']; ?></div>
                <div class="class_77">
                    <i class="bi bi-facebook class_78"></i>
                    <i class="bi bi-twitter class_78"></i>
                    <i class="bi bi-instagram class_78"></i>
                    <i class="bi bi-linkedin class_78"></i>
                </div>
            </div>
        <?php endforeach; ?>
			</div>
			
		</section>
	</div>