<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\CategorieModel.php";
class CategorieController{
    public function get_categorie($cat){
        $model = new CategorieModel();
        $res = $model->get_categorie($cat);
        return $res;
    }
}
?>