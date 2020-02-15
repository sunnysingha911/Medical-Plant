<html>
	<head>
	<link rel="stylesheet" type="text/css" href="tab.css">
	<style>
button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ddd;
}

button.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

button.accordion.active:after {
    content: "\2212";
}

div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
</style>
<title>Medicinal PLant</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
	</head>
	<body>
		<?php
			include_once "Interface.html";
			include('s2.php');  
			include("data_search.php");
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		?>
			<h1 class = "head"><font color = white>Search</font></h1>
			<div class = "plantinfo">
			<div style = "margin-left: 100px;margin-right: 100px;">
				<table>
					<tr>
						<th><h2><?php echo $Botanical_name.'('.$Common_name.')'; ?></h2></th>
						<th></th>
					<tr>
				</table>
			</div>
			</div>
		<?php 	
		}else if($_SERVER['REQUEST_METHOD'] === 'GET'){
		?>
			<br>
			<div class = "plantinfo">
			<div style = "margin-left: 100px;margin-right: 100px;">
				<table>
					<tr>
						<th><h2><i><?php echo $Botanical_name;?></i><?php echo $Author_name;?><?php echo "<br>".'('.$Common_name.')'; ?></h2></th>
						<th></th>
					<tr>
				</table>
			</div>
			</div>
		<?php 
		}
		?>
		<div class = "plantinfo">
			<div class = "plantinfo2">
				<table border>
					<tr>
							<?php 
						$sqlimg = "select * from image where S_no = $row[S_no]";
						$resultimg = $conn->query($sqlimg);
						if ($resultimg->num_rows > 0){	
							if($rowimg = $resultimg->fetch_assoc()){ 
				?>
						<td style='width:50%; height:400px;text-align:center; vertical-align:middle'>
							<a href="image/<?php echo $rowimg["Photo"]; ?>">
								<img src = 'image/<?php echo $rowimg["Photo"]; ?>' style='max-height:100%; max-width:100%;'>
							</a>
						</td>
							
				<?php
							}
						}else{
							echo "<td style='width:50%; height:400px;text-align:center; vertical-align:middle'>";
								echo "No Image available";
							echo "</td>";	
						}
					?>
						<td style='width:50%; height:400px;text-align:center; vertical-align:middle'>
							<?php
								if($Description==""){
									echo "No Description Available";
								}else{
									echo $Description; 
								}
							?>
						</td>	
					</tr>
					<tr>
						<td><a href = 'data_image_gallery.php?S_no=<?php echo $S_no;?>&Bname=<?php echo $Botanical_name;?>&Aname=<?php echo $Author_name;?>&Cname=<?php echo $Common_name; ?>'>View Gallery</a></td>
					</tr>
				</table>
				<br>
						
				<br>
				<table border>
					<tr>
						<td>
							<h2>Plant Information</h2>
							<div>	
							<table>
								<tr>
									<td>Botanical Name:</td><td><i><?php echo $Botanical_name; ?></i><?php echo $Author_name;?></td>
									<td>Common Name:</td><td><?php echo $Common_name; ?></td>	
								</tr>			
								<tr>
									<td>Family:</td><td><?php echo $Family; ?></td>
								</tr>
								<tr>
									<td>Habit:</td><td><?php echo $Habit; ?></td>
									<td>Habitat:</td><td><?php echo $Habitat;?></td>
								</tr>
								<tr>
									<td>Flowering Time:</td><td><?php echo $Flowering_time; ?></td>
									<td>Fruiting Time:</td><td><?php echo $Fruiting_time; ?></td>
								</tr>
								<tr>
									<td>Availability Freequency:</td><td><?php echo $Availability_fq; ?></td>
									<td>Mode of Propagation:</td><td><?php echo $Mode_of_prop; ?></td>
								</tr>
							</table>
							</div>
						</td>
					</tr>
				</table>
				<br>
				<button class="accordion">Language</button>
				<div class="panel">
				<table border>
					<tr>
						<td>
							<h2>Languages</h2>
							<div>
							<table>
								<?php 
									$sql2 =  "select Name,Language from language where S_no = $row[S_no]";
									$result2 = $conn->query($sql2);
									if ($result2->num_rows > 0){
										echo "<tr>";
											echo "<th>"."Name"."</th>";
											echo "<th>"."Language"."</th>";
										echo "</tr>";	
										while($row2 = $result2->fetch_assoc()){ 
											echo "<tr>";	
												echo "<td>".$row2["Name"]."</td>";
												echo "<td>".$row2["Language"]."</td>";
											echo "</tr>";
										}
									}else{
										echo "<tr>";
										echo "<td>"."No data"."</td>";
									echo "</tr>";
									}
								?>
							</table>
							</div>
						</td>
					</tr>
				</table>
				</div>
				<br>
				<button class="accordion">Uses</button>
				<div class="panel">
				<table border>
					<tr>
						<td>
							<h2>Uses</h2>
							<div>	
							<table>					
								<?php
									$sql5 =  "select Part,Uses from part where S_no = $row[S_no]";
									$result5 = $conn->query($sql5);
									if ($result5->num_rows > 0){
										echo "<tr>";
											echo "<th>"."Part"."</th>";
											echo "<th>"."Uses"."</th>";
										echo "</tr>";
										while($row5 = $result5->fetch_assoc()){ 
											echo "<tr>";
												echo "<td>".$row5["Part"]."</td>";
												echo "<td>".$row5["Uses"]."</td>";
											echo "</tr>";
										}
									}else{
										echo "<tr>";
											echo "<td>"."No data"."</td>";
										echo "</tr>";
									}	
								?>
							</table>
							</div>
						</td>
					</tr>	
				</table>	
				</div>
				<br>
				<button class="accordion">Herbarium Sheet & Human Medicinal Uses</button>
				<div class="panel">
				<table border>
					<tr>
						<td><h2>Herbarium Sheet</h2></td>
						<td><h2>Human Medicinal Usage</h2></td>
					</tr>
					<tr>
						<td style='width:50%; height:400px;text-align:center; vertical-align:middle'>
							
								<?php
									if($row["Herbarium"]==""){
										echo "No Image Available";
									}else{
								?>
								<a href="herbarium/<?php echo $row["Herbarium"]; ?>">
										<img src = 'herbarium/<?php echo $row["Herbarium"]; ?>' style='max-height:100%; max-width:100%;'>
									</a>
									<?php }?>
						</td>
						<td style='width:50%; height:400px;text-align:center; vertical-align:middle'>
							<?php echo $Medical_usage; ?>
						</td>
					</tr>	
				</table>	
				</div>
				<br>
				<!--<table border>
					<tr>	
						<td>
							<h2>Block Representation</h2>
							<div>
							<table>
								<?php 
									$sql6 = "select Block_name,Population from block where S_no = $row[S_no]";
									$result6 = $conn->query($sql6);
									if ($result6->num_rows > 0){	
										echo "<tr>";
											echo "<th>"."Block Name"."</th>";
											echo "<th>"."Population"."</th>";
										echo "</tr>";
										while($row6 = $result6->fetch_assoc()){ 
											echo "<tr>";
												echo "<td>".$row6["Block_name"]."</td>";
												echo "<td>".$row6["Population"]."</td>";
											echo "</tr>";
										}
									}else{
										echo "<tr>";
											echo "<td>"."No data"."</td>";
										echo "</tr>";
									}
								?>
							</table>
							</div>
						</td>
					</tr>
				</table>-->		
				
				<button class="accordion">Organizations</button>
				<div class="panel">
				<table border>
					<tr>
						<td>
							<h2>Organisations</h2>
							<div>
							
										<?php 
											$sqlo = "select * from organisation where S_no = $row[S_no]";
											$resulto = $conn->query($sqlo);
											if ($resulto->num_rows > 0){	
												
												while($rowo = $resulto->fetch_assoc()){ 
													$ornane = $rowo["Name"];
													echo "<table border>"."<tr>"."<td>";
												echo "<table>";
													echo "<tr>";
														echo "<td>"."<h3>"."Organisation Name"."</h3>"."</td>";
														echo "<td>"."<h3>".$rowo["Name"]."</h3>"."</td>";
													echo "</tr>";
													echo "<tr>";
														echo "<td>"."District"."</td>";
														echo "<td>".$rowo["District"]."</td>";
														echo "<td>"."Locality"."</td>";
														echo "<td>".$rowo["Locality"]."</td>";
													echo "</tr>";
													echo "<tr>";
														echo "<td>"."State"."</td>";
														echo "<td>".$rowo["State"]."</td>";
														echo "<td>"."Map"."</td>";
														$latitude = $rowo["Latitude"];
														$longitude = $rowo["Longitude"];
														$name = $rowo["Name"];
										?>	
														<td><a href = "map.php?lat=<?php echo $latitude; ?>&long=<?php echo $longitude; ?>&name=<?php echo $name;?>">View Map</a></td>
										<?php 
													echo "</tr>";
												echo "</table>"	;
										?>
												<table>
													<tr>
														<td>
															<h3>Block</h3>
															<div>
															<?php 
																
																$ornane = mysqli_real_escape_string($conn,$ornane);
																//$ornane = html_entity_decode(stripslashes($ornane));
																//$ornane = htmlspecialchars($ornane, ENT_QUOTES);
																
																//echo $ornane ;
																$sqlb = "select * from block where S_no = $row[S_no] and OName = '$ornane' ";
																$resultb = $conn->query($sqlb);
																if ($resultb->num_rows > 0){	
																	echo "<table>";
																		echo "<tr>";
																			echo "<th>"."Name"."</th>";
																			echo "<th>"."Population"."</th>";
																		echo "</tr>";
																	while($rowb = $resultb->fetch_assoc()){ 
																		echo "<tr>";
																			echo "<td>".$rowb["Block_name"]."</td>";
																			echo "<td>".$rowb["Population"]."</td>";
																		echo "</tr>";	
																	}
																	echo "</table>"	;
																}else{
																	echo "<tr>";
																		echo "<td>"."No data"."</td>";
																	echo "</tr>";
																}
															?>
															</div>
														</td>
													</tr>
												</table>	
												</td>
								</tr>
							</table>	<br>
											<?php
											}
											?>
											<?php	
											}else{
												echo "<tr>";
													echo "<td>"."No data"."</td>";
												echo "</tr>";
											}
											?>
							</div>
						</td>
					</tr>
				</table>
				</div>	
				<br>
				<button class="accordion">References</button>
				<div class="panel">
				<table border>
					<tr>
						<td>
							<h2>References</h2>
							<div>
							<table >
								<?php 
									$sql7 = "select * from reference where S_no = $row[S_no]";
									$result7 = $conn->query($sql7);
									if ($result7->num_rows > 0){	
										echo "<tr>";
											echo "<th>"."Name of Book"."</th>";
											echo "<th>"."Article"."</th>";
											echo "<th>"."Author"."</th>";
											echo "<th>"."Place of Publication"."</th>";
											echo "<th>"."Volume/Issue"."</th>";
											echo "<th>"."Year"."</th>";
											echo "<th>"."Publisher"."</th>";
											echo "<th>"."Comment"."</th>";
										echo "</tr>";
										while($row7 = $result7->fetch_assoc()){ 
											echo "<tr>";
												echo "<td>".$row7["Name"]."</td>";
												echo "<td>".$row7["Article"]."</td>";
												echo "<td>".$row7["Author"]."</td>";
												echo "<td>".$row7["Place_of_Publication"]."</td>";
												echo "<td>".$row7["Volume"]."</td>";
												echo "<td>".$row7["Year"]."</td>";
												echo "<td>".$row7["Publisher"]."</td>";
												echo "<td>".$row7["Comment"]."</td>";
											echo "</tr>";
										}
									}else{
										echo "<tr>";
											echo "<td>"."No data"."</td>";
										echo "</tr>";
									}
								?>
							</table>
							</div>
						</td>
					</tr>
				</table>	
				</div>	
			</div>	
		</div>
		<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}
</script>
		<br>
		<?php include("interfacebottom.html");?>
	</body>
</html>