<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class GestionNutritionModel{
    private $db;
    //Methode permettant la recuperation des elements de la categorie d'identifiant $cat de la bdd
    public function get_Nutrition(){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("SELECT * FROM ingredient JOIN infos_nutritionnelles 
        ON infos_nutritionnelles.id_infos=ingredient.id_infos
        JOIN appartenir ON appartenir.id_ingred=ingredient.id_ingred
        JOIN saison ON saison.id_saison=appartenir.id_saison");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function add_Nutrition($Nutrition){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $infos=[
            $Nutrition[4],
            $Nutrition[5],
            $Nutrition[6],
            $Nutrition[7],
            $Nutrition[8],
            $Nutrition[9],
            $Nutrition[10],
            $Nutrition[11],
            $Nutrition[12],
        ];
        $stmt1 = $cnx->prepare("INSERT INTO `infos_nutritionnelles`(`energie`, `proteines`, `glucides`, `lipides`, `sodium`, `eau`, `fibres`, `minereaux`, `vitamines`) 
        VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt1->execute($infos);

        $ingredient=[
            $Nutrition[0],
            $Nutrition[1],
            $Nutrition[2],
        ];
        $stmt2=$cnx->prepare("INSERT INTO ingredient (`id_ingred`, `nom_ingred`, `healthy`)
        VALUES (?,?,?)");
        $stmt2->execute($ingredient);
        $saison=[
            $Nutrition[0],
            $Nutrition[3]
        ];
         $stmt3=$cnx->prepare("INSERT INTO `appartenir`(`id_ingred`, `id_saison`) 
         VALUES (?,?)");
         $stmt3->execute($saison);
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt1;
    }
}
?>