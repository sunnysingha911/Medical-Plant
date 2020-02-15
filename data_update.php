<?php
	include("data_search.php");
	
	$s_no1 = $_POST["s_no1"];
	
	$s_no = $_POST["s_no"];
	
	$botanical_name = mysqli_real_escape_string($conn,$_POST["botanical_name"]);
	$common_name =  mysqli_real_escape_string($conn,$_POST["common_name"]);
	$author_name =  mysqli_real_escape_string($conn,$_POST["author_name"]);
	$family = mysqli_real_escape_string($conn,$_POST["family"]);
	$habit = mysqli_real_escape_string($conn,$_POST["habit"]);
	$fruiting_time = mysqli_real_escape_string($conn,$_POST["fruiting_time"]);
	$flowering_time = mysqli_real_escape_string($conn,$_POST["flowering_time"]);
	$availability_fq = mysqli_real_escape_string($conn,$_POST["availability_fq"]);
	$mode_of_prop = mysqli_real_escape_string($conn,$_POST["mode_of_prop"]);
	$habitat = mysqli_real_escape_string($conn,$_POST["habitat"]);
	$description = mysqli_real_escape_string($conn,$_POST["description"]);
	$medical_usage = mysqli_real_escape_string($conn,$_POST["medical_usage"]);
	$collector_name = mysqli_real_escape_string($conn,$_POST["collector_name"]);
	$date = mysqli_real_escape_string($conn,$_POST["date"]);
	
	
	
	
	//$common_name = mysqli_real_escape_string($conn,$common_name);
	
	
	if(isset($_FILES['herbarium'])){
		$herbarium=$_FILES['herbarium']['name'];
	
		$target_dir = "herbarium/";
		$target_file = $target_dir . basename($_FILES["herbarium"]["name"]);
		$uploadOk = 1;
		//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if file already exists
		/*if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}*/
		// Check file size
		if ($_FILES["herbarium"]["size"] > 10000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["herbarium"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["herbarium"]["name"]). " has been uploaded.";
				$sqlimg="UPDATE plantinfo SET Herbarium = '$herbarium' WHERE S_no = '$s_no'"; 
				$img = $_POST["her"];
				//unlink("herbarium/".$img);
				if($conn->query($sqlimg)==TRUE){
					echo "<script type='text/javascript'>alert('image Updated Sucessfully plantinfo');</script>";
				}else{
					echo "Error: " ."<br>" . $conn->error;
				}
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
 $sql="UPDATE plantinfo SET S_no = '$s_no1',Botanical_name = '$botanical_name',Author_name = '$author_name',Common_name = '$common_name',Family = '$family',Habit = '$habit',Fruiting_time = '$fruiting_time',Flowering_time = '$flowering_time',Avaibality_Fq = '$availability_fq',Mode_of_prop = '$mode_of_prop',Habitat = '$habitat',Description = '$description',Medical_usage = '$medical_usage',Collector_name = '$collector_name',Date = '$date' WHERE S_no = '$s_no'";
  
 if($conn->query($sql)==TRUE){
	 echo "<script type='text/javascript'>alert('RECORD UPDATED SUCESSFULLY');window.history.go(-2);</script>";
	 //include_once "admin_search.php";
	//echo "<script type='text/javascript'>alert('Data updated Sucessfully');</script>";
}else{
	echo "Error: " .$sql ."<br>" . $conn->error;
}
$up = 0;
//Name and language
	$del_language = "Delete FROM language WHERE S_no = $s_no";
	if ($conn->query($del_language) === TRUE) {
			$up = 1;
			//echo "Record updated Language";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
	include("data_language.php");
	
	//Part and Uses
	$del_part = "Delete FROM part WHERE S_no = $s_no";
		if ($conn->query($del_part) === TRUE) {
			$up = 1;
			//echo "Record updated part";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
	include("data_uses.php");
	
	//Block and Population
	$del_block = "Delete FROM block WHERE S_no = $s_no";
		if ($conn->query($del_block) === TRUE) {
			$up = 1;
			//echo "Record updated Block";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
	include("data_block.php");

	//Organisation
	$del_org = "Delete FROM organisation WHERE S_no = $s_no";
		if ($conn->query($del_org) === TRUE) {
			$up = 1;
			//echo "Record updated Organisation";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
	include("data_organisation.php");
	
	//Reference
	$del_ref = "Delete FROM reference WHERE S_no = $s_no";
		if ($conn->query($del_ref) === TRUE) {
			$up = 1;
			//echo "Record updated Reference";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
	include("data_references.php");
	
	//Reference
	/*$del_img = "Delete FROM image WHERE S_no = $s_no";
		if ($conn->query($del_img) === TRUE) {
			echo "Record deleted from image";
		} else {
			echo "Error deleting record: " . $conn->error;
		}*/
	include("data_image.php");
	
	
?>