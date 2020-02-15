<?php 
	include("config.php");
	
	$s_no = $_POST["s_no"];
	$botanical_name = $_POST["botanical_name"];
	
	$du = 0;
	
	if(!empty($_POST['part']) and !empty($_POST['uset'])){
		$part = $_POST['part'];
		$uses = $_POST['uset'];
		$n = count($part);
		$l = count($uses);
			for($i=0,$j=0;$i<$n,$j<$l;$i++,$j++){
				//mysqli_real_escape_string($conn,);
				
				$part1 = $part[$i];
				
				$part1 = mysqli_real_escape_string($conn,$part1);
				
				$uses1 = $uses[$j];
				
				$uses1 = mysqli_real_escape_string($conn,$uses1);
				
				$data_use = "INSERT INTO part (S_no,Part,Uses) VALUES ('$s_no','$part1','$uses1')"; 
				$du = 1;
					if($conn->query($data_use) == TRUE){
						$du = 0;
						//echo "Inserted into part ";
						//include_once "insert.php";
						//echo "<script type='text/javascript'>alert('Data Inserted Sucessfully Part');</script>";
					}else{
						echo "Error: " .$data_use."<br>" . $conn->error;
					}
			}
	}
?>