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
				background: url("photos/har4.jpg");
			}

			#par1{
				color:black;
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
        </br>
        </br>
        <center>
			<p id="movies">Which one of the information below do you want to change?</p>
		</br>
		
			<?php
				session_start();
				$bdd = getBD();
				$title=$_GET['title'];

				$rep = $bdd -> query("SELECT *  from movies where title='$title'");									
          
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

						echo "<div class='table1'><p>".$_GET['title']."</p></div>";

						echo "<div class='table'><p>".$_SESSION['contry']."</p>
											   <p>".$_SESSION['century']."</p>
											   <p>".$_SESSION['caterory']."</p> </div>";
											
					}
					
					$rep -> closeCursor();
			?>
		</center>
		</br>
        </br>
		</br>
		</br>
            <a href="new1.php"><div class='titl'><p>The title?</p></div></a>
			<a href="new2.php"><div class='contry'><p>The country?</p></div></a>
			<a href="new3.php"><div class='century'><p>The year?</p></div></a>
            <a href="new4.php"><div class='caterory'><p>The category?</p></div></a>

    </body>
</html>