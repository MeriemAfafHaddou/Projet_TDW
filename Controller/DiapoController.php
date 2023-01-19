<?php
//Appeler le modele
require_once ".\Model\DiapoModel.php";
class DiapoController{
    public function get_diapo(){
        $model = new DiapoModel();
        $res = $model->get_diapo();
        return $res;
    }
}
?>