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
<section class="class_80" >
		<div class="class_81" >
			<div class="class_82" >
				<form method="post" enctype="multipart/form-data" class="class_83" >
					<h1 class="class_84"  >
						Contact us
						<br >
					</h1>
					<div class="class_85" >
						<label class="class_86"  >
							Name:
						</label>
						<input placeholder="Enter your Name" type="text" name="name" class="class_87" >
					</div>
					<div class="class_85" >
						<label class="class_86"  >
							Email:
						</label>
						<input placeholder="Enter a valid Email" type="email" name="email" class="class_87" >
					</div>
					<div class="class_88" >
						<label class="class_89"  >
							Message:
						</label>
						<textarea placeholder="Enter your Message" name="message" class="class_87" >
						</textarea>
					</div>
					<div class="class_90" >
						<label  >
							<input type="checkbox" name="chec" >
							I accept the terms of service
						</label>
					</div>
					<input type="submit" name="submit" value="SUBMIT" class="class_91"><br><br>
				</form>
			</div>
			<div class="class_82" >
				<h1 class="class_84"  >
					We cant wait to hear from you
					<br >
				</h1>
				<div class="class_92"  >
					It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
				</div>
				<div class="class_92"  >
					The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
					<br >
				</div>
				<button class="class_93"  >
					Details
				</button>
			</div>
		</div>
	</section>
	<section class="class_94" >
		<div class="class_95"  >
			Property Website
			<br>
		</div>
		<div class="class_28"  >
			images&nbsp; by freepik.com
			<br>
		</div>
	</section>
	</body></html>
	<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "test";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Check if the form is submitted
if (isset($_POST["submit"])) {
  
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    
	if(!isset($_POST['chec'])){
		echo "Please Accept the terms of service";
	}
	else{
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		echo "Invalid email address!";
	}
	else{
    $stmt = $conn->prepare("INSERT INTO comments (name, email, message) VALUES (?, ?, ?)");

 
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();

    
    if ($stmt->affected_rows > 0) {
        echo "Comment saved successfully!";
    } else {
        echo "Failed to save comment.";
    }


    $stmt->close();
}
}
}
// Close the connection
$conn->close();
?>