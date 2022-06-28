<!DOCTYPE html>
	<html>
		<head>
			<?php include("bd.php"); ?><!-- connection  with the database -->
		</head>
		<body>
			<?php // registration of a new user into the database
				 function register($name,$surname,$username,$password,$email,$role){
					$bdd = getBD();

					$req = $bdd->prepare('INSERT INTO users (name, surname, username, password, email, role)VALUES( ?, ?, ?, ?, ?, ?)'); 
					
					$req->execute(array($_POST['name'],$_POST['surname'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['role']));
				}
				if($_POST['name']=="" || $_POST['surname']=="" || $_POST['username']=="" || $_POST['password']=="" || $_POST['email']=="" || $_POST['role']==""){
				  echo '<meta http-equiv="refresh" content="0;url=signup.php"/>';
				 }
				else{
					register($_POST['name'],$_POST['surname'],$_POST['username'],$_POST['password'],$_POST['email'],$_POST['role']);
					echo '<meta http-equiv="refresh" content="0;url=index.php"/>';
				}
			?>
		</body>
	</html>	