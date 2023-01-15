<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\LoginController.php";
class LoginView
{
    private $controller;
    public function login() {
        echo "
            <div class='login_container'>
                <div>
                    <center>
                        <h2>Se connecter</h2>
                    </center>
                    <form method='post'>
                        <label>Nom d'utilisateur</label><br>
                        <input type='text' name='email' placeholder='Entrer votre nom utilisateur ...'/><br>
                        <label>Mot de passe</label><br>
                        <input type='password' name='pwd' placeholder='Entrer votre mot de passe ...'/>
                        <center><input type='submit' value='Se connecter' name='login'></center>
                    </form>
                </div>
                <div class='login_img'>
                    <img src='http://drive.google.com/uc?export=view&id=1bre43I5xlswHFOTTLQqjE5HALFdC3uGS'>
                    <p>Vous n'avez pas de compte? <a href='http://localhost/ElBenna/Inscription.php'>Inscrivez Vous</a></p>
                </div>
            </div>
            ";
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $pwd = $_POST["pwd"];
            $controller = new LoginController();
            $controller->login($email,$pwd);

        }
            
    }
}
    