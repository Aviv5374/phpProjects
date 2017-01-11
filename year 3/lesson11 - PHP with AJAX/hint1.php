<?php
$countries = array("Italy", "Garmany", "Isreal", "France", "Brazil", "Argentina", "Canada", "Colombia", "Cameroon", "Andorra", "Japan", "Vietnam", "Thailand", "Greece");

//if (isset($_GET)) {
	$quest = $_GET["q"];
$hint = "";

if ($quest != "") {
	$quest = strtolower($quest);
	$len = strlen($quest);
	foreach ($countries as $c) {
		if (stristr($quest, substr($c,0,$len))) {
			$hint .="$c ";
		}
	}
}

echo $hint === "" ? "no suggestion" : $hint;
//}

?>