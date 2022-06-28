<!DOCTYPE html>
	<html>
		<head>
			<?php include("bd.php"); ?><!-- connection  with the database -->
		</head>
		
		<body>
			<?php //registration of the new movie added by the cinemaowner
				 function register($title,$contry,$century,$caterory,$idcinema){
					$bdd = getBD();

					$req = $bdd->prepare('INSERT INTO movies (title, contry, century, caterory, idcinema)VALUES( ?, ?, ?, ?, ?)'); 
					
					$req->execute(array($_POST['title'],$_POST['contry'], $_POST['century'], $_POST['caterory'], $_POST['idcinema']));
				}
				if($_POST['title']=="" || $_POST['contry']=="" || $_POST['century']=="" || $_POST['caterory']=="" || $_POST['idcinema']=="" ){
				  echo '<meta http-equiv="refresh" content="0;url=add.php"/>';
				 }
				else{
					register($_POST['title'],$_POST['contry'],$_POST['century'],$_POST['caterory'],$_POST['idcinema']);
					echo '<meta http-equiv="refresh" content="0;url=owner.php"/>';
				}
			?>
		</body>

	</html>	