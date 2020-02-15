<html>
<head>
<link rel="stylesheet" type="text/css" href="tab.css">
<script language="javascript" src = "validate.js"></script>
<title>Feedback</title>
<link rel="shortcut icon" href="iasst-logo.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- //6895448-green-background.jpg-->
</head>
<body>
<?php 
include("interface.html");
include("s2.php");	
?>
<h1><font color = white>Feed Back</font></h1>
<div class = "plantinfo">
	<div style = 'margin-left: 100px; margin-right: 100px;'>
		<form method = "POST" action = "data_feedback.php">
	
		<table>
			<tr>
				<td width = "85">Name</td>
				<td><input type = "text" placeholder = "First Name" name = "fname" onblur="valname1()" id = "name1"></td>	
				<td><input type = "text" placeholder = "Last Name" name = "lname" onblur="valname2()" id = "name2"></td>	
			</tr>
		</table>
		<table>	
			<tr>
				<td>Email</td>
				<td><input type = "text" placeholder = "Email" name = "email" onblur="validateForm()" id = "mail"></td>	
			</tr>
			<tr>
				<td>Phone no</td>
				<td><input type = "text" placeholder = "Phone no" name = "phone" maxlength="10" pattern="[1-9]{1}[0-9]{9}" onblur="numeric()" id = "number"></td>	
			</tr>
			<tr>
				<td>Feed Back</td>
				<td><textarea placeholder = "Feed back" name = "feedback" rows="6" cols="100"></textarea></td>	
			</tr>
		</table>
		<table>	
			<tr>
				<td><center><input type = "Submit" value = "Send" style="width:25%;"></center></td>
				
			</tr>			
		</table>
		</form>
	</div>
</div><br> 
<?php include("interfacebottom.html"); ?>
</body>
</html>