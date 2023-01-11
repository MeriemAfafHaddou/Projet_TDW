<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class FilterModel{
    private $db;
    //Methode permettant la recuperation des recettes de la bdd avec leurs cadres pour afficher leurs images
    public function get_filter(){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 6 recettes aleatoires
        $stmt = $cnx->prepare("SELECT * FROM cadre JOIN recette on cadre.id_recette=recette.id_recette WHERE tmp_prep IS NOT NULL ORDER BY RAND() LIMIT 6");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>