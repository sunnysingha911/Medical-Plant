<html>
<head>
<link rel="stylesheet" type="text/css" href="tab.css">
<title>Admin Login</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
</head>

<body leftmargin = "120" rightmargin = "120" >

<?php
include_once "Interface.html"; 
//include('session.php');
 ?>
 <h1><font color = white>Admin Login</font></h1>
 <div style = "margin-left: 30%;margin-right: 30%; padding: 30px 40px;">
 <br>
<form name=admin action="data_admin.php" method="POST">
		<center>
		<table>	
			<tr>
				<td width = "150">Admin id</td>
				<td><input type = "text" name = "username" placeholder="User Id"></td>
			</tr>
		</table>
		<table>
			<tr>
				<td width = "150" >Password</td>
				<td><input type = "password" name = "password" placeholder="Password"></td>
			</tr>	
		</table>
		<table>
			<tr>
				<td><input type = "Submit" value="Log in" ></td>
			</tr>	
		</table>
		</center>	
</form>	
</div>	
<br>	
<?php
include_once "Interfacebottom.html";
 ?>
</body>
</html>
