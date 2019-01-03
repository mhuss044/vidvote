<?php
	// TODO: finish script: reads dir, sanitize, create record
	// Purpose of script is to take usr data stored in txt and insert into records onto DB
	// Script reads data directory, opens each file, creates query, and inserts into DB table
	// mysqli_real_escape_string: escapes NUL (ASCII 0), \n, \r, \, ', ", and Control-Z
	require 'siteDBConnect.php';	// Contains connect func
	
	// Connect to the DB
	$conn = connect();
	if(!$conn)
		exit("\nFailed to connect to database");
	// SQL query:
	// rec_Id; PRIMARY KEY; used to unique id row in table, AUTO_INCREMENT to instruct mysql to ++ and fill in field for you
	// NOT NULL: field required to be filled
	// LONGTEXT: largest text field
	// TEXT; 65535 char max
	$sql = "CREATE TABLE IF NOT EXISTS userRecords  
			(
				rec_Id INT PRIMARY KEY AUTO_INCREMENT,	
				usrName VARCHAR(255) NOT NULL,
				usrPass VARCHAR(255),
				rec_desc VARCHAR(255),
				date_created VARCHAR(50),
				date_lastModified VARCHAR(50),
				rec_data LONGTEXT
			)";
	
	if (mysqli_query($conn, $sql)) 
		echo "Table created successfully";
	else 
		echo "Error creating table: ".mysqli_error($conn);

	$file = "./data/msgBoard.txt";
	$handle = opendir('./data/');	// Open txtFile data directory
	$counter = 0;
	date_default_timezone_set('Canada/Eastern');	// Ensure that the below date() func returns ETC date

	// Extract data from file
	$data = file_get_contents($file);
	// Check to see if data is JSON
	json_decode($data);
	if(json_last_error() == JSON_ERROR_NONE)
		$data = mysqli_real_escape_string($conn, $data);	// Sanitize so create valid sql

	$sql = "INSERT INTO userRecords (usrName, date_created, date_lastModified, rec_data) 
			VALUES (\"msgBoard\", \"".date("Y/m/d g:i:s a")."\", \"".date("Y/m/d g:i:s a")."\", \"".$data."\")";
//	echo "<br>".$sql."<br>";

	/*
	// read directory entries
	while(false !== ($entry = readdir($handle)))	// Obtain a directory entry
	{
		// output only text files
        if(strpos($entry,".txt"))	// Return false if 'txt' not found
		{
			$counter++;
//			$newName  = preg_replace(".txt",'',$entry); // remove '.txt'  
			echo "<br>".$counter.": ".preg_replace("/.txt/",'',$entry)."<br>";	// "/search/": '/' delimeter req
		//	echo file_get_contents("./data/".$entry)."<br>";	
			
			// INSERT INTO tableName (column1, ..) VALUES ('data', ..)
			// In the columns to be editted list, rec_Id is left out since its autoincd by mysql
			// column list to be editted matches values list to insert
			$sql = "INSERT INTO userRecords (usrName, date_created, date_lastModified, rec_data) 
				VALUES (\"".preg_replace("/.txt/",'',$entry)."\", \"".date("Y/m/d g:i:s a")."\", \"".date("Y/m/d g:i:s a")."\", \"".file_get_contents("./data/".$entry)."\")";

			if (mysqli_query($conn, $sql)) 
				echo "Table entry created successfully: ".preg_replace("/.txt/",'',$entry);
			else 
				echo "Error creating error: ".mysqli_error($conn);
		}
    }
	 */
	closedir($handle);
	mysqli_close($conn);
?>
