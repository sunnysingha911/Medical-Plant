<?php 
	include("config.php");
	
	$s_no = $_POST["s_no"];
	$botanical_name = $_POST["botanical_name"];
	
	$qq = 0;
	
	if(!empty($_POST['iname']) and !empty($_POST['blname']) and !empty($_POST['bpopulation'])){
	$blname = $_POST['blname'];		
	$population = $_POST['bpopulation'];		
	$iname = $_POST['iname'];
	
	$aa = count($blname);
	$bb = count($population);
	$cc = count($iname);
	
	if(!empty($iname) and !empty($blname) and !empty($population)){
			for($i=0,$j=0,$k=0;$i<$aa,$j<$bb,$k<$cc;$i++,$j++,$k++){
				
				$blname1 = $blname[$j];
				
				$blname1 = mysqli_real_escape_string($conn,$blname1);
				
				$population1 = $population[$k];
				
				$population1 = mysqli_real_escape_string($conn,$population1);
				
				$iname1 = $iname[$i];
				
				$iname1 = mysqli_real_escape_string($conn,$iname1);
				
				$data_block = "INSERT INTO block (Block_name,Population,OName,S_no) VALUES ('$blname1','$population1','$iname1','$s_no')"; 
					$qq = 1;
					if($conn->query($data_block)==TRUE){
						$qq = 0;
						//echo "Inserted into block ";
						//include_once "insert.php";
						//echo "<script type='text/javascript'>alert('Data Inserted Sucessfully Block');</script>";
					}else{
						echo "Error: " .$data_block ."<br>" . $conn->error;
					}
			}
		}
	}

?>