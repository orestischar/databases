<!DOCTYPE html>
<?php
	session_start();
	require 'connectToDB.php';
	$Hotel_Group_ID = $Number_Of_Hotels = $Street = $Number = $Postal_Code = $City = "";
	$error = "";

	if(isset($_POST['submit']))
	{
		//isset()
		$Hotel_Group_ID = isset($_POST['Hotel_Group_ID']) ? $_POST['Hotel_Group_ID'] : "";
		$Hotel_Group_ID = !empty($_POST['Hotel_Group_ID']) ? $_POST['Hotel_Group_ID'] : "";

		//isset()
		$Number_Of_Hotels = isset($_POST['Number_Of_Hotels']) ? $_POST['Number_Of_Hotels'] : "";
		$Number_Of_Hotels = !empty($_POST['Number_Of_Hotels']) ? $_POST['Number_Of_Hotels'] : 0;

		//isset()
		$Street = isset($_POST['Street']) ? $_POST['Street'] : "";
		$Street = !empty($_POST['Street']) ? $_POST['Street'] : "";

		//isset()
		$Number = isset($_POST['Number']) ? $_POST['Number'] : "";
		$Number = !empty($_POST['Number']) ? $_POST['Number'] : "";

		//isset()
		$Postal_Code  = isset($_POST['Postal_Code']) ? $_POST['Postal_Code'] : "";
		$Postal_Code  = !empty($_POST['Postal_Code']) ? $_POST['Postal_Code'] : "";

		//isset()
		$City = isset($_POST['City']) ? $_POST['City'] : "";
		$City = !empty($_POST['City']) ? $_POST['City'] : "";

		

		if (!is_numeric($Hotel_Group_ID))
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>To ID δεν μπορεί να έχει χαρακτήρες<strong>. </div>";
		}	

		if (!is_numeric($Number_Of_Hotels))
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>O Αριθμός ξενοδοχείων δεν μπορεί να έχει χαρακτήρες<strong>.</div>";
		}	

		if (!is_numeric($Postal_Code))
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>Ο Ταχυδρομικός Κώδικας δεν μπορεί να έχει χαρακτήρες<strong>. </div>";
		}


		$query = "INSERT INTO `Hotel_Group` VALUES (DEFAULT, '$Number_Of_Hotels', '$Street', '$Number', '$Postal_Code', '$City')";
		if (!mysqli_query($mysql_connection, $query))
		{	
			
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>$er<strong>. </div>";
		}
		else
		{	

			mysqli_close($mysql_connection);

			session_destroy();

			header("Location: InsertHotelGroup.php#popup2");
		}
	}
?>

<!DOCTYPE html>
<?php
?>
<html>
	<head>
		<title> Project in Databases Course, Spring 2017-2018</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8;" />
		<meta name="Author" content="Georgiou Dimitrios, Chardouvelis Orestis, Eleftheriou Sofia" />
		<meta name="description" content="The main menu page for the project" />
		<meta name="keywords" content="project, databases" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="style2.css" />
    </head>
	<body>
	<?php require 'connectToDB.php'; ?>
		<div class = "header-layer">
			<h1> Επιχειρησιακή Βάση Δεδομένων για την εταιρεία HO-HOteleies Services </h1>
			<h2 style="text-align:center"> <em> Welcome to our Database! <em>Insert, Delete and Update Database as you wish </h2>
			<div class="typewriter"><h2> Κεντρικό μενού επιλογών </h2></div>
		</div>
		<ul class = "pre-medium-layer">
			<li class = "menu"> <a href = ""> Εισαγωγή στη Βάση Δεδομένων </a> 
			     <ul class = "submenu">
			     </ul>
			</li>
			
			<li class = "menu"> <a href = ""> Ενημέρωση της Βάσης Δεδομένων </a> 
				<ul class = "submenu">
	             </ul>
			</li>
			<li class = "menu"> <a href = ""> Διαγραφή από τη Βάση Δεδομένων </a> 
			    <ul class = "submenu">
	            </ul>
			</li>
		</ul>
		<div class="medium-layer">
			<img src= "ho_ho.jpg" class = "image"></img>
				<div class="infos">
					<strong><p></p>
					<p></p>
					<p></p>
					<p></p>
					<h2 style="text-align:center">Εξαμηνιαία εργασία</h2>
					<p>National Technical University of Athens</p>
					<p>School of Electrical & Computer Engineering</p>
					<p><u>Course</u>: Databases </p>
					<p><u>Database Project</u></p>
					<ul class ="ul-names">
						<li class="li-names">Georgiou Dimitrios 03115106</li>
						<li class="li-names">Chardouvelis Georgios-Orestis 03115100</li>
						<li class="li-names">Eleftheriou Sofia 03114795</li>
					</ul>
					<p>TEAM 99</p>
					<p><p></strong>
				</div>
		</div>
		<div class ="bottom-layer">
			<p>&copy; Η παρούσα ιστοσελίδα αποτελεί εξαμηνιαία εργασία για το μάθημα <strong>Βάσεις Δεδομένων</strong> του <strong>6ου Εξαμήνου</strong> της σχολής ΣΗΜΜΥ του Εθνικού Μετσοβίου Πολυτεχνείου για το έτος <strong>2017-2018</strong>.<br><br>
			</p>
		</div>
		<div id = "popup1" class="overlay">
			<div class="popup">
				<?php echo $error;?>
				<h2>Please fill the following form to insert a record in the table of Hotel Groups and press Submit!</h2><br>
				<a class="close" href="index.php"><button type="button" id="delete">X</button></a>
				<div class="content">
					 <form action="InsertHotelGroup.php" method="post">
					 	<?php 

					 		$query_auto_increment = "SELECT * FROM Hotel_Group ORDER BY Hotel_Group_ID DESC LIMIT 1";
					 		$result = mysqli_query($mysql_connection,$query_auto_increment);
					 		$row = mysqli_fetch_assoc($result);
							$Hotel_Group_ID = $row["Hotel_Group_ID"] + 1;
					 	?>
					 	<label for="Hotel_Group_ID">Hotel Group ID</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Hotel_Group_ID" value="Next Hotel Group's ID is: <?php echo $Hotel_Group_ID;?>" disabled><br>

						<label for="Number_Of_Hotels">Number of Hotels 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Number_Of_Hotels" value = 0 disabled=""><br>

						<label for="Street">Street Name:</label><br>
						<input  type="text" name="Street" placeholder="Hotel Gropup's Street Address..." value="<?php echo $Street;?>"<br>

						<label for="Number">Street Number:</label><br>
						<input type="text" name="Number" placeholder="Hotel Group's Street Number..." value="<?php echo $Number;?>"><br>

						<label for="Postal_Code">Postal Code:</label><br>
						<input type="int" name="Postal_Code" placeholder="Postal Code..." value="<?php echo $Postal_Code;?>"><br>

						<label for="City">City:</label><br>
						<input type="text" name="City" placeholder="City..." value="<?php echo $City;?>"><br>

						<button type="submit" name="submit" class="submit" id="submit">Submit</button>
					</form>
					<form method="post" action="index.php" id = "homepageimage">
    					<button type="submit" id = "homepageimage_pointer" ><img src= "home.png" alt="Smiley face" height="33" width="33"></img></button>
					</form>
				</div>
			</div>
		</div>
		<div id = "popup2" class="overlay">
			<div class="popup">
				<?php echo $error;?>
				<h2>Do you want to insert email address or phone number?</h2><br>
				<a class="close" href="index.php"><button type="button" id="delete">X</button></a>
				<div class="content">
					<?php 

				 		$query_auto_increment = "SELECT * FROM Hotel_Group ORDER BY Hotel_Group_ID DESC LIMIT 1";
				 		$result = mysqli_query($mysql_connection,$query_auto_increment);
				 		$row = mysqli_fetch_assoc($result);
						$Hotel_Group_ID = $row["Hotel_Group_ID"];
					?>
					<a href="InsertHotelGroupEmailAddress.php?Hotel_Group_ID=<?php echo $Hotel_Group_ID;?>"><button type="submit" name="Email_Address" class="submit blue" id="H_Email_Address">Insert Email</button></a>
					<a href="InsertHotelGroupPhoneNumber.php?Hotel_Group_ID=<?php echo $Hotel_Group_ID;?>"><button type="submit" name="Phone_Number" class="submit blue" id="H_Phone_Number">Insert Phone</button></a>
					<form method="post" action="index.php" id = "homepageimage">
    					<button type="submit" id = "homepageimage_pointer" ><img src= "home.png" alt="Smiley face" height="33" width="33"></img></button>
					</form>
		
				</div>

			</div>
		</div>
		
	</body>

</html>








