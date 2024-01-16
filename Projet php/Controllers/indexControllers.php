<?php
    $uri = $_SERVER["REQUEST_URI"];
    
    require_once("Models/groupeModel.php");

    if ($uri === "/index.php" || $uri === "/") {
        $groupes = selectPublicGroupe($pdo);
        
        $title = "Accueil - Socieon";
        $template = "Views/pageAccueil.php";
        require_once("Views/base.php");
    } else if ($uri === "/connection") {
        $title = "connection - Socieon";
        $template = "Views/Users/connexion.php";
        require_once("Views/base.php");
    } else if ($uri === "/inscription") {
        $title = "Inscription";
        $template = "Views/Users/inscription.php";
        require_once("Views/base.php");
    } else if ($uri === "/coffee") {
        $title = "Erreur 418 - Socieon";
        $template = "Views/error/error418.php";
        require_once("Views/base.php");
    } else {
        $title = "Erreur 404 - Socieon";
        $template = "Views/error/error404.php";
        require_once("Views/base.php");
    }