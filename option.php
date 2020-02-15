<html>
<head>
<link rel="stylesheet" type="text/css" href="tab.css">
<title>Habit</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
</head>
<body  leftmargin = "120" rightmargin = "120" >
<?php
include_once "Interface.html";
include('s2.php');

$option = $_GET['option'];

				include("config.php");
				
				echo "<form name = plantinfo action='data_compare.php' method='GET'>";
				echo "<table>";	
				echo "<tr>"."<td width = '500'>"."<h1>"."<font color = white>".$option."</font>"."</h1>"."</td>";
				echo "<td>"."<input type = 'text' name = 'search' size='50' placeholder = 'search'>"."</td>";
				echo "<td>"."<input type = 'Submit' value = 'Search'>"."</td>"."</tr>";			
				echo "</table>";
				echo "</form>";
				
				echo "<div class = plantinfo>";
				echo "<h2 style = 'left: 100px;'>"."<a href = list.php?list=$option><img src='list.png' style='width:30px;height:30px;'></a>"."</h2>";
				echo "</div>";
				
				echo "<div class = 'plantinfo'>";	
				echo "<div style = 'margin-left: 100px;margin-right: 100px;'>";
				
				$node=3;
				if (isset($_GET["page"])) { $page  = $_GET["page"]; $no = $_GET["page"];} else { $page=1; $no=1;};
				
				$start_from = ($page-1) * $node; 
								
								
				$sql =  "select * from plantinfo where habit Like '%$option%' order by Botanical_name limit $start_from, $node";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()){ 
						echo "<div>";		
						echo "<a href = 'data_output.php?search=$row[S_no]'>";
							echo "<table border cellpadding = '10'>";	
								echo "<tr>";
									if($row["Common_name"]==NULL){
										$common_name = "UNKNOWN";
									}else{
										$common_name = $row["Common_name"];
									}
									echo "<th>"."<i>".$row["Botanical_name"]."</i>".$row["Author_name"]."<br>"."(".$common_name.")"."</th>";
									echo "<th>"."</th>";
								echo "</tr>";	
								echo "<tr>";
									
										$sqlimg = "select * from image where S_no = $row[S_no]";
										$resultimg = $conn->query($sqlimg);
										if ($resultimg->num_rows > 0){	
											echo "<td style='width:40%; height:400px;text-align:center; vertical-align:middle'  >";		
											if($rowimg = $resultimg->fetch_assoc()){ 
?>
												<img src = 'image/<?php echo $rowimg["Photo"]; ?>' style='max-height:100%; max-width:100%;'>
											</td>
<?php
											}
										}else{
												echo "<td style='width:40%; height:400px;text-align:center; vertical-align:middle'  >";		
													echo "No Image Available";
												echo "</td>";
										}
									if($row["Description"]==""){
										echo "<td width = 800>"."No Description Available"."</td>";	
									}else{
										echo "<td width = 800>".$row["Description"]."</td>";
									}
								echo "</tr>";
							echo "</table>";
							echo "</a>";
							echo "<br>";
						echo "</div>";
					}			
				}
				
				$sql2 = "select * from plantinfo where habit = '$option'"; 
				$result = $conn->query($sql2);
				$total_records = $result->num_rows;
				$total_pages = ceil($total_records / $node); 
				
				echo "<br>"."<center>"."Page: ".$no."</center>";	
				echo "<br>"."<center>"."<div>";
				echo "<a href='option.php?page=1&option=$option'>".'|<'."</a> "; 

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='option.php?page=".$i."&option=$option'>".$i."</a> "; 
}; 
echo "<a href='option.php?page=$total_pages&option=$option'>".'>|'."</a> "; 
echo "</div>"."</center>"."</font>";
echo "</div>";
echo "</div>";
  $conn->close();
  echo "<br>";
		include_once "Interfacebottom.html";
?>
</body>
</html>