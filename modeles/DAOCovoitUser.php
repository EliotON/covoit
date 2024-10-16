<?php
include_once '../entity/CovoitUser.php';
include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';

//echo testGetLesCovoitUser();
//echo testGetUnCovoitUser(5);

function getUnCovoitUser($id){
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("SELECT * FROM CovoitUser WHERE id = :id");
    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    $requete->setFetchMode(PDO::FETCH_CLASS, 'CovoitUser');
    $unCovoitUser = $requete->fetch();
    $requete->closeCursor();
    return $unCovoitUser;
}

function getLesCovoitUser(){
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("SELECT * FROM CovoitUser");
    $requete->execute();
    $tab = $requete->fetchAll(PDO::FETCH_CLASS, "CovoitUser");
    $requete->closeCursor();
    return $tab;
}

function addCovoitUser($unCovoitUser){
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("INSERT INTO CovoitUser (id, nom, prenom, tel, mail, mdp) VALUES (:id, :nom, :prenom, :tel, :mail, :mdp)");

    // Utilisation des getters
    $id = $unCovoitUser->getId();
    $nom = $unCovoitUser->getNom();
    $prenom = $unCovoitUser->getPrenom();
    $tel = $unCovoitUser->getTel();
    $mail = $unCovoitUser->getMail();
    $mdp = $unCovoitUser->getMdp();

    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
    $requete->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $requete->bindParam(':tel', $tel, PDO::PARAM_STR);
    $requete->bindParam(':mail', $mail, PDO::PARAM_STR);
    $requete->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $requete->execute();
    $requete->closeCursor();
}

function updateCovoitUser($unCovoitUser){
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("UPDATE CovoitUser SET nom = :nom, prenom = :prenom, tel = :tel, mail = :mail, mdp = :mdp WHERE id = :id");

    // Utilisation des getters
    $requete->bindParam(':id', $unCovoitUser->getId(), PDO::PARAM_INT);
    $requete->bindParam(':nom', $unCovoitUser->getNom(), PDO::PARAM_STR);
    $requete->bindParam(':prenom', $unCovoitUser->getPrenom(), PDO::PARAM_STR);
    $requete->bindParam(':tel', $unCovoitUser->getTel(), PDO::PARAM_STR);
    $requete->bindParam(':mail', $unCovoitUser->getMail(), PDO::PARAM_STR);
    $requete->bindParam(':mdp', $unCovoitUser->getMdp(), PDO::PARAM_STR);
    $requete->execute();
    $requete->closeCursor();
}

function deleteCovoitUser($id) {
    $pdo = PDO2::getInstance();
    
    $requete = $pdo->prepare("DELETE FROM OffreCovoit WHERE id = :id");
    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    $requete->closeCursor();

    $requete = $pdo->prepare("DELETE FROM CovoitUser WHERE id = :id");
    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    $requete->closeCursor();
}



?>
