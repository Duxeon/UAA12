<?php
    $uri = $_SERVER["REQUEST_URI"];
    
    require_once("Models/userModel.php");


    switch ($uri) 
    {
        case '/connection' :
            if (isset($_POST["id"])) 
            {
                $erreur=false;
                if(coUser($pdo)) 
                {

                    header("location:/");
                } else 
                {
                    $erreur=true;
                }
            }
            $title = "connection - Socieon";
            $template = "Views/Users/connexion.php";
            require_once("Views/base.php");
            break;



        case '/inscription' :
            if (isset($_POST['username'])) 
            {
                createUser($pdo);
                header("location:/connection");
            }
            $title = "Inscription - Sociéon";
            $template = "Views/Users/inscription.php";
            require_once("Views/base.php");
            break;
        

        case '/profil' :
            $title = "Profile - Socieon";
            $template = "Views/Users/profile.php";
            require_once("Views/base.php");
            break;

        case '/editProfil' :
            if (isset($_POST['newusername'])) 
            {
                editUsername($pdo);
                updateSession($pdo);
                header("location:/editProfil");
            }
            $title = "Modifier le nom d'Utilisateur - Socieon";
            $template = "Views/Users/editProfile.php";
            require_once("Views/base.php");
            break;
    }