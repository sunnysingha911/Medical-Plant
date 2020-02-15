<?php
	include("config.php");
	
	if(!empty($_POST["search"]) or !empty($_GET["search"])){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$search = $_POST["search"];
		}elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
			$search = $_GET["search"];
		}
		//$data_search = "SELECT * FROM language,plantinfo WHERE language.S_no = plantinfo.S_no AND language.Name = '$search' OR plantinfo.Botanical_name = '$search' OR plantinfo.Common_name = '$search' OR plantinfo.S_no = '$search'";
		$data_search = "SELECT * FROM plantinfo WHERE S_no = '$search'";
		$result = $conn->query($data_search);
		if($result->num_rows>0){
			if($search != ""){
				$row = $result->fetch_assoc();
				
				//$Common_name = html_entity_decode(stripslashes($row["Common_name"]));
				
				$S_no = $row["S_no"];
				
				$Botanical_name = html_entity_decode(stripslashes($row["Botanical_name"]));
				
				$Author_name = html_entity_decode(stripslashes($row["Author_name"]));
				
				$Common_name = html_entity_decode(stripslashes($row["Common_name"]));
				
				$Family = html_entity_decode(stripslashes($row["Family"]));
				
				$Habit = html_entity_decode(stripslashes($row["Habit"]));
				
				$Fruiting_time = html_entity_decode(stripslashes($row["Fruiting_time"]));
				
				$Flowering_time = html_entity_decode(stripslashes($row["Flowering_time"]));
				
				$Availability_fq = html_entity_decode(stripslashes($row["Avaibality_Fq"]));
				
				$Mode_of_prop = html_entity_decode(stripslashes($row["Mode_of_prop"]));
				
				$Habitat = html_entity_decode(stripslashes($row["Habitat"]));
				
				$Description = html_entity_decode(stripslashes($row["Description"]));
				
				$Medical_usage = html_entity_decode(stripslashes($row["Medical_usage"]));
				
				$Collector_name = html_entity_decode(stripslashes($row["Collector_name"]));
				
				$Date = html_entity_decode(stripslashes($row["Date"]));
				
			}else{
				echo "Blank Data";
			}
		}else{
			echo "No Data Found";
			exit();
		}
	}else{
		echo "Input Not Found";
	}
?>