<?php
define("MINRAND", 1);
define("MAXRAND", 10);
define("MAXRUONDS", 5);
if(!empty($_GET) and isset ($_GET["my_answer"])){
	$turn = $_GET["turn"];
	$turn++;
	$points = $_GET["points"];
	if (md5($_GET["my_answer"])===$_GET["result"]) {
		$points+=20;
	}
	if ($turn==MAXRUONDS) {
		?>
		<html>
		<head>
			<title>MultiplicationApp</title>
		</head>
		<body style="background: lightblue; margin: 30px;">
			<h1 style="color: red;"><?php echo $points?></h1>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
				<input type="submit" value="New Session">
			</form>
		</body>
		</html>
		<?php
		exit();
	}
}
else{
	$turn = 1;
	$points = 0; 
}

$number1 = random_int(MINRAND,MAXRAND);
$number2 = random_int(MINRAND,MAXRAND);
$result = md5($number1*$number2);

?>

<html>
<head>
	<title>MultiplicationApp</title>
</head>
<body style="background: lightblue; margin: 30px;">
	Points: <?php echo $points?><br>Turn: <?php echo $turn?><br> 
	<hr>
	<h1 style="color: red;"><?php echo $number1?> X <?php echo $number2?> =</h1>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
		<input type="text" name="my_answer" required autofocus>
		<input type="hidden" name="result" value="<?php echo $result?>">
		<input type="hidden" name="points" value="<?php echo $points?>">
		<input type="hidden" name="turn" value="<?php echo $turn?>">
		<br><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>