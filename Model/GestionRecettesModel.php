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
        $stmt = $cnx->prepare("SELECT * FROM recette 
        INNER JOIN categorie ON recette.id_categ=categorie.id_categ 
        WHERE recette.recette_valid=1
         ORDER BY recette.$critere");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function get_rec($id){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("SELECT * FROM recette 
        INNER JOIN cadre ON cadre.id_recette=recette.id_recette
        INNER JOIN categorie ON recette.id_categ=categorie.id_categ
        WHERE recette.id_recette=$id");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function get_etapes($id){
        $this->db=new ConnexionBdd();
        $cnx=$this->db->connexion();
        $stmt=$cnx->prepare("SELECT * FROM recette 
        INNER JOIN suivre ON recette.id_recette=suivre.id_recette 
        INNER JOIN etape ON suivre.id_etape=etape.id_etape 
        WHERE recette.id_recette='$id' ");
        $stmt->execute();
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function get_ingreds($id){
        $this->db=new ConnexionBdd();
        $cnx=$this->db->connexion();
        $stmt=$cnx->prepare("SELECT nom_ingred FROM recette 
        INNER JOIN necessiter ON recette.id_recette=necessiter.id_recette 
        INNER JOIN ingredient ON ingredient.id_ingred=necessiter.id_ingred
        WHERE recette.id_recette='$id' ");
        $stmt->execute();
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function get_all(){
        $this->db=new ConnexionBdd();
        $cnx=$this->db->connexion();
        $stmt=$cnx->prepare("SELECT nom_ingred FROM ingredient");
        $stmt->execute();
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function add_recette($recette){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $cadre=[
            $recette[0],
            $recette[1],
            $recette[2],
            $recette[3],
            $recette[8]
        ];
        $rec=[
            $recette[0],
            $recette[1],
            $recette[2],
            $recette[4],
            $recette[5],
            $recette[6],
            $recette[7],
            $recette[8],
            $recette[9],
            $recette[10]
        ];
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt1 = $cnx->prepare("INSERT INTO recette (id_categ,id_recette, nom_recette, tmp_prep, tmp_repos, tmp_cuisson, nb_calories, difficulte, img_recette, lien_video)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt1->execute($rec);
        $stmt = $cnx->prepare("INSERT INTO cadre (id_categ,id_recette, titre_cadre, desc_cadre, img_cadre)
        VALUES (?, ?, ?, ?, ?)");
        $stmt->execute($cadre);
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
        $stmt = $cnx->prepare("DELETE FROM necessiter WHERE id_recette=$id ");
        $stmt->execute();
        $stmt = $cnx->prepare("DELETE FROM cadre WHERE id_recette=$id ");
        $stmt->execute();
        $stmt = $cnx->prepare("DELETE FROM suivre WHERE id_recette=$id ");
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
            $modif[4],
            $modif[5],
            $modif[6],
            $modif[7],
            $modif[8],
            $modif[9],
            $modif[9]
        ];
        $cadre=[
            $recette[0],
            $recette[1],
            $recette[2],
            $recette[3],
            $recette[8]
        ];
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        $stmt = $cnx->prepare("UPDATE recette SET id_categ=?,nom_recette=?,tmp_prep=?,tmp_repos=?,tmp_cuisson=?,nb_calories=?,difficulte=?, img_recette=?, lien_video=?
        WHERE id_recette=$id");
        $stmt->execute($recette);
        $stmt = $cnx->prepare("UPDATE cadre SET id_categ=?,titre_cadre=?,desc_cadre=?,img_cadre=?
        WHERE id_recette=$id");
        $stmt->execute($cadre);
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function ajouter_ingreds($id,$liste){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        
        //requete pour selectionner 10 cadres aleatoires appartenant a la categorie ayant l'id $cat
        foreach($liste as $ingred){
            echo $ingred;
            $stmt1=$cnx->prepare("SELECT id_ingred FROM ingredient WHERE nom_ingred='$ingred'");
            $stmt1->execute();
            $row = $stmt1->fetch(PDO::FETCH_ASSOC);
            $id_ingred=$row['id_ingred'];
            echo $id_ingred;
            $stmt = $cnx->prepare("INSERT INTO necessiter (id_recette, id_ingred)
            VALUES ($id, $id_ingred) ");
            $stmt->execute();
        }
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function ajouter_etapes($id,$liste){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $nb=count($liste);
        for($i=0;$i<$nb;$i++){
            $j=$i+1;
            //Inserer l'etape dans etape
            $stmt1=$cnx->prepare("INSERT INTO etape (ordre_etape,instruction)
            VALUES($j, '$liste[$i]')");
            $stmt1->execute();
            //recuperer l'id de l'etape inseree
            $stmt2=$cnx->prepare("SELECT MAX(id_etape) FROM etape");
            $stmt2->execute();
            $res=$stmt2->fetch(PDO::FETCH_ASSOC);
            $id_etape=$res['MAX(id_etape)'];
            //associer l'etape a la recette
            $stmt3=$cnx->prepare("INSERT INTO suivre (id_recette, id_etape)
            VALUES($id, '$id_etape')");
            $stmt3->execute();

        }
        $this->db->deconnexion($cnx);
        return $stmt3;
    }
    // public function modifier_ingreds($id,$ingred_modif){
    //     $this->db = new ConnexionBdd();
    //     $cnx = $this->db->connexion();
    //     foreach($ingred_modif as $ingred){
    //         $stmt1=$cnx->prepare("SELECT id_ingred FROM ingredient WHERE nom_ingred='$ingred'");
    //         $stmt1->execute();
    //         $row = $stmt1->fetch(PDO::FETCH_ASSOC);
    //         $id_ingred=$row['id_ingred'];
    //         $stmt2=$cnx->prepare("DELETE FROM necessiter WHERE id_recette=$id AND id_ingred=$id_ingred");
    //         $stmt2->execute();
    //         $stmt = $cnx->prepare("INSERT INTO necessiter (id_recette, id_ingred)
    //         VALUES ($id, $id_ingred)");
    //         $stmt->execute();
    //     }
    //     $this->db->deconnexion($cnx);
    //     return $stmt;

    // }
    // public function modifier_etapes($id,$etapes_modif){
    //     $this->db = new ConnexionBdd();
    //     $cnx = $this->db->connexion();
    //     $stmt=$cnx->prepare("DELETE FROM suivre WHERE id_recette=$id");
    //     $stmt->execute();
    //     $nb=count($etapes_modif);
    //     for($i=0;$i<$nb;$i++){
    //         $j=$i+1;
    //         //Inserer l'etape dans etape
    //         $stmt1=$cnx->prepare("INSERT INTO etape (ordre_etape,instruction)
    //         VALUES($j, '$etapes_modif[$i]')");
    //         $stmt1->execute();
    //         //recuperer l'id de l'etape inseree
    //         $stmt2=$cnx->prepare("SELECT MAX(id_etape) FROM etape");
    //         $stmt2->execute();
    //         $res=$stmt2->fetch(PDO::FETCH_ASSOC);
    //         $id_etape=$res['MAX(id_etape)'];
    //         //associer l'etape a la recette
    //         $stmt3=$cnx->prepare("INSERT INTO suivre (id_recette, id_etape)
    //         VALUES($id, '$id_etape')");
    //         $stmt3->execute();
    //     }
    //     $this->db->deconnexion($cnx);
    //     return $stmt3;
    // }
    
}
?>