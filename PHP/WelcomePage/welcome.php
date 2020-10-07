<html>
<title> HO-HOteleies services </title>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="welcome.css">

<style>

mark{
    margin:0 auto;
    position: relative;
    left:-15px;
}

.button {
    border: none;
    color: white;
    padding: 16px 22px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.button1 {
    background-color: #5cc4b9; 
    color: black;
    margin:0 auto;
    padding-right: 31px;
}

.button1:hover {
    background-color: #f0513a;
    color: white;
    border: 2px solid black;
}

.button2 {
    background-color: #5cc4b9; 
    color: black; 
    margin: 0 auto;
    padding-right: 31px;
    padding-left:-10px;
    
}

.button2:hover {
    background-color: #f0513a;
    color: white;
    border: 2px solid black;
}

.button3 {
    background-color: #5cc4b9; 
    color: black; 
    margin: 0 auto;
    width: 370px
}

.button3:hover {
    background-color: #f0513a;
    color: white;
    border: 2px solid black;
}
.center {
    margin: auto;
    width: 60%;
    padding: 10px;
}
</style>
</head>
<body background="hoho.gif">


<h1> <mark>Whats your deal?</mark> </h1>

<div id="wrapper">
<button class="button button1" onclick="showPopup()" >I'm the admin</button>
</div>

<div id="popup" style = "text-align: center;">
    <div>Username:</div>
    <input id="username" /><br>
    <div>Password:</div>
    <input id="pass" type="password"/><br>
    <button onclick="done()">Done</button>   

</div>

<div id="wrapper1">
<button class="button button2" onclick="showPopup()">I'm an employee</button>
</div>
<div id="wrapper2">
<button class="button button3" onclick="window.location.href='../Customer/Customer.php'">I'm a customer ready for vacaycay 😎</button>
</div>

</body>
</html>

<script >
    function done() { 
    document.getElementById("popup").style.display = "none";
    var password = document.getElementById("pass").value;
    var username = document.getElementById("username").value;

    if (password == '12345678' && username=='admin') {
        document.getElementById("pass").value='';
        document.getElementById("username").value='';
        window.location.href='../Admin/index.php';
        return true;
    }
    else if(password == '1234' && username=='employee'){
   document.getElementById("pass").value='';
    document.getElementById("username").value='';
    window.location.href='../Employee/index.php';
    return true;
    }
    else {
        document.getElementById("pass").value='';
        document.getElementById("username").value='';
        alert("YOU A FRAUD");
        return false;
        }

};

function showPopup() {
     document.getElementById("popup").style.display = "block";
}
</script>