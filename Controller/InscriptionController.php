<?php
//Appeler le modele
require_once ".\Model\InscriptionModel.php";
class InscriptionController{
    public function register($infos){
        $model = new InscriptionModel();
        $res=$model->register($infos);
        $row=$res->fetch(PDO::FETCH_ASSOC);
        if ($res->rowCount()==1) {
            echo"
            <script>
                alert('Oops! Votre inscription n est pas encore validée ... Essayez plus tard');
            </script>
            ";
            header("Location: Accueil.php");
        }
        else {
            // login failed

            return false;
        }
    }
}
?>