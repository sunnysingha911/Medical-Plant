<?php

include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
           
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT Name FROM admin WHERE Name = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
     	
      if($count == 1) {
         $_session["myusername"];
         $_SESSION['login_user'] = $myusername;
         
         header("location: admin_list_home.php");
      }else {
		 echo "<script type='text/javascript'>alert('failed!')</script>";
		 header("location: admin.php");	 
      }
   }
















/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iasst";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

include('config.php'); 
$admin = $_POST["admin"];
$password = $_POST["password"];

$sql =  "select * from admin where Name = '$admin' and Password = '$password'" ;
$result = $conn->query($sql);
	  $row = $result->fetch_assoc();
	if($admin == "" && $password == "" ){
		include "admin.php";
		echo "<script type='text/javascript'>alert('Fields are empty');</script>";	
	}
	else if ($row['Name'] == $admin && $row['Password'] == $password){
			echo "<font size = '5' color = 'white'>Welcome :".$row['Name']."</font>";
			include "option.php";
	}
	else{
		include "admin.php";
		echo "<script type='text/javascript'>alert('Failed to Login');</script>";	
	}	
$conn->close();*/
?>