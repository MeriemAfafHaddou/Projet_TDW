<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\FilterController.php";
class FilterView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function filter()
    {
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new FilterController();
        //Le cadre vue pour afficher les recettes corresp
        echo "<br>
        <form class='filter' method='POST'>
        <p>Trier par : <p>
        <select name='triliste'>
            <option value='Temps de préparation'>Temps de préparation</option>
            <option value='Temps de cuisson'>Temps de cuisson</option>
            <option value='Notation'>Notation</option>
            <option value='Difficulte'>Difficulte</option>
        </select>
        <input type='submit' value='trier' name='trier'/>
        </form>
        ";
        if(isset($_POST["trire"])){
            if(!empty($_POST['triliste'])) {
                $critere = $_POST['triliste'];
                $res=$controller->get_filter($critere);
                while($row = $res->fetch(PDO::FETCH_ASSOC)){
                    $cadre->cadre($row);
                }        
            }
        }
        }
}