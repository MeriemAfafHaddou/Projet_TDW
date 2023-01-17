<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class GestionNutritionModel{
    private $db;
    //Methode permettant la recuperation des elements de la categorie d'identifiant $cat de la bdd
    public function get_Nutrition($critere){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("SELECT * FROM ingredient JOIN infos_nutritionnelles 
        ON infos_nutritionnelles.id_infos=ingredient.id_infos
        JOIN appartenir ON appartenir.id_ingred=ingredient.id_ingred
        JOIN saison ON saison.id_saison=appartenir.id_saison
        ORDER BY $critere DESC");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function get_ingredient($id){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("SELECT * FROM ingredient JOIN infos_nutritionnelles 
        ON infos_nutritionnelles.id_infos=ingredient.id_infos
        JOIN appartenir ON appartenir.id_ingred=ingredient.id_ingred
        JOIN saison ON saison.id_saison=appartenir.id_saison
        WHERE ingredient.id_ingred=$id");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function modifier_nutrition($modif){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $id=$modif[0];
        $ingred=[
            $modif[1],
            $modif[2]
        ];
        $saison=[
            $modif[3]
        ];
        $infos=[
            $modif[4],
            $modif[5],
            $modif[6],
            $modif[7],
            $modif[8],
            $modif[9],
            $modif[10],
            $modif[11],
            $modif[12]
        ];
        $rech=$cnx->prepare("SELECT id_infos FROM ingredient WHERE id_ingred=$id");
        $rech->execute();
        $res=$rech->fetch(PDO::FETCH_ASSOC);
        $id_infos=$res['id_infos'];
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt1 = $cnx->prepare("UPDATE ingredient SET nom_ingred=?, healthy=? WHERE id_ingred=$id");
        $stmt1->execute($ingred);
        $stmt2 = $cnx->prepare("UPDATE appartenir SET id_saison=? WHERE id_ingred=$id");
        $stmt2->execute($saison);
        $stmt3 = $cnx->prepare("UPDATE infos_nutritionnelles 
        SET energie=?, proteines=?,glucides=?,lipides=?,sodium=?,eau=?,fibres=?,minereaux=?,vitamines=?
        WHERE id_infos= $id_infos ");
        $stmt3->execute($infos);
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt1;
    }
    public function add_Nutrition($Nutrition){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $rech=$cnx->prepare("SELECT id_infos FROM ingredient WHERE id_ingred=$Nutrition[0]");
        $rech->execute();
        $res=$rech->fetch(PDO::FETCH_ASSOC);
        $id_infos=$res['id_infos'];
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $infos=[
            $id_infos,
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
        $stmt1 = $cnx->prepare("INSERT INTO `infos_nutritionnelles`(`id_infos`,`energie`, `proteines`, `glucides`, `lipides`, `sodium`, `eau`, `fibres`, `minereaux`, `vitamines`) 
        VALUES (?,?,?,?,?,?,?,?,?,?)");
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
    public function valider_ingred($id){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("UPDATE ingredient SET ingred_valid=1 WHERE id_ingred=$id ");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function supprimer_ingred($id){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("DELETE FROM ingredient WHERE id_ingred=$id ");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>