<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\RecetteModel.php";
class RecetteController{
    public function get_recette($id){
        $model = new RecetteModel();
        $res = $model->get_recette($id);
        return $res;
    }
}
?>