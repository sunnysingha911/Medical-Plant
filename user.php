<html>
<head>
<link rel="stylesheet" type="text/css" href="tab.css">
</head>
<title>User</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
<body leftmargin = "120" rightmargin = "120" >

<?php
include_once "Interface.html";
 ?>
 <center><h1>User Login</h1></center>
<form>
	
		<center>
		<table>	
			<tr>
				<td width = "150">User id</td>
				<td><input type = "text" name = "avfreq" placeholder="User Id"></td>
			</tr>
		</table>
		<table>
			<tr>
				<td width = "150" >Password</td>
				<td><input type = "password" name = "mop" placeholder="Password"></td>
			</tr>	
		</table>
		<table>
			<tr>
				<td><input type = "Submit" value="Log in" ></td>
				<td><input type="button" value="Sign Up" class="homebutton" id="btnHome" onClick="document.location.href='register.php'" /></td>
				
			</tr>	
		</table>
		</center>	
	
</form>			

<?php
include_once "Interfacebottom.html";
 ?>
</body>
</html>
