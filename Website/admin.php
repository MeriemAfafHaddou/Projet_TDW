<?php
require_once "View/GestionUserView.php";
require_once "View/GestionNewsView.php";
require_once "View/GestionRecettesView.php";
require_once "View/GestionNutritionView.php";
header('Content-type: text/html; charset=UTF-8');
class admin{
    //La fonction permettant de generer Le header de la page
    public function header()
    {
        echo"<head>
        <meta charset='UTF-8'>
        <title>Administration</title>
        <meta name='description' content='' />
        <link href='Website/Style.css' rel='stylesheet' type='text/css'/>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>  
        <style>@import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');</style>
        <style>@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap');</style>
        </head>";
    }
    public function build_user(){
        //Declaration du menu, diapo, categorie, et footer
        $users=new GestionUserView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $users->user();
        echo"</body></html>";
    }
    public function build_GestionNews(){
        //Declaration du menu, diapo, categorie, et footer
        $news=new GestionNewsView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $news->news();
        echo"</body></html>";
    }
    public function build_GestionRecettes(){
        //Declaration du menu, diapo, categorie, et footer
        $recettes=new GestionRecettesView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $recettes->recettes();
        echo"</body></html>";
    }
    public function build_GestionNutrition(){
        //Declaration du menu, diapo, categorie, et footer
        $nutrition=new GestionNutritionView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $nutrition->Nutrition();
        echo"</body></html>";
    }
    public function build_principale(){
        //Declaration du menu, diapo, categorie, et footer
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>
        <center>
            <h2> Adiministration </h2>
        </center><br>
        <center>
            <div class='principale'>
                <div>
                    <a href='http://localhost/ElBenna/GestionRecettes.php'>
                        <img src='http://drive.google.com/uc?export=view&id=1Oq6YayckvLJw3Jpd2GoraNQDPAdrJW9l'>
                        <h3>Gestion des recettes</h3>
                    </a>
                </div>
                <div>
                    <a href='http://localhost/ElBenna/GestionNews.php'>
                        <img src='http://drive.google.com/uc?export=view&id=1Bv9pLhJ4lOW5YjH3mehC9qeeDbwcmMnr'>
                        <h3>Gestion des News</h3>
                    </a>
                </div>
                <div>
                    <a href='http://localhost/ElBenna/GestionUser.php'>
                        <img src='http://drive.google.com/uc?export=view&id=1yKCgOOpiwdoia9p1XUwH7tNymwIr056i'>
                        <h3>Gestion des Utilisateurs</h3>
                    </a>
                </div>
                <div>
                    <a  href='http://localhost/ElBenna/GestionNutrition.php'>
                        <img src='http://drive.google.com/uc?export=view&id=1dFxhGEtli_QDFI_r4hcyS8D3eE2aTd9I'>
                        <h3>Gestion de Nutrition</h3>
                    </a>
                </div>
                <div>
                    <a  href='http://localhost/ElBenna/parametres.php'>
                        <img src='http://drive.google.com/uc?export=view&id=1FN9Z-TT6MHbNPzEt9eNm6ZKaIISOXIaF'>
                        <h3>Gestion des parametres</h3>
                    </a>
                </div>
                <div>
                    <form method='POST' class='logout'>
                        <img src='http://drive.google.com/uc?export=view&id=1CQxHLn0zQ9mZFt_NsQmLnB3cqiJeOZkJ'>
                        <input type='submit' value='Se déconnecter' name='logout'/>
                    </form>
                </div>
        </center>
        </div>";
        if(isset($_POST['logout'])){
            session_unset();
        }
        //Construire le menu
        echo"</body></html>";
    }




}





?>