<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class RecetteModel{
    private $db;
    //Methode permettant la recuperation d'afficher les details de la recette d'identifiant $id
    public function get_recette($id){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner la recette d'identifiant $id
        $stmt = $cnx->prepare("SELECT * FROM recette 
        JOIN cadre ON recette.id_recette=cadre.id_recette 
        WHERE recette.id_recette='$id'");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>