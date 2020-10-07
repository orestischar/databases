<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="welcome.css">

<style>

.popup {
    width:160px;
    height:60px;
    padding:20px;
    background-color:#f0513a;    
    position:absolute;
    top:17%;
    left:42%;
    display:none;
    z-index: 1;
    outline: 9999px solid rgba(0,0,0,0.6);
    /*box-shadow: 10px 10px 5px grey;*/
}

.button {
    border: none;
    color: white;
    padding: 16px 22px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 32px;
    margin: 8px 4px;
    -webkit-transition-duration: 0.4s; 
    transition-duration: 0.4s;
    cursor: pointer;
}
.button1 {
    background-color: #5cc4b9; 
    color: black; 
}

.button1:hover {
    background-color: #f0513a;
    color: white;
    border: 2px solid black;
}


</style>
</head>
<body background="hoho.gif">


<div id="wrapperch">
<button class="button button1" onclick="showPopup()" >Check In</button>
</div>

<div id="popup">
    
</div>



</body>
</html>

<script >
    function done() { 
    document.getElementById("popup").style.display = "none";
    var password = document.getElementById("pass").value;


    if (password == '12345678') {
        window.location.href='interface_customer.php';
        return true;
    }
    else {
        document.getElementById("pass").value='';
        alert("YOU A FRAUD");
        return false;
        }

};

function showPopup() {
     document.getElementById("popup").style.display = "block";
}
</script>