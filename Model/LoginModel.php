<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class LoginModel{
    private $db;
    //Methode permettant la recuperation des elements du menu de la bdd
    public function login($mail,$pwd){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner tous les elements du menu
        $stmt = $cnx->prepare("SELECT id_user FROM utilisateur WHERE utilisateur.username='meriemafaf' AND utilisateur.mdp='123456789'");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        if ($stmt->rowCount() > 0 ){
            return true;
        }
        return false;       
    }
}
?>