<!DOCTYPE html>
<html>
	<?php
		session_start();
	?> 

	<head>
		<?php include("bd.php"); ?><!-- connection  with the database -->
		<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /><!-- CSS styling link -->
		<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" /><!-- special characters link -->
		<title>Movies</title>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="JsLocalSearch.js"></script>
		<!-- style for page -->
		<style>
			body{
				background: url("photos/dra.jpg");
				color: #696969;
			}
		</style>
	
		<!-- creation of the header -->	
		<div id="navbar">
			<nav>
				<ul>
					<li><a href="welcome.php">Home</a></li>
					<li><a class="ici" href="movies2.php">Movies</a></li>
					<li><a href="owner.php">Owner</a></li>
					<li><a href="administration2.php">Administration</a></li>
					<li><a a href="logout.php">Logo out</a></li>
				</ul>
			</nav>
		</div>
	</head>
	
	<body>
	<?php //verifications
		$temp = 'user';

		//Chech if the user is logged in. Else redirect him to loggin page.
		if (!isset($_SESSION["id1"])) {
		header("location: index.php?error=notloggedin");
		exit();
		}
		//Check if the user is confirmed by the admin. Else redirect to the welcome page.
		if ($_SESSION["confirmed"] != 1) {
		header("location: welcome.php?error=notConfirmed");
		exit();
		}
		//Give access to this page only if the user has the role of "user". Else redirect him to the welcome page.
		if (strcmp($_SESSION["role"],$temp) !=0 ) {
		header("location: welcome.php?error=notUserOwner");
		exit();
		}
		include 'includes/dbh_handler.php';
		$sessid = $_SESSION["id1"];

	?>
	<center>
	</br>
	<p id="movies">YOUR LIST</p>
	</br>
			
	<?php //display the list of the user	

		session_start();
			
		$user=$_SESSION['id1'];
		$bdd = getBD();
		$rep = $bdd -> query("SELECT idmovies FROM favorites WHERE idusers=$user");

		while ($ligne =$rep ->fetch()){
			$_SESSION['favorite']=array(
			$ligne['id'],
			$ligne['idusers'],
			$ligne['idmovies']);

			echo '<div class="title"><p>'.$ligne['idmovies']."</p></div>";
		}
				
		$rep -> closeCursor();	
				 
		?>

		</br>
		</br>
		</br>
		</br>
		</br>
		</br>		
		</br>		
		</br>
		</br>
		</br>		
		</br>
		</br>
		</br>
		</br>		
		</br>
		</br>
		</br>		
		</br> <!--link in order to empty the users list -->
		<a href="empty.php"><div class='empty'><p>Empty my list</p></div></a>
			
		</center>
	</body>
</html>