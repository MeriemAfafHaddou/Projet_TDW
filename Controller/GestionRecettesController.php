<?php
//Appeler le modele
require_once "C:\wamp64\www\ElBenna\Model\GestionRecettesModel.php";
class GestionRecettesController{
    public function get_recettes($critere){
        $model = new GestionRecettesModel();
        $res = $model->get_Recettes($critere);
        return $res;
    }
    
    public function get_rec($id){
        $model = new GestionRecettesModel();
        $res = $model->get_rec($id);
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
    public function modifier_recette($modif){
        $model = new GestionRecettesModel();
        $res = $model->modifier_recette($modif);
        return $res;
    }
    public function supprimer_recette($id){
        $model = new GestionRecettesModel();
        $res = $model->supprimer_recette($id);
        return $res;
    }
    public function ajouter_ingreds($id,$liste){
        $model= new GestionRecettesModel();
        $res=$model->ajouter_ingreds($id,$liste);
        return $res;
    }
}
?>