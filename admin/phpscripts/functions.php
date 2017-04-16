<?php
	
	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	 function addmovie($fimg, $thumb, $title, $year, $storyline, $runtime, $trailer, $price, $cat) {
		 
		 include('connect.php');
		 $fimg = mysqli_real_escape_string($link, $fimg);//not trust what others are doing
		 
		if($_FILES['movie_fimg']['type'] === "image/jpg" || $_FILES['movie_fimg']['type'] === "image/jpeg" ){ // ||is OR function
				
				$targetpath = "../images/{$fimg}"; //path to get img
				
				if (move_uploaded_file($_FILES['movie_fimg']['tmp_name'], $targetpath)) {//tmp_name holds all the temporary files
					
					$orig = "../images/".$fimg;
					$th_copy = "..//images/".$thumb;
					
					if(!copy($orig, $th_copy)) {
						echo "Failed to copy...";
						}
					$size = getimagesize($orig);
					echo $size[0]." x ".$size[1];
			}
		 
		 mysqli_close($link);
		 
		 }
	 }
?>