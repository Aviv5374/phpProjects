<?php
define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DB","exercise12");

$con = mysqli_connect(HOST,USER,PASS,DB);
mysqli_set_charset($con, "utf8");

?>