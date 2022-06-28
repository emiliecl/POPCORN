<!DOCTYPE html>
<html>
	<?php
		session_start();
	?> 

	<head>
		<?php include("bd.php"); ?><!-- connection  with the database -->
		<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /><!-- CSS styling link -->
		<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" /><!-- special characters link -->
		<title>Update</title>
		<!-- style for page -->
        <style>
			body{
				background: url("photos/har7.jpg");
				color: white;
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
		
	<?php
		session_start();
		$bdd = getBD();
		$title=$_SESSION['title'];
	?>
    
	<!-- form: in order to change the year of a movie -->
	<form action="new32.php" method="post" autocomplete="off">
		</br>
		<label for="century">Year</label>: 
		<input type="number" name="century" placeholder="Add the new information" value="" required>  
		<input type="hidden" name="title" value="<?php echo $_SESSION["title"]; ?>">       
		</br>
		</br>
        <label><p><input type="submit" value="Change"></p>
	</form>
		
	</center>
	</body>
</html>