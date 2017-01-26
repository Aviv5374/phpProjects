<?php
include 'dbBook.php';

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
		<input type="submit" name="">
	</fieldset>
</form>
</body>
</html>