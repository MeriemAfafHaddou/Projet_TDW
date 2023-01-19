<?php
//Appeler le modele
require_once ".\Model\IdeesModel.php";
require_once ".\View\CadreView.php";
class IdeesController{
    public function get_ingreds(){
        $model = new IdeesModel();
        $res = $model->get_ingreds();
        return $res;
    }
    public function get_idees($liste){
        $model = new IdeesModel();
        $res = $model->get_idees($liste);

        return $res;
    }
}
?>