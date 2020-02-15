<html>
<head>
<link rel="stylesheet" type="text/css" href="tab.css">
<title>Feedback</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
</head>
<body  leftmargin = "120" rightmargin = "120" >
<?php
include_once "Interface.html";
include('session.php');
//include_once "sidebar.html";
 ?>
 <!--<a href = "logout.php">Sign Out</a>-->
 <h1 class = "head"><font color = white>Feedback</font></h1>
 <!div class = "plantinfo">
 
 <?php

				echo "<br>";	
				include('config.php');			
								
				$sql =  "select * from feedback,user where feedback.email = user.email order by FB_id desc";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					
						
					while($row = $result->fetch_assoc()){ 
					echo "<div 	style = 'margin-left: 100px;margin-right: 100px;'>";		
					echo "<table cellpadding = '10'>";
							echo "<tr>";
								echo "<td width = '150'>"."From: ".$row["email"]."</td>";
								echo "<td>"."Name: ".$row["FName"]." ".$row["LName"]."</td>";
								echo "<td>"."Phone no: ".$row["Phone_no"]."</td>";
							echo "</tr>";	
					echo "</table>";			
					echo "<table>";					
							echo "<tr>";
								//echo "<td>"."Name: ".$row["FName"]." ".$row["LName"]."</td>";
								echo "<td>"."Date: ".$row["date"]." "."at"." ".$row["time"]."</td>";
							echo "</tr>";	
					echo "</table>";			
					echo "<table>";			
							echo "<tr>";
									//echo "<td>".$row["FName"]." ".$row["LName"]."</td>";
									//echo "<td>".$row["email"]."</td>";
									echo "<td>"."Feedback:"."</td>";
									echo "<td>".$row["feed"]."</td>";
							echo "</tr>";		
					echo "</table>";	
					echo "</div>";		
					echo "<br>";		
					}		
				}
				
 ?>
 <!/div>
 <br>
<?php
include_once "Interfacebottom.html";
?>	
</body>
</html>