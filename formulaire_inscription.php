            <?php require "header.php"?>
            <div class = "container-fluid">
        <form action = "validate_inscription.php" method = "POST" id = "envoi" class = "block">
            <div class="formulaire col-lg-3 col-md-offset-4">
                <h1>Inscription</h1>

                <div class="radio sex">
                        <label class="radio-inline"><input type="radio" name="sex" value = "homme" required="required">Homme</label>
                        <label class="radio-inline"><input type="radio" name="sex" value = "femme">Femme</label>
                        <label class="radio-inline"><input type="radio" name="sex"value = "autres">Autres</label> 
                </div>
                
                <div class="text col-sm-12">
                    <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom" required="required">
                </div>
                <div class="text col-sm-12">
                    <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom" required="required">
                </div>
                <div class="text col-sm-12">
                    <input type="text" class="form-control" id="ville" placeholder="Ville" name="ville" required="required">
                </div>
                <div class="text col-sm-12">
                    <input type="date" class="form-control" id="age" placeholder="Date de naissance" name="age" required="required">
                </div>
                <div class="text col-sm-12">
                    <input type="email" class="form-control" id="email" placeholder="Entrer votre Email" name="email" required="required">
                </div>
                <div class=" text col-sm-12">
                <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password" required="required">
                </div>
                
                
                <button class="bouton col-md-4 col-md-offset-4 btn" type="submit" id = "bouton" name = "bouton" value = "envoyer"> Envoyer</button>
            </div>
</form>
</div>
    <?php require "footer.php"?>
