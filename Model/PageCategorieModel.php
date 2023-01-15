<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class PageCategorieModel{
    private $db;
    //Methode permettant la recuperation de toutes les recettes de la categorie d'identifiant = $id
    //ordonnees par $critere 
    public function get_Sort($id,$critere){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 6 recettes aleatoires
        $stmt = $cnx->prepare("SELECT * FROM cadre JOIN recette ON recette.id_recette=cadre.id_recette WHERE cadre.id_categ=$id
        ORDER BY $critere");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>