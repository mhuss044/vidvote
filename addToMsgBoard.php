<?php
		// TODO: use PHP func http_special_chars func to sanitize

		$msgBoardFile = "./data/msgBoard.txt";
		$postdata = file_get_contents("php://input");	// Get POST in a JSON string
		$messageFile = file_get_contents($msgBoardFile);	// ./ is required, specifies local filesys

		// conv messageFile to arr, trunc arr to last 1000 msgs
		$messagesArr = json_decode($messageFile, true);	
//		var_dump($messagesArr);
//		echo $messagesArr[0]["Name"]." ".$messagesArr[0]["Data"];

		if(isset($postdata) && !empty($postdata))
		{
				$dataArr = json_decode($postdata);	// returns an obj from the json string

				// Sanitize: preg_replace: "/search/": '/' delimeter req
				$newName  = preg_replace('/[^a-zA-Z ]/','',$dataArr->newName); // replace any non letter/whitespace
				$newData  = preg_replace('/[^a-zA-Z ]/','',$dataArr->newData); // replace any non letter/whitespace
//				$newData = preg_replace('/[^0-9 ]/','',$dataArr->newData);	// replace any non num with space
//				if($newName  == '' || $newData == '') return;	// If after sanitize empty then done
				//				file_get_contents to read json text file, decode it into arr, add new data to arr, then
				//				$json_data = json_encode($posts);
				//				file_put_contents('myfile.json', $json_data);

				//echo $timeStamp.": ".$newName." ".$newData;
		}

		date_default_timezone_set('Canada/Eastern');	// Ensure that the below date() func returns ETC date
		$newPost = array();
		$newPost["TimeStamp"] = date("Y/m/d g:i:s a");
		$newPost["Name"] = $newName;
		$newPost["Data"] = $newData;

		// Add to messages array:
		$messagesArr[] = $newPost;
		//var_dump($messagesArr);

		$numMessages = count($messagesArr);
		$msgCtr = 0;
		/*
		while($msgCtr < $numMessages)
		{
				echo $messagesArr[$msgCtr]["TimeStamp"].": ".$messagesArr[$msgCtr]["Name"].": ".$messagesArr[$msgCtr]["Data"]."\n";
				$msgCtr++;
		}
		 */
//		echo json_encode($messagesArr);
		// Write JSON to message board file
		file_put_contents($msgBoardFile, json_encode($messagesArr));
?>
