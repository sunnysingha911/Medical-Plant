<html>
	<head>
	<title>Delete</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
	</head>
	<body>
		<?php
			include_once "Interface.html";
			include('session.php');
			//include_once "sidebar.html";
			include("admin_data_search.php");
		?>
		<h1 class = "head"><font color = white>Delete</font></h1>
		<div class = "plantinfo">
			<div style = "margin-left: 100px;margin-right: 100px;">
				<form method = 'POST' action = 'delete_data.php'>
					<input type = 'hidden' name = 'delete_value' value = '<?php echo $row["S_no"];?>'>
					<input type = 'hidden' name = 'her' value = '<?php echo $row["Herbarium"];?>'>
				<table>
					<tr>
						<th><h2><?php echo "<i>".$Botanical_name."</i> ".'('.$Common_name.')'; ?></h2></th>
						<th></th>
					<tr>
				</table>	
				<table>
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
									echo "No Image Available";
								echo "</td>";
						}
					?>
						<!--<td><img src = 'herbarium/<?php echo $row["Herbarium"]; ?>'></td>-->
						<td><?php echo $Description; ?></td>	
					</tr>
				</table>	
				<table border>
					<tr><td><h2>Plant Information</h2></td></tr>
					<tr>
						<td>Botanical Name:</td><td><?php echo $Botanical_name; ?></td>
						<td>Common Name:</td><td><?php echo $Common_name; ?></td>	
					</tr>			
					<tr>
						<td>Family:</td><td><?php echo $Family; ?></td>
						<td>Habit:</td><td><?php echo $Habit; ?></td>
					</tr>
					<tr>
						<td>Fruiting Time:</td><td><?php echo $Fruiting_time; ?></td>
						<td>Flowering Time:</td><td><?php echo $Flowering_time; ?></td>
					</tr>
					<tr>
						<td>Availability Freequency:</td><td><?php echo $Availability_fq; ?></td>
						<td>Mode of Propagation:</td><td><?php echo $Mode_of_prop; ?></td>
					</tr>
					<tr>
						<td>Habitat:</td><td><?php echo $Habitat;?></td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
							<center><input type = 'submit' value = 'Delete' style = 'width: 50%; background-color: red;' onclick="return confirm('Are you sure?')"></center>
						</td>
						<td>
							<center><input type = 'button' value = 'Cancel' style = 'width: 50%;' onclick = "history.go(-1)" ></center>
							

						</td>
					</tr>
				</table>
				<br>
			</form>		
			</div>	
		</div>
		<?php
			include_once "Interfacebottom.html";
		?>
	</body>
</html>