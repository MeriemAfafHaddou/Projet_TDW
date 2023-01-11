<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\IngredientModel.php";
class IngredientController{
    public function get_ingredient($id){
        $model = new IngredientModel();
        $res = $model->get_ingredient($id);
        return $res;
    }
}
?>