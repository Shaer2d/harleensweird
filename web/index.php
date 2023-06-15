
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

?>


<!-- Link/button to the admin panel -->
<a href="admin_panel.php">Admin Panel</a>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>real estate home page</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css?2460">
	<link rel="stylesheet" type="text/css" href="stles.css">
	<style>
      .property-image {
         width: 200px; /* Set the desired width */
         height: 200px; /* Set the desired height */
         object-fit: cover; /* Maintain the aspect ratio and cover the container */
      }
	 @import url(https://fonts.googleapis.com/css?family=Roboto:400,500);
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css);
*, *:before, *:after {
  box-sizing: border-box;
}

html, body {
  height: 100%;
}

body {
  color: #444;
  font-family: 'Roboto', sans-serif;
  font-size: 1rem;
  line-height: 1.5;
}

.slider {
  height: 100%;
  position: relative;
  overflow: hidden;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-flow: row nowrap;
      -ms-flex-flow: row nowrap;
          flex-flow: row nowrap;
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
      -ms-flex-align: end;
          align-items: flex-end;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
}
.slider__nav {
  width: 12px;
  height: 12px;
  margin: 2rem 12px;
  border-radius: 50%;
  z-index: 10;
  outline: 6px solid #ccc;
  outline-offset: -6px;
  box-shadow: 0 0 0 0 #333, 0 0 0 0 rgba(51, 51, 51, 0);
  cursor: pointer;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
}
.slider__nav:checked {
  -webkit-animation: check 0.4s linear forwards;
          animation: check 0.4s linear forwards;
}
.slider__nav:checked:nth-of-type(1) ~ .slider__inner {
  left: 0%;
}
.slider__nav:checked:nth-of-type(2) ~ .slider__inner {
  left: -100%;
}
.slider__nav:checked:nth-of-type(3) ~ .slider__inner {
  left: -200%;
}
.slider__nav:checked:nth-of-type(4) ~ .slider__inner {
  left: -300%;
}
.slider__inner {
  position: absolute;
  top: 0;
  left: 0;
  width: 400%;
  height: 100%;
  -webkit-transition: left 0.4s;
  transition: left 0.4s;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-flow: row nowrap;
      -ms-flex-flow: row nowrap;
          flex-flow: row nowrap;
}
.slider__contents {
  height: 100%;
  padding: 2rem;
  text-align: center;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 1;
  -webkit-flex: 1;
      -ms-flex: 1;
          flex: 1;
  -webkit-flex-flow: column nowrap;
      -ms-flex-flow: column nowrap;
          flex-flow: column nowrap;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
}
.slider__image {
  font-size: 2.7rem;
      color: #2196F3;
}
.slider__caption {
  font-weight: 500;
  margin: 2rem 0 1rem;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  text-transform: uppercase;
}
.slider__txt {
  color: #999;
  margin-bottom: 3rem;
  max-width: 300px;
}

@-webkit-keyframes check {
  50% {
    outline-color: #333;
    box-shadow: 0 0 0 12px #333, 0 0 0 36px rgba(51, 51, 51, 0.2);
  }
  100% {
    outline-color: #333;
    box-shadow: 0 0 0 0 #333, 0 0 0 0 rgba(51, 51, 51, 0);
  }
}

@keyframes check {
  50% {
    outline-color: #333;
    box-shadow: 0 0 0 12px #333, 0 0 0 36px rgba(51, 51, 51, 0.2);
  }
  100% {
    outline-color: #333;
    box-shadow: 0 0 0 0 #333, 0 0 0 0 rgba(51, 51, 51, 0);
  }
}
   </style>
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
		<div class="class_26" >
	<?php

// Display properties from the database
$sql = "SELECT * FROM properties";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

		echo'<div class="class_25">'. ' <img src="uploads/' . $row['image'] . '">'.'</div>';
        echo '<h2>' . $row['title'] . '</h2>';
        echo '<div class="class_28"  >' . $row['description'] . '</div>';
        echo '<h1 class="class_27"  >Price: $' . $row['price'] . '</h1>';
        echo '<h1 class="class_34"  >Location: ' . $row['location'] . '</h1>';
       
        echo '</div>';
    }
} else {
    echo 'No properties found.';
}
?></div></div></section>

	<div class="class_41" >
		<button  backup="" class="class_42 item_class_2">
			Previous
		</button>
		<button  backup="" class="class_42 item_class_1">
			Next
		</button>
	</div>
	<div class="class_43" >
		<h1 class="class_44"  >
			What our customers say
			<br>
		</h1>	</div>
				<section >
				<section id="container">
    <div id="container">
      
    </div>
	
</section>
		</section>
<div class="slider">
  <input type="radio" name="slider" title="slide1" checked="checked" class="slider__nav"/>
  <input type="radio" name="slider" title="slide2" class="slider__nav"/>
  <input type="radio" name="slider" title="slide3" class="slider__nav"/>
  <input type="radio" name="slider" title="slide4" class="slider__nav"/>
  <div class="slider__inner">
    <div class="slider__contents"><i class="slider__image fa fa-codepen"></i>
      <h2 class="slider__caption">Testimonials</h2>
      <p class="slider__txt"> <?php
        $conn = new mysqli("localhost", "root", "", "test"); // Update with your database credentials
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Retrieve the selected comments with display = 1
        $sql = "SELECT * FROM comments WHERE display = 1";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<blockquote>";
            echo "<h3>" . $row['name'] . "</h3>";
            echo "<p>" . $row['message'] . "</p>";
            echo "</blockquote>";
        }
        $conn->close();
        ?></p>
    </div>
    <div class="slider__contents"><i class="slider__image fa fa-newspaper-o"></i>
      <h2 class="slider__caption">newspaper-o</h2>
      <p class="slider__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cupiditate omnis possimus illo quos, corporis minima!</p>
    </div>
    <div class="slider__contents"><i class="slider__image fa fa-television"></i>
      <h2 class="slider__caption">television</h2>
      <p class="slider__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cupiditate omnis possimus illo quos, corporis minima!</p>
    </div>
    <div class="slider__contents"><i class="slider__image fa fa-diamond"></i>
      <h2 class="slider__caption">diamond</h2>
      <p class="slider__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cupiditate omnis possimus illo quos, corporis minima!</p>
    </div>
  </div>
</div>
	
	


		
	<section class="class_54" >
		<div class="class_55" >
			<i class="bi bi-building-add class_56">
			</i>
			<h4 class="class_57"  >
				New Properties
				<br>
			</h4>
			<div class="class_58"  >
				It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
				<br>
			</div>
			<h1 class="class_59"  >
				Learn More
				<br>
			</h1>
		</div>
		<div class="class_55" >
			<i class="bi bi-people-fill class_56">
			</i>
			<h4 class="class_57"  >
				Our Agents
				<br>
			</h4>
			<div class="class_58"  >
				It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
				<br>
			</div>
			<h1 class="class_59"  ><a href="ouragents.php">
				Learn More
				<br></a>
			</h1>
		</div>
		<div class="class_55" >
			<i class="bi bi-house-up-fill class_56">
			</i>
			<h4 class="class_57"  >
				New Homes
				<br>
			</h4>
			<div class="class_58"  >
				It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
				<br>
			</div>
			<h1 class="class_59"  >
				Learn More
				<br>
			</h1>
		</div>
		<div class="class_55" >
			<i class="bi bi-buildings class_56">
			</i>
			<h4 class="class_57"  >
				Industrial Buildings
				<br>
			</h4>
			<div class="class_58"  >
				It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
				<br>
			</div>
			<h1 class="class_59"  >
				Learn More
				<br>
			</h1>
		</div>
	</section>
	<section class="class_66" >
		<div class="class_67" >
			<h1 class="class_68"  >
				2,500
			</h1>
			<h4 class="class_69"  >
				Properties sold
				<br>
			</h4>
		</div>
		<div class="class_67" >
			<h1 class="class_68"  >
				9,780
			</h1>
			<h4 class="class_69"  >
				Total Properties
				<br>
			</h4>
		</div>
		<div class="class_67" >
			<h1 class="class_68"  >
				500
			</h1>
			<h4 class="class_69"  >
				Agents
				<br>
			</h4>
		</div>
		<div class="class_67" >
			<h1 class="class_68"  >
				6,260
			</h1>
			<h4 class="class_69"  >
				Properties Bought
				<br>
			</h4>
		</div>
	</section>
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
					
					</button>
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
	
</body>
</html>