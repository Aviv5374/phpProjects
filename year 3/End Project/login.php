<?php
session_start();
include 'db.php';
print_r($_SESSION);

if(empty($_SESSION) and isset($_POST['logout']) and $_POST['logout']==True)
{
	echo "Hello world!!!";
	?><br><?php
	$_SESSION['logout']=$_POST['logout'];
	print_r($_SESSION);
	?><br><?php

	if (isset($_POST["username"]) and isset($_POST["password"])) {
		$user = mysqli_real_escape_string($con,$_POST["username"]);
		$pass = mysqli_real_escape_string($con,$_POST["password"]);
		

		$sql = "SELECT * from login WHERE username= '$user' and password= '$pass' ";
		$res = mysqli_query($con,$sql);

		if(mysqli_num_rows($res)==1){
			echo "Hello ".$user;
			header("refresh:3; url=book.php");
			exit();
		}
		else{
			echo("Permission Denied");
		}
	}
	else{
		echo("Missing Variables");
	}
}


header("refresh:3; url=index.php");
mysqli_close($con);
setcookie(session_name(),'',time()-86400,'/');
session_destroy();
exit();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Checker</title>
</head>
<body>

</body>
</html>