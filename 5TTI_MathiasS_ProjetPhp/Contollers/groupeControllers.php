<?php
    $uri = $_SERVER["REQUEST_URI"];
    
    require_once("Models/groupeModel.php");
    require_once("Models/userModel.php");
    require_once("Models/salonModel.php");
    if (str_starts_with($uri, "/groupe/")) {
        if (isset($_POST["newmess"])) {
            newMessage($pdo);
        }
        $part = explode("/", $uri);
        $_SESSION["groupe"] = $part[2];
        if (searchGroupe($pdo)) {
        if (isset($part[3])) {
            $_SESSION["salon"] = $part[3];                   
            $title = "Socieon - ".$_SESSION["groupe"]." - ".$_SESSION["salon"]; 
        } else {
            unset($_SESSION["salon"]);                  
            $title = "Socieon - ".$_SESSION["groupe"];
        }
        $messages = selectmessage($pdo);
        $salons = selectsalon($pdo);
        $template = "Views/Groupe/groupe.php";
        require_once("Views/base.php");
    } else {
        header("location:/ListeDesGroupe");
    }
    } 
    if (str_starts_with($uri, "/addsalon/")) {
        if  (isset($_POST["SalonNom"])) {
            createSalon($pdo);
            header("location:/groupe/".$_SESSION["groupe"]);
        } else{
            $part = explode("/", $uri);
            $_SESSION["groupe"] = $part[2];
            $title = "Socieon";
            $template = "Views/Groupe/AddSalon.php";
            require_once("Views/base.php");
        }
    }
    if (str_starts_with($uri, "/destroyGroupe/")) {
        $part = explode("/", $uri);
        $_SESSION["groupe"] = $part[2];
        if(selectMembreGrade($pdo) == "dux" || $_SESSION["user"]->userRank=="adm" || $_SESSION["user"]->userRank=="dux"){
            var_dump($_SESSION["user"]->userRank);
            destroyGroupe($pdo);
        }
        header("location:/GroupesRejoins");
    }
    if (str_starts_with($uri, "/destroySalon/")) {
        $part = explode("/", $uri);
        $_SESSION["groupe"] = $part[2];
        if(selectMembreGrade($pdo) == "dux" || $_SESSION["user"]->userRank=="adm" || $_SESSION["user"]->userRank=="dux"){
            destroySalon($pdo);
        }
        header("location:/GroupesRejoins");
    }
    if (str_starts_with($uri, "/destroyMess")) {
        $groupeGrade = selectMembreGrade($pdo);
        $part = explode("/", $uri);
        $_SESSION["message"] = $part[2];
        $MessPost = selectMessInfo($pdo)[0]->userId;
        if($MessPost==$_SESSION["user"]->userId || $_SESSION["user"]->userId== "dux" || $_SESSION["user"]->userId=="adm" || $_SESSION["user"]->userId=="mod" || $groupeGrade== "dux" || $groupeGrade=="adm" || $groupeGrade=="mod") {
            destroyMessage($pdo);
        }
        header("location:/groupe/".$_SESSION["groupe"]."/".$_SESSION["salon"]);
    }
    switch ($uri)
    {
        case "/ListeDesGroupe" :
            $groupes = selectPublicGroupe($pdo);
            
            $title = "Profile - Socieon";
            $template = "Views/Groupe/publicGroupeListe.php";
            require_once("Views/base.php");
            break;

        case "/GroupesRejoins" :
            $groupes = selectJoinedGroupe($pdo);
                
            $title = "Profile - Socieon";
            $template = "Views/Groupe/joinedGroupeList.php";
            require_once("Views/base.php");
            break;

        case '/' :
            $title = "Profile - Socieon";
            $template = "pageAccueil.php";
            require_once("Views/base.php");
            break;

        case '/createGroupe' :
            if (isset($_POST["GroupeEnvoi"])) {
                createGroupe($pdo);
            }
            $title = "Création de Groupe - Socieon";
            $template = "Views/Groupe/newGroupe.php";
            require_once("Views/base.php");
            break;
    }