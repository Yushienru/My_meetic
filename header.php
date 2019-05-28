<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="type/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        
    <meta charset="UTF-8">
    <title>Meetic</title>

</head>

<body>
        <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white " >
        <img id="mymeeticlogo" src="images/logo.png" alt = "icone">
        <h2>My Meetic</h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Recherche Profils</a>
                </li>
            </ul>
        </div>
        <?php if (isset($_SESSION['user_id'])){
            echo "<div class = 'id_membre'><p id = 'membre'>Bonjour ".$_SESSION['prenom'].' !</div>
                <a class="nav-link" id="espace" href="membre.php">Mon espace <span class="glyphicon glyphicon-user"></span></a>
                <a class="nav-link" href="deconnexion.php">Déconnexion <span class="glyphicon glyphicon-log-out"></span></a>';
                
            }
            else{
                echo '
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="formulaire_inscription.php"><span class="glyphicon glyphicon-user "></span> S\'enregistrer </a></li>
                    <li><a href="formulaire_connexion.php"><span class="glyphicon glyphicon-log-in "></span> Connexion </a></li>
                </ul>';
            }?>
        </nav>
        

    </header>
