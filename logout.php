<html>
<body>

<?php include("menu.php"); ?>
<center><h1>Logged Out!</h1></center>

<?php
// set the expiration date to one hour ago
setcookie("usr", "", time()-3600);

echo "<br><br><br><br>";
echo "<center><a class=\"menustyle\" href=\"login.php\">Click here to log in.</a></center>";
?>


</body>
</html>

