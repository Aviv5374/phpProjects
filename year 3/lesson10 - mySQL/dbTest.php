<?php
include 'db.php';
$sql = "INSERT INTO login VALUE (null, 'Doron10.5', '100'); ";
$sql.= "INSERT INTO login VALUE (null, 'Doron11', '111'); ";
$sql.= "INSERT INTO login VALUE (null, 'Doron12', '122');";

if(mysqli_multi_query($con, $sql)){
	echo "New User created successfully";
}else{
	echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>