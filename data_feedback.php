<?php 
	include("config.php");
	
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$feedback_c = mysqli_real_escape_string($conn,$_POST["feedback"]);
	
	$srch = "SELECT * FROM user where Email = '$email'";
	$result = $conn->query($srch);
	if($result->num_rows>0){
		$feed = "INSERT INTO feedback (email,feed,date,time) VALUES ('$email','$feedback_c',CURDATE(),CURTIME())";
	//$mailto = $_POST['mail_to'];
			$mailSub = "MedicPlantNe FeedBack";
			$mailMsg = "Thank You "." ".$fname.' '.$lname." "."for your valuable feedback";
		require 'PHPMailer-master/PHPMailerAutoload.php';
			$mail = new PHPMailer();
			$mail ->IsSmtp();
			$mail ->SMTPDebug = 0;
			$mail ->SMTPAuth = true;
			$mail ->SMTPSecure = 'ssl';
			$mail ->Host = "smtp.gmail.com";
			$mail ->Port = 465; // or 587
			$mail ->IsHTML(true);
			$mail ->Username = "medicplantne@gmail.com";
			$mail ->Password = "medicinalplant";
			$mail ->SetFrom("medicplantne@gmail.com");
			$mail ->Subject = $mailSub;
			$mail ->Body = $mailMsg;
			$mail ->AddAddress($email);

		if(!$mail->Send())
		{
			echo "Mail Not Sent";
		}
		else
		{
		//echo "Mail Sent";
	   
			if($conn->query($feed)==TRUE){
		//include_once "plantinfo.php";
		echo "Sent1";
				echo "<script type='text/javascript'>alert('FeedBack Sent');</script>";
			}else{
				echo "Error: " .$feed ."<br>" . $conn->error;
			}
		}
	}else{
		$user = "INSERT INTO user (Fname,Lname,Email,Phone_no) VALUES ('$fname','$lname','$email','$phone')";
		$feed = "INSERT INTO feedback (email,feed,date,time) VALUES ('$email','$feedback_c',CURDATE(),CURTIME())";
		
		//$mailto = $_POST['mail_to'];
			$mailSub = "MedicPlantNe FeedBack";
			$mailMsg = "Thanks You "." ".$fname.' '.$lname." "."for your valuable feedback";
		require 'PHPMailer-master/PHPMailerAutoload.php';
			$mail = new PHPMailer();
			$mail ->IsSmtp();
			$mail ->SMTPDebug = 0;
			$mail ->SMTPAuth = true;
			$mail ->SMTPSecure = 'ssl';
			$mail ->Host = "smtp.gmail.com";
			$mail ->Port = 465; // or 587
			$mail ->IsHTML(true);
			$mail ->Username = "medicplantne@gmail.com";
			$mail ->Password = "medicinalplant";
			$mail ->SetFrom("medicplantne@gmail.com");
			$mail ->Subject = $mailSub;
			$mail ->Body = $mailMsg;
			$mail ->AddAddress($email);

		if(!$mail->Send())
		{
			//echo "Mail Not Sent";
			echo "<script type='text/javascript'>alert('FeedBack Not Sent');</script>";
			//echo "<script type='text/javascript'>alert('FeedBack Not Sent');Location = 'feedback.php';</script>";
		}
		else
		{
		//echo "Mail Sent";
	   
			if($conn->query($feed)==TRUE AND $conn->query($user)==TRUE){
		//include_once "plantinfo.php";
				echo "<script type='text/javascript'>alert('FeedBack Sent');</script>";
				//echo "<script type='text/javascript'>alert('FeedBack Sent');Location =  'feedback.php';</script>";
			}else{
				echo "Error: " .$feed ."<br>" . $conn->error;
			}
		}
	}
	
	echo "<script type='text/javascript'>location='feedback.php';</script>";
	
		
			
		
		
		
?>