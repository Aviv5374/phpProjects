<?php
session_start();
include 'db.php';
define("KILOBYTE", 1000);
define("MEGABYTE", (KILOBYTE*KILOBYTE));
define("GIGABYTE", (KILOBYTE*MEGABYTE));


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
       	header("refresh:2; url=".$_SERVER['PHP_SELF']."");
       	echo "Your File is too Large";
       	exit();
       }

       $file_path = "uploads/";
       $file_path = $file_path . basename($_FILES['fileToUpload']['name']);

       $file_ext = pathinfo($file_path,PATHINFO_EXTENSION);
       $expensions = array("jpeg", "jpg", "png");
       if (!in_array($file_ext, $expensions))// check  
       {
       	header("refresh:2; url=".$_SERVER['PHP_SELF']."");
       	echo "Sorry, Only JPEG/JPG/PNG Files are allowed";
       	exit();     
       }

	   if (file_exists($file_path))// check if the file already exists
	   {
	   	header("refresh:2; url=".$_SERVER['PHP_SELF']."");
	   	echo "File already exists";
	   	exit();
	   }

	   if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_path))
	   {
	   	$title = mysqli_real_escape_string($con,$_POST['title']);

	   	$sql = "INSERT INTO book VALUE (null, '$file_path', '$title', null)";
	   	if (mysqli_query($con, $sql)) 
	   	{
	   		echo "success";
	   	}
	   	else echo "SQL Fail";
	   }
	   else echo "fail"; 
	}
	else echo "Missing Variables";
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Famliy Book</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
		
		function CreateNewImageDiv() {
			var Book = document.getElementById('Book');

			var NewImageDiv = document.createElement("div");
			var att = document.createAttribute("class");
			att.value = "Image";
			NewImageDiv.setAttributeNode(att);

			var NewImageSurce = document.createElement("img");
			NewImageSurce.setAttribute("src", "<?php echo $file_path ?>");
			NewImageDiv.appendChild(NewImageSurce);

			var NewImageTitel = document.createElement("p");
			NewImageTitel.text = "<?php echo "$title" ?>";
			NewImageDiv.appendChild(NewImageTitel);

			Book.appendChild(NewImageDiv);	
		}

		function ajaxHint() {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					//document.getElementById('')innerHTML = this.responseText;
					var NumberOfRuonds = this.responseText;
					for (var i = 0; i <= NumberOfRuonds; i++) {
						CreateNewImageDiv();
					}
				}
			};
			xmlhttp.open("POST","upload.php",true);
			xmlhttp.send();

		}
	}

ajaxHint();

	
</script>
</head>
<body>		
	
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
		<fieldset>
			Select image to upload:
			<input type="file" name="fileToUpload">
			<input type="text" name="title" value="" placeholder="Title">
			<input type="submit" value="Upload Image" name="UploadImage">
			<input type="submit" name="logout" value="Logout">
		</fieldset>
	</form>	
	<fieldset>
		<div id="Book">
			<div class="Image">
				<img src="">  
				<p class="title"></p>	
			</div>
		</div>
	</fieldset>	
</body>
</html>