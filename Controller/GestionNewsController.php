<?php
//Appeler le modele
require_once ".\Model\GestionNewsModel.php";
class GestionNewsController{
    public function get_news(){
        $model = new GestionNewsModel();
        $res = $model->get_news();
        return $res;
    }
    public function get_new($id){
        $model = new GestionNewsModel();
        $res = $model->get_new($id);
        return $res;
    }
    public function add_news($news){
        $model = new GestionNewsModel();
        $res = $model->add_news($news);
        if($res){
            echo "
                <script>
                    alert('News ajouté avec succès.');
                </script>
            ";
        }
        return $res;
    }
    public function modifier_news($modif){
        $model = new GestionNewsModel();
        $res = $model->modifier_news($modif);
        if($res){
            echo "
                <script>
                    alert('News modifié avec succès.');
                </script>
            ";
        }
        return $res;
    }
    public function supprimer_news($id){
        $model = new GestionNewsModel();
        $res = $model->supprimer_news($id);
        if($res){
            echo "
                <script>
                    alert('News supprimé avec succès.');
                </script>
            ";
        }
        return $res;
    }
    
}
?>