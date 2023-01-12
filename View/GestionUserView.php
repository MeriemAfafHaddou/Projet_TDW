<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\GestionUserController.php";
class GestionUserView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function user()
    {
        echo "
        <center><h2>Gestion des utilisateurs</h2></center>
        <input type='button' name='ajouteruser' value='+'/><br><br><br>
        <center>
        <table class='admintable'>
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Nom d'utilisateur</th>
            <th>Sexe</th>
            <th>Email</th>
            <th>Validation</th>
        </tr>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new GestionUserController();
        //Le cadre vue pour afficher les recettes corresp
        $res = $controller->get_user();
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo"<tr>
                    <td>".$row['id_user']."</td>
                    <td>".$row['nom_user']."</td>
                    <td>".$row['prenom_user']."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['sexe']."</td>
                    <td>".$row['email']."</td>";
                    if ($row['user_valid'] == 1){
                        echo "<td><img src=''></td>";
                    }else{
                        echo "<td><form action='POST'><input type='submit' name='validerUser'><img src=''></input></form></td>";
                    }
                    
                echo "</tr>";
        }
        echo"</table></center>";
        if(isset($_POST['validerUser'])){
            $valid=$controller->valider_user($row['id_user']);
        }
        }
}