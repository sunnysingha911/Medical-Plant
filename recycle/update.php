<?php
   include('session.php');
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="tab.css">
<!script language="javascript" src = "validation.js"><!/script>
<style>
.table{
		margin-left: 40px; 
		width:1155px;
	 } 
@media only screen and (max-width: 600px){
 .table {
		width: 300px;
		height: 100px;
		margin-left: 40px;
		}
}
</style>
</head>

<body leftmargin = "120" rightmargin = "120">

<?php
include_once "Interface.html";
include_once "sidebar.html";
 ?>
 
 <?php
				include("config.php");
				$data = $_POST["search"];						
				$sql =  "select * from language,plantinfo where language.S_no = plantinfo.S_no and language.Name = '$data' or plantinfo.Botanical_name = '$data' or plantinfo.Common_name = '$data'";
				//select * from language,plantinfo where language.S_no = plantinfo.S_no and language.Name = '$data' or plantinfo.Botanical_name = '$data' or plantinfo.Common_name = '$data'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {		
					$row = $result->fetch_assoc(); 
				}else{
					include_once "admin_search.php";
					echo "<script type='text/javascript'>alert('Data Unavailable');</script>";
				}		
$conn->close();
?>	
 
 
<h1 style = "margin-left: 40px;"><font color = white>Update</font></h1>
<form name = "plantinfo" action = "data_update.php" method = "POST" enctype = "multipart/form-data">
<div class = "plantinfo">
<div style = "margin-left: 100px;margin-right: 100px;">
	<table>
		<tr>
			<td width = "160">Serial No</td>
			<td><input type = "text" name = "s_no" placeholder = "Serial No" onblur="numeric()" id = "number" value ='<?php echo $row["S_no"];?>'></td>
		</tr>
		<tr>
			<td width = "160" >Botanical Name</td>
			<td width = "150"><input type = "text" name = "bot_name" placeholder = "Botanical Name" id = "bot_name" value ='<?php echo $row["Botanical_name"];?>'></td>
			<td width = "50"></td>
			<td width = "160" >Common Name</td>
			<td width = "150"><input type = "text" name = "common_name" placeholder = "English" id = "common_name" value ='<?php echo $row["Common_name"];?>'></td>
			<td width = 50></td>
			<td><a href="javascript:addElement();">Add</a></td>
		</tr>
		</table>
		<table>
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
						echo "<span id = 'content'>";		
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
				newTBDiv.innerHTML = "<table><tr> <td width = '160'>Name "+intname+": </td> <td><input type='text' id='hospital_" + intname + "' placeholder = 'Name'  value = '<?php echo $rowl["Name"];?>'  name='name[]'/> </td> <td width = '50'></td>   <td width = '160' >Language "+intlanguage+":</td> <td><input type='text' placeholder = 'Language' id='hospital_" + intlanguage + "'  value = '<?php echo $rowl["Language"];?>'  name='language[]'/></td> <td width = '50'></td>  <td><a href='javascript:removeElement(\"" + intlanguage + "\")'><font color = 'red'>Remove</font></a></td></tr><table>";
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
	</table>
	<table>
		<tr>
			<td width = "160" >Family</td>
			<td><input type = "text" name = "family" placeholder = "Family" id = "family" value ='<?php echo $row["Family"];?>'></td>
			<td width = "50"></td>
			<td width = "160" >Habit</td>
			<td><input type = "text" name = "habit" placeholder = "Habit" id = "habit" value ='<?php echo $row["Habit"];?>'></td>
		</tr>
		<tr>
			<td width = "160" >Fruiting Time</td>
			<td><input type = "text" name = "fruiting_time" placeholder = "Fruiting Time" id = "fruiting_time" value ='<?php echo $row["Fruiting_time"];?>'></td>
			<td width = "50"></td>
			<td width = "160" >Flowering Time</td>
			<td><input type = "text" name = "flowering_time" placeholder = "Flowering Time" id = "flowering_time" value ='<?php echo $row["Flowering_time"];?>'></td>
		</tr>
		<tr>
			<td width = "160">Availability Freequency</td>
			<td><input type = "text" name = "avaibility_fq" placeholder = "Availability Freequency" id = "avaibility_fq" value ='<?php echo $row["Avaibality_Fq"];?>'></td>
			<td width = "50"></td>
			<td width = "160" >Mode of Propagation</td>
			<td><input type = "text" name = "mode_of_prop" placeholder = "Mode of Propagation" id = "mode_of_prop" value ='<?php echo $row["Mode_of_prop"];?>'></td>
		</tr>
	</table>	
	<table>
		<tr>
			<td width = "160" >Uses</td>
			<td><a href="javascript:addElement1();">Add</a></td>
		</tr>
	</table>
	<table>
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
						echo "<span id = 'partuses'/>";		
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
			newTBDiv2.innerHTML = "<table><tr> <td width = '160'></td> <td width = '167'><input type='text' id='hospital_" + intpart + "' placeholder = 'Part'  value = '<?php echo $rowl["Part"];?>'  name='part[]'/> </td> <td width = '50'></td> <td><input type='text' size = '50' placeholder = 'Uses' id='hospital_" + intuses + "'  value = '<?php echo $rowl["Uses"];?>'  name='uset[]'/></td> <td><a href='javascript:removeElement1(\"" + intuses + "\")'><font color = 'red'>Remove</font></a></td></tr><table>";
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
	</table>
	<table>
		<tr>		
			<td width = "160">Herbarium Sheet</td>
			<td><input type="file" name="herbarium" id="fileToUpload"  accept="image/*" value ='<?php echo $row["Herbarium"];?>'></td>
			<td width = "50"></td>
			<td width = "160">Photograph</td>
			<td><input type="file" name="photo" id="fileToUpload"  accept="image/*" value ='<?php echo $row["Image"];?>'></td>
		</tr>
	</table>
	<table>
		<tr>
			<td width = "160" >Habitat</td>
			<td><input type = "text" name = "habitat" placeholder = "habitat" id = "habitat" value ='<?php echo $row["Habitat"];?>'></td>
		</tr>
	</table>
	<table>
		<tr>
			<td width = "160">Description</td>
			<td><textarea rows = "4" cols = "75" class="ta5" name = "description" id = "description"><?php echo $row["Description"];?></textarea></td>
		</tr>
	</table>
	<table>

	
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
	</table>
	<table>
		<tr>		
			<td width = "160" >Collector Name</td>
			<td><input type = "text" name = "collector_name" placeholder = "Collector Name" id = "collector_name" value ='<?php echo $row["Collector_name"];?>'></td>
			<td width = "50"></td>
			<td width = "160" >Date</td>
			<td><input type = "text" name = "date" placeholder = "Date" value ='<?php echo $row["Date"];?>'></td>
		</tr>
	</table>
	<table>
		<tr>
			<td width = "160" >District</td>
			<td><input type = "text" name = "district" placeholder = "District" id = "district" value ='<?php echo $row["District"];?>'></td>
			<td width = "50"></td>
			<td width = "160" >Locality</td>
			<td><input type = "text" name = "locality" placeholder = "Locality" id = "locality" value ='<?php echo $row["Locality"];?>'></td>
		</tr>
		<tr>
			<td width = "160" >State</td>
			<td><input type = "text" name = "state" placeholder = "State" id = "state" value ='<?php echo $row["State"];?>'></td>
			<td width = "50"></td>
			<!--<td width = "160" >Geographical Position</td>
			<td><input type = "text" name = "geo_pos" placeholder = "Geographical Position"></td>-->
			<td width = "160">Map</td>
			<td><input type="file" name="geo_pos" id="fileToUpload"  accept="image/*"></td>
		</tr>
	</table>
<center>
	<table>
		<tr>
			<td><center><td><input type = "submit" value = "Update" name = "submit" style="width:50%;"></td></center></td>
			<td><input type="reset" value="Reset" style="width:50%;"></td>
		</tr>
	</table>
</center>	
</div>
</div>			
</form>		
<?php
include_once "Interfacebottom.html";
 ?>
</body>
</html>
