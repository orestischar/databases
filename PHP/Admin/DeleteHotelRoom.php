<!DOCTYPE html>

<?php
	session_start();
	
	require 'connectToDB.php';

	$Hotel_ID = $Room_ID = $Capacity = $View = $Expandable = $Repairs_Need = $Price = "";
	$error = "";

	if(isset($_GET['Room_ID']) && isset($_GET['Hotel_ID']))
	{		
		
		$Hotel_ID = $_GET['Hotel_ID'];

		$_SESSION['Hotel_ID'] = $Hotel_ID;

		$Room_ID = $_GET['Room_ID'];

		$_SESSION['Room_ID'] = $Room_ID;

		$query = "SELECT * FROM `Hotel_Room` WHERE Hotel_ID = '$Hotel_ID' AND Room_ID = '$Room_ID'";

		if (!($query_run = mysqli_query($mysql_connection, $query))) {
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'><strong>$er<strong>. </div>";
		}
		else
		{	
			$row = mysqli_fetch_assoc($query_run);
			$Capacity = $row["Capacity"];
			$View  = $row["View"];
			$Expandable = $row["Expandable"];
			$Repairs_Need = $row["Repairs_Need"];
			$Price = $row["Price"];

			$_SESSION['Capacity'] = $Capacity;
			$_SESSION['View'] = $View;
			$_SESSION['Expandable'] = $Expandable;
			$_SESSION['Repairs_Need'] = $Repairs_Need;
			$_SESSION['Price'] = $Price;

			header("Location: DeleteHotelRoom.php#popup2");
		
		}
	}
	

	if(isset($_POST['submit']))
	{
		//isset()
		$Capacity = isset($_POST['Capacity']) ? $_POST['Capacity'] : "";
		$Capacity = !empty($_POST['Capacity']) ? $_POST['Capacity'] : "";

		//isset()
		$View = isset($_POST['View']) ? 1 : 0;

		//isset()
		$Expandable = isset($_POST['Expandable']) ? $_POST['Expandable'] : "";
		$Expandable = !empty($_POST['Expandable']) ? $_POST['Expandable'] : "";

		//isset()
		$Repairs_Need = isset($_POST['Repairs_Need']) ? $_POST['Repairs_Need'] : "";
		$Repairs_Need = !empty($_POST['Repairs_Need']) ? $_POST['Repairs_Need'] : "";

		//isset()
		$Price  = isset($_POST['Price']) ? $_POST['Price'] : "";
		$Price  = !empty($_POST['Price']) ? $_POST['Price'] : "";

		$Hotel_ID = $_SESSION['Hotel_ID'];
		$Room_ID = $_SESSION['Room_ID'];

		$query = "DELETE FROM `Hotel_Room` WHERE Hotel_ID ='$Hotel_ID' AND Room_ID ='$Room_ID'";

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

		
	<div id = "popup2" class="overlay">
		<div class="popup">
			<?php echo $error; ?>
			<h2>Room's amenities will be automatically deleted.</h2><br>
			<a class="close" href="index.php"><button type="button" id="delete">X</button></a>
			<div class="content">
				<form action = "DeleteHotelRoom.php#popup4">
					<button type="submit" name="submit" class="submit" id="submit">OK</button>
				</form>
				<form method="post" action="index.php" id = "homepageimage">
					<button type="submit" id = "homepageimage_pointer" ><img src= "home.png" alt="Smiley face" height="33" width="33"></img></button>
				</form>
			</div>

		</div>
	</div>
	<div id="popup3" class="overlay">
		<div class="popup">
			<?php echo $error;?>
			<?php
		    	$result = mysqli_query($mysql_connection,"SELECT * FROM `Hotel_Room`");
		    	
		    ?>
			<h2>Choose a Hotel Room to kill and press submit to update the chosen row!</h2><br><br><br>
			<a class="close" href="index.php"><button type="button" id="delete"><h2>X</h2></button></a>

			<div class="content">
				<nav class="dropdown">
					<button onclick="myFunction()" class="dropbtn">Choose a Hotel Room to Delete</button>
				  	<div id="myDropdown" class="dropdown-content show">
					    <input type="text" placeholder="Search..." id="myInput" onkeyup="filterFunction()">
					    	<div id = "scroll">
					    	<?php
					    		echo('<table class = "scroll_list"><tr><th>Room ID</th><th>Hotel ID</th><th>Capacity</th><th>View</th><th>Expandable</th><th>Repairs Need</th><th>Price</th></tr>');
					    		
						    	while($row = mysqli_fetch_array($result))
									{	

										echo ('<tr><td style="background-color : #808080;"><a href="DeleteHotelRoom.php?Room_ID=' . $row['Room_ID'].'&Hotel_ID=' . $row['Hotel_ID'].'">' . $row['Room_ID'] .'</td><td style="background-color : #808080;">'. $row['Hotel_ID'] .'</td><td>'. $row['Capacity'] .'</td><td>' . $row['View'].'</td><td>'.$row['Expandable'] .'</td><td>'. $row['Repairs_Need'] . '</td><td>' . $row['Price'] .'</td><tr>'); 

									}
								echo('</table>');


							?>
							</div>
				  	</div>
				</nav>
			
		 		<label for="Room_ID">Room ID 🔒</label><br>
				<input  type="int" name="Room_ID" disabled><br>
			
				<label for="Hotel_ID">Hotel ID 🔒</label><br>
				<input type="int" name="Hotel_ID" disabled><br>

				<label for="Capacity">Capacity 🔒</label><br>
				<input type="int" name="Capacity" disabled><br>

				<label for="View">View 🔒</label><br>
				<input type="checkbox" name="View" disabled><br>

				<label for="Expandable">Expandable 🔒</label><br>
				<input type="text" name="Expandable"  disabled><br>

				<label for="Repairs_Need">Repairs Need 🔒</label><br>
				<input type="text" name="Repairs_Need" disabled><br>

				<label for="Price">Price 🔒</label><br>
				<input type="range" name="Price" value="500" min="7" max="1000" disabled>
				<div>7$  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1000$</div>

				<form method="post" action="index.php" class = "homepageimage1">
    					<button type="submit" id = "homepageimage_pointer" ><img src= "home.png" alt="Smiley face" height="33" width="33"></img></button>
				</form>
			</div>
		</div>
	</div>
	<div id="popup4" class="overlay">
		<div class="popup">
			<div class = "content">
				<h2>Press submit to update the chosen row!</h2><br><br><br>
				<a class="close" href="index.php"><button type="button" id="delete"><h2>X</h2></button></a>
				<form  action = "DeleteHotelRoom.php" method="post">
						<label for="Room_ID">Room ID 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Room_ID" value="<?php echo $_SESSION['Room_ID'];?>" disabled><br>

						<label for="Hotel_ID">Hotel Group ID 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Hotel_ID" value="<?php echo $_SESSION['Hotel_ID'];?>" disabled><br>

						<label for="Capacity">Capacity 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Capacity" value="<?php echo $_SESSION['Capacity'];?>" disabled><br>

						<label for="View">View 🔒</label><br>
						<input style = "color:red; opacity:1;" type="text" name="View" value="<?php echo $_SESSION['View'];?>" disabled><br>

						<label for="Expandable">Expandable 🔒</label><br>
						<input style = "color:red; opacity:1;" type="text" name="Expandable" value="<?php echo $_SESSION['Expandable'];?>" disabled><br>

						<label for="Repairs_Need">Repairs Need 🔒</label><br>
						<input style = "color:red; opacity:1;" type="text" name="Repairs_Need" value="<?php echo $_SESSION['Repairs_Need'];?>" disabled><br>

						<label for="Price">Price 🔒</label><br>
						<b style = "font-size: 25px; " ><output id="range_weight_disp" ><?php echo $_SESSION['Price'];?></output> $</b>
						<input type="range" name="Price" value = "<?php echo $_SESSION['Price'];?>" id="range_weight" disabled>
						<div>7$  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1000$</div>

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


	function newDoc() {
    	window.location.hash='<?php echo $_GET["Hotel_Group_ID"] ?>';
	}

	
	</script>

	</body>

</html>
