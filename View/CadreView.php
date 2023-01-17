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
                    <br>
                    <tr>
                        <td colspan='3'>
                            <p>".$row['desc_cadre']."</p><br>
                            <form method='POST'>
                                <div class='plus'>
                                    <input type='hidden' name='recette_id' value='".$row['id_recette']."'>
                                    <a href='Recette.php?id=".$row['id_recette']."'>Afficher la suite</a>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        ";
    }
}