<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class LoginModel{
    private $db;
    //Methode permettant la recuperation des elements du menu de la bdd
    public function login($mail,$pwd){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $info=[$mail,$pwd];
        //requete pour selectionner tous les elements du menu
        $stmt = $cnx->prepare("SELECT id_user FROM utilisateur WHERE utilisateur.email=? AND utilisateur.mdp=?");
        $stmt->execute($info);
        //Ne pas laisser la cnx a la BDD etablie
        if ($stmt->rowCount() > 0 ){
            return true;
        }
        return false;       
    }
}
?>