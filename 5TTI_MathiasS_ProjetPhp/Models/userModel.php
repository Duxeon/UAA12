<?php

function createUser($pdo) {
    try {
        $query = 'insert into users(userId, userPassword, userRank, userBirth, userName) 
        values (:userId, :userPassword, :userRank, :userBirth, :userName)';
        $addUser = $pdo->prepare($query); 
        $addUser->execute([
            'userId' => $_POST["id"],
            'userPassword' => $_POST["password"],
            'userRank' => 'usr',
            'userBirth' => $_POST["naissance"],
            'userName' => $_POST["username"]
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
            return "Utilisateur non-gradé";
        
        case "dux" :
            return "Propriétaire";
        
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