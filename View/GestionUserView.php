<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once ".\Controller\GestionUserController.php";
class GestionUserView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function user()
    {
        echo "
        <ul class='navbar'>
          <a href='principale.php' id='home'><img src='http://drive.google.com/uc?export=view&id=1x0Id9jSlxs-tjNyVYtUz5ebi1Q2UhXkL'></a>
          <center><h2>Gestion des utilisateurs</h2></center><br>
        </ul><br><br><br>
        <br><br>";       
        $critere='1=1';
        echo "<br>
        <input type='text' id='myInput' onkeyup='myFunction()' placeholder='Rechercher ...'>
        <form class='Sort' method='POST'>
        <p>Trier par : </p>
        <select onchange='this.form.submit()' name='triliste'>
            <option value='none'>---</option>
            <option value='Nom'>Nom</option>
            <option value='Prénom'>Prénom</option>
            <option value='Sexe'>Sexe</option>
            <option value='Email'>Email</option>
        </select>
        </form><br><br>
        ";

        //Script de recherche 
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
            td1 = tr[i].getElementsByTagName('td')[2];
            td2 = tr[i].getElementsByTagName('td')[3];
            td3 = tr[i].getElementsByTagName('td')[5];
            if (td1 || td2 || td3) {
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
        if(isset($_POST["triliste"])){
            if(!empty($_POST['triliste'])) {
                if($_POST['triliste']=='Nom'){
                    $critere = 'nom_user';
                }else{
                    if($_POST['triliste']=='Prénom'){
                        $critere = 'prenom_user';
                    }else{
                        if($_POST['triliste']=='Sexe'){
                            $critere = 'sexe';
                        }else{
                            if($_POST['triliste']=='Email'){
                                $critere = 'email';
                            }
                        }
                    }
                }
            }
        }
        echo "<center>
        <table class='admintable' id='myTable'>
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Nom d'utilisateur</th>
            <th>Sexe</th>
            <th>Email</th>
            <th>Validation</th>
            <th>Suppression</th>
        </tr>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new GestionUserController();
        //Le cadre vue pour afficher les recettes corresp
        $res = $controller->get_user($critere);
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo"<tr>
                    <td>".$row['id_user']."</td>
                    <td><a href='Profile.php?id=".$row['id_user']."'>".$row['nom_user']."</a></td>
                    <td>".$row['prenom_user']."</td>
                    <td>".$row['datenaissance']."</td>
                    <td>".$row['sexe']."</td>
                    <td>".$row['email']."</td>";
                    if ($row['user_valid'] == 1){
                        echo "<td><center><input name='valid' type='button' value='✔'></input></center></td>";
                    }else{
                        echo "<td>
                                <form method='POST'>
                                    <center><input type='hidden' name='id_user' value='".$row['id_user']."'>
                                    <input type='submit' name='validerUser' value='⌛'/></center>
                                </form>
                            </td>";
                    }                    
                echo "
                <td>
                    <form method='POST'>
                        <center><input type='hidden' name='id_user' value='".$row['id_user']."'>
                        <input type='submit' name='supprimerUser' value='✘'/></center>
                    </form>
                </td>
                </tr>";
        }
        echo"</table></center>";
        if(isset($_POST['validerUser'])){
            $id=$_POST['id_user'];
            $valid=$controller->valider_user($id);
        }
        if(isset($_POST['supprimerUser'])){
            $id=$_POST['id_user'];
            $valid=$controller->supprimer_user($id);
        }
        }
}