<!DOCTYPE html>
<html>
	<body>
		</br>
		</br>	
		<!-- form: search by category -->
		<form class="search-form" action="category.php" method="post" autocomplete="off">
			<input type="text" name="caterory" autocomplete="off" placeholder="Enter category..." class="form-movies movies-input">
		</form>
	</body>

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
		<title>Movies</title>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="JsLocalSearch.js"></script>
		<!-- style for page -->
		<style>
			body{
				background: url("photos/p2.jpg");
				color: white;
			}
			
			#pa{
				color:#C8C8C8;
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
		<nav>
			<ul>
				<li><a href="welcome.php">Home</a></li>
				<li><a class="ici" href="movies.php">Movies</a></li>
				<li><a href="owner2.php">Owner</a></li>
				<li><a href="administration2.php">Administration</a></li>
				<li><a a href="logout.php">Logo out</a></li>
			</ul>
        </nav>
	</head>
	
	<body>
	<?php //verification

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
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	
	<!-- form: search by title -->
	<div id="xsearch" class="home-search">
		<div class="search-content">
			<form class="search-form" action="movies3.php" method="post" autocomplete="off">
				<input type="text" name="title" placeholder="Enter keywords..." value="" class="form-control search-input">
				<input type="submit" value="GO" class="search-submit">
			</form>
		</div>
	</div>
		
	</br>
	</br>
	</br>
	</br>
	<!-- buton in order to see all the movies -->
	<div class="mw-buttons text-center mb-5">
		<a href="allmovies.php" class="btn btn-lg btn-radius btn-primary">See all the movies here<i class="fas fa-arrow-circle-right ml-2"></i></a>
	</div>	
		
	</body>
</html>
