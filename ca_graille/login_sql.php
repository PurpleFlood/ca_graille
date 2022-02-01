<?php
require ('sql/pdo.php');

$sql = 'SELECT email, mdp, nom FROM client';
$rs_select = $cnx->prepare($sql);



$rs_select->execute();

while($data = $rs_select->fetch(PDO::FETCH_ASSOC)) {
    $_SESSION["mail"] = $data["email"];
    $_SESION["mdp"] = $data["mdp"];
    $_SESSION["nom"] = $data["nom"];

    if (($data["mdp"] === $_POST["mdp"]) && ($data["email"] === $_POST["mail"])) {
        echo "Salut ". $_SESSION["nom"]. "<br>";
        ?> <a href="index.php">Se Déconnecter</a><br> <?php
        break;
      } elseif (($data["mdp"] != $_POST["mdp"]) || ($data["email"] != $_POST["mail"])) {
        echo "Erreur identifiant / mot de passe incorrect !";
        break;
      }
}
?>


