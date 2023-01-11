<?php
//Nous autons besoin des fichiers suivants
require_once "C:\wamp64\www\Elbenna\Controller\MenuController.php";
class MenuView
{
    public function Menu()
    {
        echo "<ul class='navbar'>
        <li><a href='http://localhost/ElBenna/Accueil.php'><img src='http://drive.google.com/uc?export=view&id=1CC303a-AS_es92-E_e7UL_RXLaMnyqN1'></a></li>
        ";
        //On cree un controleur pour pouvir recuperer les donnees de la bdd
        $controller = new MenuController();
        $res = $controller->get_menu();
        //Afficher tous les elements du menu
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo "<li> <a href='http://localhost/ElBenna/".$row['titre_menu'].".php'>".$row['titre_menu']."</a></li>";
        }
        echo "
            <li>
                <a href='https://www.facebook.com'><img src='http://drive.google.com/uc?export=view&id=1bcljT2UV5pxVFUVTUWcoIDTv1hUHtCfj'></img></a>
                <a href='https://www.instagram.com'><img src='http://drive.google.com/uc?export=view&id=1KSYg1GvhriQkZNr1JlWgpy4ZDkZA4_7m'></img></a>
                <a href='https://www.twitter.com'><img src='http://drive.google.com/uc?export=view&id=1htW7QryqwnisT-TPMR-9YQYv7jVSDz5r'></img></a>
            </li>
        </ul>";
    }
}