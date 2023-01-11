<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\HealthyModel.php";
class HealthyController{
    public function get_calories($cal){
        $model = new HealthyModel();
        $res = $model->get_calories($cal);
        return $res;
    }
    public function get_healthy(){
        $model = new HealthyModel();
        $res = $model->get_healthy();
        return $res;
    }
}
?>