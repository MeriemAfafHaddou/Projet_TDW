<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\IdeesModel.php";
class IdeesController{
    public function get_idees(){
        $model = new IdeesModel();
        $res = $model->get_idees();
        return $res;
    }
    public function form_idees(){
        $model = new IdeesModel();
        $res = $model->form_idees();
        return $res;
    }
}
?>