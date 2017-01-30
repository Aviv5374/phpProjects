<!DOCTYPE html>
<html>
<head>
	<title>Login Screen</title>
	<style>
		fieldset{width:200px; high:100px; background:lightblue;}
	</style>
</head>
<body>
<form method="POST" action="login.php">
		<fieldset>
			<input type="text" name="username" placeholder="Username" required autofocus>
			<input type="password" name="password" placeholder="Password" required>
			<input type="hidden" name="login" value="False">
			<input type="submit" name="submit" value="submit">
		</fieldset>
	</form>
</body>
</html>