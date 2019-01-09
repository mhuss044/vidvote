<?php
	// Purpose of script is to return the number of viewable rows in the records table
	
	require 'siteDBConnect.php';	// Contains connect func
	
	// Connect to the DB
	$conn = connect();
	if(!$conn)
		exit("\nFailed to connect to database");

	$sql = "SELECT COUNT(*) FROM userRecords WHERE usrPass IS NULL";
	
	if($res = mysqli_query($conn, $sql)) 
	{
			$row = mysqli_fetch_array($res);
//			var_dump($row);
			echo $row["COUNT(*)"];
			mysqli_free_result($res); 
	}
	else 
		echo "Error retreiving data: ".mysqli_error($conn);

	mysqli_close($conn);
?>
