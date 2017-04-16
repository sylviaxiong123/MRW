<?php
	
	include('../admin/phpscripts/connect.php');

	//check if it is connected with the server
	$mysqli = new mysqli($connect['user'], $connect['pass'], $connect['url'], $connect['db']);
	if ($mysqli->connect_errno) {
		printf("Connection failed: %s \n", $mysqli->connect_error);
		exit();
	}

		//insert POST array into database
		$moviestring = "INSERT INTO tel_rec VALUES ('$_POST[name]', '$_POST[type]', '$_POST[year]', '$_POST[reason]')"; 
		
			if (!mysqli_query($moviestring)) { 
				//if $moviestring does not inserted into mysqli, then report error msg
				die('Error: ' . mysql_error()); 	
				$message = "Please fill up the form then submit";
				echo $message;
				
				} else{
					//else info added successful
					
				$message = "Your information was added to the database"; 
				echo $message;
				
				mysql_close($link); 
				}
	
		
		

?>