<?php
require_once"./Controller/GestionParametresController.php";
class GestionParametresView{
    public function Parametres(){
        echo"
        <ul class='navbar'>
        <a href='principale.php' id='home'><img src='http://drive.google.com/uc?export=view&id=1x0Id9jSlxs-tjNyVYtUz5ebi1Q2UhXkL'></a>
        <center><h2>Gestion des paramètres</h2></center><br>
        </ul><br><br>
        ";

        echo"
        <center>
        <div class='parametres'>
                <center>
                    <div>
                        <a onclick='openForm2()'>
                            <img src='http://drive.google.com/uc?export=view&id=1XNLv0X4IT_dV2Zjmp2TPHvzZhpnqMLh4'>
                            <h3>Gestion de diaporama</h3>
                        </a>
                    </div>
                </center>
                <center>
                    <div>
                        <a onclick='openForm1()'>
                            <img src='http://drive.google.com/uc?export=view&id=1vbmarfSH0Q3L3442S6dqPcPmO8hSNi0L'>
                            <h3>Gestion de style</h3>
                        </a>
                    </div>
                </center>

        </center>
        ";
        //MODIFIER LE STYLE
        echo"
            <form class='addNews' method='POST' class='form-popup' id='popupForm'>
            <input type='button' id='exit' value='x' onclick='closeForm1()'>
            <h3>Modifier le style</h3><br>
            <label>Nom du font : </label><input type='text' name='font' placeholder='Entrer le nom du font ...'/><br>
            <label>URL du font:</label> <input name='urlfont' type='text' placeholder='Entrer le lien du font ...'/><br>
            <label>Couleur : </label><input type='color' name='couleur'><br>
            <input type='submit' value='Ajouter' name='ajouterNews'/><br>
            </form>";
        //MODIFIER LE DIAPORAMA
        echo"
        <form class='addNews' method='POST' class='form-popup' id='diapoForm'>
        <input type='button' id='exit' value='x' onclick='closeForm2()'>
        <h3>Modifier le diaporama</h3><br>
        <label>Recherchez le titre</label><input type='text' name='titresearch' id='titresearch' onkeyup='searchFunction()'><br>";
        $controller = new GestionParametresController();
        $res = $controller->get_titres();
        echo"<ul id='titres'>";
        //Pour chaque cadre recupere de la bdd, on l'affiche
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            if($row['diapo']=='0'){
                echo"<li id='check-titre'>
                    <input type='checkbox' name='liste[]' value='".$row['titre_cadre']."'/>
                    <label>".$row['titre_cadre']."</label>
                </li>";
            }else{
                echo"<li id='check-titre'>
                    <input type='checkbox' checked name='liste[]' value='".$row['titre_cadre']."'/>
                    <label>".$row['titre_cadre']."</label>
                </li>";
            }
            
        }
        echo"</ul>
        <input type='submit' value='modifier' name='modifier_Diapo'/><br>
        </form>";
        if(isset($_POST['liste'])){
            $number = count($_POST["liste"]);  
            $diapo=array();
            if($number > 0)  
            {  
                for($i=0; $i<$number; $i++)  
                {  
                      if(trim($_POST["liste"][$i] != ''))  
                      {  
                          array_push($diapo,$_POST["liste"][$i]);
                      }  
                }  
            }  
          }
          $controller->modifier_diapo($diapo);
        echo "
        <script>
        function searchFunction() {
            var input, filter, ul, li, la, i, txtValue;
            input = document.getElementById('titresearch');
            filter = input.value.toUpperCase();
            ul = document.getElementById('titres');
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
        echo"
        <script>
        function openForm1() {
            document.getElementById('popupForm').style.display = 'block';
        }
    
        function closeForm1() {
            document.getElementById('popupForm').style.display = 'none';
        }
        function openForm2() {
            document.getElementById('diapoForm').style.display = 'block';
        }
        function closeForm2() {
            document.getElementById('diapoForm').style.display = 'none';

        }
        </script>";
        

    }
}