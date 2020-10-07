<!DOCTYPE html>
<?php
	session_start();
	require 'connectToDB.php';
	$Employee_IRS_Number = $Hotel_ID = $Start_Date = $Finish_Date = $Position = "";
	$error = "";

	if(isset($_GET['Employee_IRS_Number']))
	{	

		$Employee_IRS_Number = $_GET['Employee_IRS_Number'];

		$_SESSION['Employee_IRS_Number'] = $Employee_IRS_Number;

		$query = "SELECT * FROM `Works` WHERE Employee_IRS_Number = '$Employee_IRS_Number'";	

		if (!($query_run = mysqli_query($mysql_connection, $query))) {
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'><strong>$er<strong>. </div>";
		}
		else
		{
			$row = mysqli_fetch_assoc($query_run);
			$Hotel_ID = $row["Hotel_ID"];
			$Start_Date = $row["Start_Date"];
			$Finish_Date = $row["Finish_Date"];
			$Position = $row["Position"];
			
			header("Location: UpdateWorks.php#popup4");
		
		}
		
		
	}

	if(isset($_POST['submit']))
	{

		//isset()
		$Hotel_ID = isset($_POST['Hotel_ID']) ? $_POST['Hotel_ID'] : "";

		//isset()
		$Start_Date = isset($_POST['Start_Date']) ? $_POST['Start_Date'] : "";

		//isset()
		$Finish_Date = isset($_POST['Finish_Date']) ? $_POST['Finish_Date'] : "";

		//isset()
		$Position  = isset($_POST['Position']) ? $_POST['Position'] : "";
		
		$Employee_IRS_Number = $_SESSION['Employee_IRS_Number'];


		if (!is_numeric($Hotel_ID))
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>To ID των ξενοδοχείων δεν μπορεί να έχει χαρακτήρες<strong>.</div>";
			echo "yes";
		}

		
		$query = "UPDATE `Works` SET Hotel_ID='$Hotel_ID', Start_Date='$Start_Date', Finish_Date ='$Finish_Date', Position ='$Position' WHERE Employee_IRS_Number ='$Employee_IRS_Number'";

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

		<div id = "popup3" class="overlay">
			<div class="popup">
				<?php echo $error;?>
				<?php
			    	$result = mysqli_query($mysql_connection,"SELECT * FROM `Works`");
			    ?>
				<h2 style = "font-size:20px;">Choose an Employee, fill the following form and press submit to update the chosen row!</h2><br>
				<a class="close" href="index.php"><button type="button" id="delete">X</button></a>
				<div class="content">

				<nav class="dropdown">
					<button onclick="myFunction()" class="dropbtn">Choose an Employee to update his/her work</button>
				  	<div id="myDropdown" class="dropdown-content show">
					    <input type="text" placeholder="Search..." id="myInput" onkeyup="filterFunction()">
					    	<div id = "scroll">
					    	<?php
					    		echo('<table class = "scroll_list"><tr><th>Employee IRS Number</th><th>Hotel ID</th><th>Position</th><th>Start Date</th><th>Finish Date</th></tr>');
					    		
						    	while($row = mysqli_fetch_array($result))
								{
									echo ('<tr><td style="background-color : #808080;"><a href="UpdateWorks.php?Employee_IRS_Number=' . $row['Employee_IRS_Number'].'">' . $row['Employee_IRS_Number'] .'</td><td>' . $row['Hotel_ID'] .'</td><td>'. $row['Position'] . '</td><td>'  . $row['Start_Date'] . '</td><td>'  . $row['Finish_Date'] . '</td></tr>');

								}
								echo('</table>');
							?>
							</div>
				  	</div>
				</nav>

					<label for="Employee_IRS_Number">Employee IRS Number🔒</label><br>
					<input type="int" name="Employee_IRS_Number" placeholder="Existing or New Emoployee..." disabled><br>

				 	<label for="Hotel_ID">Hotel ID: </label><br>
					<input type="int" name="Hotel_ID" placeholder="Hotel in which Employee works/will work" disabled><br>

					<label for="Start_Date">Start Date:</label><br>
					<input type="date" name="Start_Date" placeholder="New position's Starting Date..." disabled><br>

					<label for="Finish_Date">Finish Date:</label><br>
					<input type="date" name="Finish_Date" placeholder="(New) Position's Starting Date......" disabled><br>

					<label for="Position">Position:</label><br>
					<input type="text" name="Position" placeholder="Employee's (new)Position..." disabled><br>

					
					<form method="post" action="index.php" id = "homepageimage">
						<button type="submit" id = "homepageimage_pointer" ><img src= "home.png" alt="Smiley face" height="33" width="33"></img></button>
					</form>
				</div>
			</div>
		</div>

		<div id="popup4" class="overlay">
			<div class="popup">
				<div class = "content">
					<h2>Fill the following form to insert the record in the table of Works and press Submit!</h2><br><br><br>
					<a class="close" href="index.php"><button type="button" id="delete"><h2>X</h2></button></a>
						<form  action = "UpdateWorks.php" method="post">

							<label for="Employee_IRS_Number">Employee IRS Number 🔒</label><br>
							<input type="int" style = "color:red; opacity:1;"  name="Employee_IRS_Number"  value="<?php echo $_SESSION['Employee_IRS_Number'];?>" required><br>

							<label for="Hotel_ID">Hotel ID: </label><br>
							<input type="int" name="Hotel_ID" placeholder="Hotel in which Employee works/will work" required><br>

							<label for="Start_Date">Start Date:</label><br>
							<input type="date" name="Start_Date" placeholder="New position's Starting Date..." required><br>

							<label for="Finish_Date">Finish Date:</label><br>
							<input type="date" name="Finish_Date" placeholder="(New) Position's Starting Date......" required><br>

							<label for="Position">Position:</label><br>
							<input type="text" name="Position" placeholder="Employee's (new)Position..." required><br>

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








