<?php
session_start();
include 'db.php';

if (isset($_GET["username"]) and isset($_GET["password"])) {
	$user = mysqli_real_escape_string($con,$_GET["username"]);
	$pass = mysqli_real_escape_string($con,$_GET["password"]);
	//$logout = $_GET["logout"];

	$sql = "SELECT * from login WHERE username= '$user' and password= '$pass' ";
	$res = mysqli_query($con,$sql);

	if(mysqli_num_rows($res)==1){
		echo "Hello ".$user;
		//$logout=false;
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
header("refresh:3; url=index.php");
mysqli_close($con);
session_destroy();
exit();


//setcookie(session_name(),'',time()-86400,'/');
	//session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Checker</title>
</head>
<body>

</body>
</html>