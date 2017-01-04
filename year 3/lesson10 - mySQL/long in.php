<html>
<head>
	<title>hello php</title>
	<style>
		fieldset{width:200px; high:100px; background:lightgreen;}
	</style>
</head>
<body>
	<fieldset>
		<?php

		$user = array('shai' => 'aa123',
			'aviv' => '7354',
			'noa' => 'uuu');
		//unted if's and check
		if (empty($_GET["username"]) OR empty($_GET["password"])){
			header("Refresh:10;url=/www/year%203/lesson%203%20-%20login/long%20in.html");
			echo "Mssing Variables";
			exit();
		}

		$inputUserName = $_GET["username"];
		$inputPassword = $_GET["password"];
		if (array_key_exists($inputUserName, $user) and $inputPassword === $user[$inputUserName]) {
			echo "Welcome ".$inputUserName."<br>";
			echo "some classified informatiom";
		}
		else{
			header("Refresh:10;url=/www/year%203/lesson%203%20-%20login/long%20in.html");
			echo "Permission Denied";
			exit();
		}
		?>
	</fieldset>




</body>
</html>
