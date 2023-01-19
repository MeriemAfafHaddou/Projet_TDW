<?php
//Appeler le modele
require_once ".\Model\TitreModel.php";
class TitreController{
    public function get_titre($id){
        $model = new TitreModel();
        $res = $model->get_titre($id);
        return $res;
    }
}
?>