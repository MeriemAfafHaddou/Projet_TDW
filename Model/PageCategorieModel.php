<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class PageCategorieModel{
    private $db;
    //Methode permettant la recuperation de toutes les recettes de la categorie d'identifiant = $id
    public function get_pagecategorie($id){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner  toutes les recettes de la categorie d'identifiant = $id
        $stmt = $cnx->prepare("SELECT * FROM cadre WHERE id_categ=$id");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>