<?php
		// THe purpose of this script is to read in the JSON string in msgBoard text file
		// and return the string via GET to calling javascript
		// Previously, http.get(msgBoard.txt) would retreive the file contents but because
		// of caching, the response will sometimes be the cached response
		$msgBoardFile = "./data/msgBoard.txt";
		$messageFile = file_get_contents($msgBoardFile);	// ./ is required, specifies local filesys

		echo $messageFile;
?>
