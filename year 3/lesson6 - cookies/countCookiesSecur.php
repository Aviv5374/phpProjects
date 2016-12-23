<?php
if(isset($_COOKIE["visit"])){
	$visit = $_COOKIE["visit"]+1;
	setcookie("visit",$visit, time()+3600*24*365,null,null,null,true);
	echo "Visit number: $visit";
}
else{
	$visit = 1;
	setcookie("visit",$visit, time()+3600*24*365,null,null,null,true);
	echo "Visit number: $visit";
}

?>