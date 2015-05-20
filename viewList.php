<html>
<body>

<?php include("menu.php"); ?>
<!--Must include into html src when ever want to use swtobj -->
<script type="text/javascript" src="swfobject.js"></script>

<?php

	// Get file to open:
	// specifiy current dir
	$handle = opendir('.');
	$counter = 0;

	// read directory entries
	while (false !== ($entry = readdir($handle))) 
	{
		// output only text files
		if(strpos($entry,".txt"))
		{
			$counter++;
			if($counter == $_GET["count"])
				$listFile = $entry;
		}
	}
	echo "<center><h1>List for: ".$listFile.", with get value: ".$_GET["count"]."</h1></center>";

	// Open file:
	$file = fopen($listFile, "a+");		

	
	if($file == FALSE)
		echo "Error openning file.";
	else
	{
		$num = 0;
		// String which stores comma separated vid ids
		$playList;
		$lastID;

		// Start bodyBox:
		echo "<div class=\"bodyBox\">";
		//Get every line, print it
		while(!feof($file))
		{
			$num++;
			$line = fgets($file);
			
			// Start subBox:
			echo "<div class=\"subBox\">";
			// Display Data:
			echo $num.". ".$line."<br />";
			
			if(strlen($line) == 11 || strlen($line) == 12)		// User inputs 11 char youtube vid code
			{
				// set feed URL
				$feedURL = 'https://gdata.youtube.com/feeds/api/videos/'.$line.'?v=2';
				// read feed into SimpleXML object
				$sxml = simplexml_load_file($feedURL);

				echo "<br>				The youtube video of this eleven character code is: ".$sxml->title."<br><br>";
				echo "<object width=\"425\" height=\"350\" data=\"http://www.youtube.com/v/$line?version=3&loop=1&playlist=$line\" type=\"application/x-shockwave-flash\"><param name=\"src\" value=\"http://www.youtube.com/v/$line?version=3&loop=1&playlist=$line\" ></object>";
				echo "<br><br>";

				// Add vid ID to playlist, separate by comma:
				$playList = $playList.$line.",";
				// Store ID:
				$lastID = $line;
			}
			else if(strpos($line,"/v/"))					// User inputs YT url of type: http://www.youtube.com/v/-XTToohju4s
			{			
				echo "<br>				This is a valid vid ID.<br>";
				// set feed URL
				$feedURL = 'https://gdata.youtube.com/feeds/api/videos/'.substr($line, strpos($line, "/v/")+3).'?v=2';
				// read feed into SimpleXML object
				$sxml = simplexml_load_file($feedURL);
				
				// Display vid title:
				echo "<br>				The youtube video for this link is: ".$sxml->title."<br><br>";
				
				//echo "<br>YTURL: ".$ytURL."<br>";
				echo "<object width=\"425\" height=\"350\" data=\"$line\" type=\"application/x-shockwave-flash\"><param name=\"src\" value=\"$line\" ></object>";
				echo "<br><br>";

				// Add to playlist, separate by comma
				$playList = $playList.substr($line, strpos($line, "/v/")+3).",";
				// Store ID:
				$lastID = substr($line, strpos($line, "/v/")+3);
			}
			else if(strpos($line,"watch",start)) 			// User inputs YT url of type: http://www.youtube.com/watch?v=-XTToohju4s
			{
				// set feed URL
				$feedURL = 'https://gdata.youtube.com/feeds/api/videos/'.substr($line, strpos($line, "?v=")+3).'?v=2';
				// read feed into SimpleXML object
				$sxml = simplexml_load_file($feedURL);
				
				// Display vid title:
				echo "<br>				The youtube video for this link is: ".$sxml->title."<br><br>";
				echo "<br><br>";
				echo "<object width=\"425\" height=\"350\" data=\"http://www.youtube.com/v/".substr($line, strpos($line, "?v=")+3)."?version=3&loop=1&playlist=".substr($line, strpos($line, "?v=")+3)."\" type=\"application/x-shockwave-flash\"><param name=\"src\" value=\"http://www.youtube.com/v/".strstr($line,"?v=")."?version=3&loop=1&playlist=".substr($line, strpos($line, "?v=")+3)."\" ></object>";
				echo "<br><br>";

				// Add to playlist, separate by comma
				$playList = $playList.substr($line, strpos($line, "?v=")+3).",";
				// Store ID:
				$lastID = substr($line, strpos($line, "?v=")+3);
			}

			// End subBox:
			echo "</div>";
		}
			

		echo "<div class=\"subBox\">";
		echo "<br>All your videos in one looping playlist:<br />";
		echo "<br>First vid to play:".$lastID;
		echo "<br>All your vids:".$playList;

		echo "<br><br>";
		echo "<object width=\"425\" height=\"350\" data=\"http://www.youtube.com/v/$lastID?version=3&loop=1&playlist=$playList\" type=\"application/x-shockwave-flash\"><param name=\"src\" value=\"http://www.youtube.com/v/$lastID?version=3&loop=1&playlist=$playList\" ></object>";
		echo "<br><br>";
		echo "</div>";

		// End bodyBox:
		echo "</div>";
	}
	fclose($file);
?>
<br>
<br>


</body>
</html>
