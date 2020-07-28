<?php
session_start();
require_once('config.php');

		if(isset($_POST)){
			$name2 = $_POST['user'];
			$pass2 = sha1($_POST['pass']);
			
			$sql2 = "SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1";
			$stmtselect = $db->prepare($sql2);
			$result2 = $stmtselect->execute([$name2, $pass2]);
			
			if($result2)
			{
				$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
				if($stmtselect->rowCount() > 0)
				{
					$_SESSION['userlogin'] = $user;
					echo '1';
					//echo 'Logged in successfully!';
				} else {
					echo 'There is no user with that data';
				}
			}
		}
	
	?>