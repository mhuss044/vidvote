<html>
<body>

<?php include("menu.php"); ?>
<center><h1>Login</h1></center>


<!-- have this error check itself, ie submit to same form page, with error msg-->
<br>
<br>

<?php
// get some kind of password authentication method, mayb have pass be first line of userfile..
?>

<?php
if (isset($_COOKIE["usr"]))
  echo "Welcome " . $_COOKIE["usr"] . "!<br />";
else
{
	// Dont accept name if same as community lists page

	// gotta use the \" character to tell interpreter you dont mean to end the ""
  echo "Welcome guest! Please login:<br />";
  echo "<form action=\"loggedIn.php\" method=\"post\">";
  echo "usr: <input type=\"text\" name=\"usr\" />";
  echo "pw: <input type=\"text\" name=\"pw\" />";
  echo "<input type=\"submit\" />";
  echo "</form>";
  
  setcookie("usr", $_POST["usr"], time()+36000);
  setcookie("pw", $_POST["pw"], time()+36000);
  
  // So if just posted form, dont want the usr, pw fields to still be there so:
  //DOESNT WORK;
  /*
  if (isset($_COOKIE["usr"]))
	echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1\">";
	*/
}
?>

<?php 
//echo "Your username: ". $_POST["usr"]; . ",". "Your pw: ". $_POST["pw"]; 
?>
<br />

</body>
</html>
