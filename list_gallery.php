<html>
<head>
<link rel="stylesheet" type="text/css" href="tab.css">
<title>Image Gallery</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
</head>
<body  leftmargin = "120" rightmargin = "120" >
<?php
include_once "Interface.html";
include('s2.php');  

$head = $_GET['head'];
	
				include("config.php");
				
				echo "<form name = plantinfo action='data_compare.php' method='GET'>";
				echo "<table>";	
				echo "<tr>"."<td width = '500'>"."<h1>"."<font color = white>".$head."</font>"."</h1>"."</td>";
				echo "<td>"."<input type = 'text' name = 'search' size='50' placeholder = 'search'>"."</td>";
				echo "<td>"."<input type = 'submit' value = 'Search'>"."</td>"."</tr>";
				echo "</table>";
				echo "</form>";


				//echo "</form>";
				
				echo "<div class = 'plantinfo'>";	
				echo "<th>"."<h2>"."List"."</h2>"."</th>";
				echo "<div style = 'margin-left: 100px;margin-right: 100px;'>";
				
				$node=10;
				if (isset($_GET["page"])) { $page  = $_GET["page"]; $no = $_GET["page"];} else { $page=1; $no=1;};
				
				$start_from = ($page-1) * $node; 
								
								
				$sql =  "select * from plantinfo order by Botanical_name limit $start_from, $node";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo "<div>";		
							echo "<table border cellpadding = '10'>";
								echo "<tr>";
									echo "<th>"."Botanical Name"."</th>";
									echo "<th>"."Common Name"."</th>";
									echo "<th>"."Family"."</th>";
									echo "<th>"."View"."</th>";
								echo "</tr>";
					while($row = $result->fetch_assoc()){ 
								echo "<tr>";
									echo "<td>"."<i>".$row["Botanical_name"]."</i>".$row["Author_name"]."</td>";
									echo "<td>".$row["Common_name"]."</td>";
									echo "<td>".$row["Family"]."</td>";
									echo "<td>"."<a href = 'data_output.php?search=$row[S_no]'>"."<img src='view.png' style='width:30px;height:30px;'>"."</a>"."</td>";
								echo "</tr>";	
					}			
						echo "</table>";
						echo "<br>";
					echo "</div>";
				}
				
				$sql2 = "select * from plantinfo"; 
				$result = $conn->query($sql2);
				$total_records = $result->num_rows;
				$total_pages = ceil($total_records / $node); 
				
				echo "<br>"."<center>"."Page: ".$no."</center>";	
				echo "<br>"."<center>"."<div>";
				echo "<a href='list_gallery.php?head=$head&page=1'>".'|<'."</a> "; 

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='list_gallery.php?head=$head&page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='list_gallery.php?head=$head&page=$total_pages'>".'>|'."</a> "; 
echo "</div>"."</center>"."</font>";
echo "</div>";
echo "</div>";
echo "<br>";
  $conn->close();
		include_once "Interfacebottom.html";
	?>
</body>
</html>