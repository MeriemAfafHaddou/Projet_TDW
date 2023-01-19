<?php
//Nous aurons besoin d'utiliser les fichiers suivants
require_once ".\Controller\IdeesController.php";
require_once ".\View\CadreView.php";
class IdeesView
{
    //Pour creer une vue de categorie, il faut donner son identifiant
    public function form()
    {
        //Le controleur pour recuperer les donnees de la bdd
        $controller = new IdeesController();
        echo "
        <form action='#' method='POST' class='idees_form'>
        <center>
          <p>cherchez vos Ingrédients</p>
          <input type='text' name='ideesearch' id='ideesearch' onkeyup='myFunction()'>
        </center>";
        $res = $controller->get_ingreds();
        echo"<ul id='liste_ingred'>";
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo"<li id='inputGroup'>
                    <input type='checkbox' name='liste[]' value='".$row['nom_ingred']."'/>
                    <label>".$row['nom_ingred']."</label>
                </li>";
        }
        echo"</ul>
        <center><input type='submit' value='Afficher les recettes' name='idees'/></center>
        </form>";
        echo "
        <script>
        function myFunction() {
            var input, filter, ul, li, la, i, txtValue;
            input = document.getElementById('ideesearch');
            filter = input.value.toUpperCase();
            ul = document.getElementById('liste_ingred');
            li = ul.getElementsByTagName('li');
          
               for (i = 0; i < li.length; i++) {
              la = li[i].getElementsByTagName('label')[0];
              txtValue = la.textContent || la.innerText; 
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = 'block';
              } else {
                li[i].style.display = 'none';
              }
            }
          }
          
        
        </script>";
        if(isset($_POST['idees'])){
            if(!empty($_POST['liste'])) {
                $liste = array();
                foreach($_POST['liste'] as $ingredient) {
                    array_push($liste,$ingredient);
                }
                $res=$controller->get_idees($liste);
                $cadre=new CadreView();
                echo "<br>
                <div class='recettes'>";
                while($row = $res->fetch(PDO::FETCH_ASSOC)){
                  $cadre->cadre($row);
              }
              echo"</div>";

            }
        }
    }
}