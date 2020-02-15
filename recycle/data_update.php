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

//$partt = $_POST["partt"];
//$usess = $_POST["usess"];

$habitat = $_POST["habitat"];

$collector_name = $_POST["collector_name"];

$date = $_POST["date"];
	
$district = $_POST["district"];
$locality = $_POST["locality"];
$state = $_POST["state"];
//$geo_pos = $_POST["geo_pos"];  

$description = $_POST['description'];

if(!empty($_FILES['herbarium']['name']) and !empty($_FILES['photo']['name'])){

$image=$_FILES['herbarium']['name'];
$image2=$_FILES['photo']['name'];
$a=0;

$sqlimg="UPDATE plantinfo SET Herbarium = '$image',Image = '$image2' WHERE S_no = '$s_no'";
		  
		if($conn->query($sqlimg)==TRUE){
			echo "<script type='text/javascript'>alert('image Updated Sucessfully plantinfo');</script>";
		}else{
			echo "Error: " ."<br>" . $conn->error;
		}
    if (move_uploaded_file($_FILES["herbarium"]["tmp_name"], "uploads/".basename($_FILES['herbarium']['name'])) && move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/".basename($_FILES['photo']['name']))) {
       $a=1;
    } 
}
	
 $sql="UPDATE plantinfo SET Botanical_name = '$bot_name',Common_name = '$english',Family = '$family',Habit = '$habit',Avaibality_Fq = '$avaibality_fq',Flowering_time = '$flowering_time',Fruiting_time = '$fruiting_time',Mode_of_prop = '$mode_of_prop',Habitat = '$habitat',Collector_name = '$collector_name',Date = '$date',District = '$district',Locality = '$locality',State = '$state',Description = '$description' WHERE S_no = '$s_no'";
  
 if($conn->query($sql)==TRUE){
	echo "<script type='text/javascript'>alert('Data Inserted Sucessfully plantinfo');</script>";
}else{
	echo "Error: " .$sql ."<br>" . $conn->error;
}


//Names and Language Querry

$del_language = "Delete FROM language WHERE S_no = $s_no";
	if ($conn->query($del_language) === TRUE) {
			echo "Record deleted from language";
		} else {
			echo "Error deleting record: " . $conn->error;
		}

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

/*$sql5="INSERT INTO part (S_no,Botanical_name,Part,Uses) VALUES ('$s_no','$bot_name','$partt','$usess')";
if($conn->query($sql5) == TRUE){
	include_once "plantinfo.php";
	echo "<script type='text/javascript'>alert('Data Inserted Sucessfully part2');</script>";
}*/

$del_part = "Delete FROM part WHERE S_no = $s_no";
		if ($conn->query($del_part) === TRUE) {
			echo "Record deleted from part";
		} else {
			echo "Error deleting record: " . $conn->error;
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
$del_block = "Delete FROM block WHERE S_no = $s_no";
		if ($conn->query($del_block) === TRUE) {
			echo "Record deleted from block";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
		
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