<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\LoginModel.php";
require_once "C:\wamp64\www\ElBenna\View\LoginView.php";
require_once "Website\all.php";
class LoginController{
    public function login($email,$pwd){
        $model = new LoginModel();

        if ($model->login($email,$pwd)) {
            echo "
                <script>
                    alert('Welcome !');
                </script>
                ";
            // login success         
            return true;
        }
        else {
            // login failed
            echo "
                <script>
                    alert('Invalid username or password.');
                </script>
                ";
            return false;
        }
    }
}
?>