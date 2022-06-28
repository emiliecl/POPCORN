<!DOCTYPE html>
<html>
	<head>
		<?php include("bd.php"); ?><!-- connection  with the database -->
	</head>
	
	<body>
		<?php // add to the database a movie to the users list (control if is already in the list)
			
			session_start();
			$bdd = getBD();	

			if (($_POST["liste"])=="yes"){

				$idusers = $_POST["idusers"];
  				$idmovies = $_POST["idmovies"];
			
				$rep = $bdd -> query ("SELECT idmovies FROM favorites where idmovies='$idmovies' and idusers=$idusers");
				if ($ligne =$rep ->fetch()){
					echo'<meta http-equiv="refresh" content="0;url=favorites.php"/>';
				}
				else{
					function register($idusers,$idmovies){
					$bdd = getBD();
					$req = $bdd->prepare('INSERT INTO favorites (idusers,idmovies)VALUES( ?, ?)'); 			
					$req->execute(array($idusers,$idmovies));
					}
				register($idusers,$idmovies);
				echo '<meta http-equiv="refresh" content="0;url=favorites.php"/>';
				}	
			}
			else{
				echo'<meta http-equiv="refresh" content="0;url=favorites.php"/>';
			}
			
		?>
	</body>
</html>

