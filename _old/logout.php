<?php
    // On lance la session pour pouvoir la détruire
    session_start();
    session_destroy();

    // on lance la session pour le message puis redirection vers la page d'accueil
    session_start();
    $_SESSION['message']= "Vous êtes bien déconnecté";
    header("Location:index.php");

