<?php
//Appeler le modele
require_once ".\Model\NewsModel.php";
class NewsController{
    public function get_Sort($critere){
        $model = new NewsModel();
        $res = $model->get_Sort($critere);
        return $res;
    }
}
?>