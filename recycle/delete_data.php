<?php
include("config.php");
$del = $_POST["delete_value"];
/*
	$del_part = "Delete FROM part WHERE S_no = $del";
		if ($conn->query($del_part) === TRUE) {
			echo "Record deleted from part";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
										
	$del_block = "Delete FROM block WHERE S_no = $del";
		if ($conn->query($del_block) === TRUE) {
			echo "Record deleted from block";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
						
	$del_language = "Delete FROM language WHERE S_no = $del";
	if ($conn->query($del_language) === TRUE) {
			echo "Record deleted from language";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
*/										
	$del_plantinfo = "Delete FROM plantinfo WHERE S_no = $del";
	if ($conn->query($del_plantinfo) === TRUE) {
			echo "Record deleted from plantinfo";
			//header("Location: admin_delete.php");
			echo "<script type='text/javascript'>alert('Record Deleted Sucessfully');</script>";	
			
		} else {
			echo "Error deleting record: " . $conn->error;
		}
									
?>