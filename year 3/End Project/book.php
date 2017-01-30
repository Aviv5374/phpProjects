<?php
session_start();
include 'db.php';


if(empty($_SESSION) or isset($_POST['lol'])){
	header("refresh:3; url=login.php");
	exit();
}
else if (!empty($_SESSION) and $_SESSION['logout'] == True) {
	
	$_SESSION['logout'] = False;
	
}
else if (!empty($_SESSION) and $_SESSION['logout'] == False) {
	
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Famliy Book</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>"? method="POST" enctype="multipart/form-data">
		<fieldset>
			Select image to upload:
			<input type="file" name="fileToUpload">
			<input type="text" name="title" value="" placeholder="Title">
			<input type="submit" value="Upload Image" name="Upload Image">
			<input type="hidden" name="lol" value="True">
			<input type="submit" name="logout" value="logout">
		</fieldset>		
	</form>
</body>
</html>