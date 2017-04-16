<?php
		
		//change password
		
		function resetpass (){
			if(!$pass === $current_id){
				$change_pass = "INSERT INTO tbl_user(user_pass)VALUES (" . $_POST["password"] . ")";
				redirect_to("admin_login.php");
				echo  "You have changed your password";
				}else{
				$message = "Change password fail, please try again";
				return $message;	
				}
				mysqli_close($link);
			}
		
		//generate password 
		//http://stackoverflow.com/questions/1837432/how-to-generate-random-password-with-php
		function getMeRandomPwd($length){
   	 	$a = str_split("abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXY0123456789"); 
    	shuffle($a);
    	return substr( implode($a), 0, $length );
		}
		//echo "\n".getMeRandomPwd(0)."\n".getMeRandomPwd(13);
		
		
		//send email attempt2
		//http://php.net/manual/en/function.mail.php
		
		/*function sendemail($id, $fname,$lname,$username,$password,$email){
			include('connect.php');
			
			$query = "INSERT INTO tbl_user (user_fname, user_lname, user_name, user_pass, user_email) VALUES
          ('" . $_POST["fname"] . "', '" . $_POST["lname"] . "', '" . $_POST["username"] . "', '" . $_POST["password"] . "', '" . $_POST["email"]."')";
           $current_id = $tbl_user->insertQuery($query);
			
				if(!empty($current_id)) {
			$actual_link = "admin_email.php"."activate.php?id=" . $current_id;
			$toEmail = $_POST["email"];
			$subject = "Activation Email from us";
			$content = "Hello! This is a confirmation email message.<br>
						This is your $username, and your temporary password, 
						please change your password within 3 days.";
			$from = "someonelse@example.com";
			$headers = "From: $from";
			
			redirect_to("admin_login.php");
			$message = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";	
					}else{
						
			unset($_POST);
			$message = "PLease confirm your email before you login.";
			return $message;
					}
					mysqli_close($link);
				}*/
		
		
		
	/*	//send email attempt1	
		if($result) {
				$to = "$email";
				$subject = "Activation Email from $from";
				$message = "Hello! This is a confirmation email message.<br> Here is your temporary password, please change your password within 3 days.<br> 4bfov8ejj293a";
				$from = "someonelse@example.com";
				$headers = "From: $from";
				mail($to,$subject,$message,$headers);
				echo "Mail Sent.";
				header("location: register-success.php");
				exit();
		}else{
			
				$message = "PLease confirm your email before you login.";
		}*/
		
		
		//updated info for user account
	function editUser($id, $fname,$lname,$username,$password){
		//function editUser($id, $fname,$lname,$username,$password,$email){
		include('connect.php');//require_once means run only once, but include could run multi times
		
		$updatestring = "UPDATE tbl_user SET user_fname = '{$fname}', user_lname = '{$lname}',  user_name = '{$username}', user_pass = '{$password}' WHERE user_id={$id}";
			//$updatestring = "UPDATE tbl_user SET user_fname = '{$fname}', user_lname = '{$lname}',  user_name = '{$username}', user_pass = '{$password}', user_email = '{$email}' WHERE user_id={$id}";
		$updatequery =mysqli_query($link,$updatestring);
		
		if($updatequery){
			redirect_to ("admin_index.php");
		}else{
		
		$message = "There was a problem changing your user account settings. Please contact your web admin.";
		return $message;	
		}
		
		mysqli_close($link);
		}


		
	function getUser($id){
		require_once('connect.php');
		$userstring ="SELECT * FROM tbl_user WHERE user_id ={$id}";
		$userquery= mysqli_query($link, $userstring);
		
		if($userquery) {
			//fetch
			$found_user = mysqli_fetch_array($userquery, MYSQLI_ASSOC);
			//return to $popForm	
			return $found_user;
		}else{		
			$message = "There was a problem changing your account. Please contact the web admin for help.";	
			return $message;
		}
		
		mysqli_close($link);
		
	}
		
		
		
					//put new user in the db
	function createUser($fname,$lname,$username,$password,$level) {
		//function createUser($fname,$lname,$username,$password,$email,$level) {
		require_once('connect.php');	
		$ip = 0;
		$userstring = "INSERT INTO tbl_user VALUES(NULL,'{$fname}','{$lname}','{$username}','{$password}','{$level}','{$ip}')";
		//$userstring = "INSERT INTO tbl_user VALUES(NULL,'{$fname}','{$lname}','{$username}','{$password}','{$email}','{$level}','{$ip}')";
		//echo $userstring;
		$userquery = mysqli_query($link, $userstring);
		if($userquery){
			redirect_to ('admin_email.php');
		}else{
			$message = "There was a problem setting up this user, maybe this is a sign about your hiring process..";
			return $message;
		}
		mysqli_close($link);
	}


?>