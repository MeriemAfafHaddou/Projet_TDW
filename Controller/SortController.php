<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\SortModel.php";
class SortController{
    public function get_Sort($critere){
        $model = new SortModel();
        $res = $model->get_Sort($critere);
        return $res;
    }
}
?>