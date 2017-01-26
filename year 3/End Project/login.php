<?php
session_start();
include 'dbLogin.php';

if (isset($_POST["usernmae"]) and isset($_POST["password"])) {
	$user = mysqli_real_escape_string($con,$_POST["usernmae"]);
	$pass = mysqli_real_escape_string($con,$_POST["password"]);
	$sql = "SELECT * from login WHERE usernmae= '$user' and password= '$pass' ";

	$res = mysqli_query($con,$sql);
	if(mysqli_num_rows($res)==1){
       echo "Hello ".$user;
       header("refresh:3; url=book.php");
       mysqli_close($con);
       exit();
	}
	else{
		header("refresh:3; url=index.php");
		echo("Permission Denied");
		mysqli_close($con);
		session_destroy();
		exit();
	}
}
else{
	header("refresh:3; url=index.php");
		echo("Missing Variables");
		mysqli_close($con);
		session_destroy();
		exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Checker</title>
</head>
<body>

</body>
</html>