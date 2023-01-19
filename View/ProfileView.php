<script>
        function ajouterEtape(){
            var tableRow = document.getElementById("etapes");
            var row = document.createElement("tr");
            var cell1 = document.createElement("td");
            var cell2 = document.createElement("td");
             cell1.innerHTML = "<input type='text' name='etape[]' placeholder='Entrer une étape'>";
             cell2.innerHTML = "";
             row.appendChild(cell1);
             row.appendChild(cell2);
             tableRow.appendChild(row);
        }
        </script>
<?php
require_once "./Controller/ProfileController.php";
require_once "./Controller/IdeesController.php";
require_once "./Controller/GestionRecettesController.php";
class ProfileView{
    public function Profile($id){
        $controller=new ProfileController();
        $recettecontroller=new GestionRecettesController();
        $res=$controller->get_profile($id);
        $row=$res->fetch(PDO::FETCH_ASSOC);
        if(isset($_SESSION['role'])){
            if($_SESSION['role']=='user'){
            echo"
            <center>
                <table class='profile'>
                    <tr>
                        <td>
                            <center>
                                <img src='".$row['photo_profile']."'>
                                <h4>".$row['prenom_user']." ".$row['nom_user']."</h4>
                            </center>
                        </td>
                        <td class='infos_perso'>
                            <h3>Informations Personnelles</h3>
                            <label>Nom :</label><input type='button' value='".$row['nom_user']."'/><br>
                            <label>Prénom :</label><input type='button' value='".$row['prenom_user']."'/><br>
                            <label>Date de naissance :</label><input type='button' value='".$row['datenaissance']."'/><br>
                            <label>Sexe :</label><input type='button' value='".$row['sexe']."'/><br>
                            <label>Email :</label><input type='button' value='".$row['email']."'/><br>
                        </td>
                        <td class='actions'>
                            <h3>Actions</h3>
                            <input type='button' value='+ Ajouter une nouvelle recette' onclick='openForm3()'/><br>
                            <a href='Favoris.php?id=".$_SESSION['id']."'><input type='button' value='♥ Mes favoris'/></a><br>
                            <input type='button' value='✎ Modifier la photo de profil' onclick='openForm1()'/><br>
                            <input type='button' value='✎ Modifier le mot de passe' onclick='openForm2()'/><br>
                            <form method='post'><input type='submit' name='logout' value='→ Se déconnecter'/><br></form>
                        </td>
                    </tr>
                </table>
            </center>

            ";
            if(isset($_POST['logout'])){
                session_destroy();
                header("Location: Se connecter.php");
            }
            //Ajouter recette, modifier photo, modifier mot de passe
            echo "
            <form class='addRecette' method='POST' class='form-popup' id='popupForm3'>
            <input type='button' id='exit' value='x' onclick='closeForm3()'>
            <h3>Ajouter Une Recette</h3><br>
            <label>Id de la recette : </label><input type='number' name='id_recette' placeholder='Entrer le numero de la recette ...'/><br>
            <label>Titre de la recette : </label><input type='text' name='titre_recette' placeholder='Entrer le titre de la recette ...'/><br>
            <label>Description de la recette : </label><input type='text' maxlength='1000' name='description' placeholder='Entrer la description de la recette ...'/><br>
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
            <label>Ajouter vos ingrédients</label><input type='text' name='ingredsearch' id='ingredsearch' onkeyup='searchFunction()'><br>";
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
            <label>Ajouter les etapes</label>
            <table id='etapes'>
                    <tr>
                      <td><input type='text' name='etape[]' placeholder='Entrer une étape' class='etape_controle'></td>
                      <td><input type='button' value='+' name='ajouter' id='ajouter' class='btn' onclick='ajouterEtape()'></input></td>
                    </tr>
            </table>       
            <input type='submit' id='submit' value='Ajouter' name='ajouterRecette'/><br>
            </form>";
            if(isset($_POST['etape'])){
              $number = count($_POST["etape"]);  
              $etapes=array();
              if($number > 0)  
              {  
                  for($i=0; $i<$number; $i++)  
                  {  
                        if(trim($_POST["etape"][$i] != ''))  
                        {  
                            array_push($etapes,$_POST["etape"][$i]);
                        }  
                  }  
              }  
            }
            
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
                $_POST['description'],
                $_POST['tmp_prep'],
                $_POST['tmp_repos'],
                $_POST['tmp_cuisson'],
                $_POST['nb_calories'],
                $_POST['difficulte'],
                $_POST['img'],
                $_POST['video']
            ];
            $id=$_POST['id_recette'];
            $recettecontroller->add_recette($recette);
            $recettecontroller->ajouter_ingreds($id,$liste);
            $recettecontroller->ajouter_etapes($id,$etapes);
        }
    
           
            echo"
                <form class='addNews' method='POST' class='form-popup' id='popupForm1'>
                <input type='button' id='exit' value='x' onclick='closeForm1()'>
                <h3>Modifier la photo de profil</h3><br>
                <label>Lien :</label> <input name='lien' type='text'/><br>
                <input type='submit' value='Modifier' name='modifierImage'/><br>
                </form>
                
                <form class='addNews' method='POST' class='form-popup' id='popupForm2'>
                <input type='button' id='exit' value='x' onclick='closeForm2()'>
                <h3>Modifier le mot de passe</h3><br>
                <label>Nouveau mot de passe:</label> <input name='pwd' type='password'/><br>
                <input type='submit' value='Modifier' name='modifierMdp'/><br>
                </form>
                ";
                //scripts pour ouvrir les popups
            echo"
            <script>
            function openForm1() {
                document.getElementById('popupForm1').style.display = 'block';
            }
        
            function closeForm1() {
                document.getElementById('popupForm1').style.display = 'none';
            }
            function openForm2() {
                document.getElementById('popupForm2').style.display = 'block';
            }
        
            function closeForm2() {
                document.getElementById('popupForm2').style.display = 'none';
            }
            function openForm3() {
                document.getElementById('popupForm3').style.display = 'block';
            }
        
            function closeForm3() {
                document.getElementById('popupForm3').style.display = 'none';
            }
            </script>";
            if(isset($_POST['modifierImage'])){
                $lien=$_POST['lien'];
                $controller->modifier_img($id,$lien);
            }
            if(isset($_POST['modifierMdp'])){
                $mdp=$_POST['pwd'];
                $controller->modifier_mdp($id,$mdp);
            }
        }else{
            echo"
            <center>
                <table class='profile'>
                    <tr>
                        <td>
                            <center>
                                <img src='".$row['photo_profile']."'>
                                <h4>".$row['prenom_user']." ".$row['nom_user']."</h4>
                            </center>
                        </td>
                        <td class='infos_perso'>
                            <h3>Informations Personnelles</h3>
                            <label>Nom :</label><input type='button' value='".$row['nom_user']."'/><br>
                            <label>Prénom :</label><input type='button' value='".$row['prenom_user']."'/><br>
                            <label>Date de naissance :</label><input type='button' value='".$row['datenaissance']."'/><br>
                            <label>Sexe :</label><input type='button' value='".$row['sexe']."'/><br>
                            <label>Email :</label><input type='button' value='".$row['email']."'/><br>
                        </td>
                    </tr>
                </table>
            </center>
            ";
        }


    }else{
        header("location:Se connecter.php");
    }
}

}