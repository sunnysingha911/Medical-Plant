<?php 
	include("config.php");
	
	$s_no = $_POST["s_no"];
	$botanical_name = $_POST["botanical_name"];
	
	$dr = 0;
	
	if(!empty($_POST['rname']) and !empty($_POST['article']) and !empty($_POST['author']) and !empty($_POST['publication']) and !empty($_POST['vol']) and !empty($_POST['year']) and !empty($_POST['publisher']) and !empty($_POST['coment'])){
		$rname = $_POST['rname'];
		$article = $_POST['article'];
		$author = $_POST['author'];
		$publication = $_POST['publication'];
		$vol = $_POST['vol'];
		$year = $_POST['year'];
		$publisher = $_POST['publisher'];
		$coment = $_POST['coment'];
		
		$a = count($rname);
		$b = count($article);
		$c = count($author);
		$d = count($publication);
		$e = count($vol);
		$f = count($year);
		$g = count($publisher);
		$h = count($coment);
		
		if(!empty($rname) and !empty($article) and !empty($author) and !empty($publication) and !empty($vol) and !empty($year) and !empty($publisher) and !empty($coment) ){
			for($i=0,$j=0,$k=0,$l=0,$m=0,$n=0,$o=0,$p=0;$i<$a,$j<$b,$k<$c,$l<$d,$m<$e,$n<$f,$o<$g,$p<$h;$i++,$j++,$k++,$l++,$m++,$n++,$o++,$p++){
				
				//mysqli_real_escape_string($conn,);
				
				$rname1 = $rname[$i];
				$rname1 = mysqli_real_escape_string($conn,$rname1);
				
				$article1 = $article[$j];
				$article1 = mysqli_real_escape_string($conn,$article1);
				
				$author1 = $author[$k];
				$author1 = mysqli_real_escape_string($conn,$author1);
				
				$publication1 = $publication[$l];
				$publication1 = mysqli_real_escape_string($conn,$publication1);
				
				$vol1 = $vol[$m];
				$vol1 = mysqli_real_escape_string($conn,$vol1);
				
				$year1 = $year[$n];
				$year1 = mysqli_real_escape_string($conn,$year1);
				
				$publisher1 = $publisher[$o];
				$publisher1 = mysqli_real_escape_string($conn,$publisher1);
				
				$coment1 = $coment[$p];
				$coment1 = mysqli_real_escape_string($conn,$coment1);
				
				$data_reference = "INSERT INTO reference (S_no,Botanical_name,Name,Article,Author,Place_of_Publication,Volume,Year,Publisher,Comment) VALUES ('$s_no','$botanical_name','$rname1','$article1','$author1','$publication1','$vol1','$year1','$publisher1','$coment1')"; 
					$dr = 1;
					if($conn->query($data_reference)==TRUE){
						$dr = 0;
						//echo "Inserted into reference ";
						//include_once "insert.php";
						//echo "<script type='text/javascript'>alert('Data Inserted Sucessfully Reference');</script>";
					}else{
						echo "Error: " .$data_reference."<br>" . $conn->error;
					}
			}
		}
	}
	
?>