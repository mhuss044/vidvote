<!-- TODO -->
<!-- k so user gives username, script opens .txt file named username -->
<!-- file lists YT links, with two values beside em: ups, downs -->
<!-- display this info -->
<!-- display this info http://www.w3schools.com/php/php_file.asp -->

<script type="text/javascript" src="swfobject.js"></script>
<script type="text/javascript">
	swfobject.embedSWF("http://www.youtube.com/v/-XTToohju4s ", "myContent", "300", "120", "9.0.0");
</script>

<html>
<body>

<?php 
include("menu.php");
echo "<center><h1>Home</h1></center>";
?>


<br>
<br>
Enter some info pls:<br>
<form action="index.php" method="post">
stuff: <input type="text" name="usr" />
<input type="submit" />
</form>

<button type="button" onclick="displayDate()">Display Date</button>
<p id="demo"></p>

<div id="myContent">

<?php 

//Doesnt Work, php server side interpreted, yada yada:
/*
function writeName()
{
echo "Kai Jim Refsnes";
}

echo "<button type=\"button\" onclick=\"writeName()\">Display Date</button>";
*/

// DOESNT WORK:
//echo "YOUR IP: ".$REMOTE_ADDR;

// Dont add ; in if statement... : if();, will execute whats in the if..
/*
echo "<h1><center>Added to file: ".$_POST["usr"]."</h></center>"; 

$file = fopen("test.txt","a+");
if($file == FALSE)// Error check, bcs apparently get infinite loop if try and while(feof)
echo "Error oppenning file.";
else
{
fputs($file,$_POST["usr"]."\n"); // if put echo fputs(...); , fputs returns a number
rewind($file); // set file ptr to 0, bcs after append, @eof

//Read each line of the file, output, for every line
while(!feof($file))
  {
  echo "Contents: ". fgets($file). "<br />";
  }
}
fclose($file);
*/
?>

<?php

// get usr name
// apparently, .html files cannot correctly link to .php files..??
/* make user name = filename
*/

/*
function printvar($var)
{
echo $var."<br>";
}
$hello = "Helllo Worlsd";
$len = strlen($hello);
$numarr = array("1","2","3","4","5");


echo $hello."<br>".$hello."<br>";
echo $hello."<br>".$len."<br>".$hello."<br>";
printvar($len);
printvar($len);

echo "The position-1 of arg2 in arg1 is: ".strpos($hello,"Worl")."<br>";


for($i = 0; $i<=5; $i++)
{
echo $numarr[$i]."<br>";
}
foreach ($numarr as $t)
{
echo $t . "<br />";
}



function add($x,$y)
{
$total=$x+$y;
return $total;
}

echo "1 + 16 = " . add(1,16);

echo "<button type=\"button\" onclick="">This is a button</button>";

//$file = fopen("http://www.example.com/","r");
//$file = fopen("ftp://user:password@example.com/test.txt","w");
*/
?>

</body>
</html>

