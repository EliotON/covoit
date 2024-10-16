<?php

include '../global/config.php';
include '../'.CHEMIN_LIB.'pdo2.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 var_dump(PDO2::getInstance());
 
 
?>
