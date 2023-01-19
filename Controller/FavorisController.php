<?php
//Appeler le modele
require_once ".\Model\FavorisModel.php";
class FavorisController{
    public function get_favoris($id,$critere){
        $model = new FavorisModel();
        $res = $model->get_favoris($id,$critere);
        return $res;
    }
    public function add_favoris($id,$recette){
        $model = new FavorisModel();
        $res = $model->add_favoris($id,$recette);
        return $res;
    }
    public function remove_favoris($id,$recette){
        $model = new FavorisModel();
        $res = $model->remove_favoris($id,$recette);
        return $res;
    }
    public function isFavoris($id,$user){
        $model = new FavorisModel();
        $res = $model->isFavoris($id,$user);
        $row=$res->fetch(PDO::FETCH_ASSOC);
        if($row){
            return true;
        }else{
            return false;
        }
        
    }
}
?>