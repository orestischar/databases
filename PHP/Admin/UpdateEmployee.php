<!DOCTYPE html>

<?php
	session_start();
	require 'connectToDB.php';

	$Employee_IRS_Number = $Social_Security_Number = $First_Name = $Last_Name = $Street = $Number = $Postal_Code = $City = "";
	$error = "";

	if(isset($_GET['Employee_IRS_Number']) && is_numeric($_GET['Employee_IRS_Number']) && $_GET['Employee_IRS_Number'] > 0 && isset($_GET['Social_Security_Number']) && is_numeric($_GET['Social_Security_Number']) && $_GET['Social_Security_Number'] > 0)
	{		
		
		$Employee_IRS_Number = $_GET['Employee_IRS_Number'];

		$_SESSION['Employee_IRS_Number'] = $Employee_IRS_Number;

		$Social_Security_Number = $_GET['Social_Security_Number'];

		$_SESSION['Social_Security_Number'] = $Social_Security_Number;

		$query = "SELECT * FROM `Employee` WHERE Employee_IRS_Number = '$Employee_IRS_Number' AND Social_Security_Number = '$Social_Security_Number'";

		if (!($query_run = mysqli_query($mysql_connection, $query))) {
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'><strong>$er<strong>. </div>";
		}
		else
		{
			$row = mysqli_fetch_assoc($query_run);
			$First_Name = $row["First_Name"];
			$Last_Name = $row["Last_Name"];
			$Street = $row["Street"];
			$Number = $row["Number"];
			$Postal_Code = $row["Postal_Code"];
			$City = $row["City"];
			
			header("Location: UpdateEmployee.php#popup4");
		
		}
	}

	if(isset($_POST['submit']))
	{
		
		$First_Name = isset($_POST['First_Name']) ? $_POST['First_Name'] : "";
		$First_Name = !empty($_POST['First_Name']) ? $_POST['First_Name'] : "";

		//isset()
		$Last_Name = isset($_POST['Last_Name']) ? $_POST['Last_Name'] : "";
		$Last_Name = !empty($_POST['Last_Name']) ? $_POST['Last_Name'] : "";

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

		$Employee_IRS_Number = $_SESSION['Employee_IRS_Number'];
		$Social_Security_Number = $_SESSION['Social_Security_Number'];

		if (!is_numeric($Postal_Code))
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>Ο Ταχυδρομικός Κώδικας δεν μπορεί να έχει χαρακτήρες<strong>. </div>";
		}

		$query = "UPDATE `Employee` SET First_Name='$First_Name', Last_Name='$Last_Name', Street ='$Street', Number ='$Number', Postal_Code='$Postal_Code', City = '$City' WHERE Employee_IRS_Number ='$Employee_IRS_Number' AND Social_Security_Number = '$Social_Security_Number' ";

		if (!mysqli_query($mysql_connection, $query)) {

			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'><strong>$er<strong>.</div>";
		}
		else
		{

			mysqli_close($mysql_connection);

			session_destroy();

			header("Location: index.php");
		}								

	}
	
?>

<!DOCTYPE html>
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
	<div id="popup3" class="overlay">
		<div class="popup">
			<?php echo $error;?>
			<?php
		    	$result = mysqli_query($mysql_connection,"SELECT * FROM `Employee`");
		    	
		    ?>
			<h2>Choose the Employee,fill the following form and press submit to update the chosen row!</h2><br><br><br>
			<a class="close" href="index.php"><button type="button" id="delete"><h2>X</h2></button></a>
			

			<div class="content">
				<nav class="dropdown">
					<button onclick="myFunction()" class="dropbtn">Choose Employee to Update</button>
				  	<div id="myDropdown" class="dropdown-content">
					    <input type="text" placeholder="Search..." id="myInput" onkeyup="filterFunction()">
					    	<div id = "scroll">
					    	<?php
					    		echo('<table class = "scroll_list"><tr><th>Employee IRS Number</th><th>Social Security Number</th><th>First Name</th><th >Last Name</th><th>Street</th><th>Number</th><th>Postal Code</th><th>City</th></tr>');

					    		
						    	while($row = mysqli_fetch_array($result))
								{
									echo ('<tr><td style="background-color : #808080;"><a href="UpdateEmployee.php?Employee_IRS_Number=' . $row['Employee_IRS_Number'] . '&Social_Security_Number=' . $row['Social_Security_Number'].'">' . $row['Employee_IRS_Number'] .'</td><td style="background-color : #808080;">'. $row['Social_Security_Number'] .'</td><td >' . $row['First_Name'] . '</td></a><td>' . $row['Last_Name'] . '</td><td >' . $row['Street'] .'</td><td>'. $row['Number'] . '</td><td >'  . $row['Postal_Code'] . '</td><td>'  . $row['City']. '</td></tr>');

								}
								echo('</table>');



							?>
							</div>
				  	</div>
				</nav>
				
			
					<label for="Employee_IRS_Number">Employee IRS Number 🔒</label><br>
					<input type="int" name="Employee_IRS_Number:"  disabled><br>
					
					<label for="Social_Security_Number">Social Security Number:</label><br>
					<input type="text" name="Social_Security_Number" disabled><br>

					<label for="First_Name">First Name:</label><br>
					<input type="text" name="First_Name" placeholder="Employee's First Name..." disabled><br>

					<label for="Last_Name">Last Name:</label><br>
					<input type="text" name="Last_Name" placeholder="Employee's Last Name..." disabled><br>

					<label for="Street">Street Name:</label><br>
					<input type="text" name="Street" placeholder="Employee's Street Address..." disabled><br>

					<label for="Number">Street Number:</label><br>
					<input type="text" name="Number" placeholder="Employee's Street Number..." disabled><br>

					<label for="Postal_Code">Postal Code:</label><br>
					<input type="int" name="Postal_Code" placeholder="Postal Code..." disabled><br>

					<label for="City">City:</label><br>
					<input type="text" name="City" placeholder="City..." disabled><br>
				
				<form method="post" action="index.php" class = "homepageimage1">
    					<button type="submit" id = "homepageimage_pointer" ><img src= "home.png" alt="Smiley face" height="33" width="33"></img></button>
				</form>
			</div>
		</div>
	</div>
	<div id="popup4" class="overlay">
		<div class="popup">
			<div class = "content">
				<h2>Fill the following form and press submit to update the chosen row!</h2><br><br><br>
				<a class="close" href="index.php"><button type="button" id="delete"><h2>X</h2></button></a>

				<form  action = "UpdateEmployee.php" method="post">
				 		
						<label for="Employee_IRS_Number">Employee IRS Number 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Employee_IRS_Number" value="<?php echo $_SESSION['Employee_IRS_Number'];?>" disabled><br>
						
						<label for="Social_Security_Number">Social Security Number:</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Social_Security_Number" value="<?php echo $_SESSION['Social_Security_Number'];?>" disabled><br>

						<label for="First_Name">First Name:</label><br>
						<input type="text" name="First_Name" placeholder="Employee's First Name...<?php echo $First_Name;?>" required><br>

						<label for="Last_Name">Last Name:</label><br>
						<input type="text" name="Last_Name" placeholder="Employee's Last Name...<?php echo $Last_Name;?>" required><br>

						<label for="Street">Street Name:</label><br>
						<input type="text" name="Street" placeholder="Employee's Street Address...<?php echo $Street;?>" required><br>

						<label for="Number">Street Number:</label><br>
						<input type="text" name="Number" placeholder="Employee's Street Number...<?php echo $Number;?>" required><br>

						<label for="Postal_Code">Postal Code:</label><br>
						<input type="int" name="Postal_Code" placeholder="Postal Code...<?php echo $Postal_Code;?>" required><br>

						<label for="City">City:</label><br>
						<input type="text" name="City" placeholder="City...<?php echo $City;?>" required><br>

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
