<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class GestionUserModel{
    private $db;
    //Methode permettant la recuperation des elements de la categorie d'identifiant $cat de la bdd
    public function get_user(){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("SELECT * FROM utilisateur");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function valider_user($id){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("UPDATE utilisateur SET user_valid=1 ");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>