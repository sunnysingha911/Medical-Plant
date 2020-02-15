<?php
	include("config.php");
	include_once "Interface.html";
?>
<head>	
<title>Search Results</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
</head>
<?php
	include('s2.php');  
	
	echo "<h1><font color = white>Search Results</font></h1>";
	echo "<div class = 'plantinfo'>";
	echo "<div style = 'margin-left: 100px;margin-right: 100px;'>";
	echo "<table border>";
	echo "<tr>";
		echo "<th width = '250'>";
			echo "Botanical Name";
		echo "</th>";
		echo "<th>";
			echo "Common Name";
		echo "</th>";
		echo "<th>";
			echo "Local Name";
		echo "</th>";
		echo "<th>";
			echo "Family";
		echo "</th>";
		echo "<th>";
			echo "View";
		echo "</th>";
	echo "<tr>";
	if(!empty($_POST["search"]) or !empty($_GET["search"])){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$search = $_POST["search"];
		}elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
			$search = $_GET["search"];
		}	
		$data_search = "SELECT * FROM plantinfo,language WHERE plantinfo.Botanical_name LIKE '%$search%' and plantinfo.S_no = language.S_no OR plantinfo.Common_name LIKE '%$search%' and plantinfo.S_no = language.S_no OR language.Name LIKE '%$search%' and plantinfo.S_no = language.S_no";
		$result = $conn->query($data_search);
		if($result->num_rows>0){
			if($search != ""){
				while($row = $result->fetch_assoc()){
				$S_no = $row["S_no"];
				$Botanical_name = $row["Botanical_name"];
				$Author_name = $row["Author_name"];
				$Common_name = $row["Common_name"];
				$Family = $row["Family"];
				$Habit = $row["Habit"];
				$Fruiting_time = $row["Fruiting_time"];
				$Flowering_time = $row["Flowering_time"];
				$Availability_fq = $row["Avaibality_Fq"];
				$Mode_of_prop = $row["Mode_of_prop"];
				$Habitat = $row["Habitat"];
				$Description = $row["Description"];
				$Medical_usage = $row["Medical_usage"];
				
				$Collector_name = $row["Collector_name"];
				$Date = $row["Date"];
				
				$Name = $row["Name"];
				$Language = $row["Language"];
				
				echo "<tr>";
					echo "<td>";	
							echo "<i>".$Botanical_name."</i>".$Author_name;
					echo "</td>";
					echo "<td>";
							echo $Common_name;	
					echo "</td>";
					echo "<td>";
							echo $Name." (".$Language.")";	
					echo "</td>";	
					echo "<td>";
							echo $Family;	
					echo "</td>";	
					echo "<td>";
							echo "<a href = 'data_output.php?search=$row[S_no]'>"."<img src='view.png' style='width:30px;height:30px;'>"."</a>";	
					echo "</td>";	
				echo "</tr>"; 
				}
		
		
			}else{
				echo "Blank Data";
			}
		}else{
			
			echo "No data Found";
			//exit();
		}
			
	}else{
		echo "Input Not Found";
	}
	echo "</table>";
	echo "</div>";
	echo "</div>";	
	echo "<br>";
	include_once "Interfacebottom.html";	
?>