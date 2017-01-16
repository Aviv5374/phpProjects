<!DOCTYPE html>
<html>
<head>
	<title>Hint2</title>
	<script>
		function ajaxHint(str){
			if(str.length == 0){
				document.getElementById("options").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("options").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET","hint3.php?q=" + str, true);
				xmlhttp.send();
			}
		}
	</script>
</head>
<body>
	<fieldset>
		<input type="search" name="keyword" onkeyup="ajaxHint(this.value)" placeholder="looking for" autofocus>
		<div id="options"></div>
	</fieldset>
</body>
</html>