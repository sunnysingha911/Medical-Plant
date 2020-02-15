<?php
	include("config.php");
	
	if(!empty($_POST["search"]) or !empty($_GET["search"])){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$search = $_POST["search"];
		}elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
			$search = $_GET["search"]; 
		}
		//$data_search = "SELECT * FROM language,plantinfo WHERE language.S_no = plantinfo.S_no AND plantinfo.S_no = '$search' OR language.Name = '$search' OR plantinfo.Botanical_name = '$search' OR plantinfo.Common_name = '$search'";
		$data_search = "SELECT * FROM plantinfo WHERE S_no = '$search'";
		$result = $conn->query($data_search);
		if($result->num_rows>0){
			if($search != ""){
				$row = $result->fetch_assoc();
				$S_no = $row["S_no"];
				$Botanical_name = $row["Botanical_name"];
				$Author_name = $row["Author_name"];
				
				if($row["Common_name"]==NULL){$Common_name = "UNKNOWN";}else{$Common_name = $row["Common_name"];}
				
				if($row["Family"]==NULL){$Family = "UNKNOWN";}else{$Family = $row["Family"];}
				
				if($row["Habit"]==NULL){$Habit = "UNKNOWN";}else{$Habit = $row["Habit"];}
				
				if($row["Habitat"]==NULL){$Habitat = "UNKNOWN";}else{$Habitat = $row["Habitat"];}
				
				if($row["Fruiting_time"]==NULL){$Fruiting_time = "UNKNOWN";}else{$Fruiting_time = $row["Fruiting_time"];}
				
				if($row["Flowering_time"]==NULL){$Flowering_time = "UNKNOWN";}else{$Flowering_time = $row["Flowering_time"];}
				
				if($row["Avaibality_Fq"]==NULL){$Availability_fq = "UNKNOWN";}else{$Availability_fq = $row["Avaibality_Fq"];}
				
				if($row["Mode_of_prop"]==NULL){$Mode_of_prop = "UNKNOWN";}else{$Mode_of_prop = $row["Mode_of_prop"];}
				
				if($row["Description"]==NULL){$Description = "No Description Available";}else{$Description = $row["Description"];}
				
				if($row["Medical_usage"] == NULL){$Medical_usage = "No Data Available";}else{$Medical_usage = $row["Medical_usage"];}
				
				$Collector_name = $row["Collector_name"];
				$Date = $row["Date"];
				
			}else{
				echo "Blank Data";
			}
		}else{
			echo "No data Found";
		}
	}else{
		echo "Input Not Found";
	}
?>