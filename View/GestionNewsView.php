<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\GestionNewsController.php";
class GestionNewsView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function news()
    {
      echo "
      <ul class='navbar'>
        <a href='principale.php' id='home'><img src='http://drive.google.com/uc?export=view&id=1x0Id9jSlxs-tjNyVYtUz5ebi1Q2UhXkL'></a>
        <center><h2>Gestion des recettes</h2></center><br>
      </ul><br><br><br>
      <input type='button' name='ajouteruser' value='+' onclick='openForm()'/>
        <br><br>
        <input type='text' id='myInput' onkeyup='myFunction()' placeholder='Rechercher ...'><br><br>
        <center>
        <table class='admintable' id='myTable'>
        <tr>
            <th></th>
            <th>Titre</th>
            <th>Description</th>
            <th>Lien d'image</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        
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
            td2 = tr[i].getElementsByTagName('td')[2];
            if (td1 || td2) {
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
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new GestionNewsController();
        //Le cadre vue pour afficher les recettes corresp
        $res = $controller->get_news();
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo"<tr>
                    <td>".$row['id_news']."</td>
                    <td>".$row['titre_cadre']."</td>
                    <td>".$row['desc_cadre']."</td>
                    <td>".$row['img_cadre']."</td> 
                    <td>
                          <form method='POST'>
                              <center><input type='hidden' name='id_news' value='".$row['id_news']."'>
                              <input type='submit' name='modifierNews' value='✎' onlick='OpenModifier()'/></center>
                          </form>
                      </td>
                    <td>
                        <form method='POST'>
                            <center><input type='hidden' name='id_news' value='".$row['id_news']."'>
                            <input type='submit' name='supprimerNews' value='✘'/></center>
                        </form>
                    </td>               
                </tr>";
                $identif=$row['id_news']+1;
        }
        echo"</table>";
        echo"
                <form class='addNews' method='POST' class='form-popup' id='popupForm'>
                <input type='button' id='exit' value='x' onclick='closeForm()'>
                <h3>Ajouter des News</h3><br>
                <label>N° du News :</label> <input name='id_news' type='number' value='".$identif."'/><br>
                <label>Titres du News : </label><input type='text' name='titre_news' placeholder='Entrer le titre du News ...'/><br>
                <label>Description : </label><input type='text' name='desc_news' maxlength='1000' placeholder='Entrer la description du News ...'><br>
                <label>Image du News : </label><input type='text' name='img_news'/><br>
                <input type='submit' value='Ajouter' name='ajouterNews'/><br>
                </form>";

        echo"
        <script>
        function openForm() {
          document.getElementById('popupForm').style.display = 'block';
        }
  
        function closeForm() {
          document.getElementById('popupForm').style.display = 'none';
        }
        function OpenModifier() {
          document.getElementById('modif-popup').style.display = 'block';
          document.getElementById('form_container').style.display = 'block';
        }
        function closeModifier() {
          document.getElementById('modif-popup').style.display = 'none';
          document.getElementById('form_container').style.display = 'none';

        }
      </script>";
        if(isset($_POST['ajouterNews'])){
            $news=[
                $id=$_POST['id_news'],
                $titre=$_POST['titre_news'],
                $img=$_POST['img_news'],
                $desc=$_POST['desc_news']
            ];
            $controller->add_news($news);
        }

        if(isset($_POST['supprimerNews'])){
          $id=$_POST['id_news'];
          $valid=$controller->supprimer_news($id);
      }
      $modif=array();
        if(isset($_POST['modifierNews'])){
          $id=$_POST['id_news'];
          $res=$controller->get_new($id);
          $row= $res->fetch(PDO::FETCH_ASSOC);
          echo"
                  <div id='form_container'>
                    <form class='modifier' method='POST' id='modif-popup'>
                    <input type='button' id='exit' value='x' onclick='closeModifier()'>
                    <h3>Modifier des News</h3><br>
                    <label>N° du News :</label> <input name='id_news' type='number' value='".$row['id_news']."'/><br>
                    <label>Titres du News : </label><input type='text' name='titre_news' placeholder='Entrer le titre du News ...' value='".$row['titre_cadre']."'/><br>
                    <label>Description : </label><input type='text' name='desc_news' maxlength='1000' value='".$row['desc_cadre']."' placeholder='Entrer la description du News ...'><br>
                    <label>Image du News : </label><input type='text' name='img_news' value='".$row['img_cadre']."'/><br>
                    <input type='submit' value='Modifier' name='modifierButton'/><br>
                    </form>
                  </div>";
             
        }
        if(isset($_POST['modifierButton'])){
          $modif=[
            $_POST['id_news'],
            $_POST['titre_news'],
            $_POST['desc_news'],
            $_POST['img_news']
          ];
          $controller->modifier_news($modif);
        }
    }
}