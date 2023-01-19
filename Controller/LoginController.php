<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\LoginModel.php";
require_once "C:\wamp64\www\ElBenna\View\LoginView.php";
require_once "Website\all.php";
class LoginController{
    public function login($email,$pwd){
        $model = new LoginModel();
        $res=$model->login($email,$pwd);
        $row = $res->fetch(PDO::FETCH_ASSOC);
        if ($res->rowCount()==1) {
            if($row['user_valid']=='1'){
                $_SESSION['id'] = $row['id_user'];
                $_SESSION['nom']=$row['nom_user'];
                $_SESSION['prenom']=$row['prenom_user'];
                $_SESSION['loggedin'] = true;
                if($row['email']=='admin'){
                    $_SESSION['role']='admin';
                    header("Location: Principale.php");
                }else{
                    $_SESSION['role']='user';
                    header("Location: Profile.php?id=".$_SESSION['id']."");
                }
                exit();
            // login success         
        }
        else {
            // login failed
            header("Location: Se connecter.php?error=Incorect User name or password");

            exit();
        }
        }else{
            echo"
            <script>
                alert('Oops! Vous n etes pas encore validés ... Essayez plus tard');
            </script>
            ";
        }
                
    }
}
?>