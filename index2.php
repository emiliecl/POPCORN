<!DOCTYPE html>
<html>
	<head>
		<?php include("bd.php"); ?><!-- connection  with the database -->
		<title>Login</title>
		<!-- style for page -->
		<style>
			body{
				background-color: white;
				color: black;
			}
		</style>
	</head>
	

	<body>
	<?php //verify if the user can connect to the site 
	
		echo '<meta http-equiv="refresh" content="0;url=index3.php"/>'; 
				
		session_start();
		$bdd = getBD();

		$rep = $bdd->query('select * from users where username="'.$_POST['username'].'" 
							and password="'.$_POST['password'].'" 
							and confirmed!=0');
		while ($ligne =$rep ->fetch()){
			if(($ligne['password'])==$_POST['password']){
				   $_SESSION['user']=array(
					  $ligne['id'],
					  $ligne['name'],
					  $ligne['surname'],
					  $ligne['username'],
					  $ligne['password'],
					  $ligne['email'],
					  $ligne['role'],
					  $ligne['confirmed']);
				   
				   $_SESSION['surname']= $ligne['surname'];
				   $_SESSION['name']= $ligne['name'];
				   $_SESSION['role']=  $ligne['role'];
				   $_SESSION['id1']=$ligne['id'];
				   $_SESSION['confirmed']=$ligne['confirmed'];
				   echo '<meta http-equiv="refresh" content="0;url=welcome.php"/>';
			}
		}
		$rep ->closeCursor();
	?>

	</body>
</html>