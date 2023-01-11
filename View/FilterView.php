<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\FilterController.php";
require_once "C:\wamp64\www\ElBenna\View\CadreView.php";
class FilterView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function filter()
    {
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new FilterController();
        //Le cadre vue pour afficher les recettes corresp
        $cadre= new CadreView();
        echo "<br>
        <form class='filter' method='POST'>
        <p>Trier par : </p>
        <select name='triliste'>
            <option value='Temps de préparation'>Temps de préparation</option>
            <option value='Temps de cuisson'>Temps de cuisson</option>
            <option value='Notation'>notation</option>
            <option value='Difficulte'>difficulte</option>
        </select>
        <input type='submit' value='trier' name='trier'></input>
        </form>
        ";
        if(isset($_POST["trier"])){
            if(!empty($_POST['triliste'])) {
                $critere = $_POST['triliste'];
                $res=$controller->get_filter($critere);
                echo"<div class='recettes'>";
                while($row = $res->fetch(PDO::FETCH_ASSOC)){
                    $cadre->cadre($row);
                }
                echo"</div>";
            }
        }
        }
}