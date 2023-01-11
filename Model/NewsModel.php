<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class NewsModel{
    private $db;
    //Methode permettant la recuperation des news de la bdd
    public function get_news(){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner tous les cadres des news
        $stmt = $cnx->prepare("SELECT * FROM cadre WHERE id_news IS NOT NULL");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>