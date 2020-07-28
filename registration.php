<?php
require_once('config.php');

	session_start();
	
	if(isset($_SESSION['userlogin'])){
		header("location: index.php");
	}

?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="uft-8">
	<title>Meu site</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</head>
<body>

	<div>
	
	</div>


	<div class="container">
		<div class="login-box">
		<div class="row">
			<div class="col-md-6 login-left">
				<h2>Login</h2>
				<form action="login.php" method="post">
					<div class="form-group">
						<label>Username</label>
						<input id="usuarioL" type="text" name="user" class="form-control" required></input>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input id="senhaL" type="password" name="pass" class="form-control" required></input>
					</div>
					<div class="parte-final">
					</div>
					<!--<div class="custom-control custom-checkbox">
						<input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInLine">
						<label class="custom-control-label" for="customControlInLine">Remember me</label>
					</div>-->
					<button type="submit" class="btn btn-primary" name="enter" id="login"> Login </button>
				</form>
			</div>
			
			<div class="col-md-6 login-right">
				<h2>Register</h2>
				<form action="login.php" method="post">
					<div class="form-group">
						<label>Username</label>
						<input id="usuarioR" type="text" name="username" class="form-control" required></input>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input id="emailR" type="email" name="email" class="form-control" required></input>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input id="senhaR" type="password" name="password" class="form-control" required></input>
					</div>
					<button type="submit" class="btn btn-primary" name="create" id="register"> Register </button>
				</form>
			</div>
		</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){
			
			var valid = this.form.checkValidity();
			
			if(valid){
				
				var nome = $('#usuarioR').val();
				var email = $('#emailR').val();
				var senha = $('#senhaR').val();
				
				e.preventDefault();
				
				$.ajax({
					type: 'POST',
					url: 'process.php',
					data: {username: nome, email: email, password: senha},
					success: function(data){
						Swal.fire({
						position: 'top-end',
						title: data,
						showConfirmButton: false,
						timer: 1500
						})
					},
					error: function(data){
						Swal.fire({
						position: 'top-end',
						title: data,
						icon: 'error',
						showConfirmButton: false,
						timer: 1500
						})
					}
				});
			}
		});
		
		$('#login').click(function(e){
			
			var valid = this.form.checkValidity();
			
			if(valid){
				
				var nome = $('#usuarioL').val();
				var senha = $('#senhaL').val();
				
				e.preventDefault();
				
				$.ajax({
					type: 'POST',
					url: 'processLogin.php',
					data: {user: nome, pass: senha},
					success: function(data){
						Swal.fire({
						position: 'top-end',
						title: 'Logged in successfully!',
						showConfirmButton: false,
						timer: 1500
						})
						if($.trim(data) == "1"){
							setTimeout(' window.location.href = "index.php"', 2000);
						}
					},
					error: function(data){
						Swal.fire({
						position: 'top-end',
						title: data,
						icon: 'error',
						showConfirmButton: false,
						timer: 1500
						})
					}
				});
				$(Header('location:index.php'));
			}
		});
	});
</script>
</body>
</html>