<!DOCTYPE html>
<html>
	<head>
        <!-- connection  with the database -->
		<?php include("bd.php"); ?>
    </head>

    <body>
        <?php // empty the list of the user
            session_start();
			$bdd = getBD();	

            $user=$_SESSION['id1'];

            if (isset($user)) {
                    $req = $bdd->query("DELETE FROM favorites WHERE idusers = $user"); 			
                    
                    echo '<meta http-equiv="refresh" content="0;url=favorites.php"/>';
            }
               

        ?>
    </body>
</html>