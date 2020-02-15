<?php 
	include("config.php");
	
	$s_no = $_POST["s_no"];
	
	$do = 0;
	
	if(!empty($_POST['organisation']) and !empty($_POST['district']) and !empty($_POST['locality']) and !empty($_POST['state']) and !empty($_POST['latitude']) and !empty($_POST['longitude'])){
		$organisation = $_POST['organisation'];
		$district = $_POST['district'];
		$locality = $_POST['locality'];
		$state = $_POST['state'];
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		
		//if($latitude==""){$latitude=0;}
		//if($longitude==""){$longitude=0;}
		
		$u = count($organisation);
		$v = count($district);
		$w = count($locality);
		$x = count($state);
		$y = count($latitude);
		$z = count($longitude);
		
		if(!empty($organisation) and !empty($district) and !empty($locality) and !empty($state) and !empty($latitude) and !empty($longitude)){
			for($i=0,$j=0,$k=0,$l=0,$m=0,$n=0;$i<$u,$j<$v,$k<$w,$l<$x,$m<$y,$n<$z;$i++,$j++,$k++,$l++,$m++,$n++){
				//mysqli_real_escape_string($conn,);
				
				$organisation1 = $organisation[$i];
				$organisation1 = mysqli_real_escape_string($conn,$organisation1);
				
				$district1 = $district[$j];
				$district1 = mysqli_real_escape_string($conn,$district1);
				
				$locality1 = $locality[$k];
				$locality1 = mysqli_real_escape_string($conn,$locality1);
				
				$state1 = $state[$l];
				$state1 = mysqli_real_escape_string($conn,$state1);
				
				$latitude1 = $latitude[$m];
				$latitude1 = mysqli_real_escape_string($conn,$latitude1);
				
				$longitude1 = $longitude[$n];
				$longitude1 = mysqli_real_escape_string($conn,$longitude1);
				
				
				$data_organisation = "INSERT INTO organisation (Name,District,Locality,State,Latitude,Longitude,S_no) VALUES ('$organisation1','$district1','$locality1','$state1','$latitude1','$longitude1','$s_no')"; 
					$do = 1;
					if($conn->query($data_organisation)==TRUE){
						$do = 0;
						//echo "Inserted into organisation ";
						//include_once "insert.php";
						//echo "<script type='text/javascript'>alert('Data Inserted Sucessfully Organisation');</script>";
					}else{
						echo "Error: " .$data_organisation ."<br>" . $conn->error;
					}
			}
		}
	}

?>