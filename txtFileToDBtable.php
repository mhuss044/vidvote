<?php
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

	$file = "./data/";
	$handle = opendir('./data/');	// Open txtFile data directory
	$counter = 0;
	
	// read directory entries
	while(false !== ($entry = readdir($handle)))	// Obtain a directory entry
	{
		// output only text files
        if(strpos($entry,".txt"))	// Return false if 'txt' not found
		{
			$counter++;

//			$newName  = preg_replace(".txt",'',$entry); // remove '.txt'  
			echo "<br>".$counter.": ".preg_replace("/.txt/",'',$entry)."<br>";	// "/search/": '/' delimeter req
			echo file_get_contents("./data/".$entry)."<br>";	
			
			// INSERT INTO tableName (column1, ..) VALUES ('data', ..)
			// In the columns to be editted list, rec_Id is left out since its autoincd by mysql
			// column list to be editted matches values list to insert
			$sql = "INSERT INTO userRecords (usrName, date_created, date_lastModified, rec_data) 
				VALUES (".preg_replace("/.txt/",'',$entry).", ". .", ". .", ".file_get_contents("./data/".$entry).")";
		}
    }
	closedir($handle);
	mysqli_close($conn);
?>
