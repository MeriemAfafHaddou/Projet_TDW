<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\FilterModel.php";
class FilterController{
    public function get_filter($critere){
        $model = new FilterModel();
        $res = $model->get_filter($critere);
        return $res;
    }
}
?>