<?php

	function wantMovie($name, $type, $year, $reason){
		include('connect.php');
		
		$moviestring = "INSERT INTO tel_rec(rec_name, rec_type, rec_year, rec_reason) VALUES ('$_POST[name]', '$_POST[type]', '$_POST[year]', '$_POST[reason]')"; 
		
			if (!mysql_query($moviestring)) { 
				die('Error: ' . mysql_error()); 
				} else{
				$message = "Your information was added to the database"; 
				mysql_close($connect); 
				}
	
		
		
		
		}

?>