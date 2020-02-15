<html>
<head>
<link rel="stylesheet" type="text/css" href="tab.css">
<title>Update</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body  leftmargin = "120" rightmargin = "120" >
<?php
include_once "Interface.html";
include('session.php');
//include_once "sidebar.html";
 ?>		
 <h1 class = "head"><font color = white>Update</font></h1>
 <div class = "container2">
 <br>
 
 <form action="admin_data_compare.php" method="GET">
			<table>
			<tr>
				<td width = "160" >Search</td>
				<td><input type = "text" name = "search" size="50" placeholder = "search" required></td>
			</tr>
			</table>
			<table>
				<tr>
					<td width = "160" ></td>
					<td><input type = "submit" value = "submit" style = "width: 50%;"></td>
					<td><input type="reset" value="Reset" style = "width: 50%;"></td>
				</tr>
				<tr>
					<td>
						<h4><a href = admin_list.php> List All</a></h4>
					</td>
				</tr>
			</table>
</form>
<!--			<table>
			<tr>
				<td width = "160" >Search</td>
				<td><input type = "text" name = "search" size="50" id = "myText3" placeholder = "search" required></td>
			</tr>
			</table>
			<table>
				<tr>
					<td width = "160" ></td>
					<td><input type = 'button' onclick = 'myFunction()' style = "width: 50%;" value = 'Search'></td>
					<td><input type="reset" value="Reset" style = "width: 50%;"></td>
				</tr>
				<script type="text/javascript">
					function myFunction() {
						 var x = document.getElementById('myText3').value  ;
						 window.location.href="admin_data_compare.php?search="+x;	 
					}
				</script>
				<tr>
					<td>
						<h4><a href = admin_list.php> List All</a></h4>
					</td>
				</tr>
			</table>-->

</div>

 <?php
include_once "Interfacebottom.html";
 ?>
</body>
</html>