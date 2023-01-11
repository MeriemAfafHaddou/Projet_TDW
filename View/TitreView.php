<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\TitreController.php";
class TitreView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function Titre($id)
    {
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new TitreController();
        //Le cadre vue pour afficher les recettes corresp
        $titre=new TitreView();
        $res = $controller->get_titre($id);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo"<center><h2>".$row['nom_categ']."</h2></center>";
        }
    }
}