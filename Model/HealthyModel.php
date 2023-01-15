<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class HealthyModel{
    private $db;
    //Methode permettant la recuperation de toutes les recettes ayant un nb de calories < a $cal qui sera introduit par l'utilisateur
    public function get_calories($cal,$critere){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner toutes les recettes ayant un nb de calories < a $cal qui sera introduit par l'utilisateur
        $stmt = $cnx->prepare("SELECT * FROM cadre JOIN recette ON cadre.id_recette=recette.id_recette 
        WHERE recette.nb_calories<$cal
        ORDER BY $critere");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    //Methode permettant de selectionner toutes les recettes avec des ingredients Healthy
    public function get_healthy($critere){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner toutes les recettes avec des ingredients Healthy avec leurs cadres pour l'affichage
        $stmt = $cnx->prepare("SELECT * FROM cadre 
        JOIN recette ON cadre.id_recette=recette.id_recette 
        JOIN necessiter on necessiter.id_recette=recette.id_recette 
        JOIN ingredient on necessiter.id_ingred=ingredient.id_ingred 
        WHERE ingredient.healthy=TRUE 
        GROUP BY recette.id_recette 
        ORDER BY $critere");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>