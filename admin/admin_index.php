<?php
require_once('phpscripts/init.php');
//confirm_logged_in();

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your Admin Panel</title>
<link href="css/admin_login.css" rel="stylesheet" media="screen">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script:700" rel="stylesheet">
</head>

<body>
		<h1>Welcome <?php //echo $_SESSION['user_name'] ?> to your admin panel</h1>
        <br>
        <!--<php echo $_SESSION['users_id'] ?>-->
        <a href ="admin_createuser.php">Create User</a><br>
        <a href ="admin_edituser.php">Edit User</a><br>
        <a href="phpscripts/caller.php?caller_id=logout">Log Out</a>
        <?php
        
		?>
</body>
</html>