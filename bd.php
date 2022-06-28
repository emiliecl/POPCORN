<?php //connection  with the database
function getBD(){
$bdd = new PDO('mysql:host=localhost;dbname=popcorn;charset=utf8','root', 'root');
return $bdd;
}
?>