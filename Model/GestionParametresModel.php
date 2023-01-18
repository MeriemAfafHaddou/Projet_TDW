<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class GestionParametresModel{
    private $db;
    //Methode permettant la recuperation des recettes de la bdd avec leurs cadres pour afficher leurs images
    public function get_titres(){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 6 recettes aleatoires
        $stmt = $cnx->prepare("SELECT * FROM cadre");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function modifier_diapo($diapo){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 6 recettes aleatoires
        $stmt = $cnx->prepare("UPDATE cadre SET diapo=0");
        $stmt->execute();
        $stmt = $cnx->prepare("UPDATE cadre SET diapo=1 WHERE titre_cadre IN ('".implode("','",$diapo)."') ");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>