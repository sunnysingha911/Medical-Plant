<html>
<head>
<title>Delete</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
<link rel="stylesheet" type="text/css" href="tab.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body  leftmargin = "120" rightmargin = "120" >
<?php
include_once "Interface.html";
include('session.php');
//include_once "sidebar.html";
 ?>		
 <h1 class = "head"><font color = white>Delete</font></h1>
<div class = "container2">
 <br>
 <form action="admin_data_compare_delete.php" method="GET">
		
			<table>
			<tr>
				<td width = "160" >Search</td>
				<td><input type = "text" name = "search" size="50" id = "myText3" placeholder = "search" required></td>
			</tr>
			</table>
			<table>
				<tr>
					<td width = "160" ></td>
					<td><input type = 'Submit' style = "width: 50%;" value = 'Submit'></td>
					<td><input type="reset" value="Reset" style = "width: 50%;"></td>
				</tr>
			</table>	
			<table>	
				<tr>
					<td>
						<h4><a href = admin_delete_list.php> List All</a></h4>
					</td>
				</tr>
			</table>
</form>
</div>

 <?php
include_once "Interfacebottom.html";
 ?>
</body>
</html>