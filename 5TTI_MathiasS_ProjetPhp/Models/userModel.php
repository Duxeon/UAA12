<?php
function createUser($pdo,$banword) {
    try {
        $newmess = $_POST["id"];
        $newmesss = $_POST["username"];
        $nmess = $_POST["id"];
        $nmesss = $_POST["username"];
        foreach ($banword as $ban) 
        {
            $newmess = str_replace($ban, "*", strtolower($newmess));
            $newmesss = str_replace($ban, "*", strtolower($newmesss));
        }
        if($newmesss == strtolower($_POST["username"])) {
            $newmesss = $_POST["username"];
        }
        $query = 'insert into users(userId, userPassword, userRank, userBirth, userName) 
        values (:userId, :userPassword, :userRank, :userBirth, :userName)';
        $addUser = $pdo->prepare($query); 
        $addUser->execute([
            'userId' => $newmess,
            'userPassword' => $_POST["password"],
            'userRank' => 'usr',
            'userBirth' => $_POST["naissance"],
            'userName' => $newmesss
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
    }
}
function coUser($pdo) {
    try {
        $query = 'select * from users where userId = :userId and userPassword = :userPassword';
        $coUser = $pdo->prepare($query); 
        $coUser->execute([
            'userId' => $_POST["id"],
            'userPassword' => $_POST["password"]
        ]);
        $user = $coUser->fetch();
        if (!$user) {
            return false;
        } else{
            $_SESSION["user"] = $user;
            
            return true;
        }
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function ageUser() {
    $date = $_SESSION['user']->userBirth;
    //On calcule le nombre d'années('Y') qui sépare la date du jour et la date de naissance
    $age = date('Y') - date('Y', strtotime($date));

    //SI le mois(m) et le jour(d) de la date du jour est plus petit que le mois et le jour de la date de naissance ALORS
    if (date('md') < date('md', strtotime($date)))
    {
    //On retire une année
    $age --;
    }
    return $age;
}
function rankUser() {
    switch ($_SESSION['user']->userRank) {
        case "usr" :
            return "Utilisateur non confirmé";
        
        case "cfm" :
            return "Utilisateur confirmé";
            
        case "inf" :
            return "Influenceur";
        
        case "mod" :
            return "Modérateur";
        
        case "dev" :
            return "Developpeur";
            
        case "adm" :
            return "Administrateur";
            
        case "dux" :
            return "Duxéon";
        
        default :
            return "Rang inconnu";
    }
}
function agefUser() {
    $date = $_SESSION['fUser']->userBirth;
    //On calcule le nombre d'années('Y') qui sépare la date du jour et la date de naissance
    $age = date('Y') - date('Y', strtotime($date));

    //SI le mois(m) et le jour(d) de la date du jour est plus petit que le mois et le jour de la date de naissance ALORS
    if (date('md') < date('md', strtotime($date)))
    {
    //On retire une année
    $age --;
    }
    return $age;
}
function rankfUser($uwu, $pdo) {
    if ($uwu == "user") {
        $unu = $_SESSION['fUser']->userRank;
    } else {
        fMembreInfo($pdo);
        $unu = $_SESSION["fmembre"]->membreRank;
    }
    switch ($unu) {
        case "usr" :
            switch($uwu) {
                case "user" :
                    return "Utilisateur non confirmé";
                    break;
                case "membre" :
                    return "Membre";
                    break;
            }
            break;
        case "cfm" :
            return "Utilisateur confirmé";
            
        case "inf" :
            return "Influenceur";
        
        case "mod" :
            return "Modérateur";
        
        case "dev" :
            return "Developpeur";
            
        case "adm" :
            return "Administrateur";
            
        case "dux" :
            switch($uwu) {
                case "user" :
                    return "Duxéon";
                    break;
                case "membre" :
                    return "Chef";
                    break;
            }
        
        default :
            return "Rang inconnu";
    }
}
function editUsername($pdo) {
    try {
        $query = 'UPDATE users SET userName = :userName WHERE userId = :userId';
        $addUser = $pdo->prepare($query); 
        $addUser->execute([
            'userId' => $_SESSION["user"]->userId,
            'userName' => $_POST["newusername"]
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
    }  
}
function updateSession($pdo) {
    try {
        $query = 'select * from users where userId = :userId';
        $coUser = $pdo->prepare($query); 
        $coUser->execute([
            'userId' => $_SESSION["user"]->userId,
        ]);
        $user = $coUser->fetch();
        $_SESSION["user"] = $user;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    } 
}
function destroyUser($pdo) {
    try {
        $query = 'delete from message WHERE userId=:userId or salonId in (SELECT salonId FROM salon WHERE groupeId IN (SELECT groupeId FROM groupe WHERE userId=:userId));
                  delete FROM salon WHERE groupeId IN (SELECT groupeId FROM groupe WHERE userId=:userId);
                  delete from groupe WHERE userId=:userId;
                  delete from membregroupe WHERE userId=:userId;
                  delete from users WHERE userId=:userId';
        $addUser = $pdo->prepare($query); 
        $addUser->execute([
            'userId' => $_SESSION["user"]->userId,
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
    } 
}
function fUser($pdo, $fUser) {
    try {
    $query = 'select * from users where userId = :userId';
    $coUser = $pdo->prepare($query); 
    $coUser->execute([
        'userId' => $fUser
    ]);
    $user = $coUser->fetch();
    if (!$user) {
        return false;
    } else{
        $_SESSION["fUser"] = $user;
        
        return true;
    }
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function changeRank($pdo, $newRank) {
    try {
        $query = 'UPDATE users SET userRank = :userRank WHERE userId = :userId';
        $addUser = $pdo->prepare($query); 
        $addUser->execute([
            'userId' => $_SESSION["fUser"]->userId,
            'userRank' => $newRank
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }  
}
function changeMembreRank($pdo, $newMembreRank) {
    try {
        $query = 'UPDATE membregroupe SET membreRank = :membreRank WHERE userId = :userId AND groupeId = :groupeId';
        $addUser = $pdo->prepare($query); 
        $addUser->execute([
            'userId' => $_SESSION["fUser"]->userId,
            'membreRank' => $newMembreRank,
            'groupeId' => $_SESSION["groupe"]
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }  
}
function membreInfo($pdo) {
    try {
        $query = 'select * from membreGroupe where userId = :userId and groupeId = :groupeId';
        $takeInfo = $pdo->prepare($query); 
        $takeInfo->execute([
            'userId' => $_SESSION["user"]->userId,
            'groupeId' => $_SESSION["groupe"]
        ]);
        $user = $takeInfo->fetch();
        if (!$user) {
        } else{
            $_SESSION["membre"] = $user;
        }
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function fMembreInfo($pdo) {
    try {
        $query = 'select * from membreGroupe where userId = :userId and groupeId = :groupeId';
        $takeInfo = $pdo->prepare($query); 
        $takeInfo->execute([
            'userId' => $_SESSION["fUser"]->userId,
            'groupeId' => $_SESSION["groupe"]
        ]);
        $user = $takeInfo->fetch();
        if (!$user) {
        } else{
            $_SESSION["fmembre"] = $user;
            
        }
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}