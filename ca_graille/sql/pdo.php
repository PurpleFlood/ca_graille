<?php
$dsn = 'mysql:host=localhost;dbname=ca_graille_bdd;charset=utf8';
$user = 'root';
$pass = 'root';

try {
$cnx = new PDO($dsn, $user, $pass);
    
} catch (PDOException $e) {
    echo 'Erreur !';
}
?>


