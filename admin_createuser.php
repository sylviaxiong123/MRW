<?php
	require_once("phpscripts/init.php");
	//confirm_logged_in();
	
	if(isset($_POST['submit'])) {
		//echo "clicked";
		$fname = trim($_POST['fname']);
		$lname = trim($_POST['lname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		//$email = trim($_POST['email']);
		$level = $_POST['lvllist'];
		
		//check if the user level is selected
		if(empty($level)){
			//echo "Level Not Selected";
			$message = "Please select a user level";
			//$autofname = $fname;
//			$autolname = $lname;
//			$autoname = $username;
//			$autopass = $password;
		}else{
			//echo "Level Selected";
			$result = createUser($fname,$lname,$username,$password,$level);
			//$result = createUser($fname,$lname,$username,$password,$email,$level);
			$message = $result;
		}
		
		
		/*//generate pass
		$a = str_split("abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXY0123456789");
		shuffle($a);
		echo implode($a); //maxlength
		echo "\n".substr( implode($a), 8, 13 ); //instead of 10 => any length*/
	}

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Create User</title>
<link href="css/admin_login.css" rel="stylesheet" media="screen">
</head>

<body>
	<h1>Create User</h1>
     <?php if(!empty($message)) {echo $message;}  ?>
     
		<form action ="admin_createuser.php" method="post">
        <label>First Name:</label>
        	<input name="fname" type="text" value="<?php if(!empty($fname)) {echo $fname;}  ?>">
            <br><br>
        <label>Last Name:</label>
        	<input name="lname" type="text" value="<?php if(!empty($lname)) {echo $lname;}  ?>">
            <br><br>
        <label>Username:</label>
        	<input name="username" type="text" value="<?php if(!empty($username)) {echo $username;}  ?>">
            <br><br>
        <label>Password:</label>
        	<input name="password" type="text" value="<?php if(!empty($password)) {echo $password;}  ?>">
            <br><br>
       <!-- <label>Email Address:</label>
        	<input name="email" type="text" value="<php if(!empty($email)) {echo $email;}  ?>">
            <br><br>-->
            <select name="lvllist"><!--user level decides the accessibility-->
            	<option value="">Please Select User Level....</option>
                <option value="2">Web Admin</option>
                <option value="1">Web Master</option>
            </select>
            <br>
            <br>
            <input type="submit" name="submit" value="Create User"><br>
            <input type="submit" name="submit" value="Edit User">         
        </form>
        <br><br>
       <a href="admin_index.php">Back to Admin Panel</a> 
</body>
</html>