<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class IdeesModel{
    private $db;
    //Methode permettant la recuperation des elements du menu de la bdd
    public function get_idees(){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner tous les elements du menu
        $stmt = $cnx->prepare("SELECT * FROM cadre JOIN recette on cadre.id_recette=recette.id_recette WHERE tmp_prep IS NOT NULL ORDER BY RAND() LIMIT 3");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function form_idees(){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner tous les elements du menu
        $stmt = $cnx->prepare("SELECT * FROM ingredient");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>