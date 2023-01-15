<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\GestionNewsModel.php";
class GestionNewsController{
    public function get_news(){
        $model = new GestionNewsModel();
        $res = $model->get_news();
        return $res;
    }
    public function add_news($news){
        $model = new GestionNewsModel();
        $res = $model->add_news($news);
        return $res;
    }
}
?>