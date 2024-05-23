<?php

function selectPublicGroupe($pdo) {
    try {
        $query = 'SELECT * FROM groupe WHERE groupeIsVisible=true';
        $selectGroupe = $pdo->prepare($query); 
        $selectGroupe->execute();
        $groupes = $selectGroupe->fetchAll();
        return $groupes;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function selectJoinedGroupe($pdo) {
    try {
        $query = 'SELECT * FROM groupe WHERE groupeId in (SELECT groupeId FROM membregroupe WHERE userId=:userId)';
        $selectGroupe = $pdo->prepare($query); 
        $selectGroupe->execute([
            'userId' => $_SESSION["user"]->userId
        ]);
        $groupes = $selectGroupe->fetchAll();
        return $groupes;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function verifyIsJoined($pdo,) {
    try {
        $query = 'SELECT groupeId FROM membregroupe WHERE userId=:userId AND groupeId=:groupeId';
        $selectGroupe = $pdo->prepare($query); 
        $selectGroupe->execute([
            'userId' => $_SESSION["user"]->userId,
            'groupeId' => $_SESSION["groupe"]
        ]);
        $groupes = $selectGroupe->fetchAll();
        if(empty($groupes)) {
            return false;
        } else {
            return true;
        }
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function joinGroupe($pdo) {
    try {
        $query = 'INSERT INTO membregroupe (mg, userId, groupeId, membreRank) VALUES (:mg, :userId, :groupeId, :usr)';
        $selectGroupe = $pdo->prepare($query); 
        $selectGroupe->execute([
            'mg' => $_SESSION["user"]->userId.$_SESSION["groupe"],
            'userId' => $_SESSION["user"]->userId,
            'groupeId' => $_SESSION["groupe"],
            'usr' => 'usr'
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function selectGroupeInfo($pdo) {
    try {
        $query = 'SELECT * FROM groupe WHERE groupeId=:groupeId';
        $selectUser = $pdo->prepare($query); 
        $selectUser->execute([
            'groupeId' => $_SESSION["groupe"]
        ]);
        $groupeInfo = $selectUser->fetchAll();
        return $groupeInfo;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function createGroupe($pdo) {
    try {
        $query = 'insert into groupe(groupeId, groupeName, groupeIsVisible, groupeDesc, userId) 
        values (:groupeId, :GroupeName, :groupeIsVisible, :groupeDesc, :userId);
        INSERT INTO membregroupe (mg, userId, groupeId, membreRank) VALUES (:mg, :userId, :groupeId, :usr)';
        $addUser = $pdo->prepare($query); 
        $addUser->execute([
            'groupeId' => $_POST['GroupeId'],
            'GroupeName' => $_POST['GroupeName'],
            'groupeIsVisible' => $_POST['GroupeVisible'],
            'groupeDesc' => $_POST['GroupeDesc'],
            'mg' => $_SESSION["user"]->userId.$_POST['GroupeId'],
            'userId' => $_SESSION["user"]->userId,
            'usr' => 'dux'
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function destroyGroupe($pdo) {
    try {
        $query = 'delete from message WHERE salonId in (SELECT salonId FROM salon WHERE groupeId=:groupeId);
                  delete FROM salon WHERE groupeId=:groupeId;
                  delete from membregroupe WHERE groupeId=:groupeId;
                  delete from groupe WHERE groupeId=:groupeId;';
        $addUser = $pdo->prepare($query); 
        $addUser->execute([
            'groupeId' => $_SESSION["groupe"],
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    } 
}
function selectMessInfo($pdo) {
    try {
        $query = 'SELECT * FROM message WHERE msgId=:msgId';
        $selectUser = $pdo->prepare($query); 
        $selectUser->execute([
            'msgId' => $_SESSION["message"]
        ]);
        $groupeInfo = $selectUser->fetchAll();
        return $groupeInfo;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function searchGroupe($pdo){
    try {
        $query = 'SELECT groupeId FROM groupe WHERE groupeId=:groupeId';
        $selectGroupe = $pdo->prepare($query); 
        $selectGroupe->execute([
            'groupeId' => $_SESSION["groupe"]
        ]);
        $groupes = $selectGroupe->fetchAll();
        if(empty($groupes)) {
            return false;
        } else {
            return true;
        }
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}