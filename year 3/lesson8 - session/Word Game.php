<?php
session_start();
print_r($_SESSION);
echo "<br>";
//how I start a session/game? do in oder 1,2,3
if (!empty($_SESSION) and isset($_SESSION['turn']) and isset($_SESSION['answer']) and isset($_SESSION['score']) and isset($_SESSION['chosenCountries']) ) //check user answer3
{
	$_SESSION['turn']++;
	$_SESSION['answer']=$_SESSION['chosenCountries'];
	//game...
	
	if (!empty($_GET[]) and isset($_GET['my_answer']))
	{
		$_SESSION['chosenCountries']=strtolower($_SESSION['chosenCountries']);
		$_GET['my_answer'] = trim(strtolower($_GET['my_answer']));
		if ($_SESSION['chosenCountry']==$_GET['my_answer']) {
			$_SESSION['answer']="Correct Answer!";
			$_SESSION['score']++;
		}
	} 
	else {
		# code...
	}
	
	if ($_SESSION['turn']=>6) {
		//end game
	}

	
} 
else //reset set session2 
{
	$_SESSION['turn']=0;
	$_SESSION['answer']="";
	$_SESSION['score']=0;
	$_SESSION['chosenCountry']="";


	print_r($_SESSION);
	echo "<br>";
}
// set quesion 1 need to finish 2 and 3
//the origenal string
$stringOfCountries="Italy,Germany,Israel,France,Brazil,Argentina,Canada,Colombia,Cameroon,Andorra";
//the exploded string to array
$arrayOfCountries= explode(",",$stringOfCountries);
//find the length of the array -1 = find the bigest/largest/last index in the array
$largesIndex= count($arrayOfCountries)-1;
//with $largesIndex finding a rndom index in array length
$chosenIndex=mt_rand(0,$largesIndex);
echo $chosenIndex."<br>";
$_SESSION['chosenCountry'] = $arrayOfCountries[$chosenIndex];
echo $_SESSION['chosenCountry']."<br>";
$shuffledCountry = str_shuffle(strtolower($_SESSION['chosenCountry']));
	echo $shuffledCountry."<br>";

print_r($_SESSION);
	echo "<br>";
//print_r($arrayOfChosenIndexs);
//check style (css file) of html in php in the end
?>

<html>
<head>
	<title>Word Game</title>
</head>
<body style="background: lightblue; margin: 30px;">

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET" style= "background: white; border: 1px solid black; margin: 50 100 50 100; padding: 20 20 20 20; height: 250;
	width: 500;">
	<p id="answer" style="margin: 10 10 10 10;"><?php echo $_SESSION['answer']?></p>
	<h1 id="quesion" style="color: blue; margin: 10 10 10 10;"><?php echo $shuffledCountry?></h1>
	<input type="text" name="my_answer" required autofocus>
		<input type="submit" value="Submit">
	</form>
</body>
</html>