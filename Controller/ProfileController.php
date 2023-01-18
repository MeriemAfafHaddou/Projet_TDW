<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\ProfileModel.php";
class ProfileController{
    public function get_profile($id){
        $model = new ProfileModel();
        $res = $model->get_profile($id);
        return $res;
    }
    public function modifier_img($id,$lien){
        $model = new ProfileModel();
        $res = $model->modifier_img($id,$lien);
        return $res;
    }
    public function modifier_mdp($id,$mdp){
        $model = new ProfileModel();
        $res = $model->modifier_mdp($id,$mdp);
        return $res;
    }
}
?>