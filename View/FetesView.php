<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\FetesController.php";
require_once "C:\wamp64\www\ElBenna\View\CadreView.php";
class FetesView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function fetes()
    {
        echo "<center><h2>FETES</h2></center>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new FetesController();
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
            <option value='Mariage'>Mariage</option>
            <option value='Fiançailles'>Fiançailles</option>
            <option value='Mouloud'>Mouloud</option>
            <option value='Yennayer'>Yennayer</option>
            <option value='Aid'>Aid</option>
            <option value='Circoncision'>Circoncision</option>
        </select>
        </form>
        ";
        if(isset($_POST["filtrerliste"])){
            if(!empty($_POST['filtrerliste'])) {
                if($_POST['filtrerliste']=='Mariage'){
                    $filtre = 'fete.id_fete=1';
                }else{
                    if($_POST['filtrerliste']=='Fiançailles'){
                        $filtre = 'fete.id_fete=2';
                    }else{
                        if($_POST['filtrerliste']=='Mouloud'){
                            $filtre = 'fete.id_fete=5';
                        }else{
                            if($_POST['filtrerliste']=='Yennayer'){
                                $filtre = 'fete.id_fete=6';
                            }else{
                                if($_POST['filtrerliste']=='Aid'){
                                    $filtre = 'fete.id_fete=7';
                                }else{
                                    if($_POST['filtrerliste']=='Circoncision'){
                                        $filtre = 'fete.id_fete=8';
                                    }
                                }
                                
                            }
                        }
                    }
                }
            }
        }
        //Le cadre vue pour afficher les recettes corresp
        $cadre=new CadreView();
        echo "<br><br>
        <div class='recettes'>";
        $res = $controller->get_fetes($filtre,$critere);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $cadre->cadre($row);
        }
        echo"</div>";
        }
}