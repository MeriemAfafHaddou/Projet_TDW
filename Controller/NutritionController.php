<?php
//Appeler le modele
require_once ".\Model\NutritionModel.php";
class NutritionController{
    public function get_nutrition(){
        $model = new NutritionModel();
        $res = $model->get_nutrition();
        return $res;
    }
}
?>