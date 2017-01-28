<?php
include 'db.php';
//$loguot = false;
if (isset($_COOKIE[session_name()])){ //and $loguot===false) {
	$file_path = "upload/";
	echo "Hello world";
}
else{
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
			<input type="submit" value="Upload Image" name="submit">
			<br>
			<input type="submit" value="Logout" name="submit" href="<?php echo $_SERVER['PHP_SELF'].'$logout=true'; ?>">
		</fieldset>
	</form>
</body>
</html>