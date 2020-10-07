<!DOCTYPE html>
<?php require 'connectToDB.php';?>
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
		    <a href="Customer.php#popup1" class="btn btn-1" id ="view3" >
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
			<div >
				<div class = "popup1">
					
					<h2 style = "font-size: 16px; position: relative;top: -17px;">Taking a closer look...</h2><br>
					<div class="content">
						<div class="type-1">
						  
						    <a href="" class="btn btn-1" id ="view1" style = "position: relative;top:51px; right:-50px; ">
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
  <div id="popup1" class="overlay">
		<div class="popup">
			<?php
		    	$result = mysqli_query($mysql_connection,"SELECT * FROM  rooms_by_capacity"); ?>
		    	
			<h2 style = "font-size: 20px;">Rooms existing in the cities provided...!</h2><br><br><br>
			<a class="close" href="Customer.php"><button type="button" id="delete"><h2>X</h2></button></a>


			<div class="content">
				<nav class="dropdown" style = "right:190px; display:block; width:700px; right:-140px;">
					<button onclick="myFunction()" class="dropbtn" style = "padding-left:80px; padding-right: 80px;">Press Me!</button>
				  	<div id="myDropdown" class="dropdown-content show" style = " display:block; width:230px;">
					    <input type="text" placeholder="Search..." id="myInput" style = "margin: 0%; padding: 1% 3%; width:260px;" onkeyup="filterFunction()">
					    	<div id = "scroll">
					    	<?php
					    		
					    		echo('<table class = "scroll_list" style = "position:relative; right:-40px;"><tr><th>Room_ID</th><th>Capacity</th><th>Hotel_ID</th></tr>');
						    	while($row = mysqli_fetch_array($result))
								{
									echo ('<tr><td style="background-color : #808080;">'. $row['Room_ID'] .'</td><td >' . $row['Capacity'] . '</td></a><td>' . $row['Hotel_ID'] .'</td></tr>');
								}
								echo('</table>');
							?>

							?>
							</div>
				  	</div>
				</nav>
				
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


