<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class TitreModel{
    private $db;
    //Methode permettant la recuperation du titre de la categorie
    public function get_titre($id){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner le titre de la categorie d'id=$id
        $stmt = $cnx->prepare("SELECT * FROM categorie WHERE id_categ=$id");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>