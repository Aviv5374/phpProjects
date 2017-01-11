<?php
include 'db.php';

$hint = "";
if (!empty($_GET) and isset($_GET["q"])) {
	
	$quest = mysqli_real_escape_string($con,$_GET["q"]);

	if ($quest != "") {
		$quest = strtolower($quest);
		//$len = strlen($quest);
		//$sql = ?
		foreach ($countries as $c) {
			if (stristr($c,$quest)) {
				$hint .="$c ";
			}
		}
	}
}

echo $hint === "" ? "no suggestion" : $hint;

mysqli_close($con);
?>