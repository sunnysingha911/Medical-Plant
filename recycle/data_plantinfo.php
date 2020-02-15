<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iasst";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
	echo 'connection fail';
}
$s_no = $_POST["s_no"];
$bot_name = $_POST["bot_name"];
$english = $_POST["common_name"];

$family = $_POST["family"];
$habit = $_POST["habit"];

$fruiting_time = $_POST["fruiting_time"];
$flowering_time = $_POST["flowering_time"];

$avaibality_fq = $_POST["avaibility_fq"];
$mode_of_prop = $_POST["mode_of_prop"];

$partt = $_POST["partt"];
$usess = $_POST["usess"];

$habitat = $_POST["habitat"];

$collector_name = $_POST["collector_name"];

$date = $_POST["date"];
$month = $_POST["month"];
$year = $_POST["year"];
$result = $date . ' ' . $month . ' ' .$year;	
	
$district = $_POST["district"];
$locality = $_POST["locality"];
$state = $_POST["state"];
//$geo_pos = $_POST["geo_pos"];  

$image=$_FILES['herbarium']['name'];
$image2=$_FILES['photo']['name'];

$description = $_POST['description'];

$uploadOk = 1;
 
    if (move_uploaded_file($_FILES["herbarium"]["tmp_name"], "uploads/".basename($_FILES['herbarium']['name'])) && move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/".basename($_FILES['photo']['name']))) {
        $uploadOk = 0;
    } else {
        echo "<script type='text/javascript'>alert('Data Inserted Sucessfully');</script>";
    }

 $sql="INSERT INTO plantinfo (S_no,Botanical_name,Common_name,Family,Habit,Avaibality_Fq,Flowering_time,Fruiting_time,Mode_of_prop,Herbarium,Image,Habitat,Collector_name,Date,District,Locality,State,Description) VALUES ('$s_no','$bot_name','$english','$family','$habit','$avaibality_fq','$flowering_time','$fruiting_time','$mode_of_prop','$image','$image2','$habitat','$collector_name','$result','$district','$locality','$state','$description')";
  
 if($conn->query($sql)==TRUE){// and $conn->query($sql2)==TRUE){
	include_once "plantinfo.php";
	echo "<script type='text/javascript'>alert('Data Inserted Sucessfully plantinfo');</script>";
}else{
	echo "Error: " .$sql ."<br>" . $conn->error;
}

//Names and Language Querry

if(!empty($_POST['name']) and !empty($_POST['language'])){
	$name = $_POST['name'];
	$language = $_POST['language'];
	$n = count($name);
	$l = count($language);
	if(!empty($name) and !empty($language)){
		for($i=0,$j=0;$i<$n,$j<$l;$i++,$j++){
			$sql2="INSERT INTO language (S_no,Botanical_name,Common_name,Name,Language) VALUES ('$s_no','$bot_name','$english','$name[$i]','$language[$j]')"; 
				if($conn->query($sql2)==TRUE){
					include_once "plantinfo.php";
					echo "<script type='text/javascript'>alert('Data Inserted Sucessfully language');</script>";
				}else{
						echo "Error: " .$sql ."<br>" . $conn->error;
				}
		}
	}
}

//Part and Uses Querry

$sql5="INSERT INTO part (S_no,Botanical_name,Part,Uses) VALUES ('$s_no','$bot_name','$partt','$usess')";
if($conn->query($sql5) == TRUE){
	include_once "plantinfo.php";
	echo "<script type='text/javascript'>alert('Data Inserted Sucessfully part2');</script>";
}
if(!empty($_POST['part']) and !empty($_POST['uset'])){
	$part = $_POST['part'];
	$uses = $_POST['uset'];
	$n = count($part);
	$l = count($uses);
		for($i=0,$j=0;$i<$n,$j<$l;$i++,$j++){
			$sql4="INSERT INTO part (S_no,Botanical_name,Part,Uses) VALUES ('$s_no','$bot_name','$part[$i]','$uses[$j]')"; 
				if($conn->query($sql4) == TRUE){
					include_once "plantinfo.php";
					echo "<script type='text/javascript'>alert('Data Inserted Sucessfully Part');</script>";
				}else{
						echo "Error: " .$sql ."<br>" . $conn->error;
				}
		}
}

//Block and Population Querry

if(!empty($_POST['check']) and !empty($_POST['population'])){
	$temp = $_POST['check'];
	$population = $_POST['population'];		
	
	$n = count($temp);
	$l = count($population);
	
	if(!empty($temp)){
		for($i=0;$i<$n;){
			for($j=0;$j<$l;$j++){
				if($population[$j] != ''){
				$sql6="INSERT INTO block (S_no,Botanical_name,Block_name,Population) VALUES ('$s_no','$bot_name','$temp[$i]','$population[$j]')";
					$i++;
					
				if($conn->query($sql6) == TRUE){
					include_once "plantinfo.php";
					echo "<script type='text/javascript'>alert('Data Inserted Sucessfully Block');</script>";
				}else{
						echo "Error: " .$sql ."<br>" . $conn->error;
				}
				}
			}
		}
	}
}

$conn->close(); 
?>