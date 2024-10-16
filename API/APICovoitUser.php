<?php
include '../entity/CovoitUser.php';
include '../modeles/DAOCovoitUser.php';


header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $covoitUser = getUnCovoitUser($id);
            echo(json_encode($covoitUser));
        } else {
            echo(json_encode(getLesCovoitUser()));
        }
        break;

    case 'POST':
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel']) && isset($_POST['mail']) && isset($_POST['mdp'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $tel = $_POST['tel'];
            $mail = $_POST['mail'];
            $mdp = $_POST['mdp'];
            
            $unCovoitUser = new CovoitUser(0, $nom, $prenom, $tel, $mail, $mdp); 
            addCovoitUser($unCovoitUser);
            echo(json_encode(['message' => 'Utilisateur ajouté !']));
        } else {
            echo(json_encode(['error' => 'Champs manquants']));
        }
        break;

    case 'PATCH':
        parse_str(file_get_contents('php://input'), $_PATCH);
      /*
            $data = json_decode(file_get_contents("php://input"), true);

            $missingFields = [];

            if (!isset($data['nom'])) {
                $missingFields[] = 'nom';
            }
            if (!isset($data['prenom'])) {
                $missingFields[] = 'prenom';
            }
            if (!isset($data['tel'])) {
                $missingFields[] = 'tel';
            }
            if (!isset($data['mail'])) {
                $missingFields[] = 'mail';
            }
            if (!isset($data['mdp'])) {
                $missingFields[] = 'mdp';
            }

            if (!isset($data['mdp'])) {
                echo(json_encode(['error' => 'Champs manquants: ' . implode(', ', $missingFields)]));
                
            }
            else {*/
            $id = $_PATCH['id'];
            $nom = $_PATCH['nom'];
            $prenom = $_PATCH['prenom'];
            $tel =$_PATCH['tel'];
            $mail = $_PATCH['mail'];
            $mdp = $_PATCH['mdp'];
           
            $unCovoitUser = new CovoitUser($id, $nom, $prenom, $tel, $mail, $mdp);
            updateCovoitUser($unCovoitUser);
            echo(json_encode(['message' => 'Utilisateur modifié !']));
           // }
            break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            deleteCovoitUser($id);
            echo(json_encode(['message' => 'Utilisateur supprimé !']));
        } else {
            echo(json_encode(['error' => 'ID manquant']));
        }
        break;

    default:
        echo(json_encode(['error' => 'Mauvaise méthode (GET, POST, PATCH, DELETE)']));
        break;
}
