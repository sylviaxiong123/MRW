<?php
	require_once("phpscripts/init.php");
	//confirm_logged_in();
	
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	?>
    
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Emial Confirmation</title>
<link href="css/admin_login.css" rel="stylesheet" media="screen">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script:700" rel="stylesheet">

</head>
<body>
	<h1>Email Confirmation <br> Please Confirm your Email before you Login</h1>
    
    <h3>PLease confirm your email before you login. <br><br>Here is your temporary password.<br>*Please change your password in 3 days.<br><br>
    <?php
		$a = str_split("abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXY0123456789");//all the letters
		shuffle($a);//mix the order of the letters
		echo "\n".getMeRandomPwd(0)."\n".getMeRandomPwd(13);//echo out the letter length
	?>
    </h3>
     		<a href="admin_login.php">Back to Client Login</a> <br>
            <a href="admin_edituser.php">Back to Edit User</a> <br>
            <a href="admin_index.php">Back to Admin Panel</a>  <br>
   
</body>
</html>