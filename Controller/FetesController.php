<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\FetesModel.php";
class FetesController{
    public function get_fetes($filtre,$critere){
        $model = new FetesModel();
        $res = $model->get_fetes($filtre,$critere);
        return $res;
    }
}
?>