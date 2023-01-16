<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\GestionRecettesModel.php";
class GestionRecettesController{
    public function get_recettes(){
        $model = new GestionRecettesModel();
        $res = $model->get_Recettes();
        return $res;
    }
    public function add_recette($recette){
        $model = new GestionRecettesModel();
        $res = $model->add_recette($recette);
        return $res;
    }
    public function valider_recette($id){
        $model = new GestionRecettesModel();
        $res = $model->valider_recette($id);
        return $res;
    }
    public function supprimer_recette($id){
        $model = new GestionRecettesModel();
        $res = $model->supprimer_recette($id);
        return $res;
    }
}
?>