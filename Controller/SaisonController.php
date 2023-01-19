<?php
//Appeler le modele
require_once ".\Model\SaisonModel.php";
class SaisonController{
    public function get_saison($filtre,$critere){
        $model = new SaisonModel();
        $res = $model->get_saison($filtre,$critere);
        return $res;
    }
}
?>