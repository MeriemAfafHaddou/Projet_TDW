<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\NewsController.php";
require_once "C:\wamp64\www\ElBenna\View\CadreView.php";
class NewsView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function news()
    {
        echo "<br>
        <div class='recettes'>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new NewsController();
        //Le cadre vue pour afficher les recettes corresp
        $cadre=new CadreView();
        $res = $controller->get_news();
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $cadre->cadre($row);
        }
        echo"</div>";
        }
}