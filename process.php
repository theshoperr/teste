<?php
require_once('config.php');

if(isset($_POST)){
			$name = $_POST['username'];
			$email = $_POST['email'];
			$pass = sha1($_POST['password']);
			
			$sql = "INSERT INTO users (username, email, password) VALUE (?,?,?)";
			$stmtinsert = $db->prepare($sql);
			$result = $stmtinsert->execute([$name, $email, $pass]);
			if($result){
				echo 'Account successfully saved. You may now login.';
			} else
			{
				echo 'That username already exists.';
			}
}else {
	echo 'No data';
}
		
?>