<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once ".\Controller\CategorieController.php";
require_once ".\Controller\TitreController.php";
require_once ".\View\CadreView.php";

class CategorieView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function Categorie($cat)
    {
        echo "
        <div class='container".$cat."'>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new CategorieController();
        $titre = new TitreController();
        $r=$titre->get_titre($cat);
        //Le cadre vue pour afficher les recettes corresp
        $cadre=new CadreView();
        $res = $controller->get_categorie($cat);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo"<div class='scroll-item".$cat."'>";
            $cadre->cadre($row);
            echo"</div>";
        }
        echo"
        </div>
        <div>
            <center>
                <button class='scroll".$cat."' onclick='Prec".$cat."()'>❮  Precedent</button>
                <button class='scroll".$cat."' onclick='Suiv".$cat."()'>Suivant ❯</button>
            </center>
        ";
        while($nom = $r->fetch(PDO::FETCH_ASSOC)){
            echo"<a class='autres' href='".$nom['nom_categ'].".php'>D'autres ".$nom['nom_categ']." ?</a></div>
            ";
        }
        echo "<script>
        function Prec".$cat."() {
        var container = document.querySelector('.container".$cat."');
        var item = document.querySelector('.scroll-item".$cat."');
        container.scrollLeft -= item.offsetWidth;
        }
        function Suiv".$cat."() {
            var container = document.querySelector('.container".$cat."');
            var item = document.querySelector('.scroll-item".$cat."');
            container.scrollLeft += item.offsetWidth;
            }
        </script>
        ";
    }
}