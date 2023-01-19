<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class FavorisModel{
    private $db;
    //Methode permettant la recuperation les recettes de la saison
    public function get_favoris($id,$critere){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner toutes les recettes contenant un ingredient de la saison d'identifiant $id
        $stmt = $cnx->prepare("SELECT * FROM favoris 
        INNER JOIN recette ON recette.id_recette=favoris.id_recette
        INNER JOIN cadre ON recette.id_recette=cadre.id_cadre
        WHERE id_user=$id
        ORDER BY recette.$critere");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function add_favoris($id,$recette){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner toutes les recettes contenant un ingredient de la saison d'identifiant $id
        $stmt = $cnx->prepare("INSERT INTO favoris
        VALUES($recette,$id)");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function remove_favoris($id,$recette){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner toutes les recettes contenant un ingredient de la saison d'identifiant $id
        $stmt = $cnx->prepare("DELETE FROM favoris WHERE id_user=$id AND id_recette=$recette");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function isFavoris($id,$user){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner toutes les recettes contenant un ingredient de la saison d'identifiant $id
        $stmt = $cnx->prepare("SELECT * FROM favoris WHERE id_recette=$id AND id_user=$user");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>