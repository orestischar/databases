<!DOCTYPE html>
<?php
	session_start();
	require 'connectToDB.php';
	$Customer_IRS_Number = $Hotel_ID = $Room_ID = $Rent_ID = $Start_Date = $Finish_Date = $Employee_IRS_Number = "";
	$error = "";

	if(isset($_POST['submit']))
	{
		//isset()
		$Employee_IRS_Number = isset($_POST['Employee_IRS_Number']) ? $_POST['Employee_IRS_Number'] : "";
		$Employee_IRS_Number = !empty($_POST['Employee_IRS_Number']) ? $_POST['Employee_IRS_Number'] : "";

		$Customer_IRS_Number = isset($_POST['Customer_IRS_Number']) ? $_POST['Customer_IRS_Number'] : "";
		$Customer_IRS_Number = !empty($_POST['Customer_IRS_Number']) ? $_POST['Customer_IRS_Number'] : "";

		$Hotel_ID = isset($_POST['Hotel_ID']) ? $_POST['Hotel_ID'] : "";
		$Hotel_ID = !empty($_POST['Hotel_ID']) ? $_POST['Hotel_ID'] : "";

		$Room_ID = isset($_POST['Room_ID']) ? $_POST['Room_ID'] : "";
		$Room_ID = !empty($_POST['Room_ID']) ? $_POST['Room_ID'] : "";

		$Start_Date = isset($_POST['Start_Date']) ? $_POST['Start_Date'] : "";
		$Start_Date = !empty($_POST['Start_Date']) ? $_POST['Start_Date'] : "";

		$Finish_Date = isset($_POST['Finish_Date']) ? $_POST['Finish_Date'] : "";
		$Finish_Date = !empty($_POST['Finish_Date']) ? $_POST['Finish_Date'] : "";


		if (!is_numeric($Employee_IRS_Number))
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>Το ID υπαλλήλου δεν μπορεί να έχει χαρακτήρες<strong>.</div>";
		}
		
		$query = "INSERT INTO `Rents` VALUES (DEFAULT,'$Employee_IRS_Number','$Customer_IRS_Number', '$Room_ID', '$Hotel_ID', '$Start_Date','$Finish_Date')";

	
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

		<div id="popup1" class="overlay">
			<div class="popup">
				<div class = "content">
					<h2>Fill the info for the non-reserved customer and press Submit to confirm the convertion!</h2><br><br><br>
					<a class="close" href="index.php"><button type="button" id="delete"><h2>X</h2></button></a>
						<form  action = "InsertRents.php" method="post">
							<?php 
						 		$query_auto_increment = "SELECT * FROM Rents ORDER BY Rent_ID DESC LIMIT 1";
						 		$result = mysqli_query($mysql_connection,$query_auto_increment);
						 		$row = mysqli_fetch_assoc($result);
								$Rent_ID = $row["Rent_ID"] + 1;
						 	?>

							<label for="Rent_ID">Rent ID 🔒</label><br>
							<input style = "color:red; opacity:1;" type="int" name="Rent ID" value="Next Rent ID is by default: <?php echo $Rent_ID;?>" disabled><br>

						 	<label for="Customer_IRS_Number">Customer IRS Number </label><br>
							<input type="int" name="Customer_IRS_Number" placeholder="Non-Reserved Customer's IRS Number..." value="<?php echo $Customer_IRS_Number;?>" required><br>

						 	<label for="Hotel_ID">Hotel ID </label><br>
							<input type="int" name="Hotel_ID" placeholder="Hotel's ID for Customer's rent..." value="<?php echo $Hotel_ID;?>" required><br>

							<label for="Room_ID">Room ID </label><br>
							<input type="int" name="Room_ID" placeholder="Hotel Room's ID for Customer's rent..." value="<?php echo $Room_ID;?>" required><br>

							<label for="Start_Date">Start Date </label><br>
							<input type="date" name="Start_Date" placeholder="Customer's chek-in date..." value="<?php echo $Start_Date;?>" required<br>

							<label for="Finish_Date">Finish Date </label><br>
							<input type="date" name="Finish_Date" placeholder="Customer's chek-out date..." value="<?php echo $Finish_Date;?>" required><br>

							<label for="Employee_IRS_Number">Employee IRS Number: </label><br>
							<input  type="int" name="Employee_IRS_Number" placeholder="Employee responsible..." value="<?php echo $Employee_IRS_Number;?>" required><br>

							<button type="submit" name="submit" class="submit" id="submit">Submit</button>
						</form>
						<form method="post" action="index.php" class = "homepageimage2">
							<button type="submit" id = "homepageimage_pointer" ><img src= "home.png" alt="Smiley face" height="33" width="33"></img></button>
						</form>
				</div>
			</div>
		</div>
	<script>
	/* When the user clicks on the button,
	toggle between hiding and showing the dropdown content */
	function myFunction() {
	    document.getElementById("myDropdown").classList.toggle("show");
	}

	function filterFunction() {
	    var input, filter, ul, li, a, i;
	    input = document.getElementById("myInput");
	    filter = input.value.toUpperCase();
	    div = document.getElementById("myDropdown");
	    a = div.getElementsByTagName("tr");
	    for (i = 0; i < a.length; i++) {
	        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
	            a[i].style.display = "";
	        } else {
	            a[i].style.display = "none";
	        }
	    }
	}
	$(document).ready(function() {

	    $('.scroll_list tr').click(function() {
	        var href = $(this).find("a").attr("href");
	        if(href) {
	            window.location = href;
	        }
	    });

	});
	
	</script>

	</body>

</html>








