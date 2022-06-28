<!DOCTYPE html>
<html>
	<?php
		session_start();
	?> 

	<head>
		<?php include("bd.php"); ?><!-- connection  with the database -->
		<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /><!-- CSS styling link -->
		<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" /><!-- special characters link -->
		<title>Change info</title>
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
        </style>
	
    <!-- creation of the header -->	
    <div id="navbar">
        <nav>
            <ul>
                <li><a href="welcome.php">Home</a></li>
                <li><a href="movies2.php">Movies</a></li>
                <li><a href="owner.php">Owner</a></li>
                <li><a class="ici" href="administration2.php">Administration</a></li>
                <li><a a href="logout.php">Logo out</a></li>
            </ul>
        </nav>
    </div>
</head>

<body>

<?php 
    $bdd = getBD();		 
    $id = $_POST['edit_id'];
                
    $rep = $bdd->query("SELECT * FROM users WHERE id='$id' ");
    while ($ligne =$rep ->fetch()){
               $_SESSION['user']=array(
                  $ligne['id'],
                  $ligne['name'],
                  $ligne['surname'],
                  $ligne['username'],
                  $ligne['password'],
                  $ligne['email'],
                  $ligne['role'],
                  $ligne['confirmed']);

                  $_SESSION['id1']= $ligne['id'];
                  $_SESSION['name']= $ligne['name'];
                  $_SESSION['surname']=$ligne['surname'];
                  $_SESSION['username']=$ligne['username'];
                  $_SESSION['email']=$ligne['email'];
                  $_SESSION['confirmed']=$ligne['confirmed'];
    }

    $rep -> closeCursor();
?>
<center>
</br>
</br>
</br>
</br>
</br>
<div class="ad1">    
    <form action="admin.php" method="post" autocomplete="off">
        </br>
            <input type="hidden" name="edit_id" placeholder="Id" value="<?php echo $_SESSION["id1"]; ?>">
        </br>
        </br>
        <label for="name">Name</label>: 
            <input type="text" name="edit_name" placeholder="Name" value="<? echo $_SESSION["name"];?>">         
        </br>
        </br>
        <label for="surname">Surname</label>: 
            <input type="text" name="edit_surname" placeholder="Surname" value="<? echo $_SESSION["surname"];?>">       
        </br>
        </br>
        <label for="username">Username</label>: 	
            <input type="text" name="edit_username" placeholder="Username" value="<? echo $_SESSION["username"];?>">         
        </br>
        </br>
        <label for="email">Email</label>: 	
            <input type="text" name="edit_email" placeholder="Email" value="<?php echo $_SESSION["email"]; ?>">
        </br>
        </br>
        <label for="confirmed">Confirmed</label>: 	
            <input type="number" name="edit_confirmed" placeholder="Confirmed" value="<?php echo $_SESSION["confirmed"]; ?>">
        </br>
        </br>
        <label><p><input type="submit" value="EDIT"></p>
    </form>
</div>
</center>
</body>
</html>
