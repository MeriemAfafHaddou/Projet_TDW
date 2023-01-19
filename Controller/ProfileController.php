<?php
//Appeler le modele
require_once ".\Model\ProfileModel.php";
class ProfileController{
    public function get_profile($id){
        $model = new ProfileModel();
        $res = $model->get_profile($id);
        return $res;
    }
    public function modifier_img($id,$lien){
        $model = new ProfileModel();
        $res = $model->modifier_img($id,$lien);
        if($res){
            echo "
                <script>
                    alert('Image modifiée avec succès.');
                </script>
            ";
        }
        return $res;
    }
    public function modifier_mdp($id,$mdp){
        $model = new ProfileModel();
        $res = $model->modifier_mdp($id,$mdp);
        if($res){
            echo "
                <script>
                    alert('Mot de passe modifié avec succès.');
                </script>
            ";
        }
        return $res;
    }
}
?>