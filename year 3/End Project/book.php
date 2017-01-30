<?php
session_start();
include 'db.php';



if(empty($_SESSION) or isset($_POST['logout'])){
	header("refresh:2; url=login.php");
	echo "Goodbye";
	exit();
}
else if (isset($_POST['UploadImage'])) {
	$file_path = "upload/";
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Famliy Book</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>		
<fieldset>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>"? method="POST" enctype="multipart/form-data">

			Select image to upload:
			<input type="file" name="fileToUpload">
			<input type="text" name="title" value="" placeholder="Title">
			<input type="submit" value="Upload Image" name="UploadImage">
			<input type="submit" name="logout" value="Logout">
	</form>
	
</fieldset>	
</body>
</html>