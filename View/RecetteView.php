<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once ".\Controller\RecetteController.php";
require_once ".\Controller\IngredientController.php";
require_once ".\Controller\FavorisController.php";

require_once ".\Controller\EtapeController.php";
class RecetteView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function Recette($id)
    {
        echo "<br>
        <div class='recette'>";
        //Le controleur pour recuperer les donnees de la bdd
        $recette = new RecetteController();
        $ingredient = new IngredientController();
        $etape = new EtapeController();
        $res1 = $recette->get_recette($id);
        $res2 = $ingredient->get_ingredient($id);
        $res3 = $etape->get_etape($id);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res1->fetch(PDO::FETCH_ASSOC)){
            if($row['img_cadre']=NULL){
                $img=$row['img_cadre'];
            }else{
                $img=$row['img_recette'];
            }
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
                    </div>";
                if(isset($_SESSION['role'])){
                    if($_SESSION['role']=='user'){
                        $fav=new FavorisController();
                        if($fav->isFavoris($id, $_SESSION['id'])){
                            echo"
                                <div class='defavoris'>
                                <form method='POST'>
                                    <input type='submit' value='Supprimer des favoris' name='defavoris' autocomplete='off'>
                                </form>
                                </div>
                            ";
                        }else{
                            echo"
                            <div class='favoris'>
                            <form method='POST'>
                                <input type='submit' value='Ajouter aux favoris' name='favoris' autocomplete='off'>
                            </form>
                            </div>
                            ";
                        }
                        
                        if(isset($_POST['favoris'])){
                            $fav->add_favoris($_SESSION['id'],$id);
                        }
                        
                        if(isset($_POST['defavoris'])){
                            $fav->remove_favoris($_SESSION['id'],$id);
                        }

                    }
                }
                echo"</div>
                <div>
                    <img src=''/>
                    <img src=''/>
                </div>
            <div>
            <div class='infos-container'>
                <img class='image' src='".$img."'>
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
                    echo "<div><input type='checkbox'>".$row2['quantite']." ".$row2['unite_mesure']." de ".$row2['nom_ingred']."</input><br></div>";
                };               
            echo "</div><br>
            <hr><br>
           
            <h2>Etapes</h2>
            <ol class='recette_det'>
            ";
            while ($row3 = $res3->fetch(PDO::FETCH_ASSOC)){
                echo "<li>".$row3['ordre_etape']." . ".$row3['instruction']."<li><br>";
            };
        echo "</ol>
        <hr>
        <p class='video'> Ou bien regardez la vidéo suivante :</p><br><br>
        <center><iframe width='100%' height='400px' src='".$row['lien_video']."' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></center>
        </div>
            ";
        }
        echo"</div>";
    }
}