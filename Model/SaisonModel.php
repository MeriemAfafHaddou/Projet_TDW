<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class SaisonModel{
    private $db;
    //Methode permettant la recuperation les recettes de la saison
    public function get_saison($filtre,$critere){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner toutes les recettes contenant un ingredient de la saison d'identifiant $id
        $stmt = $cnx->prepare("SELECT DISTINCT id_cadre, titre_cadre, desc_cadre, img_cadre, recette.id_recette
        FROM saison JOIN appartenir on saison.id_saison=appartenir.id_saison 
        JOIN ingredient on ingredient.id_ingred=appartenir.id_ingred 
        JOIN necessiter on necessiter.id_ingred=ingredient.id_ingred
        JOIN recette on recette.id_recette=necessiter.id_recette
        JOIN cadre on cadre.id_recette=recette.id_recette 
        WHERE $filtre");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>