<html>
<body>

<?php include("menu.php"); ?>
<center><h1>Delete Account</h1></center>

<br>
<br>
<?php
// Check if they picked yes or no:
	if($_POST["delAcc"] == 1)
	{
		if (isset($_COOKIE["usr"]))		// Check if logged in
		{
			$userfile = $_COOKIE["usr"].".txt";
			if (!unlink($userfile))
				echo ("<center>Error deleting user file for: $userfile.</center><br />");
			else
			{
				echo ("<center>Successfully deleted $userfile.</center><br />");
				
				// Log user out:
				// set the expiration date to one hour ago
				setcookie("usr", "", time()-3600);
				
				// goto homepage
				echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;URL=index.php\">";
			}
		}
		else
		  echo "<center>Cannot delete your file if you are not logged in..</center><br />";
	}
?>
<br>
<br>


</body>
</html>