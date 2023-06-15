<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>real estate home page</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css?2460">
	<link rel="stylesheet" type="text/css" href="stles.css">

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
				<a href="#"  class="class_12 item_class_0">
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
<section class="class_13" >
		<section class="class_14" >
			<div class="class_15" >
				<h1 class="class_16"  >
					Let's help you find your dream home
					<br>
				</h1>
				<div class="class_17" >
					<input placeholder="Search by City or Zip code" type="text" name="search" class="class_18" >
					<button class="class_19"  >
						Search
					</button>
				</div>
			</div>
		</section>
	</section>
	<div class="class_20" >
		<h1 class="class_21"  >
			Popular Properties
			<br>
		</h1>
		<button class="class_22"  >
			More
		</button>
	</div>
	<section class="class_23" >
		<div class="class_24" >
			<img src="assets/images/3d-rendering-loft-luxury-living-room-with-shelf-near-dining-table-counter_105762-2105.jpg" class="class_25" >
			<div class="class_26" >
				<h1 class="class_27"  >
					$1,200,000
				</h1>
				<div class="class_28"  >
					54647 Avenue NY 3000, Lake road
					<br>
				</div>
				<div class="class_29" >
					<div class="class_30" >
						<i class="bi bi-truck-flatbed class_31">
						</i>
						<div class="class_28"  >
							2 Beds
							<br>
						</div>
					</div>
					<div class="class_30" >
						<i class="bi bi-projector-fill class_31">
						</i>
						<div class="class_28"  >
							4 Baths
							<br>
						</div>
					</div>
				</div>
				<h1 class="class_34"  >
					New York, USA
					<br>
				</h1>
				<button class="class_22"  >
					Details
				</button>
			</div>
		</div>
		<div class="class_24" >
			<img src="assets/images/3d-electric-car-building_23-2148972401.jpg" class="class_25" >
			<div class="class_26" >
				<h1 class="class_27"  >
					$1,200,000
				</h1>
				<div class="class_28"  >
					54647 Avenue NY 3000, Lake road
					<br>
				</div>
				<div class="class_29" >
					<div class="class_30" >
						<i class="bi bi-truck-flatbed class_31">
						</i>
						<div class="class_28"  >
							2 Beds
							<br>
						</div>
					</div>
					<div class="class_30" >
						<i class="bi bi-projector-fill class_31">
						</i>
						<div class="class_28"  >
							4 Baths
							<br>
						</div>
					</div>
				</div>
				<h1 class="class_34"  >
					New York, USA
					<br>
				</h1>
				<button class="class_22"  >
					Details
				</button>
			</div>
		</div>
		<div class="class_24" >
			<img src="assets/images/3d-rendering-scandinavian-vintage-modern-kitchen-with-dining-area_105762-2192.jpg" class="class_25" >
			<div class="class_26" >
				<h1 class="class_27"  >
					$1,200,000
				</h1>
				<div class="class_28"  >
					54647 Avenue NY 3000, Lake road
					<br>
				</div>
				<div class="class_29" >
					<div class="class_30" >
						<i class="bi bi-truck-flatbed class_31">
						</i>
						<div class="class_28"  >
							2 Beds
							<br>
						</div>
					</div>
					<div class="class_30" >
						<i class="bi bi-projector-fill class_31">
						</i>
						<div class="class_28"  >
							4 Baths
							<br>
						</div>
					</div>
				</div>
				<h1 class="class_34"  >
					New York, USA
					<br>
				</h1>
				<button class="class_22"  >
					Details
				</button>
			</div>
		</div>
	</section>
	<div class="class_41" >
		<button  backup="" class="class_42 item_class_2">
			Previous
		</button>
		<button  backup="" class="class_42 item_class_1">
			Next
		</button>
	</div><section class="class_94" >
		<div class="class_95"  >
			Property Website
			<br>
		</div>
		<div class="class_28"  >
			images&nbsp; by freepik.com
			<br>
		</div>
	</section>
	<?php
$host = "localhost"; // Replace with your MySQL host
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "test"; // Replace with your MySQL database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Prepare the SQL statement
	if(!isset($_POST['chec'])){
		echo "Please Accept the terms of service";
	}
	else{
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		echo "Invalid email address!";
	}
	else{
    $stmt = $conn->prepare("INSERT INTO comments (name, email, message) VALUES (?, ?, ?)");

    // Bind the parameters and execute the statement
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();

    // Check if the comment is saved successfully
    if ($stmt->affected_rows > 0) {
        echo "Comment saved successfully!";
    } else {
        echo "Failed to save comment.";
    }

    // Close the statement
    $stmt->close();
}
}
}
// Close the connection
$conn->close();
?>
</body>
</html>