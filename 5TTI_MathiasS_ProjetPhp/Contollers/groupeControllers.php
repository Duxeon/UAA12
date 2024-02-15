<?php
    $uri = $_SERVER["REQUEST_URI"];
    
    require_once("Models/groupeModel.php");
    require_once("Models/userModel.php");


    switch ($uri) 
    {
        case "/detailGroupe" :
            $title = "Profile - Socieon";
            $template = "Views/Users/profile.php";
            require_once("Views/base.php");
            break;
    }