<?php
include 'db.php';
$loguot = false;
if (isset($_COOKIE[session_name()]) and $loguot === false;) {
	$file_path = "upload/";
}
else{
	header("refresh:3; url=index.php");
	mysqli_close($con);
	setcookie(session_name(),'',time()-86400,'/');
	session_destroy();
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
			<input type="submit" name="Upload Image" name="submit">
			<br>
			<input type="submit" name="Logout" name="submit" href="<?php echo $_SERVER['PHP_SELF'].'$logout=true'; ?>">
		</fieldset>
	</form>
</body>
</html>