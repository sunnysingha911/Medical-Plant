<?php
include("config.php");
$del = $_POST["delete_value"];										
$her = $_POST["her"];
	//include_once "admin_delete.php";								
	//DELETE IMAGE FROM IMAGE LOCATION
	
	$del_img = "SELECT * FROM image WHERE S_no = $del";
	$resultimg = $conn->query($del_img);
	if ($resultimg->num_rows > 0){	
		while($rowimg = $resultimg->fetch_assoc()){
			unlink("image/".$rowimg["Photo"]);
		}
	}	
	
	//DELETE HERBARIUM IMAGE FROM HERBARIUM LOCATION
	
	$del_img2 = "SELECT * FROM plantinfo WHERE S_no = $del";
	$resultimg2 = $conn->query($del_img2);
	if ($resultimg2->num_rows > 0){	
		while($rowimg2 = $resultimg2->fetch_assoc()){
			if (file_exists("herbarium/".$rowimg2["Herbarium"])) {
				echo "Sorry, file not present.";
				//$uploadOk = 0;
			}else{
			unlink("herbarium/".$rowimg2["Herbarium"]);
			}
		}
	}	
	
	//DELETE DATA FROM THE DATABASE
	
	$del_plantinfo = "Delete FROM plantinfo WHERE S_no = $del";
	if ($conn->query($del_plantinfo) === TRUE) {
			echo "<script type='text/javascript'>alert('Record Deleted Sucessfully'); window.history.go(-2);</script>";
			echo "Record Deleted Sucessfully";
			//header("Location: admin_delete.php");
			//echo "<script type='text/javascript'>alert('Record Deleted Sucessfully');</script>";	
			//unlink("herbarium/".$her);
		} else {
			echo "Error deleting record: " . $conn->error;
		}
		
?>