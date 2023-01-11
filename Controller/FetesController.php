<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\FetesModel.php";
class FetesController{
    public function get_fetes($id){
        $model = new FetesModel();
        $res = $model->get_fetes($id);
        return $res;
    }
    public function get_nomfete($id){
        $model = new FetesModel();
        $res = $model->get_nomfete($id);
        return $res;
    }
}
?>