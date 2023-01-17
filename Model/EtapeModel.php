<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class EtapeModel{
    private $db;
    //Methode permettant la recuperation de toutes les etapes necessaires pour la recette d'identifiant $id
    public function get_etape($id){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner toutes les etapes necessaires pour la recette d'identifiant $id
        $stmt = $cnx->prepare("SELECT * FROM etape
        JOIN suivre ON etape.id_etape=suivre.id_etape
        WHERE suivre.id_recette='$id'
        ORDER BY ordre_etape");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>