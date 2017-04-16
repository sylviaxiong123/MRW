
<?php
	
	function logIn($username, $password, $ip) {
		
		require_once("connect.php");
		
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		date_default_timezone_set('America/New_York');
		$currentdate = date('Y-m-d h:i:s');
		//echo $currentdate;
		
		$loginString = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass='{$password}'";
		
		$user_set = mysqli_query($link, $loginString);
		
		if(mysqli_num_rows($user_set)) {
			$found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $found_user['user_id'];
			$user_name = $found_user['user_name'];
		
		
			//$_SESSION['users_id'] = $id;//makingup for the name
			//$_SESSION['users_name'] = $user_name;
			$_SESSION['users_id'] = $found_user['user_id'];//replacement for the last 2 lines. shorten the codes
			$_SESSION['users_name'] = $found_user['user_name']; //make the accessiable to everypage once the user entered the login
			
			if (mysqli_query($link, $loginString)){

				$updateString = "UPDATE tbl_user SET user_ip = {$ip} WHERE user_id={$id}";
				$updateQuery = mysqli_query($link,$updateString);
				
				$newuserstamp = $found_user['user_timestamp'];
				//echo $newuserstamp;
				$endstamp = date("Y-m-d", strtotime(date("Y-m-d", strtotime($newuserstamp)). "+90 day"));
				//echo $endstamp;
			//login first time-> edit user
			//after reset the info, log back -> admin
			if(date("Y-m-d")< $endstamp){
				$logs = $found_user['user_logs'];
				//echo $logs;	
				if($logs==0){
					$relog= +1;
					$updateLogString = "UPDATE tbl_user SET user_logs = {$relog} WHERE user_id={$id}";
					$updateLogQuery = mysqli_query($link,$updateLogString);
				
				redirect_to("admin_edituser.php");//pass through the url

				}else{
					//after first time login, goes to admin panel 
				redirect_to("admin_index.php");
				}
				
			}else{

				$message = "Membership has expired, please renew your account!";
				return $message;
			}
		}
	}
}
			
?>
