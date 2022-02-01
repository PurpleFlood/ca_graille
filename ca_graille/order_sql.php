<?php
require ('sql/pdo.php');

$sql = "INSERT INTO reservation (nom, telephone, email, nombresPersonnes, dateReservation) VALUES(?, ?, ?, ?, ?)";
$rs_insert = $cnx->prepare($sql);

$NOM = $_POST['nom'];
$TELEPHONE = $_POST['telephone'];
$EMAIL = $_POST['mail'];
$NOMBRESPERSONNES = $_POST['nombresPersonnes'];
$DATERESERVATION = $_POST['dateReservation'];

$rs_insert->bindValue(1, $NOM, PDO::PARAM_STR);
$rs_insert->bindValue(2, $TELEPHONE, PDO::PARAM_STR);
$rs_insert->bindValue(3, $EMAIL, PDO::PARAM_STR);
$rs_insert->bindValue(4, $NOMBRESPERSONNES, PDO::PARAM_STR);
$rs_insert->bindValue(5, $DATERESERVATION, PDO::PARAM_STR);

$rs_insert->execute();

$sql2 = "SELECT email telephone dateReservation FROM reservation";
$rs_select = $cnx->prepare($sql2);

$rs_select->execute();

while($data = $rs_select->fetch(PDO::FETCH_ASSOC)) {
    $_SESSION["mail"] = $EMAIL;
    $_SESION["telephone"] = $data["telephone"];
    $_SESSION["dateReservation"] = $data["dateReservation"];

    echo "Bonjour ". $_SESSION["nom"]. ", votre réservation à bien été programmé le ". $_SESSION["dateReservation"];
}
?>