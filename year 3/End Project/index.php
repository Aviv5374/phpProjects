<?php
include 'dbLogin.php';


?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Screen</title>
</head>
<body>
<form method="GET" accept="logon.php">
	<fieldset>
		<input type="text" name="username" placeholder="username" required autofocus=>
		<input type="password" name="password" placeholder="password" required>
		<input type="submit" name="submit" value="submit">
	</fieldset>
</form>
</body>
</html>