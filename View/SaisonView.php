<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\SaisonController.php";
require_once "C:\wamp64\www\ElBenna\View\CadreView.php";
class SaisonView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function saison()
    {
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
        $filtre='1=1';
        echo "
        <form class='Sort' method='POST'>
        <p>Filtrer par : </p>
        <select onchange='this.form.submit()' name='filtrerliste'>
            <option value='none'>---</option>
            <option value='Automne'>Automne</option>
            <option value='Hiver'>Hiver</option>
            <option value='Printemps'>Printemps</option>
            <option value='Eté'>Eté</option>
            <option value='4 Saisons'>4 Saisons</option>
            <option value='Aucune'>Aucune</option>
        </select>
        </form>
        ";
        if(isset($_POST["filtrerliste"])){
            if(!empty($_POST['filtrerliste'])) {
                if($_POST['filtrerliste']=='Automne'){
                    $filtre = 'saison.id_saison=2';
                }else{
                    if($_POST['filtrerliste']=='Eté'){
                        $filtre = 'saison.id_saison=3';
                    }else{
                        if($_POST['filtrerliste']=='Hiver'){
                            $filtre = 'saison.id_saison=1';
                        }else{
                            if($_POST['filtrerliste']=='Printemps'){
                                $filtre = 'saison.id_saison=4';
                            }else{
                                if($_POST['filtrerliste']=='4 Saisons'){
                                    $filtre = 'saison.id_saison=5';
                                }else{
                                    if($_POST['filtrerliste']=='Aucune'){
                                        $filtre = 'saison.id_saison=6';
                                    }
                                }
                                
                            }
                        }
                    }
                }
            }
        }
        echo "<br><br>
        <div class='recettes'>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new SaisonController();
        //Le cadre vue pour afficher les recettes corresp
        $cadre=new CadreView();
        $res = $controller->get_saison($filtre,$critere);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $cadre->cadre($row);
        }
        echo"</div>";
        }
}