<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\FetesController.php";
require_once "C:\wamp64\www\ElBenna\View\CadreView.php";
class FetesView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function fetes($id)
    {
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new FetesController();
        //Le cadre vue pour afficher les recettes corresp
        $cadre=new CadreView();
        $nom=$controller->get_nomfete($id);
        echo "<br>";
        while($row1=$nom->fetch(PDO::FETCH_ASSOC)){
            echo"<center><h2>".$row1['nom_fete']."</h2><center>";
        }
        echo "<br>
        <div class='recettes'>";
        $res = $controller->get_fetes($id);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $cadre->cadre($row);
        }
        echo"</div>";
        }
}