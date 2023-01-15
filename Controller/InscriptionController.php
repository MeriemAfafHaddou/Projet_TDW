<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\InscriptionModel.php";
class InscriptionController{
    public function register($infos){
        $model = new InscriptionModel();

        if ($model->register($infos)) {
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