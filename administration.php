<!DOCTYPE html>
<html>
	
	<?php // displays the information of the logged in user
		include("bd.php");
		session_start();
		
		if(isset($_SESSION['user'])) { 
			echo "Welcome "; 
			echo $_SESSION['name'] .' '; 
			echo $_SESSION['surname'] .' ';
			echo "(".' ';
			echo $_SESSION['role'].' ';
			echo ")".' ';
		}
	?> 
	
	<head>
		<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /><!-- CSS styling link -->
		<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" /><!-- special characters link -->
		<title>Administration</title>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="JsLocalSearch.js"></script>
		<!-- style for page -->
		<style>
			body{
				background-image: url("photos/star.jpg");
				color: white;
			}
			
			#log{
				margin-left:1450px;
				margin-top:-20px;
			}
			
			#test{
				color: white;
			}
			
			table {
			border-collapse: collapse;
			width: 100%;
			}

			th, td {
			text-align: left;
			padding: 8px;
			}

			tr {
				background-color: white;
				color: black;
			}

			th {
			background-color:  #101010;;
			color: white;
			}
			
		</style>
	
		<!-- creation of the header -->
		<div id="navbar">
			<nav>
				<ul>
					<li><a href="welcome.php">Home</a></li>
					<li><a href="movies2.php">Movies</a></li>
					<li><a href="owner2.php">Owner</a></li>
					<li><a class="ici" href="administration.php">Administration</a></li>
					<li><a a href="logout.php">Logo out</a></li>
				</ul>
			</nav>
		</div>
	</head>
	
	<body>

	<?php
		session_start();
		$bdd = getBD();	
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

	<table border="1"> <!-- creation of the table with the users information for the admin user-->
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Surname</th>
				<th>Username</th>
				<th>Email</th>
				<th>Role</th>
				<th>Confirmed</th>
				<th>EDIT</th>
				<th>DELETE</th>
			</tr>
		</thead>
		
		<tbody>

			<?php //geting the informations from the database
				$rep=$bdd->query('SELECT * from users');
				while ($ligne = $rep ->fetch()) { 
					echo "<tr><td>".
					$ligne['id']."</td><td>".
					$ligne['name']."</td><td>".
					$ligne['surname']."</td><td>".
					$ligne['username']."</td><td>".
					$ligne['email']."</td><td>".
					$ligne['role']."</td><td>".
					$ligne['confirmed']."</td>";
			?>

			<td><!--creation of the 2 buttons "EDIT" and "DELETE" for the table-->
				<form action="changeinfo.php" method="post">
					<input type="hidden" name="edit_id" value="<?php echo $ligne["id"]; ?>">
					<button  type="submit" name="edit_btn" class="btn-edit"><span>EDIT</span></button>
				</form>
			</td>
			<td>
				<form action="deleteinfo.php" method="post">
					<input type="hidden" name="delete_id" value="<?php echo $ligne["id"]; ?>">
					<button type="submit" name="delete_btn" class="btn-delete"><span>DELETE</span></button>
				</form>
			</td>
		
			<?php
			}
				
				$rep ->closeCursor();
			?>
		</tboby>
	</table>
	</center>
			
	</body>
</html>