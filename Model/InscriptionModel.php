<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class InscriptionModel{
    private $db;
    //Methode permettant la recuperation des elements du menu de la bdd
    public function register($infos){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner tous les elements du menu
        $stmt = $cnx->prepare("INSERT INTO `utilisateur`
        (`nom_user`, `prenom_user`,`username`, `sexe`, `email`, `mdp`, `user_valid`)
        VALUES (?,?,?,?,?,?,?)");
        $stmt->execute($infos);
        //Ne pas laisser la cnx a la BDD etablie
        return true;       
    }
}
?>