<!DOCTYPE html>
<?php
	session_start();
	require 'connectToDB.php';
	$Hotel_Group_ID = $Hotel_ID = $Stars = $Room_ID = $Capacity = $City = $Price = $Amenities =  $Customer_IRS_Number = "";

	$arrival_date = $departure_date = -1;
	$error = "";

	if(isset($_GET['Hotel_Group_ID']) && isset($_GET['Hotel_ID']) && isset($_GET['Stars']) && isset($_GET['Room_ID']) && isset($_GET['Capacity']) && isset($_GET['City']) && isset($_GET['Price']) && isset($_GET['Amenities']))
	{	
		$Hotel_Group_ID = $_GET['Hotel_Group_ID'];
		$_SESSION['Hotel_Group_ID'] = $Hotel_Group_ID;
		
		$Hotel_ID = $_GET['Hotel_ID'];
		$_SESSION['Hotel_ID'] = $Hotel_ID;

		$Stars = $_GET['Stars'];
		$_SESSION['Stars'] = $Stars;

		$Room_ID = $_GET['Room_ID'];
		$_SESSION['Room_ID'] = $Room_ID;
		
		$Hotel_ID = $_GET['Hotel_ID'];
		$_SESSION['Hotel_ID'] = $Hotel_ID;

		$Capacity = $_GET['Capacity'];
		$_SESSION['Capacity'] = $Capacity;

		$City = $_GET['City'];
		$_SESSION['City'] = $City;

		$Price = $_GET['Price'];
		$_SESSION['Price'] = $Price;

		$Amenities = $_GET['Amenities'];
		$_SESSION['Amenities'] = $Amenities;

		header("Location: Customer_Reservation.php#popup4");
		
	}

	if(isset($_POST['submit']))
	{
		
		$Customer_IRS_Number = isset($_POST['Customer_IRS_Number']) ? $_POST['Customer_IRS_Number'] :"";
		$Customer_IRS_Number = !empty($_POST['Customer_IRS_Number']) ? $_POST['Customer_IRS_Number'] : "";


		$arrival_date = isset($_POST['arrival_date']) ? $_POST['arrival_date'] :"";
		$departure_date = isset($_POST['departure_date']) ? $_POST['departure_date'] :"";

		$_SESSION['arrival_date'] = $arrival_date;
		$_SESSION['departure_date'] = $departure_date;
		$_SESSION['Customer_IRS_Number'] = $Customer_IRS_Number;
		$Hotel_ID = $_SESSION['Hotel_ID'];
		$Room_ID  = $_SESSION['Room_ID'];
		$Paid = 0;

		if (!is_numeric($Customer_IRS_Number))
		{
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>Ο αριθμός μητρώου δεν μπορεί να έχει χαρακτήρες<strong>.</div>";
		}
		$query = "SELECT * FROM `Customer` WHERE Customer_IRS_Number = '$Customer_IRS_Number'";

		if (!mysqli_query($mysql_connection, $query)) {
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'><strong>$er<strong>.</div>";
			header("Location: Customer_Reservation.php#popup2");
		}
		else
		{	
			$query3 = "INSERT INTO `Reserves` VALUES ('$Room_ID','$Hotel_ID','$Customer_IRS_Number', '$arrival_date', '$departure_date', '$Paid')";
			if (!mysqli_query($mysql_connection, $query3))
			{	
				$er = mysqli_error($mysql_connection);
				$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>$er<strong>. </div>";
			}
			else
			{	
				mysqli_close($mysql_connection);
				session_destroy();
				header("Location: Customer.php");
			}
			
		}
	}
	else if(isset($_POST['submit1']) ){

		$Hotel_ID = $_SESSION['Hotel_ID'];
		$Room_ID  = $_SESSION['Room_ID'];
		$Customer_IRS_Number = $_SESSION['Customer_IRS_Number'];
		$Start_Date = $_SESSION['arrival_date'];
		$Finish_Date = $_SESSION['departure_date'];
		$Paid = 0;

		$query3 = "INSERT INTO `Reserves` VALUES ('$Room_ID','$Hotel_ID','$Customer_IRS_Number', '$Start_Date', '$Finish_Date', '$Paid')";

		if (!mysqli_query($mysql_connection, $query3))
		{	
			$er = mysqli_error($mysql_connection);
			$error = "<div class='alert alert-danger alert-dismissable fade in'> <strong>$er<strong>. </div>";
		}
		else
		{	
			mysqli_close($mysql_connection);
			session_destroy();
			header("Location: Customer.php");
		}
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title> Κάνε κράτηση τώρα </title>
	    <link rel="stylesheet" href="new1.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="dist/pickmeup.min.js"></script>
		<script type="text/javascript" src="dist/handleCounter.js"></script>
		<script type="text/javascript" src="dist/jquery.scrollUp.js"></script>
		<script type="text/javascript" src="dist/demo.js"></script>
	</head>
	<body>
		<section class="tm-main">
			<h2 style="text-align:center"><a href="/club/">HO-<span>HO</span>teleies</a></h2>
			<p>Booking</p>
		</section>
    
    	<img src= "eikona.jpg" class = "image"></img>
		
		<section class="tm-booking">

		<form>
 			<br><br><br>
			<div class="tm-form1">
			<input type="number" name="Capacity" placeholder="Capacity"> <br></br> 
			<input type="text" name="Location" placeholder="Location"> <br></br>
			<input type="number" name="Hotel_Group_ID" placeholder="Hotel_Group"> 
			<br>
			<br>
			
			
			<label>Παροχές</label><br>
			<div class="label1">
				<input type="checkbox" name="A1" value="Ψυγείο">  Ψυγείο<br>
				<input type="checkbox" name="A2" value="Τηλεόραση"> Τηλεόραση<br>
				<input type="checkbox" name="A3" value="Κλιματισμός"> Κλιματισμός<br>
				<input type="checkbox" name="A4" value="Τζακούζι"> Τζακούζι<br>
				<input type="checkbox" name="A5" value="Υδρομασάζ"> Υδρομασάζ<br> 
			</div>

			<div class="tm-num1" id="handleCounter1">    
	   			<label for="number1" style = "font-size:25px; float: center;" >Total number of rooms</label><br/>
	        	<button type="button" class="counter-minus btn btn-primary">- </button>
	        	<input type="text" name="number1" id="number1" >
	         	<button type="button" class="counter-plus btn btn-primary">+  </button>
	        </div>
	    	<div class="tm-num2" id="handleCounter2">      
	        	<label for="number2" style = "font-size:25px;">Stars</label><br/>
	        	<button type="button" class="counter-minus btn btn-primary">-</button>
	        	<input type="text" name="number2" id="number2">
	            <button type="button" class="counter-plus btn btn-primary">+</button>
	        </div>

	       	<label>Price</label>
			<div class='multi-range' data-lbound='1' data-ubound='1000'><hr/>
	    		<input type='range' min='1' max='1000' step='1' value='1' name="min"oninput='this.parentNode.dataset.lbound=this.value;'/>
	    		<input type='range' min='1' max='1000' step='1' value='1000' name="max"oninput='this.parentNode.dataset.ubound=this.value;'/>
    		</div>

		    <div class="tm-cl">
		        <label for="date1" class="arrival">Dates from Arrival to Departure</label>
		     		<input type="date" name="arrival_date" id="date1">
		     		<input type="date" name="departure_date" id = "date2">
		     		<input style = " position: relative; top:50px; right:-100px;" type="submit" id="sub" value="Search" onclik=href = "Customer.php">
		    	</div>     
		    </div>
    
        
	    <div class="vertical-line"> </div>
			<div class="tm-form2">
				<div>
					<div class = "popup1">					
						<h2 style = "font-size: 16px; position: relative;top: -17px;">Taking a closer look...</h2><br>
						<div class="content">
							<div class="type-1">
							    <a href="" class="btn btn-1" id ="view1" style = "position: relative;top:51px; right:-70px; ">
							      <span class="txt">Rooms in Cities</span>
							      <span class="round"><i class="fa fa-chevron-right"></i></span>
							    </a>
							    <a href="" class="btn btn-1" id ="view2" style = "position: relative;right:-220px; top:-4px">
							      <span class="txt">Rooms by Capacity</span>
							      <span class="round"><i class="fa fa-chevron-right"></i></span>
							    </a>
							</div>
						</div>
					</div>
				</div>
		<?php
	    	/*$result = mysqli_query($mysql_connection,"SELECT hg.Hotel_Group_ID, r.Hotel_ID, h.Stars, r.Room_ID, r.Capacity, h.City, r.View, r.Expandable, r.Repairs_Need, r.Price, ra.Amenities FROM `Hotel_Group` hg, `Hotel` h, `Hotel_Room` r, `Room_Amenities` ra, `Reserves` re, `Rents` ren WHERE hg.Hotel_Group_ID=h.Hotel_Group_ID AND h.Hotel_ID=r.Hotel_ID AND r.Hotel_ID=ra.Hotel_ID AND r.Room_ID=ra.Room_ID AND IF ($Capacity !=-1, r.Capacity=$Capacity, 1) AND h.City LIKE '%$Location%' AND IF ($Location !=-1, h.City = SUBSTR($Location,1,LENGTH($Location)-2), 1) AND IF ($Hotel_Group_ID !=-1, h.Hotel_Group_ID=$Hotel_Group_ID, 1) AND ra.Amenities LIKE '%$A1%' AND ra.Amenities LIKE '%$A2%' AND ra.Amenities LIKE '%$A3%' AND ra.Amenities LIKE '%$A4%' AND ra.Amenities LIKE '%$A5%' AND IF ($number1!=-1, h.Number_Of_Rooms>=$number1, 1) AND IF ($number2!=-1, h.Stars=$number2, 1) AND r.Price>=$min AND r.Price<=$max AND IF ($arrival_date!=-1, ren.Finish_Date<$arrival_date, 1) AND IF ($arrival_date!=-1 AND $departure_date!=-1,(($arrival_date < re.Start_Date AND $departure_date < re.Start_Date) OR ($arrival_date > re.Finish_Date AND $departure_date > re.Finish_Date)), 1 ) GROUP BY Hotel_ID, Room_ID");

	    	SELECT r.Hotel_ID, r.Room_ID,ren.Start_Date, ren.Finish_Date FROM Hotel_Room r, Rents ren WHERE (ren.Hotel_ID = r.Hotel_ID AND ren.Room_ID = r.Room_ID) ORDER BY r.Hotel_ID;

	    	 SELECT r.Hotel_ID, r.Room_ID,re.Start_Date, re.Finish_Date FROM Hotel_Room r, Reserves re WHERE (re.Hotel_ID = r.Hotel_ID AND re.Room_ID = r.Room_ID) AND (('2018-06-05' < re.Start_Date AND '2018-06-09' < re.Start_Date) OR ('2018-06-05' > re.Finish_Date AND '2018-06-09' > re.Finish_Date)) GROUP BY Hotel_ID, Room_ID ORDER BY r.Hotel_ID;

	    	$result = mysqli_query($mysql_connection,"SELECT h.City FROM `Hotel` h WHERE $Location  ? h.City LIKE '%$Location%' : 1 ");

	    	$row=mysqli_fetch_assoc($result);
			printf ("%s\n",$row["City"]);*/
	    	
	    ?>
		<h2 style="position: absolute;float: right; right: 375px; font-size:30px;">Results of rooms</h2> <br><br><br>
		
	
        </form>
  </section>
  <div id = "popup2" class="overlay">
			<div class="popup">
				<h2 style = "font-size: 16px;">Reservation NOT COMPLETED. Either you entered dates not disponible, either your Customer IRS Number is incorrect (or wrong so Register First)"</h2><br>
				<a class="close" href="Customer.php"><button type="button" id="delete">X</button></a>
				
				<div class="content">
					<a href="Customer.php"><button type="text" class="submit blue" id = "H_Reservation_Cancel">OK</button></a>
				</div>

			</div>
	</div>

	<div id = "popup3" class="overlay">
			<div class="popup">
				<h2 style = "font-size: 17px;">Dates Available & Customer IRS Number registered press "Confirm Reservation"</h2><br>
				<a class="close" href="Customer.php"><button type="button" id="delete">X</button></a>
				<div class="content">
					<form action="Customer_Reservation.php" class = "homepageimage2" method="post">
						<button type="submit" name="submit1" class="submit blue" id ="H_Reservation_Confirmation">Confirm Reservation</button>
					</form>
				</div>
			</div>
	</div>

  	<div id="popup4" class="overlay">
		<div class="popup">
			<div class = "content">
				<h2 style = "font-size: 20px;">Confirm reservation's info, fill in your arrival/departure dates and your Customer IRS Number and press submit to proceed with the payment details!</h2><br><br><br>
				<a class="close" href="Customer.php"><button type="button" id="delete"><h2>X</h2></button></a>
				<form  action = "Customer_Reservation.php" method="post">

				 		<label for="Hotel_Group_ID">Hotel Group ID 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Hotel_Group_ID" value="<?php echo $_SESSION['Hotel_Group_ID'];?>" disabled><br>

						<label for="Hotel_ID">Hotel ID 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Hotel_ID" value="<?php echo $_SESSION['Hotel_ID'];?>" disabled><br>

						<label for="Stars">Stars 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Stars" value="<?php echo $_SESSION['Stars'];?>" disabled><br>

						<label for="Room_ID">Room ID 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Room_ID" value="<?php echo $_SESSION['Room_ID'];?>" disabled><br>

						<label for="Capacity">Capacity 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Capacity" value="<?php echo $_SESSION['Capacity'];?>" disabled><br>

						<label for="City">City 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="City" value="<?php echo $_SESSION['City'];?>" disabled><br>

						<label for="Price">Price 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Price" value="<?php echo $_SESSION['Price'];?>" disabled><br>

						<label for="Amenities">Amenities 🔒</label><br>
						<input style = "color:red; opacity:1;" type="int" name="Amenities" value="<?php echo $_SESSION['Amenities'];?>" disabled><br>

						<label for="Customer_IRS_Number"><span style="background-color: #FFFF00">Customer IRS Number</span></label><br>
						<input type="int" name="Customer_IRS_Number" value="<?php echo $Customer_IRS_Number;?>" required><br>

						<div class="tm-cl">
					        <label for="date1" class="arrival"><span style="background-color: #FFFF00">Dates from Arrival to Departure:</span></label>
					     		<input type="date" name="arrival_date" id="date1" required>
					     		<input type="date" name="departure_date" id = "date2" required>
					    	</div>     
					    </div>

						<button type="submit" name="submit" class="submit" id="submit">Reservation</button>
				</form>
				<form method="post" action="Customer.php" class = "homepageimage2">
					<button type="submit" id = "homepageimage_pointer" ><img src= "home.png" alt="Smiley face" height="33" width="33"></img></button>
				</form>
			</div>

		</div>
	</div>

	
</body>
	
</html>
