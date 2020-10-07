<!DOCTYPE html>
<?php
	session_start();
	require 'connectToDB.php';
	$Capacity = $Hotel_Group_ID=$number1=$number2= $min = $max=$arrival_date = $departure_date = -1;
	$Location = "";
	$A1= $A2 = $A3 = $A4 = $A5 = "";
	error_reporting(E_ERROR | E_PARSE);


	$error = "";

	
	$arrival_date = !empty($_GET['arrival_date']) ? $_GET['arrival_date'] :-1;
	$_SESSION['arrival_date'] = $arrival_date;

	$departure_date = !empty($_GET['departure_date']) ? $_GET['departure_date'] :-1;
	$_SESSION['departure_date'] = $departure_date;

	$Capacity = !empty($_GET['Capacity']) ? $_GET['Capacity'] :-1;

	$_SESSION['Capacity'] = $Capacity;

	$Location = !empty($_GET['Location']) ? $_GET['Location'] :'';

	$_SESSION['Location'] = $Location;
	
	$Hotel_Group_ID= !empty($_GET['Hotel_Group_ID']) ? $_GET['Hotel_Group_ID'] :-1;

	$_SESSION['Hotel_Group_ID'] = $Hotel_Group_ID;
	
	$A1 = !empty($_GET['A1']) ? $_GET['A1'] :'';

	$_SESSION['A1'] = $A1;

	$A2 = !empty($_GET['A2']) ? $_GET['A2'] : '';


	$_SESSION['A2'] = $A2;

	$A3 = !empty($_GET['A3']) ? $_GET['A3'] : '';


	$_SESSION['A3'] = $A3;

	$A4 = !empty($_GET['A4']) ? $_GET['A4'] : '';

	$_SESSION['A4'] = $A4;

	$A5 = !empty($_GET['A5']) ? $_GET['A5'] : '';


	$_SESSION['A5'] = $A5;


	$number1 = !empty($_GET['number1']) ? $_GET['number1'] : -1;

	$_SESSION['number1'] = $number1;
	
	$number2 = !empty($_GET['number2']) ? $_GET['number2'] : -1;

	$_SESSION['number2'] = $number2;
	
	$min = $_GET['min'];

	$_SESSION['min'] = $min;
	
	$max = $_GET['max'];

	$_SESSION['max'] = $max;
	
?>
<html>
	<head>
		<meta charset="utf-8">
		<title> Κάνε κράτηση τώρα </title>
	    <link rel="stylesheet" href="new0.css">
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
		    <a href="Customer_Registration.php#popup1" class="btn btn-1" id ="view3" >
		      <span class="txt" style = "font-size:18px; float:center; font-style: bold;">REGISTER AS A CUSTOMER <b style = "font-size:30px;"> 🆘</b></span>
		      <span class="round" id="view4"><i class="fa fa-chevron-right"></i></span>
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
			<div>
				<div class = "popup1">
					
					<h2 style = "font-size: 16px; position: relative;top: -17px;">Taking a closer look...</h2><br>
					<div class="content">
						<div class="type-1">
						  
						    <a href="Customer_View1.php#popup1" class="btn btn-1" id ="view1" style = "position: relative;top:51px; right:-50px; ">
						      <span class="txt">Rooms in Cities</span>
						      <span class="round"><i class="fa fa-chevron-right"></i></span>
						    </a>

						    <a href="Customer_View2.php#popup1" class="btn btn-1" id ="view2" style = "position: relative;right:-220px; top:-4px">
						      <span class="txt">Rooms by Capacity</span>
						      <span class="round"><i class="fa fa-chevron-right"></i></span>
						    </a>

						</div>
					</div>
					
					
				</div>
			</div>
	


		<?php
		
	    	$result = mysqli_query($mysql_connection,"SELECT hg.Hotel_Group_ID, r.Hotel_ID, h.Stars, r.Room_ID, r.Capacity, h.City, r.View, r.Expandable, r.Repairs_Need, r.Price, ra.Amenities FROM `Hotel_Group` hg, `Hotel` h, `Hotel_Room` r, `Room_Amenities` ra, `Reserves` re, `Rents` ren WHERE hg.Hotel_Group_ID=h.Hotel_Group_ID AND h.Hotel_ID=r.Hotel_ID AND r.Hotel_ID=ra.Hotel_ID AND r.Room_ID=ra.Room_ID AND IF ($Capacity !=-1, r.Capacity=$Capacity, 1) AND h.City LIKE '%$Location%' /*AND IF ($Location !=-1, h.City = SUBSTR($Location,1,LENGTH($Location)-2), 1)*/ AND IF ($Hotel_Group_ID !=-1, h.Hotel_Group_ID=$Hotel_Group_ID, 1) AND ra.Amenities LIKE '%$A1%' AND ra.Amenities LIKE '%$A2%' AND ra.Amenities LIKE '%$A3%' AND ra.Amenities LIKE '%$A4%' AND ra.Amenities LIKE '%$A5%' AND IF ($number1!=-1, h.Number_Of_Rooms>=$number1, 1) AND IF ($number2!=-1, h.Stars=$number2, 1) AND r.Price>=$min AND r.Price<=$max");


	    	
	    	?>
		<h2 style="position: absolute;float: right; right: 375px; font-size:30px;">Results of rooms</h2> <br><br><br>
		
		<div id = "scroll">
				    	<?php
				    		echo('<table class ="scroll_list"><tr><th>RESERVE</th><th>Hotel Group ID</th><th>Hotel ID</th><th>Room_ID</th><th>Stars</th><th>Capacity</th><th>City</th><th>Price</th><th>Amenities</th></tr>');

					    	while($row = mysqli_fetch_array($result))
							{
								
								echo ('<tr><td style = "background-color: rgba(0, 0, 0, .0);">
									<a href="Customer_Reservation.php?Hotel_Group_ID=' . $row['Hotel_Group_ID'] . '&Hotel_ID=' . $row['Hotel_ID'] . '&Stars=' .$row['Stars'] . '&Room_ID=' . $row['Room_ID'] . '&Capacity=' . $row['Capacity'] . '&City=' . $row['City']  .  '&Price=' . $row['Price']  . '&Amenities=' . $row['Amenities'] . '">'.'<img src= "book.png" alt="Book" height="50" width="120"></td></a><td style = background-color: rgba(0, 0, 0, .2);">'.$row['Hotel_Group_ID'] .'</td></a><td style = background-color: rgba(0, 0, 0, .2);">' . $row['Hotel_ID'] . '</td></a><td style = background-color: rgba(0, 0, 0, .2);">' . $row['Room_ID'] . '</td><td style = background-color: rgba(0, 0, 0, .2);">' . $row['Stars'] . '</td><td style = background-color: rgba(0, 0, 0, .2);">' . $row['Capacity'] .'</td><td style = background-color: rgba(0, 0, 0, .2);">'. $row['City'] .'</td><td style = background-color: rgba(0, 0, 0, .2);">'. $row['Price'] . '</td><td style = background-color: rgba(0, 0, 0, .2);">'. $row['Amenities']. '</td></tr>');

							}
							echo('</table>');



						?>
						</div>

		
	</div>
	
        </form>
  </section>
  
	
	</body>
	
</html>
