<!DOCTYPE html>
<html>
<head>
	<title>PeerBits Chats</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		
		<style>
body {
  background-image: url('img/myapp.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
		
<style>
	#login_form{
		width:350px;
		height:350px;
		position:relative;
		top:50px;
		margin: auto;
		padding: auto;
		background-color: lightpink ;
		
		
	}
</style>
</head>
<body>
	<br>
	<h1><center>PeerBits Chats <img src="img/logo.jpg" width="80px" height="65px"></center></h1>
	<style>
		h1{
			color: Green;
		}
		</style>
	
<div class="container">
	<div id="login_form" class="well">
		<h2><center><span class="glyphicon glyphicon-lock"></span> Please Login</center></h2>
		<hr>
		<form method="POST" action="login.php" autocomplete="off">
		Username: <input type="text" name="username" class="form-control" required>
		<div style="height: 10px;"></div>		
		Password: <input type="password" name="password" class="form-control" required> 
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button> No account? <a href="signup.php"> Sign up</a>
		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
			<center>
			<?php
				session_start();
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			</center>
		</div>
	</div>
</div>

</body>

</html>