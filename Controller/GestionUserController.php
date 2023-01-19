<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\GestionUserModel.php";
class GestionUserController{
    public function get_user($critere){
        $model = new GestionUserModel();
        $res = $model->get_user($critere);
        return $res;
    }
    public function valider_user($id){
        $model = new GestionUserModel();
        $res = $model->valider_user($id);
        return $res;
    }
    public function supprimer_user($id){
        $model = new GestionUserModel();
        $res = $model->supprimer_user($id);
        if($res){
            echo "
                <script>
                    alert('Utilisateur supprimé avec succès.');
                </script>
            ";
        }
        return $res;
    }
}
?>