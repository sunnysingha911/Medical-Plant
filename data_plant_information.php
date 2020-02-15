<?php 
	include("config.php");
	
	$s_no = $_POST["s_no"];
	
	$botanical_name = mysqli_real_escape_string($conn,$_POST["botanical_name"]);
	$author_name = mysqli_real_escape_string($conn,$_POST["author_name"]);
	$common_name =  mysqli_real_escape_string($conn,$_POST["common_name"]);
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
	
	
	$dat_val = "select * from plantinfo where S_no = $s_no";
	$resultb = $conn->query($dat_val);
	if ($resultb->num_rows > 0){	
		//while($rowb = $resultb->fetch_assoc()){ 
		//}
		//include_once "insert.php";
		echo "<script type='text/javascript'>alert('Data Already Exist');location='insert.php';</script>";
		//header("location:insert.php"Message=" . urlencode('Data Already Exist'));
		//$Message = "Data Exist";
		//header("Location: insert.php?Message=" . urlencode($Message));
	}else{
	
	//$herbarium=$_FILES['herbarium']['name'];
	/*if(isset($_FILES['herbarium'])){
		$herbarium=$_FILES['herbarium']['name'];
	$uploadOk = 1;
	  if (move_uploaded_file($_FILES["herbarium"]["tmp_name"], "herbarium/".basename($_FILES['herbarium']['name']))){
        $uploadOk = 0;
    } else {
        echo "<script type='text/javascript'>alert('Data Inserted Sucessfully');</script>";
    }
	}*/
	
	
	$target_dir = "herbarium/";
$target_file = $target_dir . basename($_FILES["herbarium"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_FILES['herbarium'])){
	$herbarium=$_FILES['herbarium']['name'];
}
// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["herbarium"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["herbarium"]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES["herbarium"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["herbarium"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your Image.";
    }
}
	
	$data_plant = "INSERT INTO plantinfo (S_no,Botanical_name,Author_name,Common_name,Family,Habit,Fruiting_time,Flowering_time,Avaibality_Fq,Mode_of_prop,Habitat,Description,Medical_usage,Herbarium,Collector_name,Date) VALUES ('$s_no','$botanical_name','$author_name','$common_name','$family','$habit','$fruiting_time','$flowering_time','$availability_fq','$mode_of_prop','$habitat','$description','$medical_usage','$herbarium','$collector_name','$date')";
  
 if($conn->query($data_plant)==TRUE){
	echo "<script type='text/javascript'>alert('Data Inserted Sucessfully');location='insert.php';</script>";
	//include_once "insert.php";
}else{
	echo "Error: " .$data_plant ."<br>" . $conn->error;
}
	include("data_language.php");
	include("data_uses.php");
	include("data_block.php");
	include("data_organisation.php");
	include("data_image.php");
	include("data_references.php");
	include_once "insert.php";
	//echo "<script type='text/javascript'>alert('Data Inserted Sucessfully');</script>";
	//header('Location: insert.php');
}
?>