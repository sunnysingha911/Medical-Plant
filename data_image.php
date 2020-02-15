<?php 
	include("config.php");
	
	$s_no = $_POST["s_no"];
	echo $S_no;
	$botanical_name = $_POST["botanical_name"];
	$dimg = 0;
	
	if(isset($_FILES['photo'])){
	$total = count($_FILES['photo']['name']);
	echo $total;
	
	// Loop through each file
	for($i=0; $i<$total; $i++) {
		if(isset($_FILES['photo'])){
			$image=$_FILES['photo']['name'];
		}
		$target_dir = "image/";
		$target_file = $target_dir . basename($_FILES["photo"]["name"][$i]);
		$uploadOk = 1;
		//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		/*if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["photo"]["tmp_name"][$i]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}*/
		// Check if file already exists
		/*if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}*/
		// Check file size
		if ($_FILES["photo"]["size"][$i] > 10000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}*/
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["photo"]["tmp_name"][$i], $target_file)) {
				echo "The file ". basename( $_FILES["photo"]["name"][$i]). " has been uploaded.";
				
				$data_image = "INSERT INTO image (S_no,Botanical_name,Photo) VALUES ('$s_no','$botanical_name','$image[$i]')";   
				$dimg = 1;
				if($conn->query($data_image)==TRUE){
					$dimg = 0;
					//echo "Inserted into images ";
					//include_once "insert.php";
					//echo "<script type='text/javascript'>alert('Data Inserted Sucessfully image array');</script>";
				}else{
					echo "Error: " .$data_plant ."<br>" . $conn->error;
				}
				
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
	}
?>