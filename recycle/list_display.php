<html>
<head>
<link rel="stylesheet" type="text/css" href="tab.css">

</head>
<body>
<?php
include("Interface.html");
 ?> 
 			<?php
				include("config.php");	
				$data = $_GET["search"];
				$sql =  "select * from language,plantinfo where language.S_no = plantinfo.S_no and language.Name = '$data' or plantinfo.Botanical_name = '$data' or plantinfo.Common_name = '$data'";
				
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					if($data != ""){
				echo "<form name = plantinfo action='data_search.php' method='POST'>";
				echo "<table id = 'ResponsiveTable'>";	
				echo "<tr id = 'HeadRow'>"."<td width = '500'  tableHeadData='Fname'>"."<h1>"."<font color = white>"."Search"."</font>"."</h1>"."</td>";
				echo "<td>"."<input type = 'text' name = 'search' size='50' placeholder = 'search'>"."</td>";
				echo "<td>"."<input type = 'submit' value = 'Search'>"."</td>"."</tr>";
				echo "</table>";
				echo "</form>";
					$row = $result->fetch_assoc(); 
					echo "<font face = 'Arial'>";		
						echo "<div class='plantinfo'>	";
						echo "<table id ='ResponsiveTable'>";
							echo "<tr id = 'HeadRow'>";
								echo "<th>"."<h2>".$row["Botanical_name"]."(".$row["Common_name"].")"."</h2>"."</th>";
								echo "<th>"."</th>";
							echo "</tr>";
							echo "<tr>";
								echo "<td style='width:400px; height:350px;text-align:center; vertical-align:middle'>";		
									echo "<img src = 'uploads/".$row['Image']."' style='max-height:100%; max-width:100%;'>";
								echo "</td>";
								echo "<td>".$row["Description"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td valign = top style='width:400px; height:350px;text-align:center; vertical-align:top' >"."<br>"."<center>"."Herbarium Sheet"."</center>";
									echo "<img src = 'uploads/".$row['Herbarium']."' style='max-height:100%; max-width:100%;'>";
								echo "</td>";
								
								echo "<td valign='top'>";
									echo "<table id = 'ResponsiveTable'>";
										echo "<tr id = 'HeadRow'>";
											echo "<td width = 50>"."</td>";
											echo "<td width = 150>"."<b>Botanical Name:</b>"."</td>"."<td width = 200>".$row["Botanical_name"]."</td>";
											echo "<td width = 100>"."</td>";
											echo "<td width = 150>"."<b>Common Name:</b>"."</td>"."<td width = 200>".$row["Common_name"]."</td>";
										echo "</tr>";
									echo "</table>";	
									echo "<table id = 'ResponsiveTable'>";	
										$sql2 =  "select Name,Language from language where S_no = $row[S_no]";
										$result2 = $conn->query($sql2);
										if ($result2->num_rows > 0){
											echo "<tr id = 'HeadRow'>";
													echo "<td width = 33>"."</td>";
													echo "<td width = 150>"."<b>Names:</b>"."</td>";
													echo "<td>";
														while($row2 = $result2->fetch_assoc()){ 
															echo " ".$row2["Name"]."(".$row2["Language"].")";
														}
													echo "</td>";
													//echo "<td width = 100>"."</td>";
													//echo "<td width = 150>"."</td>";
											echo "</tr>";
										}
									echo "</table>";	
									
									echo "<table id = 'ResponsiveTable'>";	
										echo "<tr id = 'HeadRow'>";
											echo "<td width = 50>"."</td>";
											echo "<td width = 150>"."<b>Family:</b>"."</td>"."<td width = 200>".$row["Family"]."</td>";
											echo "<td width = 100>"."</td>";
											echo "<td width = 150>"."<b>Habit:</b>"."</td>"."<td width = 200>".$row["Habit"]."</td>";
										echo "</tr>";
										echo "<tr id = 'HeadRow'>";
											echo "<td width = 50>"."</td>";
											echo "<td width = 150>"."<b>Availability Freequency:</b>"."</td>"."<td width = 200>".$row["Avaibality_Fq"]."</td>";
											echo "<td width = 100>"."</td>";
											echo "<td width = 150>"."<b>Habitat:</b>"."</td>"."<td width = 200>".$row["Habitat"]."</td>";
										echo "</tr>";	
										echo "<tr id = 'HeadRow'>";
											echo "<td width = 50>"."</td>";
											echo "<td width = 150>"."<b>Flowering Time:</b>"."</td>"."<td width = 200>".$row["Flowering_time"]."</td>";
											echo "<td width = 100>"."</td>";
											echo "<td width = 150>"."<b>Fruiting Time:</b>"."</td>"."<td width = 200>".$row["Fruiting_time"]."</td>";
										echo "</tr>";
										echo "<tr id = 'HeadRow'>";
											echo "<td width = 50>"."</td>";
											echo "<td width = 150>"."<b>Mode of Propagation:</b>"."</td>"."<td width = 200>".$row["Mode_of_prop"]."</td>";
										echo "</tr>";
									echo "</table>";
									
										$sql5 =  "select Part,Uses from part where S_no = $row[S_no]";
										$result5 = $conn->query($sql5);
										if ($result5->num_rows > 0){
										echo "<table id = 'ResponsiveTable'>";	
											echo "<tr id = 'HeadRow'>";
													echo "<td width = 30>"."</td>";
													echo "<td width = 50>"."<font size = '4'><b>Uses:</b></font>"."</td>";
													echo "</td>";
											echo "</tr>";
										echo "</table>";		
										echo "<table id = 'ResponsiveTable'>";
											while($row5 = $result5->fetch_assoc()){ 
											echo "<tr id = 'HeadRow'>";
												echo "<td width = 50>"."</td>";
												echo "<td width = '110'>"."<b>".$row5["Part"]."</b>".":</td>"."<td>".$row5["Uses"]."</td>";
												echo "</td>";
											echo "</tr>";
											}
										}
									echo "</table>";
									
									$sql6 = "select Block_name,Population from block where S_no = $row[S_no]";
										$result6 = $conn->query($sql6);
										if ($result6->num_rows > 0){
										echo "<table id = 'ResponsiveTable'>";	
											echo "<tr id = 'HeadRow'>";
													echo "<td width = 30>"."</td>";
													echo "<td width = 200>"."<font size = '4'><b>Block Representation:</b></font>"."</td>";
													echo "</td>";
											echo "</tr>";
										echo "</table>";		
										echo "<table id = 'ResponsiveTable'>";
											echo "<tr id = 'HeadRow'>";
												echo "<td width = 50>"."</td>";
												echo "<td width = '110'>"."<b>Block Name</b>"."</td>"."<td>"."<b>Population</b>"."</td>";
												echo "</td>";
											echo "</tr>";
											while($row6 = $result6->fetch_assoc()){ 
											echo "<tr id = 'HeadRow'>";
												echo "<td width = 50>"."</td>";
												echo "<td width = '110' valign = top >"."Block ".$row6["Block_name"]."</td>"."<td valign = top>".$row6["Population"]."</td>";
												echo "</td>";
											echo "</tr>";
											}
										}
									echo "</table>";
																
									echo "<table id = 'ResponsiveTable'>";
										echo "<tr id = 'HeadRow'>";
											echo "<td width = 50>"."</td>";
											echo "<td width = 150>"."<b>Collector Name:</b>"."</td>"."<td width = 200>".$row["Collector_name"]."</td>";
											echo "<td width = 100>"."</td>";
											echo "<td width = 150>"."<b>Date:</b>"."</td>"."<td width = 200>".$row["Date"]."</td>";
										echo "</tr>";
										echo "<tr id = 'HeadRow'>";
											echo "<td width = 50>"."</td>";
											echo "<td width = 150>"."<b>District:</b>"."</td>"."<td width = 200>".$row["District"]."</td>";
											echo "<td width = 100>"."</td>";
											echo "<td width = 150>"."<b>Locality:</b>"."</td>"."<td width = 200>".$row["Locality"]."</td>";
										echo "</tr>";
										echo "<tr id = 'HeadRow'>";
											echo "<td width = 50>"."</td>";
											echo "<td width = 150>"."<b>State:</b>"."</td>"."<td width = 200>".$row["State"]."</td>";
										echo "</tr>";
									echo "</table>"	;
								echo "</td>";
							echo "</tr>";
							
						echo "</table>";
						echo "</div>"."</font>";
					}			
				}else{
					include_once "search.php";
					echo "<script type='text/javascript'>alert('Data Unavailable');</script>";
				}		
$conn->close(); 
?>	

	<?php
		include("Interfacebottom.html");
	?>
</body>
</html>