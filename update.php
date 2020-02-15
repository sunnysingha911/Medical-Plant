
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="tab.css">
	<script language="javascript" src = "validation.js"></script>
	<title>Update</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
	</head>
	<body>
		<?php
			include_once "Interface.html";
			include('session.php');
			//include_once "sidebar.html";
			include("admin_data_search.php");
		?>
		<h1 class = "head"><font color = white>Update</font></h1>
		<form action = "data_update.php" method = "POST" enctype="multipart/form-data">
			<div class = "plantinfo">
				<div style = "margin-left: 100px;margin-right: 100px;">
				<!--<font size = "50"><a href="#"  onClick="history.go(-1)">&#11160;</a></font>-->
					<table border>
						<tr><td><h2>Plant Information</h2></td></tr>
						<tr>
							<td>Serial No</td>
							<td><input type = "text" name = "s_no1" placeholder = "Serial No" onblur="numeric()" id = "number" value = "<?php echo $S_no ;?>"></td>
							<input type = "hidden" name = "s_no" placeholder = "Serial No" onblur="numeric()" id = "number" value = "<?php echo $S_no ;?>">
							<td>Date</td>
							<td><input type = "text" name = "date" placeholder = "Date" value = "<?php echo $Date;?>"></td>
						</tr>
						<tr>
							<td>Botanical Name</td>
							<td><input type = "text" name = "botanical_name" placeholder = "Botanical Name" id="pets" value = "<?php echo $Botanical_name ;?>"></td>
							<td>Author Name</td>
							<td><input type = "text" name = "author_name" placeholder = "Author Name" value = '<?php echo  $Author_name ; ?>'></td>
						</tr>		
						<tr>
							<td>Common Name</td>
							<td><input type = "text" name = "common_name" placeholder = "English" value = '<?php echo  htmlspecialchars($Common_name, ENT_QUOTES) ; ?>'></td>
							<td>Family</td>
							<td><input type = "text" name = "family" placeholder = "Family" value = "<?php echo $Family;?>"></td>
						</tr>
						<tr>
							<td>Habitat</td>
							<td><input type = "text" name = "habitat" placeholder = "habitat" value ="<?php echo $Habitat;?>"></td>
							<td>Habit</td>
							<td><input type = "text" name = "habit" placeholder = "Habit" value ="<?php echo $Habit;?>"></td>
						</tr>
						<tr>
							<td>Flowering Time</td>
							<td><input type = "text" name = "flowering_time" placeholder = "Flowering Time" value = "<?php echo $Flowering_time;?>"></td>
							<td>Fruiting Time</td>
							<td><input type = "text" name = "fruiting_time" placeholder = "Fruiting Time" value = "<?php echo $Fruiting_time;?>"></td>
						</tr>
						<tr>
							<td>Availability Freequency</td>
							<td><input type = "text" name = "availability_fq" placeholder = "Availability Freequency" value = "<?php echo $Availability_fq;?>"></td>
							<td>Mode of Propagation</td>
							<td><input type = "text" name = "mode_of_prop" placeholder = "Mode of Propagation" value = "<?php echo $Mode_of_prop;?>"></td>
						</tr>
						<tr>
							<td>Collector Name</td>
							<td><input type = "text" name = "collector_name" placeholder = "Collector Name" value = "<?php echo $Collector_name;?>"></td>
						</tr>
					</table>
					<table border>
						<tr>
							<td width = "160">Description</td>
							<td><textarea rows = "4" cols = "70" class="ta5" name = "description"><?php echo $Description;?></textarea></td>
						</tr>
					</table>
					<table border>
						<tr>
							<td width = "160">Human Medicinal Usage</td>
							<td><textarea rows = "4" cols = "70" class="ta5" name = "medical_usage"><?php echo $Medical_usage;?></textarea></td>
						</tr>
					</table>
					<br>
					<table border>
						<tr>
							<td><h2>Languages</h2></td>
						</tr>
						<tr>
							<td><a href="javascript:addElement();">Add</a></td>
						</tr>	
						<script type = "text/javascript">
							var intname=0;
							var intlanguage=0;
						</script>
						<?php
							include("config.php");
								$sqll =  "select Name,Language from language where S_no = $row[S_no]";
								$resultl = $conn->query($sqll);

								if ($resultl->num_rows > 0){
									while($rowl = $resultl->fetch_assoc()){
										//echo "<tr>";
										echo "<td>"."<span id = 'content'>"."</span>"."</td>";
										//echo "</tr>"		
						?>
						<script type="text/javascript">
							//FUNCTION TO ADD TEXT BOX ELEMENT
						function addElement()
						{
							intname = intname + 1;
							intlanguage = intlanguage + 1;
							var contentID = document.getElementById('content');
							var newTBDiv = document.createElement('div');
							newTBDiv.setAttribute('id','Hosp'+intname);
							newTBDiv.innerHTML = "<table><tr> <td width = '160'>Name "+intname+": </td> <td><input type='text' id='hospital_" + intname + "' placeholder = 'Name'  value = ' <?php echo htmlspecialchars($rowl["Name"], ENT_QUOTES);?> '  name='name[]'/> </td> <td width = '50'></td>   <td width = '160' >Language "+intlanguage+":</td> <td><input type='text' placeholder = 'Language' id='hospital_" + intlanguage + "'  value = '<?php echo htmlspecialchars($rowl["Language"], ENT_QUOTES);?>'  name='language[]'/></td> <td width = '50'></td>  <td><a href='javascript:removeElement(\"" + intlanguage + "\")'><font color = 'red'>Remove</font></a></td></tr><table>";
							contentID.appendChild(newTBDiv);
						}
						//FUNCTION TO REMOVE TEXT BOX ELEMENT
						function removeElement(id)
						{
							if(intname != 0 && intlanguage != 0)
								{ 	
									var contentID = document.getElementById('content');
									//alert(contentID);
									contentID.removeChild(document.getElementById('Hosp'+id));
									intname = intname-1;
									intlanguage = intlanguage-1;
								}
						}
						addElement();
						</script>
						<?php
								}	
							}		
						?>
						<tr>	
							<td><span id="content"></span></td>
						</tr>
					</table>
					<br>
					<table border>
						<tr>
							<td><h2>Uses</h2></td>
						</tr>
						<tr>
							<td><a href="javascript:addElement1();">Add</a></td>
						</tr>
						<script type = "text/javascript">
							var intpart=0;
							var intuses=0;
						</script>
						<?php	
							include("config.php");
							$sqll =  "select Part,Uses from part where S_no = $row[S_no]";
							$resultl = $conn->query($sqll);
							if ($resultl->num_rows > 0){
								while($rowl = $resultl->fetch_assoc()){ 
									//echo "<tr>";
									echo "<td>"."<span id = 'partuses'>"."</span>"."</td>";		
									//echo "</tr>";
						?>
						<script type="text/javascript">
						//FUNCTION TO ADD TEXT BOX ELEMENT
						function addElement1()
						{
							intpart = intpart + 1;
							intuses = intuses + 1;
							var conID = document.getElementById('partuses');
							var newTBDiv2 = document.createElement('div');
							newTBDiv2.setAttribute('id','Hosp1'+intpart);
							newTBDiv2.innerHTML = "<table><tr> <td width = '160'></td> <td width = '167'><input type='text' id='hospital_" + intpart + "' placeholder = 'Part'  value = '<?php echo htmlspecialchars($rowl["Part"], ENT_QUOTES);?>'  name='part[]'/> </td> <td width = '50'></td> <td><textarea rows = '4' cols = '70' placeholder = 'Uses' id='hospital_" + intuses + "' name='uset[]'><?php echo htmlspecialchars($rowl["Uses"], ENT_QUOTES);?></textarea></td> <td><a href='javascript:removeElement1(\"" + intuses + "\")'><font color = 'red'>Remove</font></a></td></tr><table>";
							conID.appendChild(newTBDiv2);
						}
						//FUNCTION TO REMOVE TEXT BOX ELEMENT
						function removeElement1(id)
						{
							if(intpart != 0 && intuses != 0)
							{ 
								var conID = document.getElementById('partuses');
								//alert(conID);
								conID.removeChild(document.getElementById('Hosp1'+id));
								intpart = intpart-1;
								intuses = intuses-1;
							}
						}
						addElement1();
						</script>
						<?php
							}	
						}		
						?>						
						<tr>
							<td><span id="partuses"></span></td>
						</tr>
					</table>
					<br>
					<table border>
						<tr>		
							<td><h2>Herbarium</h2></td>
						</tr>
						<tr>		
							<td>Herbarium Sheet</td>
							<td><input type="file" name="herbarium" accept="image/*" value = "<?php echo $row["Herbarium"];?>"></td>
							<input type = "hidden" name = "her" value = "<?php echo $row['Herbarium'];?>">
						</tr>
						<tr>		
							<?php 
								if($row["Herbarium"]==""){
									echo "<td>";
										echo "No Herbarium Image Uploaded";	
									echo "</td>";
								}else{
							?>
							<td style='width:20%; height:200px;text-align:center; vertical-align:middle' >
								<img src = 'herbarium/<?php echo $row["Herbarium"]; ?>'style='max-height:100%; max-width:100%;'>
							</td>
							<td>
								<a href = ' data_herbarium_image_delete.php?del= <?php echo $row['S_no'];?> '> <font color = 'red'>Delete</font></a>
							</td>	
							<?php
								}
								//echo "<td>"."<a href = 'data_herbarium_image_delete.php?del= $row[S_no];>"."<font color = 'red'>"."Delete"."</font>"."</a>"."</td>";			
							?>
						</tr>
					</table>
					<br>
					<table border>
						<tr>		
							<td><h2>Images</h2></td>
						</tr>
						<?php 	
							include("config.php");
							$sqlimg = "SELECT * FROM image where S_no = $row[S_no]";
							$resultimg = $conn->query($sqlimg);
							if ($resultimg->num_rows > 0){
								echo "<th>"."Image Name"."</th>";
								echo "<th>"."Image"."</th>";	
								echo "<th>"."</th>";	
								while($rowimg = $resultimg->fetch_assoc()){ 
									echo "<input type = 'hidden' name = 'del' value = '$rowimg[Image_id]'>";
									echo "<tr>";
										echo "<td>".$rowimg["Photo"]."</td>";	
						?>
										<td style='width:20%; height:200px;text-align:center; vertical-align:middle' >
											<img src = 'image/<?php echo $rowimg["Photo"]; ?>'style='max-height:100%; max-width:100%;'>
										</td>		
						<?php					
										echo "<td>"."<a href = 'data_image_delete.php?del= $rowimg[Image_id]&img=$rowimg[Photo]'>"."<font color = 'red'>"."Delete"."</font>"."</a>"."</td>";		
										//echo "<td>"."<input type = 'submit' name = 'Delete' value = 'Delete'>"."</td>";		
									echo "</tr>";
								}
							}else{
								echo "<td>";
										echo "No Image Uploaded";	
								echo "</td>";
							}			
						?>
						<tr>
							<td><a href="javascript:addElement2();">Add</a></td>
						</tr>
						<tr>	
							<td></td>
							<td><span id="image3"></span></td>
						</tr>
					</table>
					<br>
					<!--<table border>
						<tr>
							<td><h2>Block</h2></td>
						</tr>
						<tr>
							<td width = "160">Block</td>
							<td width = "100"><input type = "checkbox" value = "A" name = "check[]" id = "A">A Block</td>
							<td><input type = 'text' placeholder = 'Population' name = 'population[]' id = "popA"></td>	
							<td width = "50"></td>
							<td width = "100"><input type = "checkbox" value = "B" name = "check[]" id = "B">B Block</td>
							<td><input type = 'text' placeholder = 'Population' name = 'population[]' id = "popB"></td>	
						</tr>
						<tr>
							<td width = "160"></td>
							<td width = "100"><input type = "checkbox" value = "C" name = "check[]" id = "C">C Block</td>
							<td><input type = 'text' placeholder = 'Population' name = 'population[]' id = "popC"></td>	
							<td width = "50"></td>
							<td width = "100"><input type = "checkbox" value = "D" name = "check[]" id = "D">D Block</td>
							<td><input type = 'text' placeholder = 'Population' name = 'population[]' id = "popD"></td>	
						</tr>
						<?php
							include("config.php");
								$sqlq =  "select  Block_name,Population from block where S_no = $row[S_no]";
								$resultq = $conn->query($sqlq);
								if ($resultq->num_rows > 0){
									while($rowq = $resultq->fetch_assoc()){ 
										if ($rowq["Block_name"] == "A")
											{?>
												<script type="text/javascript">
													document.getElementById("A").checked = true;
													document.getElementById("popA").value='<?php echo $rowq["Population"];?>';
												</script>
											<?php	}
										else if($rowq["Block_name"] == "B")
											{?>
												<script type="text/javascript">
													document.getElementById("B").checked = true;
													document.getElementById("popB").value='<?php echo $rowq["Population"];?>';
												</script>';	
											<?php	}
										else if($rowq["Block_name"] == "C")
											{?>
												<script type="text/javascript">
													document.getElementById("C").checked = true;
													document.getElementById("popC").value='<?php echo $rowq["Population"];?>';
												</script>	
											<?php	}
										else if($rowq["Block_name"] == "D")
											{?>
												<script type="text/javascript">
													document.getElementById("D").checked = true;
													document.getElementById("popD").value='<?php echo $rowq["Population"];?>';
												</script>
									<?php	}
									}	
								}			
									?>
					</table>-->
					<br>
					<table border>
						<tr>
							<td><h2>Organisations</h2></td>
						</tr>
						<tr>
							<td><a href="javascript:organisation();">Add</a></td>
						</tr>
						<script type = "text/javascript">
							var oname=0;
							var district=0;
							var locality=0;
							var state=0;
							var latitude=0;
							var longitude=0;
							var bname=0;
							var population=0;
						</script>
						<?php 
							include("config.php");
							$sqlorg =  "select * from organisation where S_no = $row[S_no]";
							$resultorg = $conn->query($sqlorg);
							if ($resultorg->num_rows > 0){
								while($roworg = $resultorg->fetch_assoc()){ 
									//echo "<tr>";
									echo "<td>"."<span id = 'org'>"."</span>"."</td>";		
									//echo "</tr>";
						?>
						<script type="text/javascript">
							function organisation()
							{
								oname = oname + 1;
								district = district + 1;	
								locality = locality + 1;
								state = state + 1;
								latitude = latitude + 1;
								longitude = longitude + 1;
								bname = bname + 1;
								population = population + 1;		
	
							var conID5 = document.getElementById('org');
							var newTBDiv5 = document.createElement('div');
							newTBDiv5.setAttribute('id','Hosp5'+oname);
							newTBDiv5.innerHTML = "<table border> <tr><td><h2>Organisation "+oname+"</h2></td></tr> <tr><td>Name</td><td><input type='text' id='hospital_" + oname + "' placeholder = 'Organisation' value = '<?php echo htmlspecialchars($roworg["Name"], ENT_QUOTES);?>' Name' name='organisation[]'/></td><td>District</td><td><input type='text' value = '<?php echo htmlspecialchars($roworg["District"], ENT_QUOTES);?>' placeholder = 'District' id='hospital_" + district + "'name='district[]'/></td></tr>  <tr><td>Locality</td><td><input type='text' value = '<?php echo htmlspecialchars($roworg["Locality"], ENT_QUOTES);?>' id='hospital_" + locality + "' placeholder = 'Locality' name='locality[]'/></td><td>State</td><td><input type='text' value = '<?php echo htmlspecialchars($roworg["State"], ENT_QUOTES);?>' id='hospital_" + state + "' placeholder = 'State' name='state[]'/></td></tr> <tr><td><h2>Map Coordinates</h2></td></tr> <tr><td>Latitude</td><td><input type='text' value = '<?php echo htmlspecialchars($roworg["Latitude"], ENT_QUOTES);?>' id='hospital_" + latitude + "' placeholder = 'Latitude' name='latitude[]'/></td><td>Longitude</td><td><input type='text' value = '<?php echo htmlspecialchars($roworg["Longitude"], ENT_QUOTES);?>' id='hospital_" + longitude + "' placeholder = 'Longitude' name='longitude[]'/></td></tr><tr><td><a href='javascript:removeorganisation(\"" + oname + "\")'><font color = 'red'>Remove</font></a></td></tr></table>";
							conID5.appendChild(newTBDiv5);
	
								//newTBDiv5.innerHTML = "<table border> <tr><td><h2>Organisation	</h2></td></tr>   <tr><td>Name</td><td><input type='text' id='hospital_" + oname + "' placeholder = 'Organisation Name' name='organisation[]'/></td><td>District</td><td><input type='text' placeholder = 'District' id='hospital_" + district + "'name='district[]'/></td></tr>  <tr><td>Locality</td><td><input type='text' id='hospital_" + locality + "' placeholder = 'Locality' name='locality[]'/></td><td>State</td><td><input type='text' id='hospital_" + state + "' placeholder = 'State' name='state[]'/></td></tr> <tr><td><h2>Map Coordinates</h2></td></tr> <tr><td>Latitude</td><td><input type='text' id='hospital_" + latitude + "' placeholder = 'Latitude' name='latitude[]'/></td><td>Longitude</td><td><input type='text' id='hospital_" + longitude + "' placeholder = 'Longitude' name='longitude[]'/></td></tr><tr><td><a href='javascript:removeorganisation(\"" + oname + "\")'><font color = 'red'>Remove</font></a></td></tr><tr><td><a href= 'javascript:blocka();'>Add Block</a></td></tr></table> <br> <table border> <tr><td><span id='blockp'></span></td></tr></table>";
	
							}
							//FUNCTION TO REMOVE TEXT BOX ELEMENT
							function removeorganisation(id)
							{
								if(oname != 0)
								{ 
									var conID = document.getElementById('org');
									//alert(conID);
									conID.removeChild(document.getElementById('Hosp5'+id));
        
									oname = oname - 1;
									district = district - 1;
									locality = locality - 1;
									state = state - 1;
									latitude = latitude - 1;
									longitude = longitude - 1;
									bname = bname - 1;
									population = population - 1;
								}
							}
							organisation();
						</script>
						<?php
							}	
						}		
						?>		
						<tr><td><span id = "org"></span></td></tr>
						</table>
						<br>
						<table border>
						<tr>
							<td><h2>Block</h2></td>
						</tr>
						<tr>
							<td><a href="javascript:blocka();">Add</a></td>
						</tr>
						<script type = "text/javascript">
							var blname=0;
							var bpopulation=0;
							var inst=0;
						</script>
						<?php 
							include("config.php");
							$sqlbl =  "select * from block where S_no = $row[S_no]";
							$resultbl = $conn->query($sqlbl);
							if ($resultbl->num_rows > 0){
								while($rowbl = $resultbl->fetch_assoc()){ 
									//echo "<tr>";
									echo "<td>"."<span id = 'blockp'>"."</span>"."</td>";		
									//echo "</tr>";
						?>
						<script type="text/javascript">
							function blocka()
							{
								blname = blname + 1;
								bpopulation = bpopulation + 1;
								inst = inst + 1;
	
								var conID6 = document.getElementById('blockp');
								var newTBDiv6 = document.createElement('div');
								newTBDiv6.setAttribute('id','Hosp6'+blname);
								newTBDiv6.innerHTML = "<table> <tr> <td><input type='text' id='hospital_" + inst + "' placeholder = 'Organization Name' name='iname[]' value = '<?php echo htmlspecialchars($rowbl["OName"], ENT_QUOTES);?>' /></td> <td><input type='text' id='hospital_" + blname + "' placeholder = 'Block Name' name='blname[]' value = '<?php echo htmlspecialchars($rowbl["Block_name"], ENT_QUOTES);?>'/> </td> <td><input type='text' placeholder = 'Population' id='hospital_" + bpopulation + "' name='bpopulation[]' value = '<?php echo htmlspecialchars($rowbl["Population"], ENT_QUOTES);?>'/></td> <td><a href='javascript:removeblocka(\"" + blname + "\")'><font color = 'red'>Remove</font></a></td></tr><table>";
								conID6.appendChild(newTBDiv6);
							}
						//FUNCTION TO REMOVE TEXT BOX ELEMENT
							function removeblocka(id)
							{
								if(blname != 0)
								{ 
									var conID = document.getElementById('blockp');
									//alert(conID);
									conID.removeChild(document.getElementById('Hosp6'+id));
        
									blname = blname - 1;
									bpopulation = bpopulation - 1;
									inst = inst - 1;
								}
							}
							blocka();
						</script>
						<?php
							}	
						}		
						?>		
						<tr><td><span id = "blockp"></span></td></tr>
						</table>
						<!--	
						<tr>
							<td>Institute</td>
							<td><input type = "text" name = "institute" placeholder = "Institute" value = '<?php echo $Institute;?>'></td>
							<td>Collector Name</td>
							<td><input type = "text" name = "collector_name" placeholder = "Collector Name" value = '<?php echo $Collector_name;?>'></td>
						</tr>
						<tr>		
							<td>District</td>
							<td><input type = "text" name = "district" placeholder = "District" value = '<?php echo $District;?>'></td>
						</tr>
						<tr>
							<td>Locality</td>
							<td><input type = "text" name = "locality" placeholder = "Locality" value = '<?php echo $Locality;?>'></td>
							<td>State</td>
							<td><input type = "text" name = "state" placeholder = "State" value = '<?php echo $State;?>'></td>
						</tr>
						<tr>
							<td><h2>Map Coordinates </h2></td>
						</tr>
						<tr>		
							<!--<td width = "160" >Geographical Position</td>
							<td><input type = "text" name = "geo_pos" placeholder = "Geographical Position"></td>-->
						<!--	<td>Latitude</td>
							<td><input type = "text" name = "latitude" placeholder = "Latitude" value = '<?php echo $latitude;?>'></td>
							<td>Longitude</td>
							<td><input type = "text" name = "longitude" placeholder = "Longitude" value =  '<?php echo $longitude;?>'></td>
						</tr>
					</table>-->
					<br>
					<table border>
						<tr><td><h2>References</h2></td></tr>
						<tr>
							<th>Name of Book</th>
							<th>Article</th>
							<th>Author</th>
							<th>Place of Publication</th>
							<th>Volume/Issue</th>
							<th>Year</th>
							<th>Publisher</th>
							<th>Comment</th>
							<th></th>
						</tr>
						<!--<tr>
							<td><input type = "text" name = "rname[]" placeholder = "Name of Book"></td>
							<td><input type = "text" name = "article[]" placeholder = "Article"></td>
							<td><input type = "text" name = "author[]" placeholder = "Author"></td>
							<td><input type = "text" name = "publication[]" placeholder = "PLace of Publication"></td>
							<td><input type = "text" name = "vol[]" placeholder = "Volume/Issue"></td>
							<td><input type = "text" name = "year[]" placeholder = "Year"></td>
							<td><input type = "text" name = "publisher[]" placeholder = "Publisher"></td>
							<td><input type = "text" name = "coment[]" placeholder = "Comment"></td>
							<td><a href= "javascript:addElement3();">Add</a></td>
						</tr>		-->
						<tr>
							<td><a href= "javascript:addElement3();">Add</a></td>
						</tr>
						</table>
						<script type = "text/javascript">
							var name = 0;
							var article = 0;
							var author = 0;
							var publication = 0;
							var vol = 0;
							var year = 0;
							var publisher = 0;
							var coment = 0;
						</script>
						<?php	
							include("config.php");
							$sqlre =  "select * from reference where S_no = $row[S_no]";
							$resultre = $conn->query($sqlre);
							if ($resultre->num_rows > 0){
								while($rowre = $resultre->fetch_assoc()){ 
									//echo "<tr>";
									echo "<td>"."<span id = 'reference'>"."</span>"."</td>";		
									//echo "</tr>";
						?>
						<script type="text/javascript">
						//FUNCTION TO ADD TEXT BOX ELEMENT
						function addElement3()
						{
							name = name + 1;	
							article = article + 1;			
							author = author + 1;			
							publication = publication + 1;	
							vol = vol + 1;					
							year = year + 1;				
							publisher = publisher + 1;		
							coment = coment + 1;			
	
								var conID4 = document.getElementById('reference');
								var newTBDiv4 = document.createElement('div');
								newTBDiv4.setAttribute('id','Hosp4'+name);
								newTBDiv4.innerHTML = " <table border><tr><td><input type = 'text' value = '<?php echo htmlspecialchars($rowre["Name"], ENT_QUOTES);?>'  name = 'rname[]' id='hospital_" + name + "' placeholder = 'Name of Book'></td>   <td><input type = 'text' value = '<?php echo htmlspecialchars($rowre["Article"], ENT_QUOTES);?>' name = 'article[]' id='hospital_" + article + "' placeholder = 'Article'></td>    <td><input type = 'text' value = '<?php echo htmlspecialchars($rowre["Author"], ENT_QUOTES);?>' name = 'author[]' id='hospital_" + author + "' placeholder = 'Author'></td>	  <td><input type = 'text' value = '<?php echo htmlspecialchars($rowre["Place_of_Publication"], ENT_QUOTES);?>' name = 'publication[]' id='hospital_" + publication + "' placeholder = 'PLace of Publication'></td>  <td><input type = 'text' value = '<?php echo htmlspecialchars($rowre["Volume"], ENT_QUOTES);?>' name = 'vol[]' id='hospital_" + vol + "' placeholder = 'Volume/Issue'></td>	 <td><input type = 'text' value = '<?php echo htmlspecialchars($rowre["Year"], ENT_QUOTES);?>' name = 'year[]' id='hospital_" + year + "' placeholder = 'Year'></td>	<td><input type = 'text' value = '<?php echo htmlspecialchars($rowre["Publisher"], ENT_QUOTES);?>' name = 'publisher[]' id='hospital_" + publisher + "' placeholder = 'Publisher'></td>	<td><input type = 'text' value = '<?php echo htmlspecialchars($rowre["Comment"], ENT_QUOTES);?>' name = 'coment[]' id='hospital_" + coment + "' placeholder = 'Comment'></td> <td><a href='javascript:removeElement3(\"" + name + "\")'><font color = 'red'>Remove</font></a></td></tr></table>";
								conID4.appendChild(newTBDiv4);
						}
						//FUNCTION TO REMOVE TEXT BOX ELEMENT
						function removeElement3(id)
						{
							if(name != 0)
							{ 	
								var conID = document.getElementById('reference');
								conID.removeChild(document.getElementById('Hosp4'+id));
								name = name - 1;	
								article = article - 1;			
								author = author - 1;			
								publication = publication - 1;	
								vol = vol - 1;					
								year = year - 1;				
								publisher = publisher - 1;		
								coment = coment - 1;			
							}
						}

						addElement3();
						</script>
						<?php
							}	
						}		
						?>						
					<span id="reference"></span>
					<br>
					<table>
						<tr>
							<td><center><td><input type = "submit" value = "Update" name = "submit" style = "width:50%;" ></td></center></td>
							<td><center><td><input type = "Button" value = "Cancel" name = "submit" onclick = "history.go(-1)" style = "width:50%; background-color:red;"></td></center></td>
							<!--<td><center><td><input type="reset" value="Reset" style="width:50%;"></td></center></td>-->
						</tr>
					</table>
				</div>			
			</div>	
		</form>		
		<?php
			include_once "Interfacebottom.html";
		?>
	</body>
</html>
