<?php
		$postdata = file_get_contents("php://input");

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
