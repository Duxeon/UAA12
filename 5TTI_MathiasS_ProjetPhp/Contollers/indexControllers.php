<?php
    $uri = $_SERVER["REQUEST_URI"];
    
    require_once("Models/groupeModel.php");
    require_once("Models/userModel.php");


    switch ($uri) 
    {
        case '/' :
            $groupes = selectPublicGroupe($pdo);
            
            $title = "Accueil - Socieon";
            $template = "Views/pageAccueil.php";
            require_once("Views/base.php");
            break;
        case '/index.php' :
            $title = "Profile - Socieon";
            $template = "Views/pageAccueil.php";
            require_once("Views/base.php");
            break;
    }