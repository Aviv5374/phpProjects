<?php
$testArr=array('num1' => 2);
print_r($testArr);
echo "<br>";
$testArr=array('num2' => 6);
print_r($testArr);
echo "<br>";
$arrayOfChosenIndexs = array('country2' => "",'country3' => "",'country4' => "",'country5' => "",'country6' => "");
print_r($arrayOfChosenIndexs);
echo "<br>";
$arrayOfChosenIndexs['country2']="lol";
print_r($arrayOfChosenIndexs);
echo "<br>";

$chosenIndex=mt_rand(0,9);
echo $chosenIndex."<br>";
$shuffledCountry = str_shuffle("Israel");
echo $shuffledCountry."<br>";

echo trim("Israel")."<br>";
echo " _Israel <br>";
echo trim(" _Israel ")."<br>";
echo trim(strtolower(" 56 _ IsraEl "))."<br>";

echo "stam"
?>