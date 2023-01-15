<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class IdeesModel{
    private $db;
    //Methode permettant la recuperation des elements du menu de la bdd
    public function get_idees($liste){
        $this->db = new ConnexionBdd();
        $seuil=0.7;
        $cnx = $this->db->connexion();
        $identifiants=array();
        //requete pour recuperer les identifiants de tous les ingredients selectionnés
        foreach($liste as $ingred){
            $stmt1 = $cnx->prepare("SELECT id_ingred FROM ingredient WHERE ingredient.nom_ingred='$ingred'");
            $stmt1->execute();
            while($id = $stmt1->fetch(PDO::FETCH_ASSOC)){
                array_push($identifiants,$id['id_ingred']);
            }
        }
        //requete pour recuperer les identifiants des recettes necessitant les ingredients selectionnes
        $recette=array();
        foreach($identifiants as $id){
            $stmt2 = $cnx->prepare("SELECT id_recette FROM necessiter WHERE id_ingred='$id'");
            $stmt2->execute();
            while($id_rec = $stmt2->fetch(PDO::FETCH_ASSOC)){
                array_push($recette,$id_rec['id_recette']);
            }
        }
        $count=array_count_values($recette);
        //Le tableau qui va contenir les resultats
        $resultat=array();
        //Pour chaque recette calculer le pourcentage des ingredients
        foreach($recette as $rec){
            if(!in_array($rec,$resultat)){
                $stmt3=$cnx->prepare("SELECT Count(*) FROM necessiter WHERE id_recette='$rec' ");
                $tot=$stmt3->execute();
                $nb=$count[$rec];
                $seuil=$nb/$tot;
                if($seuil>=0.7){
                    array_push($resultat,$rec);
                }
            }
        }
        $stmt = $cnx->prepare("SELECT * FROM cadre JOIN recette on cadre.id_recette=recette.id_recette WHERE cadre.id_recette IN ('".implode("','",$resultat)."') ");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function get_ingreds(){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner tous les elements du menu
        $stmt = $cnx->prepare("SELECT * FROM ingredient");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>