<?php
    $uri = $_SERVER["REQUEST_URI"];
    
    require_once("Models/userModel.php");

    if (str_starts_with($uri, "/user/")) {
        $part = explode("/", $uri);
        $fUser = $part[2];
        fUser($pdo, $fUser);
        if (isset($_POST["role"])) {
            $newRank = $_POST["role"];
            changeRank($pdo, $newRank);
            fUser($pdo, $fUser);
        }
        $title = $_SESSION["fUser"]->userName." - Socieon";
        $template = "Views/Users/fProfile.php";
        require_once("Views/base.php");
    }
    if (str_starts_with($uri, "/membre/")) {
        $part = explode("/", $uri);
        $_SESSION["groupe"] = $part[3];
        $fUser = $part[2];
        fUser($pdo, $fUser);
        if (isset($_POST["mRole"])) {
            $newMembreRank = $_POST["mRole"];
            changeMembreRank($pdo, $newMembreRank);
            fUser($pdo, $fUser);
        }
        membreInfo($pdo);
        fMembreInfo($pdo);
        $title = $_SESSION["fUser"]->userName." - ".$_SESSION["groupe"]." - Socieon";
        $template = "Views/Users/MembreRankUpdate.php";
        require_once("Views/base.php");
    }

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
                createUser($pdo,$banword);
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

        case '/suppressProfil' :
            if (($_SESSION["user"]->userRank)!="dux") {
                destroyUser($pdo);
                require_once("Views/Users/deconnexion.php");
                $title = "Inscription - Sociéon";
                $template = "Views/Users/inscription.php";
                require_once("Views/base.php");
                break;
            } else {
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
            
    }