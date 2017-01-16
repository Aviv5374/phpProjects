<?php
include 'db.php';

$sql = "SELECT * from countries WHERE name LIKE '%i%' ";
		$res = mysqli_query($con,$sql);

		while($row = mysqli_fetch_assoc($res)) {
				echo "<h2>cuontry: ".$row['name']."</h2>";
			}

mysqli_close($con);
?>