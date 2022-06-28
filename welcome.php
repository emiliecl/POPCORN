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
		<title>Home</title>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="JsLocalSearch.js"></script>
		<!-- style for page -->
		<style>
			body{
				background-image: url("photos/star.jpg");
				color: white;
			}
			
			#log{
				margin-left:1450px;
				margin-top:-20px;
			}
			
			#test{
				color: black;
			}

			#box{
				background-color: #101010;
		    	width: 1300px;
  			    height: 500px;

			}
		</style>

		<!-- creation of the header -->	
		<div id="navbar">
			<nav>
				<ul>
					<li><a class="ici" href="welcome.php">Home</a></li>
					<li><a href="movies2.php">Movies</a></li>
					<li><a href="owner2.php">Owner</a></li>
					<li><a href="administration2.php">Administration</a></li>
					<li><a a href="logout.php">Logo out</a></li>
				</ul>
			</nav>
		</div>
	</head>

	<body>		
	<?php //verifications

		//Chech if the user is logged in. Else redirect him to loggin page.
		if (!isset($_SESSION["id1"])) {
		header("location: index.php?error=notloggedin");
		exit();
		}
		//Check if the user is confirmed by the admin. Else redirect to the welcome page.
		if ($_SESSION["confirmed"] != 1) {
		header("location: index.php?error=notConfirmed");
		exit();
		}
	?>
		<!-- TEXT -->
		<center>
		<p id=pop> POPCORN</p>
		<br/>
		<br/>
	   	<p id=box>
		<br/>
		<br/>
		<br/> Watch Movies Online Free
		<br/>
		<br/>POPCORN is one of the best site to watch movies online for free. We give full access to a database of over 20000 movies and 5000 Tv
		<br/>series in high quality for free streaming, with no registration required. POPCORN updates new content on a daily basis and with our huge
		<br/>database, you can find all your favorite movies and shows easily.
		<br/>
		<br/>Please support us by sharing POPCORN site with your friends and family. Thanks!
		<br/>
		<br/>	<a href="https://www.facebook.com/profile.php?id=100006754623220"><img src="photos/2.png" alt="social media icons"></a>
		<br/>
		<br/>Want Free movies and TV shows? HD resolution? Fast streaming speed? Fmovies has got them all! 
		<br/>Fmovies has a huge collection of movies and TV shows with a wide range of genres including Action, Animation, Comedy, Documentary, 
		<br/>History, Horror, Thriller, Sci-fi, TV shows, Game-Show, etc. No matter what you are looking for, be it the latest releases or all-time
		<br/>classics, Hollywood blockbusters or Bollywood dramas, English series or Japanese anime, you are most likely to find it on Fmovies in HD			<br/>quality. We update new titles on a daily basis to make sure our valued users can catch up with the cinematic world. You can access to
		<br/>our full content library without any engagements.</p> 
		</center>
		
		<script> //script for the hide effect at the header
			$("div").hide();

			$("html").mousemove(function( event ) {
				$("div").show();

				myStopFunction();
				myFunction();
			});

			function myFunction() {
				myVar = setTimeout(function(){
					$("div").hide();
				}, 1000);
			}
			function myStopFunction() {
				if(typeof myVar != 'undefined'){
					clearTimeout(myVar);
				}
			}
		</script>	
		
	</body>
</html>