<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_FILES["photo"]) && $_FILES["photo"]["error"]==0)
	{
      $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
      $filename = $_FILES["photo"]["name"]; 
      $filetype = $_FILES["photo"]["type"]; 
      $filesize = $_FILES["photo"]["size"];
      $ext = pathinfo($filename, PATHINFO_EXTENSION); 
      if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
      $maxsize = 5 * 1024 * 1024;
      if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
  if(in_array($filetype, $allowed)) 
  	{  
  		if(file_exists("upload/" . $filename))
  			{ 
  				echo $filename . " is already exists."; 
  			} 
  			else
  			      { 
  				 move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
  				echo "Your file was uploaded successfully.";
  				   } 
  				} 
  				else 
  					{ 
  						echo "Error: There was a problem uploading your file. Please try again."; 
  					} 
  				} 
  				else
  				{ 
  					echo "Error: " . $_FILES["photo"]["error"]; 
  				} 
if($_FILES["photo"]["error"] > 0) 
	{ 
		echo "Error: " . $_FILES["photo"]["error"] . "<br>"; 
	} 
}
?>
<!DOCTYPE html>
<html lang="us-en">
<head>
	<meta charset="utf-8">
	<title>File Upload Form</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<h2>Hello Eyeryone Please Select the good Image/File: </h2>
		<label for="fileSelect">Please Select the Image/File:</label>
		<input type="file" name="photo" id="fileSelect"><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>