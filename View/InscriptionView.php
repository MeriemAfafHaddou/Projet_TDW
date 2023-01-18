<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\InscriptionController.php";
require_once "./Website/all.php";
class InscriptionView
{
    private $controller;
    public function register() {
        echo "
            <div class='login_container'>
                <div>
                    <center>
                        <h2>Inscrivez Vous</h2>
                    </center>
                    <form method='post'>
                        <label>Nom</label><br>
                        <input type='text' name='nom' placeholder='Entrer votre nom ...'/><br>
                        <label>Prénom</label><br>
                        <input type='text' name='prenom' placeholder='Entrer votre prénom ...'/><br>
                        <label>Nom d'utilisateur</label><br>
                        <input type='date' name='DateNaissance' placeholder='Entrer votre date de naissance ...'/><br>
                        <label>Sexe</label><br>
                        <select name='sexe' placeholder='Séléctionner votre sexe ...'><br>
                            <option>Homme</option>
                            <option>Femme</option>
                        </select><br>
                        <label>E-mail</label><br>
                        <input type='text' name='email' placeholder='Entrer votre adresse e-mail ...'/><br>
                        <label>Mot de passe</label><br>
                        <input type='password' name='pwd' placeholder='Entrer votre mot de passe ...'/>
                        <center><input type='submit' value='Inscrivez vous' name='register'></center>
                    </form>
                </div>
                <div class='login_img'>
                    <img src='http://drive.google.com/uc?export=view&id=1bre43I5xlswHFOTTLQqjE5HALFdC3uGS'>
                </div>
            </div>
            ";
        $valid=0;
        if (isset($_POST["register"])) {
            $infos=[
                $nom=$_POST["nom"],
                $prenom=$_POST["prenom"],
                $datenaissance=$_POST["DateNaissance"],
                $sexe=$_POST["sexe"],
                $email = $_POST["email"],
                $pwd = $_POST["pwd"],
                $valid
            ];
            $controller = new InscriptionController();
            $controller->register($infos);
        }
            
    }
}
    