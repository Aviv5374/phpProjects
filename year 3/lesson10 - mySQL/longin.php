<html>
<head>
	<title>In The Database</title>
	<style>
		fieldset{width:200px; high:100px; background:lightgreen;}
	</style>
</head>
<body>
	<fieldset>
		<?php
		include 'db.php';
		
		//unted if's and check
		if (empty($_POST["username"]) OR empty($_POST["password"])){
			header("Location:login.html");
			echo "Mssing Variables";
			exit();
		}

		$inputUserName = $_POST["username"];
		$inputPassword = $_POST["password"];
		$sql = "SELECT * from login WHERE USERNAME='$inputUserName' AND PASSWORD='$inputPassword'";
		$res = mysqli_query($con,$sql);
		if (mysqli_num_rows($res)==1) {
			echo "Welcome ".$inputUserName."<br>";
			echo "some classified informatiom";
		}
		else{
			header("Location:login.html");
			echo "Permission Denied";
			exit();
		}
		?>
	</fieldset>




</body>
</html>
