<html>
	<head>
		<link rel="stylesheet" type="text/css" href="tab.css">
	<script language="javascript" src = "validation.js"></script>
	<title>Insert Data</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
	</head>
	<body>
		<?php
			include_once "Interface.html";
			include('session.php');
			//include_once "sidebar.html";
		?>
		<h1 class = "head"><font color = white>Insert</font></h1>
		<form action = "data_plant_information.php" method = "POST" enctype="multipart/form-data">
			<div class = "plantinfo">
				<div style = "margin-left: 100px;margin-right: 100px;">
					<table border>
						<tr><td><h2>Plant Information</h2></td></tr>
						<tr>
							<td>Serial No</td>
							<td><input type = "text" name = "s_no" placeholder = "Serial No" onblur="numeric()" id = "number" maxlength="9"></td>
							<td>Date</td>
							<td><input type = "text" name = "date" placeholder = "Date"></td>
						</tr>
						<tr>
							<td>Botanical Name</td>
							<td><input type = "text" name = "botanical_name" placeholder = "Botanical Name" id="pets" required ></td>
							<td>Author Name</td>
							<td><input type = "text" name = "author_name" placeholder = "Author Name"></td>
						</tr>		
						<tr>
							<td>Common Name</td>
							<td><input type = "text" name = "common_name" placeholder = "English"></td>
							<td>Family</td>
							<td><input type = "text" name = "family" placeholder = "Family"></td>
						</tr>
						<tr>
							<td>Habit</td>
							<td> 
								<select name = "habit" class="dt1" style="width: 167px;">
									<option value = "Herb">Herb</option>
									<option value = "Climber">Climber</option>
									<option value = "Shrub">Shrub</option>
									<option value = "Tree">Trees</option>
								</select>
							</td>
							<td>Habitat</td>
							<td><input type = "text" name = "habitat" placeholder = "Habitat" ></td>
						</tr>
						<tr>
							<td>Flowering Time</td>
							<td><input type = "text" name = "flowering_time" placeholder = "Flowering Time"></td>
							<td>Fruiting Time</td>
							<td><input type = "text" name = "fruiting_time" placeholder = "Fruiting Time"></td>
						</tr>
						<tr>
							<td>Availability Freequency</td>
							<td><input type = "text" name = "availability_fq" placeholder = "Availability Freequency"></td>
							<td>Mode of Propagation</td>
							<td><input type = "text" name = "mode_of_prop" placeholder = "Mode of Propagation" ></td>
						</tr>
						<tr>
							<td>Collector Name</td>
							<td><input type = "text" name = "collector_name" placeholder = "Collector Name"></td>
						</tr>
					</table>
					<table border>
						<tr>
							<td width = "160">Description</td>
							<td><textarea rows = "4" cols = "70" class="ta5" name = "description"></textarea></td>
						</tr>
					</table>
					<table border>
						<tr>
							<td width = "160">Human Medicinal Usage</td>
							<td><textarea rows = "4" cols = "70" class="ta5" name = "medical_usage"></textarea></td>
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
					<!--		<td>Uses</td>
							<td><input type = "text" name = "partt" placeholder="Part"></td>
							<td><input type = "text" name = "usess" size="48" placeholder="Uses"></td>
					<!--	<td><textarea rows = "4" cols = "66" class="ta5" name = "uses"></textarea></td>-->
					<!--	<td><input type="button" value="Add" onClick="usesui()"></td>-->
							<td><a href="javascript:addElement1();">Add</a></td>
						</tr>
						<tr>
							<td><span id="partuses"></span></td>
						</tr>
					</table>
					<br>
					<table border>
						<tr>		
							<td><h2>Photograph</h2></td>
						</tr>
						<tr>		
							<td>Herbarium Sheet</td>
							<td><input type="file" name="herbarium" accept="image/*"></td>
						</tr>
						<tr>		
							<td>Image</td>
							<!--<td><input type="file" name="photo" id="fileToUpload"  accept="image/*"></td>-->
						</tr>
						<tr>
							<td><a href="javascript:addElement2();">Add</a></td>
						</tr>
						<tr>	
							<td></td>
							<td><span id="image3"></span></td>
						</tr>
					</table>
					<br><!--
					<table border>
						<tr>
							<td><h2>Organisation</h2></td>
						</tr>
						<tr>
							<td>Name</td>
							<td><input type = "text" name = "institute" placeholder = "Institute"></td>
							<td>District</td>
							<td><input type = "text" name = "district" placeholder = "District"></td>
						</tr>
						<tr>
							<td>Locality</td>
							<td><input type = "text" name = "locality" placeholder = "Locality"></td>
							<td>State</td>
							<td><input type = "text" name = "state" placeholder = "State"></td>
						</tr>
						<tr>
							<td><h2>Map Coordinates</h2></td>
						</tr>
						<tr>
							<!--<td width = "160" >Geographical Position</td>
							<td><input type = "text" name = "geo_pos" placeholder = "Geographical Position"></td>-->
							<!--<td>Latitude</td>
							<td><input type = "text" name = "latitude" placeholder = "Latitude"></td>
							<td>Longitude</td>
							<td><input type = "text" name = "longitude" placeholder = "Longitude"></td>
						</tr>
					</table>
					<br>
					<table border>
						<tr>
							<td><h2>Block</h2></td>
						</tr>
						<tr>
							<td>Block Name</td>
							<td><input type = "text" placeholder = 'Block Name' name = "banme[]"></td>
							<td><input type = 'text' placeholder = 'Population' name = 'population[]'></td>	
							<td><a href= "javascript:blocka();">Add Block</a></td>
						
						</tr>
					</table>
					<span id="blockp"></span>
					<br>-->
					<table border>
						<tr><td><h2>Organization</h2></td></tr>
						<tr>
							<td><a href= "javascript:organisation();">Add Organisation</a></td>
						</tr>	
						<tr>
							
							<td>	<span id="org"></span></td>
							<!--<span id="blockp"></span>-->
						</tr>
					</table>		
					<br>
					<table border>
						<tr><td><h2>Block</h2></td></tr>
						<tr>
							<td><a href= "javascript:blocka();">Add Block</a></td>
						</tr>	
						<tr>
							
							<td>	<span id="blockp"></span></td>
							<!--<span id="blockp"></span>-->
						</tr>
					</table>
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
					<span id="reference"></span>
					<br>
					<table>
						<tr>
							<td><center><td><input type = "submit" value = "submit" name = "submit" style="width:50%;" ></td></center></td>
							<td><center><td><input type="reset" value="Reset" style="width:50%;"></td></center></td>
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
