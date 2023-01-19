<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\GestionNutritionController.php";
class GestionNutritionView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function Nutrition()
    {
      $critere='1=1';
      //Home, titre, bouton ajouter
      echo "
      <ul class='navbar'>
        <a href='principale.php' id='home'><img src='http://drive.google.com/uc?export=view&id=1x0Id9jSlxs-tjNyVYtUz5ebi1Q2UhXkL'></a>
        <center><h2>Gestion des recettes</h2></center><br>
      </ul><br><br><br>
      <input type='button' name='ajouteruser' value='+' onclick='openForm()'/>
      <br><br>";
        //le tri, la recherche
        echo "<br>
        <input type='text' id='myInput' onkeyup='myFunction()' placeholder='Rechercher ...'>
        <form class='Sort' method='POST'>
        <p>Trier par : </p>
        <select onchange='this.form.submit()' name='triliste'>
            <option value='none'>---</option>
            <option value='Nom'>Nom</option>
            <option value='Healthy'>Healthy</option>
            <option value='Saison'>Saison</option>
            <option value='Calories'>Calories</option>
            <option value='Proteines'>Proteines</option>
            <option value='Glucides'>Glucides</option>
            <option value='Lipides'>Lipides</option>
            <option value='Sodium'>Sodium</option>
            <option value='Eau'>Eau</option>
            <option value='Fibres'>Fibres</option>
            <option value='Minéreaux'>Minéreaux</option>
            <option value='Vitamines'>Vitamines</option>
        </select>
        </form><br><br>
        ";
      //Script de la recherche selon le nom et la saison
      echo"
        <script>
        function myFunction() {
          // Declare variables
          var input, filter, table, tr, td1, td2, i, txtValue;
          input = document.getElementById('myInput');
          filter = input.value.toUpperCase();
          table = document.getElementById('myTable');
          tr = table.getElementsByTagName('tr');
        
          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td1 = tr[i].getElementsByTagName('td')[1];
            td2 = tr[i].getElementsByTagName('td')[3];
            if (td1 || td2 ) {
              txtValue1 = td1.textContent || td1.innerText;
              txtValue2 = td2.textContent || td2.innerText;
              if ((txtValue1.toUpperCase().indexOf(filter) > -1) || (txtValue2.toUpperCase().indexOf(filter) > -1)) {
                tr[i].style.display = '';
              } else {
                tr[i].style.display = 'none';
              }
            }
          }
        }
        </script>";
        //Le critere de tri
        if(isset($_POST["triliste"])){
          if(!empty($_POST['triliste'])) {
              if($_POST['triliste']=='Nom'){
                  $critere = 'nom_ingred';
              }else{
                  if($_POST['triliste']=='Healthy'){
                      $critere = 'healthy';
                  }else{
                      if($_POST['triliste']=='Saison'){
                          $critere = 'nom_saison';
                      }else{
                          if($_POST['triliste']=='Calories'){
                              $critere = 'energie';
                          }else{
                            if($_POST['triliste']=='Proteines'){
                                $critere = 'proteines';
                            }else{
                              if($_POST['triliste']=='Glucides'){
                                  $critere = 'glucides';
                              }else{
                                if($_POST['triliste']=='Lipides'){
                                    $critere = 'lipides';
                                }else{
                                  if($_POST['triliste']=='Sodium'){
                                      $critere = 'sodium';
                                  }else{
                                    if($_POST['triliste']=='Eau'){
                                        $critere = 'eau';
                                    }else{
                                      if($_POST['triliste']=='Fibres'){
                                          $critere = 'fibres';
                                      }else{
                                        if($_POST['triliste']=='Minéreaux'){
                                            $critere = 'minereaux';
                                        }else{
                                          if($_POST['triliste']=='Vitamines'){
                                              $critere = 'vitamines';
                                          }
                                      }
                                    }
                                  }
                                }
                              }
                            }
                          }
                        }
                      }
                  }
              }
          }
      }
        echo"<center><table class='admintable' id='myTable'>
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
            <th>Valider</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new GestionNutritionController();
        //Le cadre vue pour afficher les ingreds corresp
        $res = $controller->get_Nutrition($critere);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
          // ******************** LE TABLEAU ******************************
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
                    <td>".$row['vitamines']."</td>";
                    if ($row['ingred_valid'] == 1){
                      echo "<td><center><input name='valid' type='button' value='✔'></input></center></td>";
                  }else{
                      echo "<td>
                              <form method='POST'>
                                  <center><input type='hidden' name='id_ingred' value='".$row['id_ingred']."'/>
                                  <input type='submit' name='valider' value='⌛'/></center>
                              </form>
                          </td>";
                  }    
                  echo "
                      <td>
                          <form method='POST'>
                              <center><input type='hidden' name='id_ingred' value='".$row['id_ingred']."'/>
                              <input type='submit' name='modifier' value='✎'/></center>
                          </form>
                      </td>
                      <td>
                          <form method='POST'>
                              <center><input type='hidden' name='id_ingred' value='".$row['id_ingred']."'/>
                              <input type='submit' name='supprimer' value='✘'/></center>
                          </form>
                      </td>
                      </tr>";;
                $identif=$row['id_ingred']+1;
        }
        echo"</table>";

        //supprimer, valider
        if(isset($_POST['valider'])){
          $id=$_POST['id_ingred'];
          $valid=$controller->valider_ingred($id);
        }
        if(isset($_POST['supprimer'])){
            $id=$_POST['id_ingred'];
            $valid=$controller->supprimer_ingred($id);
        }
        //Modifier un ingredient
        if(isset($_POST['modifier'])){
          $id=$_POST['id_ingred'];
          $res=$controller->get_ingredient($id);
          $row= $res->fetch(PDO::FETCH_ASSOC);
          echo"<div id='form_container'>
                  <form method='POST' id='popupModifier'>
                    <input type='button' id='exit' value='x' onclick='closeModifier()'>
                    <h3>Modifier Un Ingrédient</h3><br>
                    <label>N° de l'ingrédient :</label> <input name='id_ingred' type='text' value='".$row['id_ingred']."'/><br>
                    <label>Nom de l'ingrédient : </label><input type='text' name='nom_ingred' value='".$row['nom_ingred']."' placeholder='Entrer le nom ...'/><br>
                  <label>Healthy : </label><select name='healthy'>";
                  switch($row['healthy']){
                    case '1':
                      echo"
                      <option selected>Oui</option>
                      <option>Non</option>";
                      break;
                    case '0':
                      echo"
                      <option >Oui</option>
                      <option selected>Non</option>";
                  }
                  echo "</select><br>
                  <label>Saion : </label><select name='saison'>";
                  switch($row['id_saison']){
                    case '1':
                      echo"
                      <option selected>Hiver</option>
                      <option>Automne</option>
                      <option>Eté</option>
                      <option>Printemps</option>
                      <option>4 saisons</option>
                      <option>Aucune</option>";
                      break;
                    case '2':
                      echo"
                      <option>Hiver</option>
                      <option selected>Automne</option>
                      <option>Eté</option>
                      <option>Printemps</option>
                      <option>4 saisons</option>
                      <option>Aucune</option>";
                      break;
                    case '3':
                        echo"
                        <option>Hiver</option>
                        <option>Automne</option>
                        <option selected>Eté</option>
                        <option>Printemps</option>
                        <option>4 saisons</option>
                        <option>Aucune</option>";
                      break;
                    case '4':
                      echo"
                      <option>Hiver</option>
                      <option>Automne</option>
                      <option>Eté</option>
                      <option selected>Printemps</option>
                      <option>4 saisons</option>
                      <option>Aucune</option>";
                    break;
                    case '5':
                      echo"
                      <option>Hiver</option>
                      <option>Automne</option>
                      <option>Eté</option>
                      <option>Printemps</option>
                      <option selected>4 saisons</option>
                      <option>Aucune</option>";
                    break;
                    case '6':
                      echo"
                      <option>Hiver</option>
                      <option>Automne</option>
                      <option>Eté</option>
                      <option>Printemps</option>
                      <option>4 saisons</option>
                      <option selected>Aucune</option>";
                    break;
                  }
                  echo"</select><br>       
                  <label>Calories : </label><input type='number' name='energie' value='".$row['energie']."' placeholder='Entrer le nombre de calories ...'><br>
                  <label>Proteines : </label><input type='number' step='0.01' name='proteines' value='".$row['proteines']."' placeholder='Entrer la valeur des proteines ...'/><br>
                  <label>Glucides : </label><input type='number'  step='0.01' name='glucides' value='".$row['glucides']."' placeholder='Entrer la valeur des glucides ...'/><br>
                  <label>Lipides : </label><input type='number' step='0.01'  name='lipides' value='".$row['lipides']."' placeholder='Entrer la valeur des lipides ...'/><br>
                  <label>Sodium : </label><input type='number'  step='0.01' name='sodium' value='".$row['sodium']."' placeholder='Entrer la valeur du sodium ...'/><br>
                  <label>Eau : </label><input type='number' step='0.01' name='eau' value='".$row['eau']."' placeholder='Entrer la valeur de l eau ...'/><br>
                  <label>Fibres : </label><input type='number' step='0.01' name='fibres' value='".$row['fibres']."' placeholder='Entrer la valeur des fibres ...'/><br>
                  <label>Minereaux : </label><input type='number' step='0.01' name='minereaux' value='".$row['minereaux']."' placeholder='Entrer la valeur des minereaux ...'/><br>
                  <label>vitamines : </label><input type='number' step='0.01' name='vitamines' value='".$row['vitamines']."' placeholder='Entrer la valeur des vitamines ...'/><br>
                  <input type='submit' value='Modifier' name='modifierButton'/><br>
                      </form>
                  </div>";
             
        }
        if(isset($_POST['modifierButton'])){
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
            $modif=[
                $id=$_POST['id_ingred'],
                $nom=$_POST['nom_ingred'],
                $healthy,
                $saison,
                $energie=$_POST['energie'],
                $proteines=$_POST['proteines'],
                $glucides=$_POST['glucides'],
                $lipides=$_POST['lipides'],
                $sodium=$_POST['sodium'],
                $eau=$_POST['eau'],
                $fibres=$_POST['fibres'],
                $minereaux=$_POST['minereaux'],
                $vitamines=$_POST['vitamines']
            ];
          $controller->modifier_nutrition($modif);
        }
        //Ajouter Un nouveau ingredient
        echo"
                <form class='addNutrition' method='POST' class='form-popup' id='popupForm'>
                <input type='button' id='exit' value='x' onclick='closeForm()'>
                <h3>Ajouter Un Ingrédient</h3><br>
                <label>N° de l'ingrédient :</label> <input name='id_ingred' type='number' value='".$identif."'/><br>
                <label>Nom de l'ingrédient : </label><input type='text' name='nom_ingred' placeholder='Entrer le nom ...'/><br>
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
                <label>Calories : </label><input type='number' name='calories' placeholder='Entrer le nombre de calories ...'><br>
                <label>Proteines : </label><input type='number' step='0.01' name='proteines' placeholder='Entrer la valeur des proteines ...'/><br>
                <label>Glucides : </label><input type='number'  step='0.01' name='glucides' placeholder='Entrer la valeur des glucides ...'/><br>
                <label>Lipides : </label><input type='number' step='0.01'  name='lipides' placeholder='Entrer la valeur des lipides ...'/><br>
                <label>Sodium : </label><input type='number'  step='0.01' name='sodium' placeholder='Entrer la valeur du sodium ...'/><br>
                <label>Eau : </label><input type='number' step='0.01' name='eau' placeholder='Entrer la valeur de eau ...'/><br>
                <label>Fibres : </label><input type='number' step='0.01' name='fibres' placeholder='Entrer la valeur des fibres ...'/><br>
                <label>Minereaux : </label><input type='number' step='0.01' name='minereaux' placeholder='Entrer la valeur des minereaux ...'/><br>
                <label>vitamines : </label><input type='number' step='0.01' name='vitamines' placeholder='Entrer la valeur des vitamines ...'/><br>
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
        function closeModifier() {
          document.getElementById('popupModifier').style.display = 'none';
          document.getElementById('form_container').style.display= 'none';
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