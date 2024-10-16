<?php

include '../global/config.php';
include '../libs/pdo2.php';
include '../entity/CovoitUser.php';
include '../entity/OffreCovoit.php';
include '../modeles/DAOOffreCovoit.php';

$CovoitUserTest1 = new CovoitUser(1,"Dupont", "Jean", "0600000001", "jean.dupont@example.com", "$2y$10\$Hc.RT2c3EZfGmFqaI.2zBO6MZFRaZ4JmR/7Wy0w5vP4/7xoqOjKIC");
$CovoitUserTest2 = new CovoitUser(2,"Leroy", "Quentin", "0600000002", "quentin.leroy@example.com", "$2y$10\$Hc.RT2c3EZfGmFqaI.2zBO6MZFRaZ4JmR/7Wy0w5vP4/7foqOjKIC");
$CovoitUserTest3 = new CovoitUser(2,"Leroy", "Quentin", "0600000002", "quentin.leroy@example.com", "$2y$10\$Hc.RT2c3EZfGmFqaI.2zBO6MZFRaZ4JmR/7Wy0w5vP4/7foqOjKIC");
$CovoitUserTest4 = new CovoitUser(1,"Dupont", "Jean", "0600000001", "jean.dupont@example.com", "$2y$10\$Hc.RT2c3EZfGmFqaI.2zBO6MZFRaZ4JmR/7Wy0w5vP4/7xoqOjKIC");

    $CovoitUserTest3->setTel("0658975127");
    $CovoitUserTest4->setPrenom("Michel");

    echo "Le nom de CovoitUserTest1 : ";
    echo $CovoitUserTest1->getNom();
    echo "\n";
    echo "Le mail de CovoitUserTest2 : ";
    echo $CovoitUserTest2->getMail();
    echo "\n";
    echo "Le tel de CovoitUserTest3 : ";
    echo $CovoitUserTest3->getTel();
    echo "\n";
    echo "Le lieu de CovoitUserTest4 : ";
    echo $CovoitUserTest4->getPrenom();
    echo "\n";

try {
    $testUneOffreCovoit = getUneOffreCovoit(1);
    var_dump($testUneOffreCovoit);
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}

//addUneOffreCovoit(6,"Samedi","8:30:00","2024-10-01","Bethune",1);
var_dump(getLesOffresCovoitAnonyme(1));
var_dump(getLesOffresCovoit(1));