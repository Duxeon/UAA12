<?php
    $uri = $_SERVER["REQUEST_URI"];


    switch ($uri) 
    {
        case '/' :
            $title = "Bienvenue - Socieon";
            $template = "Views/pageAccueil.php";
            require_once("Views/base.php");
            break;
        case '/index.php' :
            $title = "Bienvenue - Socieon";
            $template = "Views/pageAccueil.php";
            require_once("Views/base.php");
            break;
            
    }