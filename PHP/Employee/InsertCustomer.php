<!DOCTYPE html>
<?php
	session_start();
	require 'connectToDB.php';
	$Customer_IRS_Number = $Social_Security_Number = $First_Name = $Last_Name =  $First_Registration = $Street = $Number = $Postal_Code = $City = "";
	$error = "";

	if(isset($_POST['submit']))
	{
		//isset()
		$Customer_IRS_Number = isset($_POST['Customer_IRS_Number']) ? $_POST['Customer_IRS_Number'] : "";
		$Customer_IRS_Number = !empty($_POST['Customer_IRS_Number']) ? $_POST['Customer_IRS_Number'] : "";

		//isset()
		$Social_Security_Number = isset($_POST['Social_Security_Number']) ? $_POST['Social_Security_Number'] : "";
		$Social_Security_Number = !empty($_POST['Social_Security_Number']) ? $_POST['Social_Security_Number'] : "";

		//isset()
		$First_Name = isset($_POST['First_Name']) ? $_POST['First_Name'] : "";
		$First_Name = !empty($_POST['First_Name']) ? $_POST['First_Name'] : "";

		//isset()
		$Last_Name = isset($_POST['Last_Name']) ? $_POST['Last_Name'] : "";
		$Last_Name = !empty($_POST['Last_Name']) ? $_POST['Last_Name'] : "";

		//isset()
		$First_Registration = isset($_POST['First_Registration']) ? $_POST['First_Registration'] : "";
		$First_Registration = !empty($_POST['First_Registration']) ? $_POST['First_Registration'] : "";

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

		if (!is_numeric($Customer_IRS_Number))
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>To ID δεν μπορεί να έχει χαρακτήρες<strong>. </div>";
		}	

		if (!is_numeric($Social_Security_Number))
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>O Αριθμός διεύθυνσης δεν μπορεί να έχει χαρακτήρες<strong>.</div>";
		}	

		if (!is_numeric($Postal_Code))
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>Ο Ταχυδρομικός Κώδικας δεν μπορεί να έχει χαρακτήρες<strong>. </div>";
		}

		$query = "INSERT INTO `Customer` VALUES ('$Customer_IRS_Number','$Social_Security_Number','$First_Name','$Last_Name','$First_Registration','$Street','$Number','$Postal_Code','$City')";
	
		if (!mysqli_query($mysql_connection, $query))
		{	
		
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>$er<strong>. </div>";
		}
		else
		{

			mysqli_close($mysql_connection);

			session_destroy();

			header("Location: index.php");
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
				<h2>Please fill the following form to insert a record in the table of Customers and press Submit!</h2><br>
				<a class="close" href="index.php"><button type="button" id="delete">X</button></a>
				<div class="content">
					 <form action="InsertCustomer.php" method="post">
						<label for="Customer_IRS_Number">Customer IRS Number:</label><br>
						<input  type="int"  name="Customer_IRS_Number" placeholder="Customer's IRS Number..." value="<?php echo $Customer_IRS_Number;?>" required><br>

						<label for="Social_Security_Number">Social Security Number:</label><br>
						<input  type="int" name="Social_Security_Number" placeholder="Social Security Number..." value="<?php echo $Social_Security_Number;?>" required><br>

						<label for="First_Name">First Name:</label><br>
						<input  type="text" name="First_Name" placeholder="First Name..." value="<?php echo $First_Name;?>" required><br>

						<label for="Last_Name">Last Name:</label><br>
						<input  type="text"  name="Last_Name" placeholder="Last Name..." value="<?php echo $Last_Name;?>" required><br>

						<label for="First_Registration">First Registration:</label><br>
						<input  type="date" name="First_Registration" placeholder="Customer's First Registration..." value="<?php echo $First_Registration;?>" required><br>

						<label for="Street">Street Name:</label><br>
						<input  type="text" name="Street" placeholder="Customer's Street Address..." value="<?php echo $Street;?>" required><br>

						<label for="Number">Street Number:</label><br>
						<input type="text" name="Number" placeholder="Customer's Street Number..." value="<?php echo $Number;?>" required><br>

						<label for="Postal_Code">Postal Code:</label><br>
						<input type="int" name="Postal_Code" placeholder="Postal Code..." value="<?php echo $Postal_Code;?>" required><br>

						<label for="City">City:</label><br>
						<input type="text" name="City" placeholder="City..." value="<?php echo $City;?>" required><br>

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








