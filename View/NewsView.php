<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once ".\Controller\NewsController.php";
require_once ".\View\CadreView.php";
class NewsView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function news()
    {
        $critere='1=1';
        echo "
        <center><h2>NEWS</h2></center>
        <br>
        <form class='Sort' method='POST'>
        <p>Trier par : </p>
        <select onchange='this.form.submit()' name='triliste'>
            <option value='none'>---</option>
            <option value='Titre'>Titre</option>
            <option value='Description'>Description</option>
        </select>
        </form>
        ";
        if(isset($_POST["triliste"])){
            if(!empty($_POST['triliste'])) {
                if($_POST['triliste']=='Titre'){
                    $critere = 'titre_cadre';
                }else{
                    if($_POST['triliste']=='Description'){
                        $critere = 'desc_cadre';
                    }
                }
            }
        }
        echo "<br><br>
        <div class='recettes'>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new NewsController();
        //Le cadre vue pour afficher les recettes corresp
        $cadre=new CadreView();
        $res = $controller->get_Sort($critere);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $cadre->cadre($row);
        }
        echo"</div>";
        }
}