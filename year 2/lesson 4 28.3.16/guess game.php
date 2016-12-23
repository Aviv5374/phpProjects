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
	$number = mt_rand(1,100);
	$turn = 0; 
} 
?>

<html>
<head>
	<title>Guess Game</title>
</head>
<body>
Guess a number 1...100
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
		<input type="text" name="my_answer" autofocus>
		<input type="hidden" name="number" value="<?php echo $number?>">
		<input type="hidden" name="turn" value="<?php echo $turn?>">
		<br><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>