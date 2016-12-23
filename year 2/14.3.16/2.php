<!DOCTYPE html>
<html>
<head>
<title>hello php</title>
<style>
fieldset{width:700px; high:500px; background:green;}
</style>
</head>
<body>
	
	<fieldset>
	<?php
	print"Hello ";
	if (!empty($_GET["username"])) {
		print $_GET["username"];
	}
	else{
		print("<br>You forgot to write your name");
	}
	
	?>
	</fieldset>
	



</body>
</html>
