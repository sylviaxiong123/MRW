<?php  //live search
	ini_set('display_errors',1);
	error_reporting(E_ALL);// default set on pc
	require_once('phpscripts/connect.php');
	
	if(isset($_GET['srch'])) {
		$srch = $_GET['srch'];
		$movieQuery = "SELECT movies_id, movies_title, movies_thumb, movies_year FROM tbl_movies WHERE movies_title LIKE '$srch%' ORDER BY movies_title ASC";
		$getMovies = mysqli_query($link, $movieQuery);
		
	}else{
	$movieQuery = "SELECT movies_id, movies_title, movies_thumb, movies_year FROM tbl_movies ORDER BY movies_title ASC";
	$getMovies = mysqli_query($link,$movieQuery);
	}
		
		
	$jsonResult = "[";
	while($movResult = mysqli_fetch_assoc($getMovies)) {
		$jsonResult.=json_encode($movResult).","	;//adding , after every object
	}

	$jsonResult.= "]";// the dot means "a pin to"
	
	              //substr_replace(string, replace,start,length);
				  //get rid of the last comma
	$jsonResult = substr_replace($jsonResult, '', -2, 1);
	echo $jsonResult;
	

?>