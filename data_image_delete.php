<?php 
	include("config.php");
	$del = $_GET["del"];
	$img = $_GET["img"];
	$del_img = "Delete FROM image WHERE Image_id = $del";
		if ($conn->query($del_img) === TRUE) {
			echo "Record deleted from image";
			unlink("image/".$img);
		} else {
			echo "Error deleting record: " . $conn->error;
		}
?>