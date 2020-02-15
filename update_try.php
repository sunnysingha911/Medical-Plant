<?php 
	include("data_update.php");
	//Name and language
	$del_language = "Delete FROM language WHERE S_no = $s_no";
	if ($conn->query($del_language) === TRUE) {
			echo "Record deleted from language";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
	include("data_language.php");
	
	//Part and Uses
	$del_part = "Delete FROM part WHERE S_no = $s_no";
		if ($conn->query($del_part) === TRUE) {
			echo "Record deleted from part";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
	include("data_uses.php");
	
	//Block and Population
	$del_block = "Delete FROM block WHERE S_no = $s_no";
		if ($conn->query($del_block) === TRUE) {
			echo "Record deleted from block";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
	include("data_block.php");

	//Reference
	$del_ref = "Delete FROM reference WHERE S_no = $s_no";
		if ($conn->query($del_block) === TRUE) {
			echo "Record deleted from Reference";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
	include("data_references.php");
?>