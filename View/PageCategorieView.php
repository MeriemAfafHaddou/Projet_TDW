<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\PageCategorieController.php";
require_once "C:\wamp64\www\ElBenna\View\CadreView.php";
class PageCategorieView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function page($id)
    {
        echo "<br>
        <div class='recettes'>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new pageCategorieController();
        //Le cadre vue pour afficher les recettes corresp
        $cadre=new CadreView();
        $res = $controller->get_pagecategorie($id);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $cadre->cadre($row);
        }
        echo"</div>";
        }
}