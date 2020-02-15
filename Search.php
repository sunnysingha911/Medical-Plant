<html>
<head>
<link rel="stylesheet" type="text/css" href="tab.css">
<title>Search</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
</head>
<body  leftmargin = "120" rightmargin = "120" >
<?php
include_once "Interface.html";
include('s2.php');  
 ?>
<h1><font color = white>Search</font></h1>
<div class = "container2">
 <br>
 <form name=plantinfo action="data_compare.php" method="GET">
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
			</table>
</form>
	<!--	<table>
			<tr>
				<td width = "160" >Search</td>
				<td><input type = "text" name = "search" id = "myText3" size="50" placeholder = "search" required></td>
			</tr>
			</table>
			<table>
				<tr>
					<td width = "160" ></td>
					<td><input type = 'button' onclick = 'myFunction()' style = "width: 50%;" value = 'Search'></td>
					<td><input type="reset" value="Reset" style = "width: 50%;"></td>
				</tr>
			</table>
			<script type="text/javascript">
					function myFunction() {
						 var x = document.getElementById('myText3').value  ;
						 window.location.href="data_compare.php?search="+x;	 
					}
			</script>
		-->	
			<table>
				<tr>
					<td width = "160" >
						<h4><a href = "list_gallery.php?head=Search"> List All</a></h4>
					</td>
				</tr>
			</table>
</div>
<?php
include_once "Interfacebottom.html";
 ?>	
</body>
</html>