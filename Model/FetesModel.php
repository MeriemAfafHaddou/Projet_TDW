<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class FetesModel{
    private $db;
    //Methode permettant la recuperation de toutes les recettes qui concerne la fete d'identifiant $id
    public function get_fetes($filtre,$critere){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner  toutes les recettes qui concerne la fete d'identifiant $id avec leurs cadres
        $stmt = $cnx->prepare("SELECT *
        FROM fete JOIN concerner on fete.id_fete=concerner.id_fete 
        JOIN recette on recette.id_recette=concerner.id_recette
        JOIN cadre on cadre.id_recette=recette.id_recette 
        WHERE $filtre
        ORDER BY $critere");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>