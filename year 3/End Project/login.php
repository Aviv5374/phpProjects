<?php
session_start();
include 'db.php';

if (isset($_POST["usernmae"]) and isset($_POST["password"])) {
	$user = mysqli_real_escape_string($con,$_POST["usernmae"]);
	$pass = mysqli_real_escape_string($con,$_POST["password"]);
	$logout = $_POST["logout"];

	$sql = "SELECT * from login WHERE usernmae= '$user' and password= '$pass' ";
	$res = mysqli_query($con,$sql);

	if(mysqli_num_rows($res)==1){
		echo "Hello ".$user;
		$logout=false;
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

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Checker</title>
</head>
<body>

</body>
</html>