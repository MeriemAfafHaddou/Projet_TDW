<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\RecetteController.php";
require_once "C:\wamp64\www\ElBenna\Controller\IngredientController.php";
require_once "C:\wamp64\www\ElBenna\Controller\EtapeController.php";
class RecetteView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function Recette()
    {
        echo "<br>
        <div class='recette'>";
        //Le controleur pour recuperer les donnees de la bdd
        $recette = new RecetteController();
        $ingredient = new IngredientController();
        $etape = new EtapeController();
        $id=1;
        $res1 = $recette->get_recette($id);
        $res2 = $ingredient->get_ingredient($id);
        $res3 = $etape->get_etape($id);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res1->fetch(PDO::FETCH_ASSOC)){
            echo"
            <center>
                <h2>".$row['nom_recette']."</h2>
            </center>
            <div>
                <div class='details'>
                    <div>
                        <img src=''/>
                        <div>
                            <b>Notation</b>
                            <p>".$row['notation']."</p>
                        </div>
                    </div>
                    <div>
                        <img src=''/>
                        <div>
                            <b>Difficulte</b>
                            <p>".$row['difficulte']."</p>
                        </div>
                    </div>
                    <div>
                        <img src=''/>
                        <div>
                            <b>Categorie</b>
                            <p>".$row['id_categ']."</p>
                        </div>
                    </div>
                </div>
                <div>
                    <img src=''/>
                    <img src=''/>
                </div>
            <div>
            <div class='infos-container'>
                <img class='image' src='".$row['img_cadre']."'>
                <div class='infos'>
                    <div>
                        <p><b>Details supplémentaires</b></p>
                    </div>
                    <div>
                        <p>Calories</p>
                        <p>".$row['nb_calories']."</p>
                        <hr> 
                    </div>
                    <div>
                        <p>Temps Prep</p>
                        <p>".$row['tmp_prep']."</p>
                        <hr>
                    </div>
                    <div>
                        <p>Temps Repos</p>
                        <p>".$row['tmp_repos']."</p>
                        <hr>
                    </div>
                    <div>
                        <p>Temps Cuisson </p>
                        <p>".$row['tmp_cuisson']."</p>
                    </div>
                </div>
            </div>
            <br><br>
            <div class='recipe'>
            <h2>Ingrédients</h2> 
            <div class='recette_det'>";
            while ($row2 = $res2->fetch(PDO::FETCH_ASSOC)){
                    echo "<div><input type='checkbox'>".$row2['nom_ingred']."</input><br></div>";
                };               
            echo "</div><br>
            <hr><br>
           
            <h2>Etapes</h2>
            <ol class='recette_det'>
            ";
            while ($row3 = $res3->fetch(PDO::FETCH_ASSOC)){
                echo "<li>".$row3['instruction']."<li><br>";
            };
        echo "</ol></div>
            ";
        }
        echo"</div>";
    }
}