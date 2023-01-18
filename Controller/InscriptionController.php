<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\InscriptionModel.php";
class InscriptionController{
    public function register($infos){
        $model = new InscriptionModel();
        $res=$model->register($infos);
        $row=$res->fetch(PDO::FETCH_ASSOC);
        if ($res->rowCount()==1) {
            $_SESSION['id'] = $row['id_user'];
            $_SESSION['nom']=$row['nom_user'];
            $_SESSION['prenom']=$row['prenom_user'];
            $_SESSION['loggedin'] = true;
            $_SESSION['role']='user';
            header("Location: Profile.php?id=".$_SESSION['id']."");
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