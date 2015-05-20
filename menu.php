<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<style type="text/css">
/*
ul
{
list-style-type:none; 
margin:0;
padding:0;
overflow:hidden;
}
li
{
float:left;
}
p
{
font-family:"Times New Roman";
font-size:20px;
}
*/

h1
{
color:blue;
text-align:center;
/*font-size:80px */
/* background-color:#6495ed;*/
}

.menustyle
{
width:120px;
font-weight:bold;
color:#FFFFFF;
background-color:#98bf21;
text-align:center;
padding:4px;
text-decoration:none;
text-transform:uppercase;
}

.menustyle:hover,menustyle:active
{
background-color:#7A991A;
}

.uppercase
{
text-transform:uppercase;
}

#blueid
{
color:orange;
} 
/*then can go: < p id="blueid">Hello World!</ p> */

body 
{
background-color:#58626f;
/*background-image:url('banner.jpg');*/
/*background-repeat:no-repeat;*/
/*background-position:center;*/
/*background-attachment:fixed;*/	/*'fixed' or 'scroll': moves while scrolling pg*/
}

/*
a:link,a:visited
{
display:block; /*Makes the element.. had menu items in serial, became all vertical*/
width:120px;
font-weight:bold;
color:#FFFFFF;
background-color:#98bf21;
text-align:center;
padding:4px;
text-decoration:none;
text-transform:uppercase;
}
a:hover,a:active
{
background-color:#7A991A;
}
*/

/*a:link {color:#FF0000; background-color:#B2FF99;}*/      /* unvisited link */
/*a:visited {color:#00FF00; background-color:#FFFF85;}*/  /* visited link */
/*a:hover {color:#FF00FF; background-color:#FF704D;}*/  /* mouse over link */
/*a:active {color:#0000FF; background-color:#FF704D;}*/  /* selected link */

.bodyBox
{
	border-style:solid;
	border-width:5px;	
        /*border-color:#000000;*/
background-color:#333300;
	padding:4px;
	background-color:#333300;
}

.subBox
{
	float:left;
	border-style:solid;
	border-width:5px;	
        border-color:#000000;
	padding:4px;
	text-align:center;
}

.subBox:hover,subBox:active
{
	background-color:#7A991A;
}

</style>

<head>
<!--Include javascript file-->
<script type="text/javascript" src="js.js"></script>
<title>Vote on Vids</title>
</head>
<body>

<center><img src="banner.jpg" width="204" height="100" /></center>
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



