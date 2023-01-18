<?php
//La page d'accueil de notre siteweb ElBenna

//Nous allons utiliser les fichiers suivants
require_once "View/MenuView.php";
require_once "View/CategorieView.php";
require_once "View/TitreView.php";
require_once "View/DiapoView.php";
require_once "View/NewsView.php";
require_once "View/FetesView.php";
require_once "View/NutritionView.php";
require_once "View/SaisonView.php";
require_once "View/PageCategorieView.php";
require_once "View/FooterView.php";
require_once "View/RecetteView.php";
require_once "View/HealthyView.php";
require_once "View/IdeesView.php";
require_once "View/LoginView.php";
require_once "View/InscriptionView.php";
require_once "View/ProfileView.php";
header('Content-type: text/html; charset=UTF-8');
class website
{
    //La fonction permettant de generer Le header de la page
    public function header()
    {
        echo"<head>
        <meta charset='UTF-8'>
        <title>El Benna</title>
        <meta name='description' content='' />
        <link href='Website/Style.css' rel='stylesheet' type='text/css'/>
        <style>@import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');</style>
        <style>@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap');</style>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>  
        </head>";
    }
    // La fonction permettant de generer le code source de la page Accueil
    public function build_accueil(){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $categorie= new CategorieView();
        $titre= new TitreView();
        $diapo= new DiapoView();
        $footer = new FooterView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $menu->Menu();
        $diapo->Diapo();
        //Construire les quatre categories
        for($i=1;$i<=4;$i++)
        {
            $titre->Titre($i);
            $categorie->Categorie($i);
            echo"<br><br>";
        }
        $footer->Footer();
        echo"</body></html>";
    }

    public function build_news(){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $news= new NewsView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $menu->Menu();
        echo"<br>";
        $news->news();
        echo"</body></html>";
    }

    public function build_fetes(){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $fetes= new FetesView();
        $footer = new FooterView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $menu->Menu();
        echo"<br>";
        $fetes->Fetes();
        $footer->Footer();
        echo"</body></html>";
    }

    public function build_nutrition(){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $nutrition=new NutritionView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $menu->Menu();
        echo"<br>";
        $nutrition->nutrition();
        echo"</body></html>";
    }

    public function build_saison(){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $footer = new FooterView();
        $saison=new SaisonView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $menu->Menu();
        echo"<br>
        <center>
            <h2>Saisons</h1>
        </center>
        ";
        $saison->Saison();
        $footer->Footer();
        echo"</body></html>";
    }
    public function build_plats(){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $page= new PageCategorieView();
        $titre= new TitreView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $menu->Menu();
        echo"<br>";
        $titre->Titre(2);
        $page->page(2);
        $footer = new FooterView();
        $footer->Footer();
        echo"</body></html>";
    }
    public function build_entrees(){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $page= new PageCategorieView();
        $titre= new TitreView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $menu->Menu();
        echo"<br>";
        $titre->Titre(1);
        $page->page(1);
        $footer = new FooterView();
        $footer->Footer();
        echo"</body></html>";
    }
    public function build_boissons(){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $page= new PageCategorieView();
        $titre= new TitreView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $menu->Menu();
        echo"<br>";
        $titre->Titre(4);
        $page->Page(4);
        $footer = new FooterView();
        $footer->Footer();
        echo"</body></html>";
    }
    public function build_desserts(){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $page= new PageCategorieView();
        $titre= new TitreView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body
        >";
        //Construire le menu
        $menu->Menu();
        echo"<br>";
        $titre->Titre(3);
        $page->page(3);
        $footer = new FooterView();
        $footer->Footer();
        echo"</body></html>";
    }
    public function build_recette($id){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $recette=new RecetteView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $menu->Menu();
        echo"<br>";
        $recette->Recette($id);
        $footer = new FooterView();
        $footer->Footer();
        echo"</body></html>";
    }
    public function build_healthy(){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $page= new HealthyView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $menu->Menu();
        echo"<br>
        <center>
            <h2>Recettes avec un seuil de calories </h2>
        </center>
        <center>
            <form class='healthy' method='GET'>
            Introduisez le seuil de calories dans 100g : <br><input type='number' name='calories' /> <br>
            <input type='submit' value='Afficher les recettes' name='submit'/>
            </form>
        </center>";

        echo"
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>";
        $cal=100;
        if(isset($_GET['submit'])){
            $cal=$_GET['calories'];
        $page->healthy_cal($cal);
        }
        echo"<br><br><br>
        <center>
        <h2>Recettes contenant des ingrédients Healthy</h2>
        </center>";
        $page->healthy();
        $footer = new FooterView();
        $footer->Footer();
        echo"
        </body></html>";
    }
    public function build_idees(){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $idees=new IdeesView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $menu->Menu();
        echo"<br>
        <center>
            <h2>Idees de recettes</h2>
        </center>";
        $idees->form();
        $footer = new FooterView();
        $footer->Footer();
        echo"</body></html>";
    }
    public function build_login(){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $login=new LoginView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $menu->Menu();
        $login->login();
        $footer = new FooterView();
        $footer->Footer();
        echo"</body></html>";
    }
    public function build_Inscription(){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $inscription=new InscriptionView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $menu->Menu();
        $inscription->register();
        $footer = new FooterView();
        $footer->Footer();
        echo"</body></html>";
    }
    public function build_Profile($id){
        //Declaration du menu, diapo, categorie, et footer
        $menu =new MenuView();
        $profile=new ProfileView();
        echo"<!DOCTYPE html>
        <html>";
        //Appeler le header
        $this->header();
        echo"<body>";
        //Construire le menu
        $menu->Menu();
        $profile->Profile($id);
        $footer = new FooterView();
        $footer->Footer();
        echo"</body></html>";
    }
}
?>