<?php require "header.php" ?>

<div class = "container-fluid">
    <form action = "val_connexion.php" method = "POST" id = "envoi" class = "block2">
        <div class="formulaire col-lg-3 col-md-offset-4">
            <h1>Connexion</h1>
            <div class="text col-sm-12">
                <input type="email" class="form-control" id="email" placeholder="Entrer votre Email" name="email" required="required">
            </div>
            <div class=" text col-sm-12">
                <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password" required="required">
            </div>
            <button class="bouton col-md-5 col-md-offset-4 btn" type="submit" id = "bouton" name = "bouton" value = "envoyer"> Se connecter</button>
        </div>
    </form>`;

</div>

<?php require "footer.php"?>