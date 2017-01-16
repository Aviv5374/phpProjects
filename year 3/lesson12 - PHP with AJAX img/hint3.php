<?php
include 'db.php';

$hint = "";
if (!empty($_GET) and isset($_GET["q"])) {
	
	$quest = mysqli_real_escape_string($con,$_GET["q"]);

	if ($quest != "") {
		$quest = strtolower($quest);
		$sql = "SELECT * from countriesImg WHERE NAME LIKE '%$quest%'";
		$res = mysqli_query($con,$sql);

		while($row = mysqli_fetch_assoc($res)) {
				$hint .= " " .$row['NAME']. " " ."<img src=".$row['IMG'].">";
			}
		}
	}

echo $hint === "" ? "no suggestion" : $hint;

mysqli_close($con);
?>