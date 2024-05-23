<?php
function selectmessage($pdo) {
    try {
        if (isset($_SESSION["salon"])) {
        $query = 'SELECT * FROM message  WHERE salonId IN (SELECT salonId FROM salon WHERE salonId = :salonId AND groupeId = :groupeId) ORDER BY messageDate DESC LIMIT 100';
        $selectGroupe = $pdo->prepare($query); 
        $selectGroupe->execute([
            'salonId' => $_SESSION["salon"],
            'groupeId' => $_SESSION["groupe"]
        ]);
        $messages = $selectGroupe->fetchAll();
        return $messages;}
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function selectsalon($pdo) {
    try {
        $query = 'SELECT * FROM salon WHERE groupeId=:groupeId';
        $selectGroupe = $pdo->prepare($query); 
        $selectGroupe->execute([
            'groupeId' => $_SESSION["groupe"]
        ]);
        $salons = $selectGroupe->fetchAll();
        return $salons;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function selectusermessage($pdo, $userId) {
    try {
        $query = 'SELECT * FROM users WHERE userId=:userId';
        $selectUser = $pdo->prepare($query); 
        $selectUser->execute([
            'userId' => $userId
        ]);
        $user = $selectUser->fetchAll();
        return $user;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function selectmembreinfo($pdo, $userId) {
    try {
        $query = 'SELECT * FROM membregroupe WHERE userId=:userId';
        $selectMembre = $pdo->prepare($query); 
        $selectMembre->execute([
            'userId' => $userId
        ]);
        $membre = $selectMembre->fetchAll();
        return $membre;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function newMessage($pdo) {
    try {
        $test = "*Bite*";
        $newmess = $_POST["newmess"];
        $newmess = preg_replace($test, $newmess, "REDACTED");
        date_default_timezone_set('Europe/Paris');
        $query = 'insert into message(userId, salonId, messageDate, messageTexte) 
        values (:userId, :salonId, :messageDate, :messageTexte)';
        $addMess = $pdo->prepare($query); 
        $addMess->execute([
            'salonId' => $_SESSION["salon"],
            'userId' => $_SESSION["user"]->userId,
            'messageDate' => date("Y-m-d H:i:s"),
            'messageTexte' => $newmess
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function selectMembreGrade($pdo) {
    try {
        $query = 'SELECT membreRank FROM membregroupe WHERE userId=:userId';
        $selectUser = $pdo->prepare($query); 
        $selectUser->execute([
            'userId' => $_SESSION["user"]->userId
        ]);
        $user = $selectUser->fetchAll();
        return $user[0]->membreRank;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function createSalon($pdo) {
    try {
        $query = 'insert into salon(groupeId, salonName) 
        values (:groupeId, :salonName)';
        $addMess = $pdo->prepare($query); 
        $addMess->execute([
            'groupeId' => $_SESSION["groupe"],
            'salonName' => $_POST["SalonNom"]
        ]);
        var_dump("jusqu'à la fin");
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function destroySalon($pdo) {
    try {
        $query = 'delete from message WHERE salonId=:salonId;
            delete from salon WHERE salonId=:salonId';
        $addUser = $pdo->prepare($query); 
        $addUser->execute([
            'salonId' => $_SESSION['salon'],
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    } 
}
function destroyMessage($pdo) {
    try {
        $query = 'delete from message WHERE msgId=:msgId';
        $addUser = $pdo->prepare($query); 
        $addUser->execute([
            'msgId' => $_SESSION["message"],
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    } 
}