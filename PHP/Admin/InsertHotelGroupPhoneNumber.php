<!DOCTYPE html>
<?php
	session_start();
	require 'connectToDB.php';
	$Hotel_Group_ID = $Phone_Number = "";
	$error = "";

	if(isset($_GET['Hotel_Group_ID']) && is_numeric($_GET['Hotel_Group_ID']) && $_GET['Hotel_Group_ID'] > 0)
	{		
		
		$Hotel_Group_ID = $_GET['Hotel_Group_ID'];

		$_SESSION['Hotel_Group_ID'] = $Hotel_Group_ID;

		header("Location: InsertHotelGroupPhoneNumber.php#popup1");


	}

	if(isset($_POST['submit']))
	{
		//isset()
		$Phone_Number = isset($_POST['Phone_Number']) ? $_POST['Phone_Number'] : "";
		$Phone_Number = !empty($_POST['Phone_Number']) ? $_POST['Phone_Number'] : "";

		$Hotel_Group_ID = $_SESSION['Hotel_Group_ID'];

		$query = "INSERT INTO `Hotel_Group_Phone_Number` VALUES ('$Hotel_Group_ID', '$Phone_Number')";

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
			<li class = "menu"> <a href = ""> Εισαγωγή στη Βάση Δεδομένων </a> </li>
			<li class = "menu"> <a href = ""> Ενημέρωση της Βάσης Δεδομένων </a></li>
			<li class = "menu"> <a href = ""> Διαγραφή από τη Βάση Δεδομένων </a> </li>
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
				<h2>Please fill the following form to insert a phone number for the specific Hotel Group and press Submit!</h2><br>
				<a class="close" href="index.php"><button type="button" id="delete">X</button></a>
				<div class="content">
					 <form action="InsertHotelGroupPhoneNumber.php" method="post">
	
					 	<label for="Hotel_Group_ID">Hotel Group ID 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Hotel_Group_ID" value="Next Hotel Group's ID is: <?php echo $_SESSION['Hotel_Group_ID'];?>" disabled><br>

						<label for="Phone_Number">Phone Number:</label><br>
						<input  type="tel" name="Phone_Number" placeholder="Hotel Group's Phone_Number..." value="<?php echo $Phone_Number;?>" required><br>

						<button type="submit" name="submit" class="submit" id="submit">Submit</button>
					</form>
					<form method="post" action="index.php" id = "homepageimage">
    					<button type="submit" id = "homepageimage_pointer" ><img src= "home.png" alt="Smiley face" height="33" width="33"></img></button>
					</form>
				</div>
			</div>
		</div>
		
	</body>

</html>








