<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once ".\Controller\SortController.php";
require_once ".\View\CadreView.php";
class SortView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function Sort()
    {
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new SortController();
        //Le cadre vue pour afficher les recettes corresp
        $cadre= new CadreView();
        echo "<br>
        <form class='Sort' method='POST'>
        <p>Trier par : </p>
        <select name='triliste'>
            <option value='Temps de préparation'>Temps de préparation</option>
            <option value='Temps de cuisson'>Temps de cuisson</option>
            <option value='Notation'>notation</option>
            <option value='Difficulté'>difficulte</option>
        </select>
        <input type='submit' value='trier' name='trier'></input>
        </form>
        ";
        if(isset($_POST["trier"])){
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
                $res=$controller->get_Sort($critere);
                echo"<div class='recettes'>";
                while($row = $res->fetch(PDO::FETCH_ASSOC)){
                    $cadre->cadre($row);
                }
                echo"</div>";
            }
        }
        }
}