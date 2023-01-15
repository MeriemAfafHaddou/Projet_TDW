<?php
require_once "./Website/all.php";
//La vue du cadre
class CadreView
{
    //Pour creer un cadre, nous avons besoin de la ligne cadre que ce soit recette ou news
    public function cadre($row)
    {
        echo"
            <div class='cadre'>
                <table>
                    <tr>
                        <th>
                            <h3>".$row['titre_cadre']."<h3>
                        </th>
                        <th><img src='".$row['img_cadre']."'/></th>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <p>".$row['desc_cadre']."</p>
                            <form method='POST' class='plus'>
                                <div class='plus'>
                                    <input type='hidden' name='recette_id' value='".$row['id_recette']."'>
                                    <input type='submit' name='afficherplus' value='Afficher la suite'>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        ";
        if(isset($_post['afficherplus'])){
            $id=$_POST['recette_id'];
            $recette=new website();
            $recette->build_recette($id);
        }
    }
}