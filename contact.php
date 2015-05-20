<!--Send email to admin script. -->
<!--Only checks if "@" and "." characters are present, weak against entering .g@  -->
<!--and somehow if only enter: email@g. it still fails,.. but works if: email@g.g -->

<html>
<body>

<?php include("menu.php"); ?>
<center><h1>Contact</h1></center>

<?php
	echo "Wanna send an email? Enter your email, and the msg:";
	echo "<form action=\"contact.php\" method=\"post\">";
	echo "Your email: <input type=\"text\" name=\"uemail\" />";
	echo "Your message: <input type=\"text\" name=\"umsg\" />";
	echo "<input type=\"image\" src=\"submit.png\" name=\"sub\" />";
	echo "</form>";
	
	// Set a cookie to play as symbol to want to send msg:
	// Set it before if check bcs will then check data of old cookie from first run, which has 0 data
	// Seems setcookie doesnt set info instantaneously??, bcs should use posted info from form, 
	// set now, then if isset should work in next line...
	setcookie("uemail", $_POST["uemail"], time()+36000);	
	//echo "<br> failed check issset...Cookie: ".$_COOKIE["uemail"]."<br> ";  // shows nothing...

	//Use filter_var() func of PHP lib to do this much better
	//Check if eml cookie present, and if posted email is legit(ie not from an empty form):
	if(isset($_COOKIE["uemail"]) && (strstr($_POST["uemail"],"@") != FALSE) && (strstr($_POST["uemail"],".") != FALSE))
	{
		echo "You entered email: ".$_POST["uemail"]."<br>";
		if((strstr($_POST["uemail"],"@") != FALSE) && (strstr($_POST["uemail"],".") != FALSE))
		{
			echo "Your email address seems to be legit. Sending mail..<br>";
			
			// Send mail:
			if(mail("m.huss044@gmail.com", "Subject here, from webs", $_POST["umsg"], $_POST["uemail"]))
				echo "<h1>Message Sent!<h1>";
			else
				echo "<h1>Error occured. Message not sent!<h1>";
		}
		else
		{
			echo "Your email address tests to be not legit.<br>";
		}
		
		// Destroy cookies
		setcookie("uemail", "", time()-36000);
		setcookie("umsg", "", time()-36000);		
	}
	else // User sees this when loading contact.php for first time, also sees it if enter bogus addr
	{
		echo "<br>Enter your email address above please.<br> ";
		echo "<br>after you press submit, reload the pg...<br> ";
		
		// Debug, test strstr

		/*
		echo "<br> failed check...<br> ";
		echo "<br>@:".strstr($_POST["uemail"],"@");
		echo "<br>.".strstr($_POST["uemail"],".");
		
		if(strstr($_POST["uemail"],"@") == FALSE)
			echo "<br> failed check...<br> ";
		if(strstr($_POST["uemail"],".") == FALSE)
			echo "<br> failed check...<br> ";
		if(isset($_COOKIE["uemail"]) == FALSE)
			echo "<br> failed check issset...Cookie: ".$_COOKIE["uemail"]."<br> ";
		*/			
	}
?>

</body>
</html>
