<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\GestionNutritionController.php";
class GestionNutritionView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function Nutrition()
    {
        echo "
        <center><h2>Gestion de Nutrition</h2></center>
        <input type='button' name='ajouteruser' value='+' onclick='openForm()'/><br><br><br>
        <center>
        <table class='admintable'>
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Healthy</th>
            <th>Saison</th>
            <th>Calories</th>
            <th>Proteines</th>
            <th>Glucides</th>
            <th>Lipides</th>
            <th>Sodium</th>
            <th>Eau</th>
            <th>Fibres</th>
            <th>Minéreaux</th>
            <th>Vitamines</th>
        </tr>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new GestionNutritionController();
        //Le cadre vue pour afficher les recettes corresp
        $res = $controller->get_Nutrition();
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo"<tr>
                    <td>".$row['id_ingred']."</td>
                    <td>".$row['nom_ingred']."</td>";
                    if($row['healthy']==1){
                        echo"<td>Oui</td>";
                    }else{
                        echo"<td>Non</td>";
                    }
                    echo "<td>".$row['nom_saison']."</td>
                    <td>".$row['energie']."</td>   
                    <td>".$row['proteines']."</td> 
                    <td>".$row['glucides']."</td>
                    <td>".$row['lipides']."</td>
                    <td>".$row['sodium']."</td>       
                    <td>".$row['eau']."</td>   
                    <td>".$row['fibres']."</td>  
                    <td>".$row['minereaux']."</td>       
                    <td>".$row['vitamines']."</td>   
                </tr>";
                $identif=$row['id_ingred']+1;
        }
        echo"</table>";
        echo"
                <form class='addNutrition' method='POST' class='form-popup' id='popupForm'>
                <input type='button' id='exit' value='x' onclick='closeForm()'>
                <h3>Ajouter Un Ingrédient</h3><br>
                <label>N° de l'ingrédient :</label> <input name='id_ingred' type='number' value='".$identif."'/><br>
                <label>Nom de l'ingrédient : </label><input type='text' name='nom_ingred' placeholder='Entrer le nom de l'ingrédient ...'/><br>
                <label>Healthy : </label><select name='healthy'>
                <option>Oui</option>
                <option>Non</option>
                </select><br> 
                <label>Saion : </label><select name='saison'>
                <option>Hiver</option>
                <option>Automne</option>
                <option>Eté</option>
                <option>Printemps</option>
                <option>4 saisons</option>
                <option>Aucune</option>
                </select><br>           
                <label>Calories : </label><input type='number' step='0.001' name='calories' placeholder='Entrer le nombre de calories ...'><br>
                <label>Proteines : </label><input type='number' step='0.001' name='proteines' placeholder='Entrer la valeur des proteines ...'/><br>
                <label>Glucides : </label><input type='number'  step='0.001' name='glucides' placeholder='Entrer la valeur des glucides ...'/><br>
                <label>Lipides : </label><input type='number' step='0.001'  name='lipides' placeholder='Entrer la valeur des lipides ...'/><br>
                <label>Sodium : </label><input type='number'  step='0.001' name='sodium' placeholder='Entrer la valeur du sodium ...'/><br>
                <label>Eau : </label><input type='number' step='0.001' name='eau' placeholder='Entrer la valeur de l'eau ...'/><br>
                <label>Fibres : </label><input type='number' step='0.001' name='fibres' placeholder='Entrer la valeur des fibres ...'/><br>
                <label>Minereaux : </label><input type='number' step='0.001' name='minereaux' placeholder='Entrer la valeur des minereaux ...'/><br>
                <label>vitamines : </label><input type='number' step='0.001' name='vitamines' placeholder='Entrer la valeur des vitamines ...'/><br>
                <input type='submit' value='Ajouter' name='ajouterNutrition'/><br>
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
      if(isset($_POST['ajouterNutrition'])){
        if($_POST['saison']=='Hiver'){
          $saison=1;
        }else{
          if($_POST['saison']=='Automne'){
            $saison=2;
          }else{
            if($_POST['saison']=='Eté'){
              $saison=3;
            }else{
              if($_POST['saison']=='Printemps'){
                $saison=4;
              }else{
                if($_POST['saison']=='4 saisons'){
                  $saison=5;
                }else{
                    if($_POST['saison']=='Aucune'){
                      $saison=6;
                    }
                }
              }
            }
          }        
        }
        if($_POST['healthy']=='oui'){
            $healthy=1;
        }else{
            $healthy=0;
        }
        $Nutrition=[
            $id=$_POST['id_ingred'],
            $nom=$_POST['nom_ingred'],
            $healthy,
            $saison,
            $energie=$_POST['calories'],
            $proteines=$_POST['proteines'],
            $glucides=$_POST['glucides'],
            $lipides=$_POST['lipides'],
            $sodium=$_POST['sodium'],
            $eau=$_POST['eau'],
            $fibres=$_POST['fibres'],
            $minereaux=$_POST['minereaux'],
            $vitamines=$_POST['vitamines']
        ];
        $controller->add_Nutrition($Nutrition);
    }
    }
}