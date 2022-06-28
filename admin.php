<!DOCTYPE html>
	<html>
		<head>
			<?php include("bd.php"); ?><!-- connection  with the database -->
			<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /><!-- CSS styling link -->
			<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" /><!-- special characters link -->
			<title>Change info</title>
			<!-- style for page -->
            <style>
				body{
					background-color: #101010;
					color: white;
				}
        	</style>
	
		</head>
		<body>
            <center>
			<?php 
                session_start();
                $bdd = getBD();

                $id=$_POST['edit_id'];
                $name=$_POST['edit_name'];
                $surname=$_POST['edit_surname'];
                $username=$_POST['edit_username'];
                $email=$_POST['edit_email'];
                $confirmed=$_POST['edit_confirmed'];
                
                $rep = "UPDATE users SET name='$name', surname='$surname', username='$username', email='$email', confirmed='$confirmed'  WHERE id='$id'";
                $bdd->exec($rep);

                echo "The update has been completed successfully";
                echo '<meta http-equiv="refresh" content="5;url=administration.php"/>';
			?>
            </center>
		</body>
	</html>	