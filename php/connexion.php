<?php 
// connexion à la base de données

$mysqli = new mysqli ('localhost', 'root', '', 'php_intermediaire_2');
if($mysqli->connect_error){
    die("Échec de connexion" .$sqli->connect_error);
}
echo "";
?>