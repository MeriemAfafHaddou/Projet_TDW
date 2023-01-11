<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\IdeesController.php";
require_once "C:\wamp64\www\ElBenna\View\CadreView.php";
class IdeesView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function form()
    {
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new IdeesController();
        //Le cadre vue pour afficher les recettes corresp
        echo "<form action='#' method='POST' class='idees_form'>
        <p>Cochez vos Ingrédients</p>";
        $res = $controller->form_idees();
        $liste[]='';
        echo"<div class='liste_ingred'>
        <div class='inputGroup'>
                    <input type='checkbox' name='liste[]'/>
                    <label>Miel</label>
                </div>";
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo"<div class='inputGroup'>
                    <input type='checkbox' name='liste[]'/>
                    <label>".$row['nom_ingred']."</label>
                </div>";
        }
        echo"</div>
        <center><input type='submit' value='Afficher les recettes' name='idees'/></center>
        </form>";
        if(isset($_POST['idees'])){
            if(!empty($_POST['liste'])){
                $ingreds=$_POST['liste'];
                
                foreach($ingreds as $i){
                    echo $i."<br/>";
                }
            }
        }
    }
    
    public function get_idees($row)
    {
        echo "<br>
        <div class='recettes'>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new HealthyController();
        //Le cadre vue pour afficher les recettes corresp
        $cadre=new CadreView();
        $res = $controller->get_healthy();
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $cadre->cadre($row);
        }
        echo"</div>";
        }
}