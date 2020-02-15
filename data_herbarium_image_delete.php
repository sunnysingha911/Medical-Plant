<?php 
	include("config.php");
	$del = $_GET["del"];
	//$img = $_GET["img"];
	
	echo $del;
	//DELETE HERBARIUM IMAGE FROM HERBARIUM LOCATION
	
	$del_img3 = "SELECT * FROM plantinfo WHERE S_no = $del";
	$resultimg3 = $conn->query($del_img3);
	if ($resultimg3->num_rows > 0){	
		while($rowimg3 = $resultimg3->fetch_assoc()){
			unlink("herbarium/".$rowimg3["Herbarium"]);
		}
	}	
	
	//DELETE HERBARIUM  DATA FROM THE DATABASE
	$del_img = "UPDATE plantinfo SET Herbarium = '' WHERE S_no = $del";
		if ($conn->query($del_img) === TRUE) {
			echo "Record deleted from herbarium";
			//unlink("image/".$img);
		} else {
			echo "Error deleting record: " . $conn->error;
		}
?>