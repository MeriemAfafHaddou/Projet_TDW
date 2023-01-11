<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\SaisonModel.php";
class SaisonController{
    public function get_saison($id){
        $model = new SaisonModel();
        $res = $model->get_saison($id);
        return $res;
    }
}
?>