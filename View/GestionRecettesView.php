<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\GestionRecettesController.php";
require_once "C:\wamp64\www\ElBenna\Controller\IdeesController.php";
class GestionRecettesView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function recettes()
    {
      $critere='id_recette';
      //Le titre, le bouton d'accueil et le bouton ajouter
        echo "
        <ul class='navbar'>
          <a href='principale.php' id='home'><img src='http://drive.google.com/uc?export=view&id=1x0Id9jSlxs-tjNyVYtUz5ebi1Q2UhXkL'></a>
          <center><h2>Gestion des recettes</h2></center><br>
        </ul><br><br><br>
        <input type='button' name='ajouteruser' value='+' onclick='openForm()'/>
        <br><br>";
        //le tri, la recherche
        echo "<br>
        <input type='text' id='myInput' onkeyup='myFunction()' placeholder='Rechercher le nom, la catégorie ou la notation ...'>
        <form class='Sort' method='POST'>
        <p>Trier par : </p>
        <select onchange='this.form.submit()' name='triliste'>
            <option value='none'>---</option>
            <option value='Nom'>Nom</option>
            <option value='Categorie'>Categorie</option>
            <option value='Notation'>Notation</option>
            <option value='Temps de préparation'>Temps de préparation</option>
            <option value='Temps de repos'>Temps de repos</option>
            <option value='Temps de cuisson'>Temps de cuisson</option>
            <option value='Difficulté'>Difficulté</option>
        </select>
        </form><br><br>
        ";
        //Script de la recherche selon le nom, la categorie, Notation
      echo"
      <script>
      function myFunction() {
        // Declare variables
        var input, filter, table, tr, td1, td2, td3, i, txtValue;
        input = document.getElementById('myInput');
        filter = input.value.toUpperCase();
        table = document.getElementById('myTable');
        tr = table.getElementsByTagName('tr');
      
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td1 = tr[i].getElementsByTagName('td')[1];
          td2 = tr[i].getElementsByTagName('td')[2];
          td3 = tr[i].getElementsByTagName('td')[3];
          if (td1 || td2 || td3 ) {
            txtValue1 = td1.textContent || td1.innerText;
            txtValue2 = td2.textContent || td2.innerText;
            txtValue3 = td3.textContent || td3.innerText;
            if ((txtValue1.toUpperCase().indexOf(filter) > -1) || (txtValue2.toUpperCase().indexOf(filter) > -1) || (txtValue3.toUpperCase().indexOf(filter) > -1)) {
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
                $critere = 'nom_recette';
            }else{
                if($_POST['triliste']=='Categorie'){
                    $critere = 'id_categ';
                }else{
                    if($_POST['triliste']=='Notation'){
                        $critere = 'notation';
                    }else{
                        if($_POST['triliste']=='Temps de préparation'){
                            $critere = 'tmp_prep';
                        }else{
                          if($_POST['triliste']=='Temps de repos'){
                              $critere = 'tmp_repos';
                          }else{
                            if($_POST['triliste']=='Temps de cuisson'){
                                $critere = 'tmp_cuisson';
                            }else{
                              if($_POST['triliste']=='Difficulté'){
                                  $critere = 'difficulte';
                              }
                          }
                        }
                      }
                    }
                }
            }
        }
    }
        echo"<center>
        <table class='admintable' id='myTable'>
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Catégorie</77th>
            <th>Notation</th>
            <th>Temps de préparation</th>
            <th>Temps de repos</th>
            <th>Temps de cuisson</th>
            <th>Calories</th>
            <th>Difficulté</th>
            <th>Image</th>
            <th>Video</th>
            <th>Valider</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new GestionRecettesController();
        //Le cadre vue pour afficher les recettes corresp
        $res = $controller->get_recettes($critere);
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
                    <td>".$row['difficulte']."</td>
                    <td><a href='".$row['img_recette']."'>Image</a></td>
                    <td><a href='".$row['lien_video']."'>Vidéo</a></td>";
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
        echo "
        <form class='addRecette' method='POST' class='form-popup' id='popupForm'>
        <input type='button' id='exit' value='x' onclick='closeForm()'>
        <h3>Ajouter Une Recette</h3><br>
        <label>Id de la recette : </label><input type='number' name='id_recette' value='".$identif."' placeholder='Entrer le numero de la recette ...'/><br>
        <label>Titre de la recette : </label><input type='text' name='titre_recette' placeholder='Entrer le titre de la recette ...'/><br>
        <label>Catégorie : </label><select name='categorie'>
        <option>Entrées</option>
        <option>Plats</option>
        <option>Desserts</option>
        <option>Boissons</option>
        <option>4 saisons</option>
        <option>aucune</option>
        </select><br>
        <label>Temps de préparation : </label><input type='time' name='tmp_prep' step='1' placeholder='Entrer le temps de préparation...'><br>
        <label>Temps de repos : </label><input type='time' name='tmp_repos'  step='1' placeholder='Entrer le temps de repos...'><br>
        <label>Temps de cuisson : </label><input type='time' name='tmp_cuisson'  step='1' placeholder='Entrer le temps de cuisson...'><br>
        <label>Nombre de calories : </label><input type='number' name='nb_calories' placeholder='Entrer le nombre de calories ...'/><br>
        <label>Difficulté : </label><input type='number' name='difficulte' placeholder='Entrer la difficulté de la recette ...'/><br>
        <label>Lien vers l'image : </label><input type='text' name='img' placeholder='Entrer le lien image de la recette ...'/><br>
        <label>Lien vers la video : </label><input type='text' name='video' placeholder='Entrer le lien video de la recette ...'/><br>
        <label>Ajouter vos ingrédients</label><input type='text' name='ingredsearch' id='ingredsearch' onkeyup='searchFunction()'><br>
        <label>Ajouter les etapes</label>
        <table id='etapes'>
                <tr>
                  <td><input type='text' name='etape[]' placeholder='Entrer une étape' class='etape_controle'></td>
                  <td><button type='button' name='ajouter' id='ajouter' class='btn'>+</td>
                </tr>
        </table>
        ";
        //Script pour ajouter des etapes
        echo"
        $(document).ready(function(){  
          var i=1;  
          $('#ajouter').click(function(){  
               i++;  
               $('#etapes').append('<tr id='row'+i+''><td><input type='text' name='etape[]' placeholder='Entrer une étape' class='etape_controle' /></td><td></td></tr>');  
          });  
          $('#submit').click(function(){            
               $.ajax({  
                    url:'GestionRecettesView.php',  
                    method:'POST',  
                    data:$('#popupForm').serialize(),  
                    success:function(data)  
                    {  
                         alert(data);  
                         $('#popupForm')[0].reset();  
                    }  
               });  
          });  
     });  ";
        $ingreds = new IdeesController();
        $res = $ingreds->get_ingreds();
        echo"<ul id='ingreds'>";
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo"<li id='check-ingred'>
                    <input type='checkbox' name='liste[]' value='".$row['nom_ingred']."'/>
                    <label>".$row['nom_ingred']."</label>
                </li>";
        }
        echo"</ul>
        <input type='submit' id='submit' value='Ajouter' name='ajouterRecette'/><br>
        </form>";
        //Fonction pour la recherche des ingredients a inserer
        echo "
        <script>
        function searchFunction() {
            var input, filter, ul, li, la, i, txtValue;
            input = document.getElementById('ingredsearch');
            filter = input.value.toUpperCase();
            ul = document.getElementById('ingreds');
            li = ul.getElementsByTagName('li');
          
               for (i = 0; i < li.length; i++) {
              la = li[i].getElementsByTagName('label')[0];
              txtValue = la.textContent || la.innerText; 
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = 'block';
              } else {
                li[i].style.display = 'none';
              }
            }
          }
          
        
        </script>";
        //Fonctions pour ouvrir et fermer les popups
        echo"
        <script>
        function openForm() {
          document.getElementById('popupForm').style.display = 'block';
        }
  
        function closeForm() {
          document.getElementById('popupForm').style.display = 'none';
          document.getElementById('form_container').style.display = 'none';
        }
 
        function closeModifier() {
          document.getElementById('popupModifier').style.display = 'none';
          document.getElementById('form_container').style.display = 'none';
        }
      </script>";
      //Ajouter recette
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
        $liste = array();
        if(!empty($_POST['liste'])) {
          foreach($_POST['liste'] as $ingredient) {
              array_push($liste,$ingredient);
          }
        }
        $recette=[
            $categ,
            $_POST['id_recette'],
            $_POST['titre_recette'],
            $_POST['tmp_prep'],
            $_POST['tmp_repos'],
            $_POST['tmp_cuisson'],
            $_POST['nb_calories'],
            $_POST['image'],
            $_POST['video']
        ];
        $id=$_POST['id_recette'];
        $controller->add_recette($recette);
        $controller->ajouter_ingreds($id,$liste);
    }
    //Modifier recette
    $modif=array();
        if(isset($_POST['modifierRecette'])){
          $id=$_POST['id_recette'];
          $res=$controller->get_rec($id);
          $row= $res->fetch(PDO::FETCH_ASSOC);
          echo"
                  <div id='form_container'>
                    <form class='modifier' method='POST' id='popupModifier'>
                    <input type='button' id='exit' value='x' onclick='closeModifier()'>
                    <center>
                      <h3>Modifier une recette</h3>
                    </center><br>
                    <label>Id de la recette : </label><input type='number' name='id_recette' value='".$row['id_recette']."' placeholder='Entrer le numero de la recette ...'/><br>
                    <label>Titre de la recette : </label><input type='text' name='titre_recette' value='".$row['nom_recette']."' placeholder='Entrer le titre de la recette ...'/><br>
                    <label>Catégorie : </label><select name='categorie'>";
                    switch($row['id_categ']){
                      case 1:
                        echo"<option selected>Entrées</option>
                            <option>Plats</option>
                            <option>Desserts</option>
                            <option>Boissons</option>";
                        break;
                      case 2:
                        echo"<option>Entrées</option>
                            <option selected>Plats</option>
                            <option>Desserts</option>
                            <option>Boissons</option>";
                        break;
                      case 3:
                        echo"<option>Entrées</option>
                            <option>Plats</option>
                            <option selected>Desserts</option>
                            <option>Boissons</option>";
                        break;
                      case 4:
                        echo"<option>Entrées</option>
                            <option>Plats</option>
                            <option>Desserts</option>
                            <option selected>Boissons</option>";
                        break;
                    }
                    
                    echo"</select><br>
                    <label>Temps de préparation : </label><input type='time' name='tmp_prep' step='1' value='".$row['tmp_prep']."' placeholder='Entrer le temps de préparation...'><br>
                    <label>Temps de repos : </label><input type='time' name='tmp_repos'  step='1' value='".$row['tmp_repos']."' placeholder='Entrer le temps de repos...'><br>
                    <label>Temps de cuisson : </label><input type='time' name='tmp_cuisson'  step='1' value='".$row['tmp_cuisson']."' placeholder='Entrer le temps de cuisson...'><br>
                    <label>Nombre de calories : </label><input type='number' name='nb_calories' value='".$row['nb_calories']."' placeholder='Entrer le nombre de calories ...'/><br>
                    <label>Difficulté : </label><input type='number' name='difficulte' value='".$row['difficulte']."' placeholder='Entrer la difficulté de la recette ...'/><br>
                    <input type='submit' value='Modifier' name='modifierButton'/><br>
                    </form>
                  </div>";
             
        }
        
        if(isset($_POST['modifierButton'])){
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
          $modif=[
            $categ,
            $_POST['id_recette'],
            $_POST['titre_recette'],
            $_POST['tmp_prep'],
            $_POST['tmp_repos'],
            $_POST['tmp_cuisson'],
            $_POST['nb_calories'],
            $_POST['difficulte'],
          ];
          $controller->modifier_recette($modif);
        }

    }
}