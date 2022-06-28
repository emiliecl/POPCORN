<!DOCTYPE html>
<html>

	<head>
		<?php include("bd.php"); ?><!-- connection  with the database -->
		<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /><!-- CSS styling link -->
		<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" /><!-- special characters link -->
		<title>Sign up</title>
		<!-- style for page -->
		<style>
			body{
				background: url("photos/1.jpg"); 
			}
		</style>
	</head>
	
	<body>
	<!-- form: singup form -->
	<div class="signup">
	<center>
		<form action="signup2.php" method="post" autocomplete="off">
			</br>
			<label for="name">Name</label>: 
				<input type="text" name="name" placeholder="Your Name"  required>
				</br>
				</br>
			<label for="surname">Surname</label>: 
				<input type="text" name="surname" placeholder="Your Surname" value="" required>         
				</br>
				</br>
			<label for="username">Username</label>: 
				<input type="text" name="username" placeholder="Your Username" value="" required>         
				</br>
				</br>
			<label for="password">Password</label>: 	
				<input type="password" name="password" placeholder="Your Password" value="" required>         
				</br>
				</br>
			<label for="email">Email</label>: 
				<input type="email" name="email" placeholder="Your Email" value="" required>         
				</br>
				</br>
			<label for="role">Role</label>: 
				<select name="role">
					<option value="admin" required>admin</option>
					<option value="cinemaowner" required>cinemaowner</option>
					<option value="user" required>user</option>
				</select>
			</br>
			<label><p><input type="submit" value="OK"></p>
			<p id=cancel><a href="index.php">Cancel</a></p>	
		</form>
	</center>
	</div>
	</body>
</html>