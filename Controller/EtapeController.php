<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\EtapeModel.php";
class EtapeController{
    public function get_etape($id){
        $model = new EtapeModel();
        $res = $model->get_etape($id);
        return $res;
    }
}
?>