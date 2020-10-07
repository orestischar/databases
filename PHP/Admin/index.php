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
		<link rel="stylesheet" type="text/css" href="style00.css" />
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
					<li> <a href = "InsertHotelGroup.php#popup1"> Hotel Group </a> </li><br>
					<li> <a href = "InsertHotel.php#popup1"> Hotel </a> </li><br>
					<li> <a href = "InsertHotelRoom.php#popup1"> Hotel Room </a> </li><br>
					<li> <a href = "InsertCustomer.php#popup1"> Customer  </a> </li><br>
					<li> <a href = "InsertEmployee.php#popup1"> Employee  </a> </li><br>
					<li> <a href = "InsertReserves.php#popup1"> Reserves</a> </li><br>
					<li> <a href = "InsertRents.php#popup1"> Rents </a> </li><br>
					<li> <a href = "InsertWorks.php#popup1"> Works </a> </li>
			     </ul>
			</li>
				
			<li class = "menu"> <a href = ""> Ενημέρωση της Βάσης Δεδομένων </a> 
				<ul class = "submenu">
                    <li> <a href = "UpdateHotelGroup.php#popup3"> Hotel Group</a> </li><br>
                    <li> <a href = "UpdateHotel.php#popup3"> Hotel </a> </li><br>
                    <li> <a href = "UpdateHotelRoom.php#popup3"> Hotel Room </a> </li><br>
                    <li> <a href = "UpdateCustomer.php#popup3"> Customer </a> </li><br>
                    <li> <a href = "UpdateEmployee.php#popup3"> Employee  </a> </li><br>
                    <li> <a href = "UpdateReserves.php#popup3"> Reserves</a> </li><br>
                    <li> <a href = "UpdateWorks.php#popup3"> Works </a> </li><br>
	             </ul>
			</li>
			<li class = "menu"> <a href = ""> Διαγραφή από τη Βάση Δεδομένων </a> 
			    <ul class = "submenu">
                    <li> <a href = "DeleteHotelGroup.php#popup3"> Hotel Group</a> </li><br>
                    <li> <a href = "DeleteHotel.php#popup3">Hotel </a> </li><br>
                    <li> <a href = "DeleteHotelRoom.php#popup3"> Hotel Room </a> </li><br>
                    <li> <a href = "DeleteCustomer.php#popup3"> Customer </a> </li><br>
                    <li> <a href = "DeleteEmployee.php#popup3"> Employee  </a> </li><br>
                    <li> <a href = "DeleteReserves.php#popup3"> Reserves</a> </li><br>
                    <li> <a href = "DeleteWorks.php#popup3"> Works </a> </li>
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
	</body>
</html>