<form action="one.php" method="post">
	<input type="submit" value="bild1" name="clicked">
	<input type="submit" value="bild2" name="clicked"></p>
	<br>
</form>


<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<?php
	$b1 = "b1.jpg";
	$b2 = "b2.jpg";
	
	if (isset($_POST['clicked'])) {
		if ($_POST['clicked'] == "bild1") {
			echo "<img src= '$b1' alt='BILD' style='width:500px;height:500px;'>";
		} else if ($_POST["clicked"] == "bild2") {
			echo "<img src= '$b2' alt='BILD' style='width:500px;height:500px;'>";
		} else {
			//invalid action!
		}
	}
	
	echo "<br>hi";
?>
