<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<body>

<?php include("menu.php"); ?>
<center><h1>Your Lists</h1></center>

<!--Must include into html src when ever want to use swtobj -->
<script type="text/javascript" src="swfobject.js"></script>

<?php
//<object width="425" height="350" data="http://www.youtube.com/v/-XTToohju4s" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/-XTToohju4s" /></object>
// Fullscreenable player
//echo "<iframe width=\"560\" height=\"315\" src=\"http://www.youtube.com/embed/-XTToohju4s\" frameborder=\"0\" allowfullscreen></iframe>";
// make vids displayed in neater list?
?>

<?php
if (isset($_COOKIE["usr"]))
{
// add newly created file to list in commlists file

  echo "<center><h1>Lists for: ".$_COOKIE["usr"]."</h1></center><br>";
  
	$file = fopen($_COOKIE["usr"].".txt", "a+");

	
  if($file == FALSE)
	echo "Error openning your user file.";
  else
	{
		// Allow add more to list
		echo "<br><br><br>";
		echo "Add to list: <br>";
		echo "<form action=\"ylists.php\" method=\"post\">";
		echo "stuff: <input type=\"text\" name=\"stufftoadd\" />";
		echo "<br>Add it?: <br>";
		echo "<br><input type=\"radio\" name=\"addit\" value=\"1\"/> Yes";
		echo "<br><input type=\"radio\" name=\"addit\" value=\"0\"/> No";
		echo "<br><input type=\"submit\" />";
		echo "</form>";
		
		// Check if they picked yes or no:
		// Pressed post, page reloads, check 'addit', returns true, write to file, then goto ylists again
		if($_POST["addit"] == 1)
		{
			fputs($file,$_POST["stufftoadd"]."\n");
			echo "<br>Added stuff!"; 
			echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=ylists.php\">";
		}
		
		// Setup containing box, to allow float left:
		echo "<div class=\"bodyBox\">";	

		// Read, output file:
		$num = 0;
		// String which stores comma separated vid ids
		$playList;
		$lastID;
		//Get every line, print it
		while(!feof($file))
		{
			$num++;
			$line = fgets($file);
			

			// Display Data:
			echo "<div class=\"subBox\">";	
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

			// Close subBox div:
			echo "</div>";
		}
			

		echo "<div class=\"subBox\">";
		echo "<br>All your videos in one looping playlist:<br />";
		echo "<br>First vid to play:".$lastID;
		echo "<br>All your vids:".$playList;

		echo "<br><br>";
		echo "<object width=\"425\" height=\"350\" data=\"http://www.youtube.com/v/$lastID?version=3&loop=1&playlist=$playList\" type=\"application/x-shockwave-flash\"><param name=\"src\" value=\"http://www.youtube.com/v/$lastID?version=3&loop=1&playlist=$playList\" ></object>";
		echo "<br><br>";

		// End subBox div
		echo "</div>";
		// End bodyBox div
		echo "</div>";
	}
  fclose($file);
}
else
  echo "<center>Please login to access your lists.</center><br />";
?>
<br>
<br>


</body>
</html>	
