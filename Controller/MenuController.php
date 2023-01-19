<?php
//Appeler le modele
require_once ".\Model\MenuModel.php";
class MenuController{
    public function get_menu(){
        $model = new MenuModel();
        $res = $model->get_menu();
        return $res;
    }
}
?>