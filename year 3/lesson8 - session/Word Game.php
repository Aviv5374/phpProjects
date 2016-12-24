<?php
session_start();
print_r($_SESSION);
echo "<br>";
//how I start a session/game? do in oder 1,2,3
if (!empty($_SESSION) and isset($_SESSION['turn']) and isset($_SESSION['answer']) and isset($_SESSION['arrOfChosenCountries']) and isset($_SESSION['score']) ) //check user answer3
{
	//game...
	/*if (!empty($_GET[])and isset ($_GET["my_answer"])) //?
	{
		# code...
	} 
	else {
		# code...
	}*/
	
} 
else //reset set session2 
{
	$_SESSION['turn']=0;
	$_SESSION['answer']="";
	$_SESSION['score']=0;

//array that help to check the country chosen only ones
$arrayOfChosenCountries = array('country1'=>"",'country2'=> "",'country3'=> "",'country4'=> "",'country5'=> "",'country6'=> "");
	print_r($arrayOfChosenCountries);
	echo "<br>";
	$_SESSION['arrOfChosenCountries']=$arrayOfChosenCountries;


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
$chosenCountry = $arrayOfCountries[$chosenIndex];
echo $chosenCountry."<br>";

//check that country chosen only ones. Too complicated, find a better way
if($_SESSION['arrOfChosenCountries']['country1']=="")
{
	$_SESSION['arrOfChosenCountries']['country1']=$chosenCountry;
	
}
else if ($_SESSION['arrOfChosenCountries']['country2']=="") {
	if($_SESSION['arrOfChosenCountries']['country1']==$chosenCountry){
		header("Refresh:1;$_SERVER["PHP_SELF"]");// or ('location:Word Game');
		exit();//?
	}
	$_SESSION['arrOfChosenCountries']['country2']=$chosenCountry;
}
else if ($_SESSION['arrOfChosenCountries']['country3']=="") {
	if($_SESSION['arrOfChosenCountries']['country1']==$chosenCountry or $_SESSION['arrOfChosenCountries']['country2']==$chosenCountry ){
		header("Refresh:1;$_SERVER["PHP_SELF"]");// or ('location:Word Game');
		exit();//?
	}
	$_SESSION['arrOfChosenCountries']['country3']=$chosenCountry;
} 
else if ($_SESSION['arrOfChosenCountries']['country4']=="") {
	if($_SESSION['arrOfChosenCountries']['country1']==$chosenCountryor or $_SESSION['arrOfChosenCountries']['country2']==$chosenCountryor or $_SESSION['arrOfChosenCountries']['country3']==$chosenCountry){
		header("Refresh:1;$_SERVER["PHP_SELF"]");// or ('location:Word Game');
		exit();//?
	}
	$_SESSION['arrOfChosenCountries']['country2']=$chosenCountry;
}
else if ($_SESSION['arrOfChosenCountries']['country5']=="") {
	if($_SESSION['arrOfChosenCountries']['country1']==$chosenCountryor $_SESSION['arrOfChosenCountries']['country2']==$chosenCountryor or $_SESSION['arrOfChosenCountries']['country3']==$chosenCountry or $_SESSION['arrOfChosenCountries']['country4']==$chosenCountry){
		header("Refresh:1;$_SERVER["PHP_SELF"]");// or ('location:Word Game');
		exit();//?
	}
	$_SESSION['arrOfChosenCountries']['country5']=$chosenCountry;
}   
else {
	if($_SESSION['arrOfChosenCountries']['country1']==$chosenCountryor $_SESSION['arrOfChosenCountries']['country2']==$chosenCountryor or $_SESSION['arrOfChosenCountries']['country3']==$chosenCountry or $_SESSION['arrOfChosenCountries']['country4']==$chosenCountry or $_SESSION['arrOfChosenCountries']['country5']==$chosenCountry){
		header("Refresh:1;$_SERVER["PHP_SELF"]");// or ('location:Word Game');
		exit();//?
	}
	$_SESSION['arrOfChosenCountries']['country6']=$chosenCountry;
}

$shuffledCountry = str_shuffle(strtolower($chosenCountry));
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
	<p id="answer" style="margin: 10 10 10 10;"><?php echo $answer?></p>
	<h1 id="quesion" style="color: blue; margin: 10 10 10 10;"><?php echo $shuffledCountry?></h1>
	<input type="text" name="my_answer" required autofocus>
		<input type="submit" value="Submit">
	</form>
</body>
</html>