<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\PageCategorieController.php";
require_once "C:\wamp64\www\ElBenna\View\CadreView.php";
class PageCategorieView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function page($id)
    {
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new pageCategorieController();

        $critere='1=1';
        echo "<br>
        <form class='Sort' method='POST'>
        <p>Trier par : </p>
        <select onchange='this.form.submit()' name='triliste'>
            <option value='none'>---</option>
            <option value='Temps de préparation'>Temps de préparation</option>
            <option value='Temps de cuisson'>Temps de cuisson</option>
            <option value='Notation'>notation</option>
            <option value='Difficulté'>difficulte</option>
        </select>
        </form>
        ";
        if(isset($_POST["triliste"])){
            if(!empty($_POST['triliste'])) {
                if($_POST['triliste']=='Temps de préparation'){
                    $critere = 'tmp_prep';
                }else{
                    if($_POST['triliste']=='Temps de cuisson'){
                        $critere = 'tmp_cuisson';
                    }else{
                        if($_POST['triliste']=='Notation'){
                            $critere = 'notation';
                        }else{
                            if($_POST['triliste']=='Difficulté'){
                                $critere = 'difficulte';
                            }else{
                                
                            }
                        }
                    }
                }
            }
        }
        echo "<br>
        <div class='recettes'>";
        //Le cadre vue pour afficher les recettes corresp
        $cadre=new CadreView();
        $res = $controller->get_sort($id,$critere);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $cadre->cadre($row);
        }
        echo"</div>";
        }
}