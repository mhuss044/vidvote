<?php
	// Purpose of script is to retreive a set of public lists, pass back to JS

	
	require 'siteDBConnect.php';	// Contains connect func
	
	// Connect to the DB
	$conn = connect();
	if(!$conn)
		exit("\nFailed to connect to database");

	$sql = "SELECT usrName, usrPass, rec_desc, date_created, date_lastModified, rec_data FROM userRecords WHERE usrPass IS NULL";
	
	if($res = mysqli_query($conn, $sql)) 
	{
		if(mysqli_num_rows($res) > 0)	// Have results
		{ 
			echo "<table>"; 
			echo "<tr>"; 
			echo "<th>Firstname</th>"; 
			echo "<th>Lastname</th>"; 
			echo "<th>age</th>"; 
			echo "</tr>"; 
			while($row = mysqli_fetch_array($res)){ 
				echo "<tr>"; 
				echo "<td>" . $row['usrName'] . "</td>"; 
				echo "<td>" . $row['rec_data'] . "</td>"; 
				echo "</tr>"; 
			} 
			echo "</table>"; 
			mysqli_free_result($res); 
		} 
		else 
			echo "No Matching records are found."; 
	}
	else 
		echo "Error retreiving data: ".mysqli_error($conn);

	mysqli_close($conn);
?>
