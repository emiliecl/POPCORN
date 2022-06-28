<!DOCTYPE html>
<html>
	<head>
		<?php include("bd.php"); ?><!-- connection  with the database -->
	</head>
	

	<body>
		<?php // delete the movie that was selected
			session_start();
            $bdd = getBD();		

			if (($_POST["liste"])=="yes"){
				$idmovies = $_POST["idmovies"];

				$rep = "DELETE FROM favorites WHERE idmovies='$idmovies'";
				$bdd->exec($rep);
	
			    $req = "DELETE FROM movies where title='$idmovies'"; 
				$bdd->exec($req);

				echo '<meta http-equiv="refresh" content="0;url=owner.php"/>';

			}
			else{
				echo'<meta http-equiv="refresh" content="0;url=delete.php"/>';
			}
            
            $rep -> closeCursor();
		?>
	</body>
</html>

