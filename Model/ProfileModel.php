<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class ProfileModel{
    private $db;
    //Methode permettant la recuperation des elements du profile de la bdd
    public function get_profile($id){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner tous les elements du profile
        $stmt = $cnx->prepare("SELECT * FROM utilisateur WHERE id_user='$id'");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function modifier_img($id,$lien){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner tous les elements du profile
        $stmt = $cnx->prepare("UPDATE utilisateur SET photo_profile='$lien' WHERE id_user='$id' ");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function modifier_mdp($id,$mdp){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner tous les elements du profile
        $stmt = $cnx->prepare("UPDATE utilisateur SET mdp='$mdp' WHERE id_user='$id' ");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>