<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\LoginController.php";
class LoginView
{
    private $controller;
    public function login() {
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $pwd = $_POST["pwd"];
            echo"";
            $controller = new LoginController();
            
        } else {
            echo "
            <div class='login_container'>
                <div>
                    <center>
                        <h2>Se connecter</h2>
                    </center>
                    <form method='post'>
                        <label>ADRESSE EMAIL</label>
                        <input type='text' name='email'/><br>
                        <label>MOT DE PASSE</label>
                        <input type='text' name='pwd'/>
                        <input type='submit' value='Se connecter' name='login'>
                    </form>
                </div>
                <div class='login_img'>
                    <img src=''>
                    <p>Vous n'avez pas de compte? <a>Inscrivez Vous</a></p>
                </div>
            </div>
            ";
        }
    }
}
    