<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\DiapoModel.php";
class DiapoController{
    public function get_diapo(){
        $model = new DiapoModel();
        $res = $model->get_diapo();
        return $res;
    }
}
?>