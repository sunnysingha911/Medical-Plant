<html>
<head>
<link rel="stylesheet" type="text/css" href="imggall.css">
<link rel="stylesheet" type="text/css" href="tab.css">
<title>Image Gallery</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
</head>
<body leftmargin = "120" rightmargin = "120" >
<?php
include_once "Interface.html";
include('s2.php');  
 ?>	
	<?php 
				include("config.php");
					    $S_no = $_GET["S_no"];
						$Botanical_Name = $_GET["Bname"];
						$Author_Name = $_GET["Aname"];
						$Common_name = $_GET["Cname"];
	?>
<h1><font color = white>Image Gallery</font></h1>	
<div class = 'plantinfo'>
<h2><font><?php echo "<i>".$Botanical_Name."</i>"."$Author_Name"."<br>"."(".$Common_name.")"; ?></font></h2>
		<br>		
	<?php					
						$sqlimg = "select * from image where S_no = $S_no";
						$resultimg = $conn->query($sqlimg);
						if ($resultimg->num_rows > 0){	
							while($rowimg = $resultimg->fetch_assoc()){ 
	?>
		<div class="responsive">
			<div class="img">
				<a target="" href='image/<?php echo $rowimg["Photo"]; ?>'>
					<img src = 'image/<?php echo $rowimg["Photo"]; ?>' height="400" width="600">
				</a>
				<div class="desc"></div>
			</div><br>
		</div>		
						
				<?php
							}
						}else{
							echo "<tr>";
								echo "<td>"."No data"."</td>";
							echo "</tr>";
						}
	?>
	
<div class="clearfix"></div>
</div>
<br>
<?php
include_once "Interfacebottom.html";
 ?>
</body>
</html>
