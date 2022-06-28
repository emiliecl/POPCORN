<!DOCTYPE html>
<html>
	<?php
		session_start();
	?> 
	<head>
		<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /><!-- CSS styling link -->
		<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" /><!-- special characters link -->
        <?php include("bd.php"); ?><!-- connection  with the database -->
		<title>Movies</title>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="JsLocalSearch.js"></script>
		<!-- style for page -->
		<style>
			body{
				background: url("photos/ri1.jpg");
				color: black;
				font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
				
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
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>

        <?php // display the movie that was selected
			session_start();
			echo "<div class='title'><p>".$_GET['title']."</p></div>";
        ?>

		<div id="xsearch" class="home-search">
		<div class="search-content"> 
		<p>Do you want to add this film at your liste?</p>
		<!-- form: add to the list verification -->
		<form method="post" action="favs.php" autocomplete="off">
			YES :  
			<INPUT type="radio" name="liste" value="yes">
			NO : 
			<INPUT type="radio" name="liste" value="no">
			</br>
			</br>
			<INPUT type="submit" value="See my liste" class="search1">
			<input type="hidden" name="idusers" value="<?php echo $_SESSION["id1"]; ?>">
			<input type="hidden" name="idmovies" value="<?php echo $_GET["title"]; ?>">
		</form>
		</br>
    </center>
    </body>
</html>
