<?php
	
	ini_set('display_errors',1);
    error_reporting(E_ALL);
	
	require_once('admin/phpscripts/init.php');

	if(isset($_GET['filter'])) {
		$tbl1 = "tbl_movies";
		$tbl2 = "tbl_cat";
		$tbl3 = "tbl_l_mc";
		$col1 = "movies_id";
		$col2 = "cat_id";
		$col3 = "cat_name";
		$filter = $_GET['filter'];
		$getMovies = filterType($tbl1, $tbl2, $tbl3, $col1, $col2, $col3, $filter);
	}else{
		$tbl = "tbl_movies";
		$getMovies = getAll($tbl);
		

	}
	
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Movie Review</title>
<link href="css/main.css" rel="stylesheet" media="screen">
<link href="css/foundation.css" rel="stylesheet" media="screen">
<link href="css/foundation.min.css" rel="stylesheet" media="screen">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dosis:700" rel="stylesheet">


</head>
	<style>
		a{
			color:#C4C1C1;
			font-family: 'Dosis', sans-serif;
			font-size:20px;
			text-decoration: none;
			
		}
	</style>
<body>

<?php

	include('includes/nav.html');
	if(!is_string($getMovies)){
		while($row = mysqli_fetch_array($getMovies)){
			echo 
				"<h3>{$row['movies_title']}</h3>
				<img src=\"movieIMG/{$row['movies_thumb']}\" alt=\"{$row['movies_title']}\">
				 <h3>{$row['movies_year']}</h3>
				 <a href=\"details.php?id={$row['movies_id']}\">more...</a><br><br>";
		}
	}else{
		echo "<p>{$getMovies}</p>";
	}
	
	include('includes/footer.php');
	
?>

<script src="js/localstorage.js"></script>
</body>
</html>