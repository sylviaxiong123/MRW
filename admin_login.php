<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	require_once("phpscripts/init.php");
	
	$ip = $_SERVER["REMOTE_ADDR"];
	//echo $ip;
	
	if(isset($_POST['submit'])) {
		//echo "Thanks for clicking...";
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username != "" && $password != "") {
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "Please fill in the required fields.";
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Client Login</title>
<link href="css/admin_login.css" rel="stylesheet" media="screen">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script:700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">

</head>
<body>
	<h1>Content Management System Login</h1>
    <?php if(!empty($message)){echo $message;} ?>
	<form action="admin_login.php" method="post">
    	<label>Username:</label>
    	<input type="text" name="username" value="">
    	<label>Password:</label>
    	<input type="password" name="password" value="">
    	<input type="submit" name="submit" value="Go!">
    </form>

     
</body>
</html>