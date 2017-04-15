<?php
	require_once("phpscripts/init.php");
	//confirm_logged_in();
	
	//ON MAC
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	$id = $_SESSION['users_id'];
	//echo $id;
	$popForm = getUser($id);
	//echo $popForm;
	
	if(isset($_POST['submit'])){
		//echo "clicked";
		$fname = trim($_POST['fname']);
		$lname = trim($_POST['lname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		//$email = trim($_POST['email']);
		
			$result = editUser($id,$fname,$lname,$username,$password);
			//$result = editUser($id,$fname,$lname,$username,$password,$email);
			$message = $result;
	}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit User</title>
<link href="css/admin_login.css" rel="stylesheet" media="screen">
</head>

<body>
	<h1>Edit User</h1>
     <?php if(!empty($message)) {echo $message;}  ?>
     
		<form action ="admin_edituser.php" method="post">
        <label>First Name:</label>
        	<input name="fname" type="text" value="<?php echo $popForm['user_fname']  ?>">
            <br><br>
        <label>Last Name:</label>
        	<input name="lname" type="text" value="<?php echo $popForm['user_lname']  ?>">
            <br><br>
        <label>Username:</label>
        	<input name="username" type="text" value="<?php echo $popForm['user_name']?>">
            <br><br>
        <label>Password:</label>
        	<input name="password" type="text" value="<?php echo $popForm['user_pass']?>">
            <br>
            <br>
       <!-- <label>Email Address:</label>
        	<input name="email" type="text" value="<php echo $popForm['user_email']?>">
            <br><br> I TOOK A ? OFF-->
            <input type="submit" name="submit" value="Submit">
        </form>
        <br><br>
       <a href="admin_index.php">Back to Admin</a>
</body>
</html>