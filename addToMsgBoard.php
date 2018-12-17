<?php
		$postdata = file_get_contents("php://input");	// Get POST in a JSON string
		$messageFile = file_get_contents("./data/msgBoard.txt");	// ./ is required, specifies local filesys

		// conv messageFile to arr, trunc arr to last 1000 msgs
		$messagesArr = json_decode($messageFile, true);	
//		var_dump($messagesArr);
//		echo $messagesArr[0]["Name"]." ".$messagesArr[0]["Data"];

		if(isset($postdata) && !empty($postdata))
		{
				$dataArr = json_decode($postdata);	// returns an obj from the json string

				$newName  = preg_replace('/[^a-zA-Z ]/','',$dataArr->newName); // replace any non letter/whitespace
				$newData = preg_replace('/[^0-9 ]/','',$dataArr->newData);	// replace any non num with space
				$timeStamp = $dataArr->newTStamp;

//				if($newName  == '' || $newData == '') return;	// If after sanitize empty then done
				//				file_get_contents to read json text file, decode it into arr, add new data to arr, then
				//				$json_data = json_encode($posts);
				//				file_put_contents('myfile.json', $json_data);

				echo $timeStamp.": ".$newName." ".$newData;
		}

?>
