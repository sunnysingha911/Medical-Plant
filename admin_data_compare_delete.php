<?php
	
	include("config.php");
	include_once "Interface.html";
?>
<title>Search Results</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
<?php		
	include('session.php');
	//include_once "sidebar.html";
	
	echo "<h1><font color = white>Search Results</font></h1>";
	echo "<div class = 'plantinfo'>";
	echo "<div style = 'margin-left: 100px;margin-right: 100px;'>";
	echo "<table border>";
	echo "<tr>";
		echo "<th>";
			echo "S_no";
		echo "</th>";
		echo "<th>";
			echo "Botanical Name";
		echo "</th>";
		echo "<th>";
			echo "Common Name";
		echo "</th>";
		echo "<th>";
			echo "Delete";
		echo "</th>";
	echo "<tr>";
	if(!empty($_POST["search"]) or !empty($_GET["search"])){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$search = $_POST["search"];
		}elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
			$search = $_GET["search"];
		}
		$data_search = "SELECT * FROM plantinfo WHERE S_no = '$search' OR Botanical_name LIKE '%$search%' OR Common_name LIKE '%$search%' ";
		//$data_search.= "SELECT Name from language WHERE Name LIKE '%$search%'";
		//$data_search = "SELECT DISTINCT * FROM plantinfo INNER JOIN language ON language.S_no = plantinfo.S_no WHERE language.Name LIKE '%$search%' OR plantinfo.Botanical_name LIKE '%$search%' OR plantinfo.S_no = '$search' OR plantinfo.Common_name LIKE '%$search%'";
		
		
		$result = $conn->query($data_search);
		if($result->num_rows>0){
			if($search != ""){
				while($row = $result->fetch_assoc()){
				$S_no = $row["S_no"];
				$Botanical_name = $row["Botanical_name"];
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
				
				echo "<tr>";
					echo "<td>";
						echo $S_no;
					echo "</td>";
					echo "<td>";	
						echo $Botanical_name;
					echo "</a>";	
					echo "</td>";
					echo "<td>";
							echo $Common_name;	
					echo "</td>";
					echo "<td>";
						echo "<a href = 'delete.php?search=$row[S_no]'>";
							echo "<img src='delete.png' style='width:30px;height:30px;'>"."</a>";
							//<a href="deletelink" onclick="return confirm('Are you sure?')">Delete</a>
						echo "</a>";	
					echo "</td>";	
				echo "</tr>"; 
				}
			}else{
				echo "Blank Data";
			}
		}else{
			echo "No data Found";
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