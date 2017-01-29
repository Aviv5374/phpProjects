<?php
session_start();
include 'db.php';
echo "Hello world";
	?><br><?php
print_r($_SESSION);
?><br><?php
/*$_SESSION['logout'] = False;
print_r($_SESSION);
?><br><?php*/

if ($_SESSION['logout'] == False) {
	$file_path = "upload/";
	echo "Hello world";
	?><br><?php
}
else if ($_SESSION['logout'] == True) {
	$_SESSION['logout'] == False;
	$LogoutBook;
}
else if($LogoutBook){
	header("refresh:3; url=login.php");
	exit();
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
			<br>
			<input type="submit" value="<?php echo $LogoutBook=True;?> " name="Logout">
		</fieldset>
	</form>
</body>
</html>