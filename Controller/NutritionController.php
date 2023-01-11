<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\NutritionModel.php";
class NutritionController{
    public function get_nutrition(){
        $model = new NutritionModel();
        $res = $model->get_nutrition();
        return $res;
    }
}
?>