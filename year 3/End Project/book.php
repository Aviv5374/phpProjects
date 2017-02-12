<?php
session_start();
include 'db.php';
define("KILOBYTE", 1000);
define("MEGABYTE", (KILOBYTE*KILOBYTE));
define("GIGABYTE", (KILOBYTE*MEGABYTE));
$uploadStutose="";

if(empty($_SESSION) or isset($_POST['logout'])){
	header("refresh:2; url=login.php");
	echo "Goodbye";
	exit();
}
else if (isset($_POST['UploadImage'])) 
{
	if (isset($_FILES['fileToUpload']) and !empty($_POST['title'])) 
	{
       if ($_FILES['fileToUpload']['size'] > 35*MEGABYTE) //check size
       {
       	header("refresh:1; url=".$_SERVER['PHP_SELF']."");
       	$_SESSION["strTemp"]="Your File is too Large";
       	exit();
       }

       $file_path = "uploads/";
       $file_path = $file_path . basename($_FILES['fileToUpload']['name']);

       $file_ext = pathinfo($file_path,PATHINFO_EXTENSION);
       $expensions = array("jpeg", "jpg", "png");
       if (!in_array($file_ext, $expensions))// check  
       {
       	header("refresh:1; url=".$_SERVER['PHP_SELF']."");
       	$_SESSION["strTemp"]="Sorry, Only JPEG/JPG/PNG Files are allowed";
       	exit();     
       }

       $title = mysqli_real_escape_string($con,$_POST['title']);
       $sql = "SELECT title FROM book WHERE title='$title'";
       $res = mysqli_query($con,$sql);
	   if (file_exists($file_path) or mysqli_num_rows($res)==1)// check if the file already exists
	   {
	   	header("refresh:1; url=".$_SERVER['PHP_SELF']."");
	   	$_SESSION["strTemp"]="File already exists";
	   	exit();
	   }

	   if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_path))
	   {
	   	

	   	$sql = "INSERT INTO book VALUE (null, '$file_path', '$title', null)";
	   	if (mysqli_query($con, $sql)) 
	   	{
	   		$uploadStutose="success";
	   	}
	   	else $uploadStutose="SQL Fail";
	   }
	   else $uploadStutose="fail"; 
	}
	else $uploadStutose="Missing Variables";
}

if ($uploadStutose=="" and $_SESSION["strTemp"]!="") {
		$uploadStutose=$_SESSION["strTemp"];
		$_SESSION["strTemp"]="";
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Famliy Book</title>
	<link rel="stylesheet" type="text/css" href="style.php">
	<script type="text/javascript">
		
		function CreateNewImageDiv(Book,itemArray) {
			var NewImageDiv = document.createElement("div");
			NewImageDiv.setAttribute("class", "Image");

			var NewImageSurce = document.createElement("img");
			NewImageSurce.setAttribute("src", ""+itemArray[0]+"");
			NewImageDiv.appendChild(NewImageSurce);

			var NewImageTitel = document.createElement("p");
			NewImageTitel.setAttribute("class", "title");
			NewImageTitel.innerText = ""+itemArray[1]+"";
			NewImageDiv.appendChild(NewImageTitel);

			Book.appendChild(NewImageDiv);	
		}

		function ajaxHint() {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var Book = document.getElementById("Book");
					Book.innerHTML="";
					var dataArray = this.responseText.split("||");
					for (var i = 0; i < dataArray.length-1; i++) {
						var itemArray = dataArray[i].split("|");
						CreateNewImageDiv(Book,itemArray);
					}
				}
			};
			xmlhttp.open("POST","upload.php",true);
			xmlhttp.send();

		}

//ajaxHint();


</script>
</head>
<body>		
	
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
		Select image to upload:
		<p id="uploadStutose"><?php echo "$uploadStutose";?></p>
		<input id="fileToUpload" type="file" name="fileToUpload">
		<input type="text" name="title" value="" placeholder="Title">
		<input type="submit" value="Upload Image" name="UploadImage">
		<input type="submit" name="logout" value="Logout">
	</form>	

	<div id="Book"></div>

	<script type="text/javascript">
		setInterval(ajaxHint,1000);
	</script>	
</body>
</html>