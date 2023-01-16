<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\GestionRecettesController.php";
class GestionRecettesView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function recettes()
    {
        echo "
        <center><h2>Gestion des recettes</h2></center><br>
        <input type='button' name='ajouteruser' value='+' onclick='openForm()'/><br><br><br>
        <center>
        <table class='admintable'>
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Catégorie</77th>
            <th>Notation</th>
            <th>Temps de préparation</th>
            <th>Tenps de repos</th>
            <th>Temmps de cuisson</th>
            <th>Calories</th>
            <th>Difficulté</th>
            <th>Valider</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new GestionRecettesController();
        //Le cadre vue pour afficher les recettes corresp
        $res = $controller->get_recettes();
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo"<tr>
                    <td>".$row['id_recette']."</td>
                    <td>".$row['nom_recette']."</td>
                    <td>".$row['nom_categ']."</td>
                    <td>".$row['notation']."</td>
                    <td>".$row['tmp_prep']."</td>
                    <td>".$row['tmp_repos']."</td>
                    <td>".$row['tmp_cuisson']."</td>
                    <td>".$row['nb_calories']."</td>
                    <td>".$row['difficulte']."</td>";
                    if ($row['recette_valid'] == 1){
                      echo "<td><center><input type='submit' name='valid' value='✔'></center></td>";
                    }else{
                        echo "<td>
                                <form method='POST'>
                                    <center><input type='hidden' name='id_recette' value='".$row['id_recette']."'>
                                    <input type='submit' name='validerRecette' value='⌛'/></center>
                                </form>
                            </td>";
                    }
                    echo "
                      <td>
                          <form method='POST'>
                              <center><input type='hidden' name='id_recette' value='".$row['id_recette']."'>
                              <input type='submit' name='modifierRecette' value='✎'/></center>
                          </form>
                      </td>
                      <td>
                          <form method='POST'>
                              <center><input type='hidden' name='id_recette' value='".$row['id_recette']."'>
                              <input type='submit' name='supprimerRecette' value='✘'/></center>
                          </form>
                      </td>
                      </tr>";             
                    $identif=$row['id_recette']+1;                 
                echo "</tr>";
                }
                echo"</table></center>";
                if(isset($_POST['validerRecette'])){
                  $id=$_POST['id_recette'];
                  $valid=$controller->valider_recette($id);
                }
                if(isset($_POST['supprimerRecette'])){
                    $id=$_POST['id_recette'];
                    $valid=$controller->supprimer_recette($id);
                }
        echo "<form class='addRecette' method='POST' class='form-popup' id='popupForm'>
        <h3>Ajouter Une Recette</h3><br>
        <label>Titre de la recette : </label><input type='text' name='titre_recette' placeholder='Entrer le titre de la recette ...'/><br>
        <label>Catégorie : </label><select name='categorie'>
        <option>Entrées</option>
        <option>Plats</option>
        <option>Desserts</option>
        <option>Boissons</option>
        </select><br>
        <label>Temps de préparation : </label><input type='time' name='tmp_prep' step='1' placeholder='Entrer le temps de préparation...'><br>
        <label>Temps de repos : </label><input type='time' name='tmp_repos'  step='1' placeholder='Entrer le temps de repos...'><br>
        <label>Temps de cuisson : </label><input type='time' name='tmp_cuisson'  step='1' placeholder='Entrer le temps de cuisson...'><br>
        <label>Nombre de calories : </label><input type='number' name='nb_calories' placeholder='Entrer le nombre de calories ...'/><br>
        <label>Difficulté : </label><input type='number' name='difficulte' placeholder='Entrer la difficulté de la recette ...'/><br>
        <input type='submit' value='Ajouter' name='ajouterRecette'/><br>
        </form>";
        echo"
        <script>
        function openForm() {
          document.getElementById('popupForm').style.display = 'block';
        }
  
        function closeForm() {
          document.getElementById('popupForm').style.display = 'none';
        }
      </script>";
      if(isset($_POST['ajouterRecette'])){
        if($_POST['categorie']=='Entrées'){
          $categ=1;
        }else{
          if($_POST['categorie']=='Plats'){
            $categ=2;
          }else{
            if($_POST['categorie']=='Desserts'){
              $categ=3;
            }else{
              if($_POST['categorie']=='Boissons'){
                $categ=4;
              }
            }
          }
        }
        $recette=[
            $categ,
            $id=$_POST['id_recette'],
            $titre=$_POST['titre_recette'],
            $prep=$_POST['tmp_prep'],
            $repos=$_POST['tmp_repos'],
            $cuisson=$_POST['tmp_cuisson'],
            $calories=$_POST['nb_calories'],
            $difficulte=$_POST['difficulte']
        ];
        $controller->add_recette($recette);
    }
    }
}