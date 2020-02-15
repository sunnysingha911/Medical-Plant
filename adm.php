<?php
//include("session.php");
/*
if(isset($_SESSION)){
 	echo "<script type='text/javascript'>location='admin_welcome.php';</script>";
}else{
	echo "<script type='text/javascript'>location='admin.php';</script>";
}*/
session_start();

if(!isset($_SESSION['login_user'])){
     echo "<script type='text/javascript'>location='admin.php';</script>";
   }
   else{
	 echo "<script type='text/javascript'>location='admin_list_home.php';</script>";
   }
?>