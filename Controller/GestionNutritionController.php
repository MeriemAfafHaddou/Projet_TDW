<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\GestionNutritionModel.php";
class GestionNutritionController{
    public function get_Nutrition($critere){
        $model = new GestionNutritionModel();
        $res = $model->get_Nutrition($critere);
        return $res;
    }
    public function add_Nutrition($nutrition){
        $model = new GestionNutritionModel();
        $res = $model->add_Nutrition($nutrition);
        return $res;
    }
    public function get_ingredient($id){
        $model = new GestionNutritionModel();
        $res = $model->get_ingredient($id);
        return $res;
    }
    public function valider_ingred($id){
        $model = new GestionNutritionModel();
        $res = $model->valider_ingred($id);
        return $res;
    }
    public function supprimer_ingred($id){
        $model = new GestionNutritionModel();
        $res = $model->supprimer_ingred($id);
        return $res;
    }
    public function modifier_nutrition($modif){
        $model = new GestionNutritionModel();
        $res = $model->modifier_nutrition($modif);
        return $res;
    }
}
?>