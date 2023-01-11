<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class FilterModel{
    private $db;
    //Methode permettant la recuperation des recettes de la bdd avec leurs cadres pour afficher leurs images
    public function get_filter($critere){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 6 recettes aleatoires
        $stmt = $cnx->prepare("SELECT * FROM recette 
        INNER JOIN cadre ON recette.id_recette=cadre.id_recette 
        ORDER BY recette.$critere");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>