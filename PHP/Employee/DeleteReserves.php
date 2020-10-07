<!DOCTYPE html>

<?php
	session_start();
	require 'connectToDB.php';

	$Customer_IRS_Number = $Hotel_ID = $Room_ID = $Start_Date = $Finish_Date = $Paid = "";
	$error = "";

	if(isset($_GET['Hotel_ID']) && isset($_GET['Customer_IRS_Number']) && isset($_GET['Room_ID']))
	{	
		
		$Customer_IRS_Number = $_GET['Customer_IRS_Number'];
		$_SESSION['Customer_IRS_Number'] = $Customer_IRS_Number;

		
		$Hotel_ID = $_GET['Hotel_ID'];
		$_SESSION['Hotel_ID'] = $Hotel_ID;


		$Room_ID = $_GET['Room_ID'];
		$_SESSION['Room_ID'] = $Room_ID;


		$query = "SELECT * FROM `Reserves` WHERE Customer_IRS_Number = '$Customer_IRS_Number' AND Hotel_ID = '$Hotel_ID' AND Room_ID = '$Room_ID'";


		if (!($query_run = mysqli_query($mysql_connection, $query))) {
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'><strong>$er<strong>. </div>";
		}
		else
		{	
			$row = mysqli_fetch_assoc($query_run);
			$Start_Date = $row["Start_Date"];
			$Finish_Date = $row["Finish_Date"];
			$Paid = $row["Paid"];

			$_SESSION['Start_Date'] = $Start_Date;
			$_SESSION['Finish_Date'] = $Finish_Date;
			$_SESSION['Paid'] = $Paid;

			header("Location: DeleteReserves.php#popup4");
		
		}
	}

	if(isset($_POST['submit']))
	{	
	
		//isset()
		$Start_Date  = isset($_POST['Start_Date']) ? $_POST['Start_Date'] : "";
		$Start_Date  = !empty($_POST['Start_Date']) ? $_POST['Start_Date'] : 

		//isset()
		$Finish_Date  = isset($_POST['Finish_Date']) ? $_POST['Finish_Date'] : "";
		$Finish_Date  = !empty($_POST['Finish_Date']) ? $_POST['Finish_Date'] : "";

		//isset()
		$Paid = isset($_POST['Paid']) ? 1 : 0;

		$Hotel_ID = $_SESSION['Hotel_ID'];
		$Room_ID = $_SESSION['Room_ID'];
		$Customer_IRS_Number = $_SESSION['Customer_IRS_Number'];

		$query = "DELETE FROM `Reserves` WHERE Customer_IRS_Number = '$Customer_IRS_Number' AND Hotel_ID ='$Hotel_ID' AND Room_ID ='$Room_ID' ";

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
	<div id="popup3" class="overlay">
		<div class="popup">
			<?php echo $error;?>
			<?php
			    	$result = mysqli_query($mysql_connection,"SELECT * FROM Customer c, Reserves r WHERE c.Customer_IRS_Number = r.Customer_IRS_Number");

			?>
			<h2 style = "font-size: 20px;">Choose Customer,Hotel and Room,kill the corresponding reservation and press submit to update the row!</h2><br><br><br>
			<a class="close" href="index.php"><button type="button" id="delete"><h2>X</h2></button></a>

			<div class="content">
				<nav class="dropdown">
					<button onclick="myFunction()" class="dropbtn">Choose Customer, Hotel and Room</button>
				  	<div id="myDropdown" class="dropdown-content show">
					    <input type="text" placeholder="Search..." id="myInput" onkeyup="filterFunction()">
					    	<div id = "scroll">
					    	<?php
					    		echo('<table class = "scroll_list"><tr><th>Customer IRS Number</th><th>Hotel ID</th><th>Room ID</th><th>First Name</th><th>Last Name</th><th>Start Date</th><th>Finish Date</th></tr>');
					    		
						    	while($row = mysqli_fetch_array($result))
								{	

									echo ('<tr><td style="background-color : #808080;"><a href="DeleteReserves.php?Customer_IRS_Number=' . $row['Customer_IRS_Number'].'&Hotel_ID=' . $row['Hotel_ID']. '&Room_ID=' . $row['Room_ID'] . '">' . $row['Customer_IRS_Number'] . '</td><td style="background-color : #808080;">' .$row['Hotel_ID'] . '</td><td style="background-color : #808080;">'. $row['Room_ID'] . '</td><td>'. $row['First_Name'] .'</td><td>'. $row['Last_Name'] .'</td><td>' . $row['Start_Date'] .'</td><td>'. $row['Finish_Date'] . '</td><tr>');

								}
								echo('</table>');

							?>
							</div>
				  	</div>
				</nav>
			
				<label for="Customer_IRS_Number">Customer IRS Number 🔒</label><br>
				<input  type="int" name="Customer_IRS_Number" disabled><br>

			 	<label for="Hotel_ID">Hotel ID 🔒</label><br>
				<input type="int" name="Hotel_ID" disabled><br>

				<label for="Room_ID">Room ID 🔒</label><br>
				<input type="int" name="Room_ID" disabled><br>

				<label for="Start_Date">Start Date 🔒</label><br>
				<input type="date" name="Start_Date" disabled><br>

				<label for="Finish_Date">Finish Date 🔒</label><br>
				<input type="date" name="Finish_Date" disabled><br>

				<label for="Paid">Paid 🔒</label><br>
				<input  type="checkbox" name="Paid" disabled><br>


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

				<form  action = "DeleteReserves.php" method="post">

						<label for="Customer_IRS_Number">Customer IRS Number 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Customer_IRS_Number" value="<?php echo $_SESSION['Customer_IRS_Number'];?>" disabled><br>

				 		<label for="Hotel_ID">Hotel ID 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Hotel_ID" value="<?php echo $_SESSION['Hotel_ID'];?>" disabled><br>

						<label for="Room_ID">Room ID 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Room_ID" value="<?php echo $_SESSION['Room_ID'];?>" disabled><br>

						<label for="Start_Date">Start Date 🔒</label><br>
						<input style = "color:red; opacity:1;" type="date" name="Start_Date" value="<?php echo $_SESSION['Start_Date'];?>" disabled><br>

						<label for="Finish_Date">Finish Date 🔒</label><br>
						<input style = "color:red; opacity:1;" type="date" name="Finish_Date" value="<?php echo $_SESSION['Finish_Date'];?>" disabled><br>

						<label for="Paid">Paid 🔒</label><br>
						<input style = "color:red; opacity:1;" type="text" name="Paid" value="<?php echo $_SESSION['Paid'];?>" disabled><br>

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
