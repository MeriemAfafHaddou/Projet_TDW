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
                            <h4>".$row['titre_cadre']."<h4>
                        </th>
                        <th><img src='".$row['img_cadre']."'/></th>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <p>".$row['desc_cadre']."<p>
                            <div class='plus'><a href='http://localhost/ElBenna/Recette.php'>Afficher la suite</a></div>
                        </td>
                    </tr>
                </table>
            </div>
        ";
    }
}