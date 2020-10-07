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
	    <div class="type-1" style = "left: 500px;top: 20px;">  
		    <a href="Customer_Registration.php#popup1" class="btn btn-1" id ="view1" >
		      <span class="txt">REGISTER AS A CUSTOMER</span>
		      <span class="round"><i class="fa fa-chevron-right"></i></span>
		    </a>
		</div>
		<section class="tm-booking">
			
				
		<form>
 			
			<div class="tm-form1">
				
			<input type="number" name="Capacity" placeholder="Capacity"> <br></br> 
			<input type="text" name="Location" placeholder="Location"> <br></br>
			<input type="number" name="Hotel_Group_ID" placeholder="Hotel_Group"><br><br>
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
		<div class='multi-range' data-lbound='1' data-ubound='1000'>
		<hr/>
	    <input type='range' min='1' max='1000' step='1' value='1' name="min"oninput='this.parentNode.dataset.lbound=this.value;'/>
	    <input type='range' min='1' max='1000' step='1' value='1000' name="max"oninput='this.parentNode.dataset.ubound=this.value;'/>
    </div>

    <div class="tm-cl">
        <label for="date1" class="arrival">Dates from Arrival to Departure</label>
     		<input type="date" name="arrival_date" id="date1">
     		<input type="date" name="departure_date" id = "date2">
     		<input style = " position: relative; top:50px; right:-100px;" type="submit" id="sub" value="Search" onclik=href = "index.php">
    	</div>     
    </div>
    
        
    <div class="vertical-line"> </div>
		<div class="tm-form2">
			<div >
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
	
		<h2 style="position: absolute;float: right; right: 375px; font-size:30px;">Results of rooms</h2> <br><br><br>
	</div>
	
        </form>
  </section>
		
		<div id = "popup1" class="overlay">
			<div class="popup">
				<?php echo $error;?>
				<h2>Please fill the following form to insert a record in the table of Customers and press Submit!</h2><br>
				<a class="close" href="Customer.php"><button type="button" id="delete">X</button></a>
				<div class="content">
					 <form action="Customer_Registration.php" method="post">
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
					<form method="post" action="Customer.php" id = "homepageimage">
    					<button type="submit" id = "homepageimage_pointer" ><img src= "home.png" alt="Smiley face" height="33" width="33"></img></button>
					</form>
				</div>
			</div>
		</div>
		

	</body>
	
</html>






