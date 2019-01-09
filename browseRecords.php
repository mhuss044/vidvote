<?php
	// Purpose of script is to retreive a set of public lists, pass back to JS

	
	require 'siteDBConnect.php';	// Contains connect func
	
	// Connect to the DB
	$conn = connect();
	if(!$conn)
		exit("\nFailed to connect to database");

	$sql = "SELECT usrName, usrPass, rec_desc, date_created, date_lastModified, rec_data FROM userRecords WHERE usrPass IS NULL";
	$retrievedRecords = array();
	$retrievedRec = array(); 
	
	if($res = mysqli_query($conn, $sql)) 
	{
		if(mysqli_num_rows($res) > 0)	// Have results
		{ 
			while($row = mysqli_fetch_array($res))
			{ 
				$retrievedRec["usrName"] = $row["usrName"]; 
				$retrievedRec["rec_data"] = $row["rec_data"]; 
				$retrievedRecords[] = $retrievedRec;
			} 
			mysqli_free_result($res); 
		} 
		else 
			echo "No Matching records are found."; 
	}
	else 
		echo "Error retreiving data: ".mysqli_error($conn);

	echo json_encode($retrievedRecords);

	mysqli_close($conn);
?>
