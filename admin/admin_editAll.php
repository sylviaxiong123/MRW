<?php
	require_once("phpscripts/init.php");
	//confirm_logged_in();
	
	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$tbl = "tbl_movies";
	$col = "movies_id";
	$id = 1;
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit All</title>
<link href="css/admin_login.css" rel="stylesheet" media="screen">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script:700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">

</head>
<body>
	<h1>Edit All</h1>
	<?php single_edit($tbl,$col,$id); ?>
	<a href="admin_index.php">Back</a>
</body>
</html>