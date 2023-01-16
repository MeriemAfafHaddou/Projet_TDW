<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class GestionRecettesModel{
    private $db;
    //Methode permettant la recuperation des elements de la categorie d'identifiant $cat de la bdd
    public function get_recettes(){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("SELECT * FROM recette INNER JOIN categorie ON recette.id_categ=categorie.id_categ ORDER BY id_recette");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function add_recette($recette){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("INSERT INTO recette (id_categ,id_recette, nom_recette, tmp_prep, tmp_repos, tmp_cuisson, nb_calories, difficulte)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute($recette);
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function valider_recette($id){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("UPDATE recette SET recette_valid=1 WHERE id_recette=$id ");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function supprimer_recette($id){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("DELETE FROM recette WHERE id_recette=$id ");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>