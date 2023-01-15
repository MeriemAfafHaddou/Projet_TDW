<?php
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
                            <div class='plus'><a href='http://localhost/ElBenna/Recette.php?id='>Afficher la suite</a></div>
                        </td>
                    </tr>
                </table>
            </div>
        ";
    }
}