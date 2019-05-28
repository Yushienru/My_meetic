<?php
require "header.php";
$id = $_SESSION['user_id'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$sex = $_SESSION['sex'];
$birthdate = $_SESSION['birthdate'];
$mail = (!empty($_POST["modif_email"]))? $_POST["modif_email"]   : NULL;
$ville = (!empty($_POST["modif_ville"]))? $_POST["modif_ville"]   : NULL;
$password = (!empty($_POST["modif_password"]))? $_POST["modif_password"]: NULL;
$password = password_hash($password, PASSWORD_DEFAULT);

require "my_meetic.php";
$user -> update($id, $nom, $prenom, $birthdate, $sex, $ville, $mail, $password);

echo "$id.$nom.$prenom.$birthdate. $sex .$ville. $mail. $password";

require "footer.php";

?>