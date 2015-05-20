<html>
<body>

<?php include("menu.php"); ?>
<center><h1>Community Lists</h1></center>


<p>Vote on vids, goto: <a href="index.php">Home</a></p>


// allow access to list by append /listname
// dashboard; create new list under acc, make directory for acc, lists inside
// load names of files
// allow option to open each file

<?php 

/*
fileatime() 
filemtime() 
filesize() 
filetype() 
 mkdir() 
rename()


*/
	//print_r(glob("*.txt",GLOB_NOSORT));
	echo "<br><br><br><br>";
	
	echo "<br><br><br>";
	echo "Which would you like to view? <br>";
	echo "<form action=\"viewList.php\" method=\"get\">";
	
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
			echo "<br>$entry\n";
			echo "<br><input type=\"radio\" name=\"count\" value=\"$counter\"/> This one?";
			echo "<br><br><br>";
		}
    }
	echo "<br><br><br><input type=\"submit\" />";
	echo "</form>";
?>


</body>
</html>
