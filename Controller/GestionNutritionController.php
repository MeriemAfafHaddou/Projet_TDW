<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\GestionNutritionModel.php";
class GestionNutritionController{
    public function get_Nutrition(){
        $model = new GestionNutritionModel();
        $res = $model->get_Nutrition();
        return $res;
    }
    public function add_Nutrition($nutrition){
        $model = new GestionNutritionModel();
        $res = $model->add_Nutrition($nutrition);
        return $res;
    }
}
?>