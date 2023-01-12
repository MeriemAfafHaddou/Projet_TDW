<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\GestionUserModel.php";
class GestionUserController{
    public function get_user(){
        $model = new GestionUserModel();
        $res = $model->get_user();
        return $res;
    }
    public function valider_user($id){
        $model = new GestionUserModel();
        $res = $model->valider_user($id);
        return $res;
    }
}
?>