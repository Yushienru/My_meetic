<?php 

require "header.php";
echo "<form action = 'validate_modif.php' method = 'POST' id = 'formulaire_membre'>
<div class='formulaire col-lg-3 col-md-offset-4'><h1>Mon compte</h1>
<p> Votre nom:  ". $_SESSION['nom']. " </p>
<p> Votre prénom: ". $_SESSION['prenom']. "</p>
<p> Email: ". $_SESSION['email']. " </p>
<div class='text col-sm-12' id='change_mail'>
<input type='email' class='form-control' id='changement_email' placeholder='Changer votre email' name='modif_email' required='required'>
</div>
<p> Ville: ". $_SESSION['ville']. " </p>
<p>Changer la ville</p>
<div class='text col-sm-12'>
<input type='text' class='form-control' id='changement_ville' placeholder='Changer votre ville' name='modif_ville' required='required'>
</div>

<p>Rentrez votre nouveau mot de passe</p>
<div class='text col-sm-12' id='new_mdp'>
<input type='password' class='form-control' id='new_password' placeholder='Votre nouveau mot de passe' name='modif_password' required='required'>
<button class='bouton col-md-5 col-md-offset-4 btn' type='submit' id = 'valider' name = 'bouton' value = 'envoyer'> Valider </button>
<a class='btn btn' href='delete.php'>Supprimer mon compte</a>
</div>

</div>";


require "footer.php";

?>
