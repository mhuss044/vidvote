<!-- TODO -->
<!-- k so user gives username, script opens .txt file named username -->
<!-- file lists YT links, with two values beside em: ups, downs -->
<!-- display this info -->
<!-- display this info http://www.w3schools.com/php/php_file.asp -->
<html>
		<head>
				<script type="text/javascript" src="swfobject.js"></script>
				<script type="text/javascript">
					swfobject.embedSWF("http://www.youtube.com/v/-XTToohju4s ", "myContent", "300", "120", "9.0.0");
				</script>
				<!-- Angular -->
				<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
				<!-- Angular view routing -->
				<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular-route.min.js"></script>
		</head>

		<body ng-app = "AJSapp">		<!--Specify that ajs app contained within body -->
				<?php 
				include("menu.php");
				include("mysqlCred.php");
				echo "<center><h1>Home</h1></center>";
				?>
				<!-- use exCtrl for this div -->
				<div ng-controller = "exCtrl">		
						<h2>Welcome {{obj.val()}} !</h2>
				</div>
				<p>		<!-- Links to switch view -->
						<a href = "#viewMessageBoard">View Mesage Board</a> , 
						<a href = "#hideMessageBoard">Hide Message Board</a>
				</p>
				<div ng-view></div>		<!-- Where router will place view -->
				<!-- Define some ng-templates, id as the .htm files -->
				<script type = "text/ng-template" id = "viewMessageBoard.htm">
						<h1> Enter your name and a message, press submit to add to message board.</h1>
						{{message}}
				</script>
				<script type = "text/ng-template" id = "hideMessageBoard.htm">
						<h1> Click link to show the message board. </h1>
				</script>

				<script>							
						// create AJSapp module
						var AJSapp = angular.module("AJSapp", ['ngRoute']);		// Load with dependency ngRoute
						// $routeProvider is a services which sets config of URLs, maps em to corresponding .htm page of ng-template
						// attaches a controller as well 
						AJSapp.config(['$routeProvider', function($routeProvider) 
						{
								$routeProvider.when
								('/viewMessageBoard', 
										{
												templateUrl: 'viewMessageBoard.htm', 
												controller: 'msgBoardController'
										}
								);
								$routeProvider.when
								('/hideMessageBoard', 
										{
												templateUrl: 'hideMessageBoard.htm', 
												controller: 'hideMsgBoardController'
										}
								);
								$routeProvider.otherwise
								(
										{
										 		redirectTo: '/hideMessageBoard'
										}
								);
						}]);

						AJSapp.controller("msgBoardController", function($scope) 
								{
										$scope.message = "yeyerr"; 
										$scope.helloTo.title = "geg";
										$scope.obj = 
										{
												name: "namename",
												num: 5,
												val: function()
												{
														var data = $scope.obj;
														return data.name + ", 5 + num = " + (5 + data.num);
												}
										};
								}
						);		// end controller func 

						AJSapp.controller("hideMsgBoardController", function($scope) 
								{
								}
						);		// end controller func 
						// register controller func exCtrl in AJSapp module 
						// scope passed to controller func, create hellto obj, add title field 
						AJSapp.controller("exCtrl", function($scope) 
								{
										$scope.helloTo = {};
										$scope.helloTo.title = "geg";
										$scope.obj = 
										{
												name: "namename",
												num: 5,
												val: function()
												{
														var data = $scope.obj;
														return data.name + ", 5 + num = " + (5 + data.num);
												}
										};
								}
						);		// end controller func 
				</script>

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
				echo "<div class=\"bodyBox\">";
					echo "<div class=\"subBox\">";
					echo "fffffffffffffffff";
					echo "</div>";
					echo "<div class=\"subBox\">";
					echo "fffffffffffffffffffffff";
					echo "</div>";
				echo "</div>";
				?>

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

