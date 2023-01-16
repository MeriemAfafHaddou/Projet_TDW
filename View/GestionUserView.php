<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\GestionUserController.php";
class GestionUserView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function user()
    {
        echo "
        <center><h2>Gestion des utilisateurs</h2></center><br>";
        $critere='1=1';
        echo "<br>
        <form class='Sort' method='POST'>
        <p>Trier par : </p>
        <select onchange='this.form.submit()' name='triliste'>
            <option value='none'>---</option>
            <option value='Nom'>Nom</option>
            <option value='Prénom'>Prénom</option>
            <option value='Nom utilisateur'>Nom utilisateur</option>
            <option value='Sexe'>Sexe</option>
            <option value='Email'>Email</option>
        </select>
        </form><br>
        ";
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
                            }else{
                                if($_POST['triliste']=='Nom utilisateur'){
                                    $critere = 'username';
                                }else{
                                    
                                }
                            }
                        }
                    }
                }
            }
        }
        echo "<center>
        <table class='admintable'>
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
                    <td>".$row['nom_user']."</td>
                    <td>".$row['prenom_user']."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['sexe']."</td>
                    <td>".$row['email']."</td>";
                    if ($row['user_valid'] == 1){
                        echo "<td><center><p class='valid'>valide</p></center></td>";
                    }else{
                        echo "<td>
                                <form method='POST'>
                                    <center><input type='hidden' name='id_user' value='".$row['id_user']."'>
                                    <input type='submit' name='validerUser' value='Valider'/></center>
                                </form>
                            </td>";
                    }                    
                echo "
                <td>
                    <form method='POST'>
                        <center><input type='hidden' name='id_user' value='".$row['id_user']."'>
                        <input type='submit' name='supprimerUser' value='Supprimer'/></center>
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