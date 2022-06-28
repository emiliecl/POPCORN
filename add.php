<!DOCTYPE html>
<html>

	<?php
		session_start();
	?> 

	<head>
		<?php include("bd.php"); ?><!-- connection  with the database -->
		<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /><!-- CSS styling link -->
		<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" /><!-- special characters link -->
		<title>New movie</title>
        
		<!-- style for page -->
		<style>
			body{
				background: url("photos/hae1.jpg");
				color:#696969;
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
	
	
	<?php //verifications

		include_once 'header.php';
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
    
	<body>
	
		<center>
			</br>
			</br>
      		<p id="movies">ADD A NEW MOVIE</p>
        	<div class="ad"><!-- form: add a new movie(cinemaowner) -->     
        		<form action="add2.php" method="post" autocomplete="off">
					</br>
					<label for="title">Title</label>: 
						<input type="text" name="title" placeholder="Title"  required>
					</br>
					</br>
					<label for="contry">Country</label>: 
						<input type="text" name="contry" placeholder="Country" value="" required>         
					</br>
					</br>
					<label for="century">Year</label>: 
						<input type="number" name="century" placeholder="Year" value="" required>         
					</br>
					</br>
					<label for="caterory">Category</label>: 	
						<input type="text" name="caterory" placeholder="Category" value="" required>         
					</br>
                	</br>
            		<label for="idcinema">Cinema id</label>: 	
						<input type="number" name="idcinema" placeholder="Cinema id" value="<?php echo $_SESSION["idcinema"]; ?>" required>
               		</br>
                	</br>
					<label><p><input type="submit" value="ADD"></p>
				</form>
			</div>
		</center>
	</body>
</html>