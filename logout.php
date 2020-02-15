<?php
   session_start();
   
     unset($_SESSION['login_user']);  
     //session_destroy();  
   
   if(session_destroy()) {
      header("Location: admin.php");
   }
?>