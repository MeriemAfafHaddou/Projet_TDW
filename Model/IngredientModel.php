<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class IngredientModel{
    private $db;
    //Methode permettant la recuperation d recuperer tous les ingredients necessaires dans la recette d'identifiant $id
    public function get_ingredient($id){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner tous les ingredients necessaires dans la recette d'identifiant $id
        $stmt = $cnx->prepare("SELECT * FROM recette JOIN necessiter on recette.id_recette=necessiter.id_recette
         JOIN ingredient on ingredient.id_ingred=necessiter.id_ingred WHERE recette.id_recette='$id'");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>