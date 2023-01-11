<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\NutritionController.php";
class NutritionView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function nutrition()
    {
        echo "<br>
        <div class='recette'>";
        //Le controleur pour recuperer les donnees de la bdd
        $nutrition = new NutritionController();
        $res = $nutrition->get_nutrition();
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo"
            <h2>".$row['nom_ingred']."</h2><br>
            <div class='infos-container'>
                <img class='image' src='".$row['img_ingred']."'>
                <div class='infos'>
                    <br>
                    <div>
                        <p>Energie</p>
                        <p>".$row['energie']."Kcal</p>
                        <hr> 
                    </div>
                    <div>
                        <p>Proteine</p>
                        <p>".$row['proteines']."g</p>
                        <hr>
                    </div>
                    <div>
                        <p>Glucides</p>
                        <p>".$row['glucides']."g</p>
                        <hr>
                    </div>
                    <div>
                        <p>Lipides</p>
                        <p>".$row['lipides']."g</p><hr>
                    </div>
                    <div>
                        <p>Sodium</p>
                        <p>".$row['sodium']."g</p><hr>
                    </div>
                    <div>
                        <p>Eau</p>
                        <p>".$row['eau']."g</p><hr>
                    </div>
                    <div>
                        <p>Fibres</p>
                        <p>".$row['fibres']."g</p><hr>
                    </div>
                    <div>
                        <p>Minéreaux</p>
                        <p>".$row['minereaux']."g</p><hr>
                    </div>
                    <div>
                        <p>Vitamines</p>
                        <p>".$row['vitamines']."g</p><hr>
                    </div>
                    <div>
                        <p>Saison</p>
                        <p>".$row['nom_saison']."</p>
                    </div>
                </div>
            </div><br>";
        }
        echo"</div>";
    }
}