<?php
define("PASS", "Pas123");
if (isset($_GET["username"]) and isset($_GET["password"])) 
{
	if (($_GET["username"] == USER) && ($_GET["password"]) == PASS) 
	{
		if(isset ($_GET["rememberme"]) and $_GET["rememberme"] == "yes"){
			setcookie("username",$_GET["username"],time()+3600*24*365,null,null,null,true);
			setcookie("username",md5($_GET["password"]),time()+3600*24*365,null,null,null,true);
			echo "remember me:".$_GET["rememberme"];
		}
		else{
			setcookie("username",$_GET["username"],time()+3600*24*365,false);
			setcookie("username",md5($_GET["password"]),time()+3600*24*365,false);
			echo "Do not remember me.";
		}
		header("location: SecurePage.php");
	}
	else{
		//echo "Do not remember me.";?
		echo "Username/Password Invalid.";
	}
	//code....?
}

?>

<html>
<head>
	<title>User login</title>
</head>
<body style="background: lightblue; margin: 30px;">
	<h2>USER LOGIN</h2>
	<hr>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
		Username: <input type="text" name="username" autofocus><br>
		Password: <input type="password" name="password"><br>
		Remember Me: <input type="checkbox" name="rememberme" value="yes"><br>
		<input type="submit" value="Login!">		
	</form>
</body>
</html>