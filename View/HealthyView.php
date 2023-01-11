<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\HealthyController.php";
require_once "C:\wamp64\www\ElBenna\View\CadreView.php";
class HealthyView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function healthy_cal($cal)
    {
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new HealthyController();
        //Le cadre vue pour afficher les recettes corresp
        $cadre=new CadreView();
        echo "<div class='recettes'>";
        $res = $controller->get_calories($cal);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $cadre->cadre($row);
        }
        echo"</div>";
    }
    public function healthy()
    {
        echo "<br>
        <div class='recettes'>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new HealthyController();
        //Le cadre vue pour afficher les recettes corresp
        $cadre=new CadreView();
        $res = $controller->get_healthy();
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $cadre->cadre($row);
        }
        echo"</div>";
        }
}