<!DOCTYPE html>
<html>
	<head>
		<?php include("bd.php"); ?><!-- connection  with the database -->
		<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /><!-- CSS styling link -->
		<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" /><!-- special characters link -->
	</head>

	<body>
		<center>
			<?php 	// control the access to the page (permission only to users users)
				session_start();
				$bdd = getBD();
				$rep = $bdd->query('SELECT role from users');
				
				if ($_SESSION['role']=='user'){
					echo '<meta http-equiv="refresh" content="0;url=movies.php"/>'; 
				}
				else{
					echo '<p class="a">Sorry, you do not have access to this page</p>';
					echo '<meta http-equiv="refresh" content="3;url=welcome.php"/>';
				}
			?>
		</center>
	</body>
	
</html>