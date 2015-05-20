<html>
<body>

<?php include("menu.php"); ?>
<center><h1>Logged In!</h1></center>

<br>
<br>

<?php
// get some kind of password authentication method, mayb have pass be first line of userfile..
?>

<?php
setcookie("usr", $_POST["usr"], time()+36000);
setcookie("pw", $_POST["pw"], time()+36000);

echo "<br><br><center>You will be taken to your lists page in two seconds.</center>";
echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=ylists.php\">";
?>

<?php 
//echo "Your username: ". $_POST["usr"]; . ",". "Your pw: ". $_POST["pw"]; 
?>
<br />

</body>
</html>
