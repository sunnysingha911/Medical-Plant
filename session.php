<?php
   include('config.php');
   session_start();
  /* 
   if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    //session_start();
	$user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select Name from admin where Name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['Name'];
	}*/
	
   if(isset($_SESSION['login_user'])){
      //header("location:index.php");
	  //<script type="text/javascript">location='admin_delete.php';</script>
	  include_once "sidebar.html";
	   if(session_id() != '' || isset($_SESSION)) {
			// session isn't started
			//session_start();
		$user_check = $_SESSION['login_user'];
   
		$ses_sql = mysqli_query($conn,"select Name from admin where Name = '$user_check' ");
   
		$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
		$login_session = $row['Name'];
		echo "<h3>"."<font color = 'White'>"."WELCOME: ".$login_session."</font>"."</h3>";
   }
   }else{
	   //echo "N LoG in";
	   header("location:admin.php");
	   //echo "<script type='text/javascript'>location='admin.php';</script>";
   }
?>