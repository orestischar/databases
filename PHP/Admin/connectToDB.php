<?php

	$mysql_host = 'localhost';
	$mysql_user = 'root';
	$mysql_pass = '12345678';
	$mysql_db = 'project2018';

	$mysql_connection = mysqli_connect($mysql_host,$mysql_user,$mysql_pass);

	if(!$mysql_connection || !mysqli_select_db($mysql_connection,$mysql_db))
	{
		die("Could not connect to database");
	}
	
?>