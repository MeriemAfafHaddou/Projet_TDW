<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class MenuModel{
    private $db;
    //Methode permettant la recuperation des elements du menu de la bdd
    public function get_menu(){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner tous les elements du menu
        $stmt = $cnx->prepare("SELECT * FROM menu ORDER BY id_menu");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>