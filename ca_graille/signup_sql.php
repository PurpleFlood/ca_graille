<?php
require ('sql/pdo.php');

$sql = "INSERT INTO client (nom, email, mdp) VALUES(?, ?, ?)";
$rs_insert = $cnx->prepare($sql);

$NOM = $_POST['nom'];
$EMAIL = $_POST['mail'];
$MDP = $_POST['mdp'];

$rs_insert->bindValue(1, $NOM, PDO::PARAM_STR);
$rs_insert->bindValue(2, $EMAIL, PDO::PARAM_STR);
$rs_insert->bindValue(3, $MDP, PDO::PARAM_STR);

$rs_insert->execute();

$sql2 = 'SELECT email, mdp, nom FROM client';
$rs_select = $cnx->prepare($sql2);

$rs_select->execute();

while($data = $rs_select->fetch(PDO::FETCH_ASSOC)) {
    $_SESSION["mail"] = $data["email"];
    $_SESION["mdp"] = $data["mdp"];
    $_SESSION["nom"] = $data["nom"];

    echo "Incription réussie, ";?><a href="login.php">Connectez vous<?php
    break;
}
?>