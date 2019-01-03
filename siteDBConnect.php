<?php
	// siteDBConnect: responsible for connect func which opens connection to DB
	// DB_HOST, DB_USER, etc defined in mysqlCred
	require 'mysqlCred.php';
	// Connect with the database.
	function connect()
	{
		$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if(!$connect) 
		{
			echo "Connection failed: ".mysqli_connect_error();
		}
		/*
		// Or can use:
		if(mysqli_connect_errno($connect))
		{
			echo "Failed to connect:".mysqli_connect_error();
		}
		 */
		// Ensure defualt charset used to send/rcv data, matches whats listed in DB 
		mysqli_set_charset($connect, "utf8");
		return $connect;
	 }
?>
