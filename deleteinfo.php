<!DOCTYPE html>
<html>
	<head>
		<?php include("bd.php"); ?><!-- connection  with the database -->
	</head>
	

	<body>
		<?php // delete a user from the database
            $bdd = getBD();		 
            
            $id = $_POST['delete_id'];
                
			$req = "DELETE FROM users where id='$id'"; 
			$bdd->exec($req);

			echo '<meta http-equiv="refresh" content="0;url=administration.php"/>';
            
            $rep -> closeCursor();
		?>
	</body>
</html>