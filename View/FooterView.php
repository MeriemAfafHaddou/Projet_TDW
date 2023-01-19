<?php
//Nous autons besoin des fichiers suivants
require_once ".\Controller\MenuController.php";
class FooterView
{
    public function Footer()
    {
        echo "<div class='footer'>
        <ul>
        <li><a href=''><img src='http://drive.google.com/uc?export=view&id=1CC303a-AS_es92-E_e7UL_RXLaMnyqN1'></a></li>
        ";
        //On cree un controleur pour pouvir recuperer les donnees de la bdd
        $controller = new MenuController();
        $res = $controller->get_menu();
        //Afficher tous les elements du menu
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo "<li> <a href=''>".$row['titre_menu']."</a></li>";
        }
        echo "
        </ul>
        <p>Votre guide pour avoir d'EL BENNA dans vos plats</p><br><br>
        <hr>
        <div>
            <a href=''><img src='http://drive.google.com/uc?export=view&id=1bcljT2UV5pxVFUVTUWcoIDTv1hUHtCfj'></img></a>
            <a href=''><img src='http://drive.google.com/uc?export=view&id=1KSYg1GvhriQkZNr1JlWgpy4ZDkZA4_7m'></img></a>
            <a href=''><img src='http://drive.google.com/uc?export=view&id=1htW7QryqwnisT-TPMR-9YQYv7jVSDz5r'></img></a>
        </div>
        </div>
        ";
    }
}