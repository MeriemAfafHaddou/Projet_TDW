<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\GestionParametresModel.php";
class GestionParametresController{
    public function get_titres(){
        $model = new GestionParametresModel();
        $res = $model->get_titres();
        return $res;
    }
    public function modifier_diapo($diapo){
        $model = new GestionParametresModel();
        $res = $model->modifier_diapo($diapo);
        return $res;
    }
}
?>