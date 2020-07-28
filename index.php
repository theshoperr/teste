<?php

	session_start();

	if(!isset($_SESSION['userlogin'])){
		header("location: login.php");
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("location: login.php");
	}
	
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="uft-8">
	<title>Meu site</title>
	<link rel="stylesheet" href="styleIndex.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
	<h1>WELCOME</h1>
	
	<a href="index.php?logout=true">Logout</a>
</body>
</html>
