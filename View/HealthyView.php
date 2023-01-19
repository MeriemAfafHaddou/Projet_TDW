<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once ".\Controller\HealthyController.php";
require_once ".\View\CadreView.php";
class HealthyView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function healthy_cal($cal)
    {
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new HealthyController();
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
        //Le cadre vue pour afficher les recettes corresp
        $cadre=new CadreView();
        echo "<br><br><div class='recettes'>";
        $res = $controller->get_calories($cal,$critere);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $cadre->cadre($row);
        }
        echo"</div>";
    }
    public function healthy()
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
        echo "<br><br>
        <div class='recettes'>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new HealthyController();
        //Le cadre vue pour afficher les recettes corresp
        $cadre=new CadreView();
        $res = $controller->get_healthy($critere);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $cadre->cadre($row);
        }
        echo"</div>";
        }
}