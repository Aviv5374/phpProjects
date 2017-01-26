<?php
include 'dbBook.php';

$file_path = "upload/";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Famliy Book</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="?" method="POST" enctype="multipart/form-data">
	<fieldset>
		<input type="file" name="fileToUpload">
		<input type="text" name="title" value="" placeholder="Title">
		<input type="submit" name="Upload Image" name="submit">
		<br>
		<input type="submit" name="Logout" name="submit">
	</fieldset>
</form>
</body>
</html>