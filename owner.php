<!DOCTYPE html>
<html>
	
	<?php // displays the information of the logged in user
		include("bd.php");
		session_start();
		
		if(isset($_SESSION['user'])) { 
			echo "Welcome "; 
			echo $_SESSION['name'] .' '; 
			echo $_SESSION['surname'] .' ';
			echo "(".' ';
			echo $_SESSION['role'].' ';
			echo ")".' ';
		}
		?> 
	
	<head>
		<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /><!-- CSS styling link -->
		<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" /><!-- special characters link -->
		<title>Owner</title>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="JsLocalSearch.js"></script>
		<!-- style for page -->
		<style>
			body{
				background: url("photos/har.jpg");
				color: #696969;
			}
			
			
			#log{
				margin-left:1450px;
				margin-top:-20px;
			}
			
			#test{
				color: black;
			}
		</style>

		<!-- creation of the header -->	
		<div id="navbar">
			<nav>
				<ul>
					<li><a href="welcome.php">Home</a></li>
					<li><a href="movies2.php">Movies</a></li>
					<li><a class="ici" href="owner.php">Owner</a></li>
					<li><a href="administration2.php">Administration</a></li>
					<li><a a href="logout.php">Logo out</a></li>
				</ul>
			</nav>
		</div>
	</head>
	<body>

	<?php //verifications

		$temp = 'cinemaowner';

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
	<p id="movies">THE MOVIES THAT YOU HAVE POSTED</p>
		
	<?php // display the movies that the owner has upload
		session_start();
		$bdd = getBD();
		$owner=$_SESSION['id1'];

		$rep = $bdd -> query("SELECT DISTINCT * from movies, cinemas, users 
							where cinemas.owner=users.id
							and cinemas.owner=$owner
							and movies.idcinema=cinemas.id");									
			while ($ligne =$rep ->fetch()){
				$_SESSION['movies']=array(
					$ligne['id'],
					$ligne['title'],
					$ligne['contry'],
					$ligne['century'],
					$ligne['caterory'],
					$ligne['idcinema']);
					
				$_SESSION['id']= $ligne['id'];
				$_SESSION['title']= $ligne['title'];
				$_SESSION['idcinema']=$ligne['idcinema'];
				
				echo '<div class="title"><p>'.$ligne['title']."</p></div>";
			}
			
			$rep -> closeCursor();
		?>
		</center>
			<!-- 3 dif. butons -->
			<a href="add.php"><div class='add'><p>Add a new movie</p></div></a>
			<a href="upgreat.php"><div class='upgreat'><p>Update a movie</p></div></a>
			<a href="delete.php"><div class='delete'><p>Delete a movie</p></div></a>
	</body>
</html>