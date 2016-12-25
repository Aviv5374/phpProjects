<?php
session_start();

define("MAXRUONDS", 6);

if (!empty($_SESSION) and isset($_SESSION['turn']) and isset($_SESSION['answer']) and isset($_SESSION['score']) and isset($_SESSION['chosenCountry'])){
	//beginig game
	$_SESSION['turn']++;
	$_SESSION['answer']=$_SESSION['chosenCountry'];
	
	if (!empty($_GET) and isset($_GET['my_answer']))
	{
		$_SESSION['chosenCountry']=strtolower($_SESSION['chosenCountry']);
		$_GET['my_answer'] = trim(strtolower($_GET['my_answer']));
        //check user answer
		if ($_SESSION['chosenCountry']==$_GET['my_answer']) {
			$_SESSION['answer']="Correct Answer!";
			$_SESSION['score']++;
		}
	} 
	
	if ($_SESSION['turn'] >= MAXRUONDS) {
		//end game
		?>
		<html>
		<head>
			<title>Word Game</title>
			<link rel="stylesheet" type="text/css" href="css_style.css">
		</head>
		<body>
			<div></div>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
				<p id="answer"><?php echo $_SESSION['answer']?></p>
				<h1 id="score">Score: <?php echo $_SESSION['score']?>/ <?php echo MAXRUONDS?> </h1>
				<input id="new_session" type="submit" value="New Session">
			</form>
		</body>
		</html>
		<?php
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(),'',time()-86400,'/');
		}
		session_destroy();
		exit();
	}
} 
else //reset session
{
	$_SESSION['turn']=0;
	$_SESSION['answer']="";
	$_SESSION['score']=0;
	$_SESSION['chosenCountry']="";
}
//set quesion 
//the origenal string
$stringOfCountries="Italy,Germany,Israel,France,Brazil,Argentina,Canada,Colombia,Cameroon,Andorra";
//the exploded string to array
$arrayOfCountries= explode(",",$stringOfCountries);
//find the length of the array -1 = find the bigest/largest/last index in the array
$largesIndex= count($arrayOfCountries)-1;
//with $largesIndex finding a rndom index in array length
$chosenIndex=mt_rand(0,$largesIndex);

$_SESSION['chosenCountry'] = $arrayOfCountries[$chosenIndex];
$shuffledCountry = str_shuffle(strtolower($_SESSION['chosenCountry']));
?>

<html>
<head>
	<title>Word Game</title>
	<link rel="stylesheet" type="text/css" href="css_style.css">
</head>
<body>
	<div></div>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
		<p id="answer" ><?php echo $_SESSION['answer']?></p>
		<h1 id="quesion" ><?php echo $shuffledCountry?></h1>
		<input id="user_answer" type="text" name="my_answer" required autofocus>
		<input id="guess" type="submit" value="Guess">
	</form>
</body>
</html>