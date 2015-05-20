<html>
<body>

<?php include("menu.php"); ?>
<center><h1>Delete Account</h1></center>

<br>
<br>
<?php
	// Make sure did not press del acc button by accident
	echo "<br><br><br>";
	echo "Are you sure you want to delete your account? <br>";
	echo "<form action=\"delForSure.php\" method=\"post\">";
	echo "<br><input type=\"radio\" name=\"delAcc\" value=\"1\"/> Yes";
	echo "<br><input type=\"radio\" name=\"delAcc\" value=\"0\"/> No";
	echo "<br><input type=\"submit\" />";
	echo "</form>";
?>
<br>
<br>


</body>
</html>
