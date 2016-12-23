<html>
<head>
<title>hello php</title>
<style>
fieldset{width:200px; high:100px; background:lightgreen;}
</style>
</head>
<body>
<fieldset>
<?php

$users = array('shai' => 'aa123',
               'aviv' => '7354',
                'noa' =>  'uuu');
$inputUserName = $_GET["username"];
$inputPassword = $_GET["password"];
	header('Refresh:10; url=https://www.google.co.il');
echo "go to google in 10 secents";
	?>
	</fieldset>




</body>
</html>
