<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class NutritionModel{
    private $db;
    //Methode permettant la recuperation des informations nutritionnelles de la bdd
    public function get_nutrition(){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner les informations nutritionnelles de tous les ingredients 
        $stmt = $cnx->prepare("SELECT * FROM ingredient JOIN infos_nutritionnelles 
        ON infos_nutritionnelles.id_infos=ingredient.id_infos
        JOIN appartenir ON appartenir.id_ingred=ingredient.id_ingred
        JOIN saison ON saison.id_saison=appartenir.id_saison
        WHERE ingred_valid=1");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>