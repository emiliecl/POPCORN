<!DOCTYPE html>
<html>
<?php
		session_start();
?> 
	<head>
		<?php include("bd.php"); ?>
		<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
		<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" />
		<title>Update movie</title>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="JsLocalSearch.js"></script>
		<style>
			body{
				background: url("photos/har.jpg");
			}
		</style>
	
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
	<?php

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
			<p id="movies">SELECT THE MOVIE THAT YOU WANT TO UPDATE</p>
			</br>
		
        <?php	
            session_start();
			$bdd = getBD();
			$owner=$_SESSION['id1'];
			
            $rep = $bdd -> query("SELECT DISTINCT title from movies, cinemas, users 
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
					$_SESSION['contry']=$ligne['contry'];
					$_SESSION['century']=$ligne['century'];
					$_SESSION['caterory']=$ligne['caterory'];
                    $_SESSION['idcinema']=$ligne['idcinema'];


				   echo "<a href=upgreat2.php?title=".urlencode($ligne['title'])."><div class='title'><p>".$ligne['title']."</p></div></a>";
				}
			 
			 $rep -> closeCursor();
        	?>
	
        </center>
	</body>
</html>