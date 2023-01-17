<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "ConnexionBdd.php";
class GestionRecettesModel{
    private $db;
    //Methode permettant la recuperation des elements de la categorie d'identifiant $cat de la bdd
    public function get_recettes($critere){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("SELECT * FROM recette INNER JOIN categorie ON recette.id_categ=categorie.id_categ ORDER BY recette.$critere");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function get_rec($id){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("SELECT * FROM recette INNER JOIN categorie ON recette.id_categ=categorie.id_categ 
        WHERE recette.id_recette=$id");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function add_recette($recette){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $cadre=[
            $recette[1],
            $recette[2],
            $recette[7],
        ];
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt1 = $cnx->prepare("INSERT INTO recette (id_categ,id_recette, nom_recette, tmp_prep, tmp_repos, tmp_cuisson, nb_calories, difficulte)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt1->execute($cadre);
        $stmt = $cnx->prepare("INSERT INTO cadre (id_recette, titre_cadre, img_cadre)
        VALUES (?, ?, ?)");
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
    public function modifier_recette($modif){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $id=$modif[1];
        $recette=[
            $modif[0],
            $modif[2],
            $modif[3],
            $modif[4],
            $modif[5],
            $modif[6],
            $modif[7],
            $modif[8],
            $modif[9]
        ];
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("UPDATE recette SET id_categ=?,nom_recette=?,tmp_prep=?,tmp_repos=?,tmp_cuisson=?,difficulte=?,nb_calories=?, img_recette=?, lien_video=?
        WHERE id_recette=$id");
        $stmt->execute($recette);
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function ajouter_ingreds($id,$liste){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        foreach($liste as $ingred){
            $stmt1=$cnx->prepare("SELECT id_ingred FROM ingredient WHERE nom_ingred='$ingred'");
            $stmt1->execute();
            $row = $stmt1->fetch(PDO::FETCH_ASSOC);
            $id_ingred=$row['id_ingred'];
            $stmt = $cnx->prepare("INSERT INTO necessiter (id_recette, id_ingred)
            VALUES ($id, $id_ingred)");
            $stmt->execute();
        }
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>