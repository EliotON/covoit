<?php
include_once '../entity/OffreCovoit.php';

/**
 * R�cup�re toutes les informations des OffresCovoit (sauf le chauffeur)
 * @return un tableau d'objet OffreCovoit
 */

/**
 * R�cup�re toutes les informations des OffresCovoit, y compris les chauffeurs
 * @return un tableau d'objet OffreCovoit (chaque objet OffreCovoit contient l'objet CovoitUser correspondant )
 */
function addUnCovoitUser($unObjetUser){
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("
        INSERT INTO CovoitUser (nom, prenom, tel, mail, mdp)
        VALUES (:nom, :prenom, :tel, :mail, :mdp)
    ");
    $requete->bindParam(':nom', $unObjetUser->nom, PDO::PARAM_STR);
    $requete->bindParam(':prenom', $unObjetUser->prenom, PDO::PARAM_STR);
    $requete->bindParam(':tel', $unObjetUser->tel, PDO::PARAM_STR);
    $requete->bindParam(':mail', $unObjetUser->mail, PDO::PARAM_STR);
    $requete->bindParam(':mdp', $unObjetUser->mdp, PDO::PARAM_STR);
    $requete->execute();
    $requete->closeCursor();
}

function deleteUnCovoitUser($id){
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("DELETE FROM CovoitUser WHERE id = :id");
    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    $requete->closeCursor();
}


function getLesCovoitUser(){
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("SELECT * FROM CovoitUser");
    $requete->execute();
    $tab = $requete->fetchAll(PDO::FETCH_CLASS, "CovoitUser");
    $requete->closeCursor();
    return $tab;
}



?>
