<!DOCTYPE html>
<?php
	session_start();
	require 'connectToDB.php';
	$Employee_IRS_Number = $Hotel_ID = $Start_Date = $Finish_Date = $Position = "";
	$error = "";

	if(isset($_GET['Hotel_ID']))
	{	

		$Hotel_ID = $_GET['Hotel_ID'];

		$_SESSION['Hotel_ID'] = $Hotel_ID;

		header("Location: InsertWorks.php#popup3");
		
		
	}

	if(isset($_POST['submit']))
	{

		//isset()
		$Employee_IRS_Number = isset($_POST['Employee_IRS_Number']) ? $_POST['Employee_IRS_Number'] : "";
		$Employee_IRS_Number = !empty($_POST['Employee_IRS_Number']) ? $_POST['Employee_IRS_Number'] : "";

		//isset()
		$Start_Date = isset($_POST['Start_Date']) ? $_POST['Start_Date'] : "";
		$Start_Date = !empty($_POST['Start_Date']) ? $_POST['Start_Date'] : "";

		//isset()
		$Position = isset($_POST['Position']) ? $_POST['Position'] : "";
		$Position = !empty($_POST['Position']) ? $_POST['Position'] : "";

		//isset()
		$Finish_Date  = isset($_POST['Finish_Date']) ? $_POST['Finish_Date'] : "";
		$Finish_Date  = !empty($_POST['Finish_Date']) ? $_POST['Finish_Date'] : "";

		$Hotel_ID = $_SESSION['Hotel_ID'];


		if (!is_numeric($Employee_IRS_Number))
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>O Αριθμός Φορολογικού Μητρώου δεν μπορεί να έχει χαρακτήρες<strong>.</div>";
			echo "yes";
		}

		$query = "INSERT INTO `Works` VALUES ('$Employee_IRS_Number','$Hotel_ID','$Start_Date', '$Position', '$Finish_Date')";

	
		if (!mysqli_query($mysql_connection, $query))
		{	
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>$er<strong>. </div>";
			
			$query1 = "SELECT * FROM Works WHERE Employee_IRS_Number = '$Employee_IRS_Number'";

			$result = mysqli_query($mysql_connection,$query1);
			
			
			if ($result == ''){

				header("Location: InsertWorks.php#popup2");
			}
			else{
	
				session_destroy();
				header("Location: InsertWorks.php#popup5");
			}
			
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
				<?php
			    	$result = mysqli_query($mysql_connection,"SELECT * FROM `Hotel`");
			    	
			    ?>
				<h2 style = "font-size:20px;">Choose a Hotel, fill the following form to insert the record in the table of Works and press Submit!</h2><br>
				<a class="close" href="index.php"><button type="button" id="delete">X</button></a>
				<div class="content">

				<nav class="dropdown">
					<button onclick="myFunction()" class="dropbtn">Choose a Hotel for the Employee</button>
				  	<div id="myDropdown" class="dropdown-content show">
					    <input type="text" placeholder="Search..." id="myInput" onkeyup="filterFunction()">
					    	<div id = "scroll">
					    	<?php
					    		echo('<table class = "scroll_list"><tr><th>Hotel ID</th><th>Hotel GroupnID</th><th>Stars</th><th>Number of Rooms</th><th>Street</th><th>Number</th><th>Postal Code</th><th>City</th></tr>');
					    		
						    	while($row = mysqli_fetch_array($result))
								{	

									echo ('<tr><td style="background-color : #808080;"><a href="InsertWorks.php?Hotel_ID=' . $row['Hotel_ID'].'">' . $row['Hotel_ID'] .'</td><td>'. $row['Hotel_Group_ID'] .'</td><td>'. $row['Stars'] .'</td><td>' . $row['Number_Of_Rooms'].'</td><td>'.$row['Street'] .'</td><td>'. $row['Number'] . '</td><td>'  . $row['Postal_Code'] . '</td><td>'  . $row['City'] . '</td><tr>');

								}
								echo('</table>');
							?>
							</div>
				  	</div>
				</nav>

				 	<label for="Hotel_ID">Hotel ID 🔒 </label><br>
					<input type="int" name="Hotel_ID" disabled><br>

					<label for="Employee_IRS_Number">Employee IRS Number</label><br>
					<input type="int" name="Employee_IRS_Number" placeholder="Existing or New Emoployee..." disabled><br>

					<label for="Start_Date">Start Date:</label><br>
					<input type="date" name="Start_Date" placeholder="Employee starts working in..." disabled><br>

					<label for="Finish_Date">Finish Date:</label><br>
					<input type="date" name="Finish_Date" placeholder="Employee finishes working in..." disabled><br>

					<label for="Position">Position:</label><br>
					<input type="text" name="Position" placeholder="Employee's Position..." disabled><br>

					
					<form method="post" action="index.php" id = "homepageimage">
						<button type="submit" id = "homepageimage_pointer" ><img src= "home.png" alt="Smiley face" height="33" width="33"></img></button>
					</form>
				</div>
			</div>
		</div>

		<div id="popup3" class="overlay">
			<div class="popup">
				<div class = "content">
					<h2>Fill the following form to insert the record in the table of Works and press Submit!</h2><br><br><br>
					<a class="close" href="index.php"><button type="button" id="delete"><h2>X</h2></button></a>
						<form  action = "InsertWorks.php" method="post">
						 	
							<label for="Hotel_ID">Hotel ID 🔒 </label><br>
							<input type="int" style = "color:red; opacity:1;" name="Hotel_ID" value="<?php echo $_SESSION['Hotel_ID'];?>" disabled><br>

							<label for="Employee_IRS_Number">Employee IRS Number</label><br>
							<input type="int" name="Employee_IRS_Number" placeholder="Existing or New Emoployee..." required><br>

							<label for="Start_Date">Start Date:</label><br>
							<input type="date" name="Start_Date" placeholder="Employee starts working in..." required><br>

							<label for="Finish_Date">Finish Date:</label><br>
							<input type="date" name="Finish_Date" placeholder="Employee finishes working in..." required><br>

							<label for="Position">Position:</label><br>
							<input type="text" name="Position" placeholder="Employee's Position..." required><br>


							<button type="submit" name="submit" class="submit" id="submit">Submit</button>
						</form>
						<form method="post" action="index.php" class = "homepageimage2">
							<button type="submit" id = "homepageimage_pointer" ><img src= "home.png" alt="Smiley face" height="33" width="33"></img></button>
						</form>
				</div>
			</div>
		</div>
		<div id = "popup2" class="overlay">
			<div class="popup">
				<?php echo $error;?>
				<h2 style = "font-size:18px";>Employee's not existing... Would you like to insert one as a first step? </h2><br>
				<a class="close" href="index.php"><button type="button" id="delete">X</button></a>
				<div class="content">
					4

					<form method="post" action="index.php" id = "homepageimage">
						<button type="submit" id = "homepageimage_pointer" ><img src= "home.png" alt="Smiley face" height="33" width="33"></img></button>
					</form>
		
				</div>

			</div>
		</div>
		<div id = "popup5" class="overlay">
			<div class="popup">
				<?php echo $error;?>
				<h2>Employee is already working... </h2><br>
				<a class="close" href="index.php"><button type="button" id="delete">X</button></a>
				<div class="content">	

				<form method="post" action="index.php" id = "homepageimage">
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








