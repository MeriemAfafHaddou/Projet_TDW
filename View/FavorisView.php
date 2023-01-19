<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\FavorisController.php";
require_once "C:\wamp64\www\ElBenna\View\CadreView.php";
class FavorisView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function Favoris($id)
    {
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new FavorisController();

        $critere='id_recette';
        echo "<br>
        <center><h2>FAVORIS</h2></center>
        <form class='Sort' method='POST'>
        <p>Trier par : </p>
        <select onchange='this.form.submit()' name='triliste'>
            <option value='none'>---</option>
            <option value='Temps de préparation'>Temps de préparation</option>
            <option value='Temps de cuisson'>Temps de cuisson</option>
            <option value='Notation'>notation</option>
            <option value='Difficulté'>difficulte</option>
            <option value='Nombre de calories'>Nombre de calories</option>

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
                                if($_POST['triliste']=='Nombre de calories'){
                                    $critere = 'nb_calories';
                                }
                            }
                        }
                    }
                }
            }
        }
        echo "<br><br>

        <div class='recettes'>";
        //Le cadre vue pour afficher les recettes corresp
        $cadre=new CadreView();
        $res = $controller->get_favoris($id,$critere);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $cadre->cadre($row);
        }
        echo"</div>";
        }
}