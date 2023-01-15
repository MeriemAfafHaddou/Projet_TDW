<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\PageCategorieModel.php";
class PageCategorieController{
    public function get_pagecategorie($id){
        $model = new PageCategorieModel();
        $res = $model->get_pagecategorie($id);
        return $res;
    }
    public function get_Sort($id,$critere){
        $model = new PageCategorieModel();
        $res = $model->get_Sort($id,$critere);
        return $res;
    }
}
?>