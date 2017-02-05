<?php
include 'db.php';

$dataString = "";

$sql = "SELECT * from book";
$res = mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($res)) {
	$dataString .= $row['path']. "|" .$row['title']."||";
}

echo $dataString;
exit();

?>