<?php
//Appeler le modele
require_once ".\Model\HealthyModel.php";
class HealthyController{
    public function get_calories($cal,$critere){
        $model = new HealthyModel();
        $res = $model->get_calories($cal,$critere);
        return $res;
    }
    public function get_healthy($critere){
        $model = new HealthyModel();
        $res = $model->get_healthy($critere);
        return $res;
    }
}
?>