<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once "C:\wamp64\www\ElBenna\Controller\DiapoController.php";
class DiapoView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function Diapo()
    {
        echo "<br>
        <section class='diapoContainer'>";
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new DiapoController();
        $res = $controller->get_diapo();
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo"
            <table class='diapo'>
            <tr>
                <td><h2>".$row['titre_cadre']."</h2></td>
                <td rowspan='3'><img src='".$row['img_cadre']."'></td>
                
            </tr>
            <tr><td>
                <p>".$row['desc_cadre']."</p>
                <div>
                    <div class='icon'>
                        <img src='http://drive.google.com/uc?export=view&id=1rUqYbbzLRh98crwD5q44HXks560pU3ek'/>
                        <p>".$row['notation']."</p>
                    </div>
                    <div class='icon'><img src='http://drive.google.com/uc?export=view&id=1vnsf7dtGo0rDNUJ88bJDSiRDGVofFiyK'><p>".$row['tmp_prep']."</p></div>
                </div>
            </td></tr>
            </table>";
        }
        echo"</section>";
        echo"<script type='text/javascript'>
            var slideIndex0 = 0;
            AfficherDiapo();
            function AfficherDiapo() {
            var i;
            var x = document.getElementsByClassName('diapo');
            for (i = 0; i < x.length; i++) {
                x[i].style.display = 'none';
            }
            slideIndex0++;
            if (slideIndex0 > x.length) {slideIndex0 = 1}
            x[slideIndex0-1].style.display = 'block';
            setTimeout(AfficherDiapo, 5000);
            }
        </script>";
    }
}
