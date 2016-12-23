<?php
if(!empty($_GET) and isset ($_GET["my_answer"])){
	$turn = $_GET["turn"];
	$turn++;
	$number = $_GET["number"];
	if($_GET["my_answer"] == $number){
		echo "Correct Answer!"."<br>";
		echo $number."<br>";
		echo $turn."<br>";
		exit();
	}	
}
else{
	$number1 = mt_rand(1,10);
	$number2 = mt_rand(1,10);
	$result = number1*number2;
	md5($result);
	$turn = 0; 
} 
?>

<html>
<head>
	<title>MultiplicationApp</title>
</head>
<body>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
		<input type="text" name="my_answer" autofocus>
		<input type="hidden" name="result" value="<?php echo $result?>">
		<input type="hidden" name="turn" value="<?php echo $turn?>">
		<br><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>