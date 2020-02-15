<?php 
	include("config.php");
	
	$s_no = $_POST["s_no"];
	//$botanical_name = $_POST["botanical_name"];
	//$common_name =  $_POST["common_name"];
	
	//$botanical_name = mysqli_real_escape_string($conn,$_POST["botanical_name"]);
	$dl = 0;
	if(!empty($_POST['name']) and !empty($_POST['language'])){
		$name = $_POST['name'];
		$language = $_POST['language'];
		$n = count($name);
		$l = count($language);
		if(!empty($name) and !empty($language)){
			for($i=0,$j=0;$i<$n,$j<$l;$i++,$j++){
				
				$name1 = $name[$i];
				
				$name1 = mysqli_real_escape_string($conn,$name1);
				
				$language1 = $language[$j];
				
				$language1 = mysqli_real_escape_string($conn,$language1);
				
				$data_language = "INSERT INTO language (S_no,Name,Language) VALUES ('$s_no','$name1','$language1')"; 
					$dl = 1;
					if($conn->query($data_language)==TRUE){
						$dl = 0;
						//echo "Inserted into language ";
						//include_once "insert.php";
						//echo "<script type='text/javascript'>alert('Data Inserted Sucessfully language');</script>";
					}else{
						echo "Error: " .$data_language ."<br>" . $conn->error;
					}
			}
		}
	}

?>