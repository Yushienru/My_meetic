<?php
require "header.php";
$sex    = (!empty($_POST["sex"]))       ? $_POST["sex"]     : NULL;
$nom    = (!empty($_POST["nom"]))       ? $_POST["nom"]     : NULL;
$prenom = (!empty($_POST["prenom"]))    ? $_POST["prenom"]  : NULL;
$ville = (!empty($_POST["ville"]))      ? $_POST["ville"]   : NULL;
$age    = (!empty($_POST["age"]))       ? $_POST["age"]     : NULL;
$mail   = (!empty($_POST["email"]))     ? $_POST["email"]   : NULL;
$password = (!empty($_POST["password"]))? $_POST["password"]: NULL;
$motdepasse = password_hash($password, PASSWORD_DEFAULT);
 require "my_meetic.php";

$user_id = $user->create($nom,$prenom,$age,$sex,$ville,$mail,$motdepasse);

 echo "<div class='inscription'>
                <h1> Inscription Réussie</h1>
                <p>Hello ". $prenom." ". $nom." Amuses-toi bien =D </p>
        </div>";

require "footer.php";

?>