<!DOCTYPE html>
<html>
	<head>
		<?php include("bd.php"); ?><!-- connection  with the database -->
		<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /><!-- CSS styling link -->
		<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" /><!-- special characters link -->
		<title>Login</title>
		<!-- style for page -->
		<style>
			body{
				background: url("photos/1.jpg"); 
			}
		</style>
	</head>

	<body> 
		<center><p id=pop>POPCORN</p></center>
 
		<div class="index"> 
		<center>
			<!-- form: conect to the site -->
			<form  action ="index2.php" method="post" autocomplete="off"> 
				</br>
				<label for="username">Username</label>
					<input type="text" name="username" placeholder="username" value="" required>
				</br>
				</br>
				<label for="password">Password</label>
					<input type="password" name="password" placeholder="password" required>
				<label><p><input id="bouton" type="submit" value="Login"></p></label>	
			</form>
			<p>You don't have account ? : <a href="signup.php">Sign up</a></p>
		</center>
		</div>
	</body>
</html>