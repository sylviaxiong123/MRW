<?php
	require_once('admin/phpscripts/init.php');
	
	if(isset($_GET['id'])) {
		$tbl = "tbl_movies";
		$col = "movies_id";
		$id = $_GET['id'];
		$getSingle = getSingle($tbl, $col, $id);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Details</title>
<link href="css/main.css" rel="stylesheet" media="screen">
<link href="css/foundation.css" rel="stylesheet" media="screen">
<link href="css/foundation.min.css" rel="stylesheet" media="screen">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dosis:700" rel="stylesheet">

<script src="js/TweenMax.min.js"></script>
<script src="js/modernizr_custom.js"></script>
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

	if(!is_string($getSingle)){
		$row = mysqli_fetch_array($getSingle);
			echo "
				 <h2>{$row['movies_title']} / <p>{$row['movies_year']}</p></h2><br>
				  <img src=\"movieIMG/{$row['movies_fimg']}\" alt=\"{$row['movies_title']}\">
				 <p>{$row['movies_storyline']}</p><br>
				 <video autoplay>
				 <source src=\"trailers/{$row['movies_trailer']}\" alt=\"{$row['movies_title']}\">
				 </video>";
		
	}else{
		echo "<p>{$getSingle}</p>";	
	}
	
?>

<div id="controlBar">
		<div id="playButton"></div>
	    <div id="muteButton"></div>
	    <input id="volumeSlider" type="range" max="100%" value="50%">
	    <p id="trackTime">Track Time</p>
	    <progress id="prog" max="100"></progress>	    
	</div>
<br><br>
<a href=\"index.php\">Back...</a><br><br>

<script src="js/details.js"></script>
</body>
</html>