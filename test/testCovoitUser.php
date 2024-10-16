<?php

include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_ENTITY.'CovoitUser.php';
include_once '../'.CHEMIN_MODELE.'DAOCovoitUser.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$CovoitUser1 = new CovoitUser("");
$CovoitUser2 = new CovoitUser(1,"Dupont", "Jean", "0600000001", "jean.dupont@example.com", "$2y$10\$Hc.RT2c3EZfGmFqaI.2zBO6MZFRaZ4JmR/7Wy0w5vP4/7xoqOjKIC");
$CovoitUser3 = new CovoitUser(2,"Leroy", "Quentin", "0600000002", "quentin.leroy@example.com", "$2y$10\$Hc.RT2c3EZfGmFqaI.2zBO6MZFRaZ4JmR/7Wy0w5vP4/7foqOjKIC");
/*

var_dump($CovoitUser1);
var_dump($CovoitUser2);
var_dump($CovoitUser3);
*/

    $CovoitUser3->setId(11);
    $CovoitUser3->setNom("Jean");
    $CovoitUser3->setPrenom("Jacque");
    $CovoitUser3->setMail("Jean.Jacque@gmail.com");
    $CovoitUser3->setTel("555555555");
    $CovoitUser3->setMdp("Jeanjacque2024!");
/*
    echo $CovoitUser2->getId();
    echo $CovoitUser2->getNom();
    echo $CovoitUser2->getPrenom();
    echo $CovoitUser2->getMail();
    echo $CovoitUser2->getTel();
    echo $CovoitUser2->getMdp();

    echo $CovoitUser3->getId();
    echo $CovoitUser3->getNom();
    echo $CovoitUser3->getPrenom();
    echo $CovoitUser3->getMail();
    echo $CovoitUser3->getTel();
    echo $CovoitUser3->getMdp();
*/
/*
$getLesCovoitUser = getLesCovoitUser();
var_dump($getLesCovoitUser);
    
$covoitUser = getUnCovoitUser();
var_dump($covoitUser);
*/

//addUnCovoitUser($CovoitUser2);

var_dump($CovoitUser3);
updateCovoitUser($CovoitUser3);

?>