<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\NewsModel.php";
class NewsController{
    public function get_news(){
        $model = new NewsModel();
        $res = $model->get_news();
        return $res;
    }
}
?>