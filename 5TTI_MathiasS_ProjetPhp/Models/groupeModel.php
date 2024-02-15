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