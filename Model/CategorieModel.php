<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class CategorieModel{
    private $db;
    //Methode permettant la recuperation des elements de la categorie d'identifiant $cat de la bdd
    public function get_categorie($cat){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("SELECT * FROM cadre INNER JOIN recette ON cadre.id_recette=recette.id_recette WHERE cadre.id_categ=$cat AND recette_valid=1 ORDER BY RAND() LIMIT 10");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>