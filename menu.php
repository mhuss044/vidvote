<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<!--Include javascript file-->
<script type="text/javascript" src="js.js"></script>
<title>Vote on Vids</title>
</head>
<body>

<center><img src="/res/banner.jpg" width="204" height="100" /></center>
<center><h1>Menu</h1></center>

<center>
<a class="menustyle" href="index.php">Home</a> --
<a class="menustyle" href="commlists.php">Community Lists</a> --
<a class="menustyle" href="ylists.php">Your Lists</a> -- 
<a class="menustyle" href="contact.php">Contact</a> --
<a class="menustyle" href="howto.php">How to Use</a>
</center>
<br>
<center>
<?php // if logged in already, dont display "login" link
if (isset($_COOKIE["usr"]))
  echo "Logged in -- ";
else
  echo "<a class=\"menustyle\" href=\"login.php\">Login</a> -- ";
?>
<a class="menustyle" href="logout.php">Logout</a>
<br>
<?php // if not logged in already, dont display "delete account" link
if (isset($_COOKIE["usr"]))
  echo "<a class=\"menustyle\" href=\"delAcc.php\">Delete Account(Cannot be undone!)</a>";
else
  echo "";
?>
</center>
<br>

<?php 
if (isset($_COOKIE["usr"]))
  echo "<center>Logged in as: " . $_COOKIE["usr"] . "</center>";
else
{
  echo "<center>Welcome Guest! You should log in!</center>";
}
?>


</body>
</html>



