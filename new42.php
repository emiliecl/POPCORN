<!DOCTYPE html>
	<html>
		<head>
		<?php include("bd.php"); ?><!-- connection  with the database -->
			<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /><!-- CSS styling link -->
			<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" /><!-- special characters link -->
			<title>Update</title>
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
			<?php // update the category of a movie
                session_start();
                $bdd = getBD();
                $title=$_SESSION['title'];
                $caterory = $_POST["caterory"];
            
                 $rep = "UPDATE movies SET caterory='$caterory' WHERE title='$title'";
                 $bdd->exec($rep);

                 echo "The update has been completed successfully";
                 echo '<meta http-equiv="refresh" content="2;url=owner.php"/>';
			?>
            </center>
		</body>
	</html>	